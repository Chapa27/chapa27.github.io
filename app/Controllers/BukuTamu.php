<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuTamuModel;
use App\Models\DaerahModel;
use App\Models\KeperluanModel;
use App\Models\MapBukuTamuModel;
use App\Models\PenyakitMaster;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class BukuTamu extends BaseController
{
    protected $title;
    protected $model;
    protected $masterDaerah;
    protected $masterKeperluan;
    protected $modelMapData;
    protected $validation;
    protected $countUserNow;
    protected $time;
    protected $today;


    public function __construct()
    {
        $this->title = 'Buku Tamu';
        $this->masterDaerah = new DaerahModel();
        $this->masterKeperluan = new KeperluanModel();
        $this->model = new BukuTamuModel();
        $this->time = Time::now('Asia/Jakarta'); 
        $this->today = $this->time->toDateTimeString();
        $this->validation = \Config\Services::validation();

    }

    public function index()
    {

        $countUserNow = $this->model->where('tanggal', date('Y-m-d', strtotime($this->today)))->countAllResults();     
        $dataAkhir = $this->model->orderBy('id', 'DESC')->get()->getRow();
        $tglAkhir = date('Y-m-d', strtotime('-1 day', strtotime(@$dataAkhir->tanggal)));
        if ($countUserNow == 0) {
            $setCountDay = '0 day';
        }else{
            $setCountDay = '-1 day';
        }
        $tglAkhir = date('Y-m-d', strtotime($setCountDay, strtotime(@$dataAkhir->tanggal)));
       
        $countUserYesterday = $this->model->where('tanggal', $tglAkhir)->countAllResults();
        
        if (date('Y-m-d', strtotime($this->today)) == @$dataAkhir->tanggal) {
            $antrianTerakhir = $dataAkhir->no_antrian;
        }else{
            $antrianTerakhir = '-';
        }
     
        $data = [
            'title' => $this->title,
            'pelanggan_hari_ini' => $countUserNow,
            'pelanggan_kemarin' => $countUserYesterday,
            'antrian_terakhir' => $antrianTerakhir
        ];

        return view('Frontend/Buku-tamu/index', $data);
    }

    public function new()
    {
         if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Tambah ' . $this->title,
                'masterDaerah' => $this->masterDaerah->findAll(),
                'masterKeperluan' => $this->masterKeperluan->findAll()
            ];
            $msg = [
                'data' => view('Frontend/Buku-tamu/_add', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
        
    }

    public function generate_nomor_antrian() 
    {
        $today = date('Y-m-d', strtotime($this->time));
        $this->model = new BukuTamuModel();

        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini
        $count = $this->model->where('tanggal', $today)->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $nomorAntrian = 'A' . sprintf('%02d', $nomorUrut);
        
        return $nomorAntrian;
    }

    public function list()
    {  
         if ($this->request->isAJAX()) {
            
            $this->model = new BukuTamuModel();
            $today = date('Y-m-d', strtotime($this->today));
            $data = [
                'items' => $this->model->get_data($today)
            ];
            $msg = [
                'data' => view('Frontend/Buku-tamu/_data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function create()
    {
        if ($this->request->isAJAX()) {
            
            $db = \Config\Database::connect();

            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama'),
                    ]
                ];
                echo json_encode($msg);
            } else {
                $db->transStart();
                $this->model = new BukuTamuModel();
                $this->modelMapData = new MapBukuTamuModel();
                $simpandata = [
                    'no_antrian' => $this->generate_nomor_antrian(),
                    'tanggal' => date('Y-m-d', strtotime($this->today)),
                    'nama' => $this->request->getVar('nama'),
                    'pengirim' => $this->request->getVar('pengirim'),
                    'id_daerah' => $this->request->getVar('id_daerah'),
                    'jam_masuk' => date('H:i:s', strtotime($this->today)),
                    'id_keperluan' => $this->request->getVar('id_keperluan'),
                    'no_telepon' => $this->request->getVar('no_telepon'),
                    'catatan' => $this->request->getVar('catatan'),
                    'jumlah_coolbox' => 0
                ];
                $this->model->save($simpandata);

                $jlhSampel = $this->request->getVar('jumlah_sampel');
                $countJlhSampel = count($jlhSampel ?? []);

                for ($i=0; $i < $countJlhSampel; $i++) { 
                    $idPenyakit = $this->request->getVar('id_penyakit');
                    $idbukutamu = $this->model->getInsertID();
                    
                    $mapdata = [
                            'id_buku_tamu' => $idbukutamu,
                            'jumlah_sampel' => $jlhSampel[$i],
                            'id_penyakit' => $idPenyakit[$i]    
                    ];
                $db->table('map_buku_tamu')->insertBatch($mapdata);
                }
                
                $db->transComplete(); 
                $msg = [
                    'sukses' => 'Terimakasih atas kunjungannya, data disimpan'
                ];
                echo json_encode($msg);
            }
        }
    }

    public function cari_sampel()
    {
        if ($this->request->isAJAX()) {

            $modelPenyakitMaster = new PenyakitMaster();

            $data['items'] = $modelPenyakitMaster->findAll();

            $msg = [
                'data' => view('Frontend/Buku-tamu/_cari_sampel', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('No Process');
        }
    }

     public function cari_catatan()
    {
        if ($this->request->isAJAX()) {

            $modelPenyakitMaster = new PenyakitMaster();

            $data['items'] = $modelPenyakitMaster->findAll();

            $msg = [
                'data' => view('Frontend/Buku-tamu/_cari_catatan', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('No Process');
        }
    }

    public function set_jam_keluar($id)
    {
        
         if ($this->request->isAJAX()) {
            $result = $this->model->find($id);
        $cari_daerah = $this->masterDaerah->find($result['id_daerah']);
        $nama_daerah = $cari_daerah['nama_daerah'];
            $data = [
                'title' => 'Jam keluar',
                'items' => $result,
                'daerah' => $nama_daerah
            ];
            $msg = [
                'sukses' => view('Frontend/Buku-tamu/_jam_keluar', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    
    }

    public function update_jam_keluar()
    {
        if ($this->request->isAJAX()) {
            $this->model = new BukuTamuModel();
            $id = $this->request->getVar('id');
            $check = $this->model->find($id);
            if ($check) {
                $msg = [
                    'sukses' => 'Jam keluar berhasil disimpan'
                ];
                $simpandata = [
                    'id' => $id,
                    'jam_keluar' => date('H:i:s', strtotime($this->today))
                ];
                $this->model->save($simpandata);
            }else{
                $msg = [
                    'error' => 'Jam keluar gagal disimpan'
                ];
            }
            echo json_encode($msg);
           
        } else {
            exit('Not Process');
        }
    }


}

