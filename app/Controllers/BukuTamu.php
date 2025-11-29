<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuTamuModel;
use App\Models\InstansiModel;
use App\Models\KeperluanModel;
use App\Models\PenyakitModel;
use CodeIgniter\I18n\Time;

class BukuTamu extends BaseController
{
    protected $title;
    protected $model;
    protected $masterInstansi;
    protected $masterKeperluan;
    protected $masterPenyakit;
    protected $validation;
    protected $countUserNow;
    protected $time;
    protected $today;
    protected $db;


    public function __construct()
    {
        $this->title = 'Buku Tamu';
        $this->masterInstansi = new InstansiModel();
        $this->masterKeperluan = new KeperluanModel();
        $this->masterPenyakit = new PenyakitModel();
        $this->model = new BukuTamuModel();
        $this->time = Time::now('Asia/Jakarta'); 
        $this->today = $this->time->toDateTimeString();
        $this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();
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
                'masterDaerah' => $this->masterInstansi->findAll(),
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

    public function show($id)
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Detail',
                'items' => $this->model->get_data_by_id($id),
                'sampel' => $this->model->get_data_by_sampel($id)
            ];
            $msg = [
                'sukses' => view('Frontend/Buku-tamu/_show', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }       
    }

    public function generate_nomor_antrian() 
    {
        $today = date('Y-m-d', strtotime($this->time));

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
            
            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'pengirim' => [
                    'label' => 'Pengirim',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'id_instansi' => [
                'label' => 'Asal instansi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'id_keperluan' => [
                'label' => 'Keperluan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'no_telepon' => [
                'label' => 'Nomor telepon',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus angka'
                    ]
                ],
                'catatan' => [
                'label' => 'Catatan',
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
                        'pengirim' => $this->validation->getError('pengirim'),
                        'id_instansi' => $this->validation->getError('id_instansi'),
                        'id_keperluan' => $this->validation->getError('id_keperluan'),
                        'no_telepon' => $this->validation->getError('no_telepon'),
                        'catatan' => $this->validation->getError('catatan'),
                    ]
                ];
            } else {

                $idKeperluan = $this->request->getVar('id_keperluan');
                $this->db->transStart();

                if ($idKeperluan != 1) {
                    $catatan = [
                        'catatan' => $this->request->getVar('catatan')
                    ];
                    $jlhCoolbox = 0;
                }else{
                    $catatan = null;
                    $jlhCoolbox = $this->request->getVar('jumlah_coolbox');
                }

                $simpandata = [
                    'no_antrian' => $this->generate_nomor_antrian(),
                    'tanggal' => date('Y-m-d', strtotime($this->today)),
                    'nama' => $this->request->getVar('nama'),
                    'pengirim' => $this->request->getVar('pengirim'),
                    'id_instansi' => $this->request->getVar('id_instansi'),
                    'jam_masuk' => date('H:i:s', strtotime($this->today)),
                    'id_keperluan' => $this->request->getVar('id_keperluan'),
                    'no_telepon' => $this->request->getVar('no_telepon'),
                    'jumlah_coolbox' => $jlhCoolbox
                ];

                $this->model->save($simpandata, $catatan);

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

                  $this->db->table('mapp_buku_tamu')->insertBatch($mapdata);
                }
               
                $this->db->transComplete(); 
                $msg = [
                    'sukses' => 'Terimakasih atas kunjungannya, data disimpan'
                ];
            }
            echo json_encode($msg);
        }
    }

    public function cari_sampel()
    {
        if ($this->request->isAJAX()) {

            $data['items'] = $this->masterPenyakit->findAll();

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

            $msg = [
                'data' => view('Frontend/Buku-tamu/_cari_catatan')
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
            $cari_daerah = $this->masterInstansi->find($result['id_instansi']);
            $nama_daerah = $cari_daerah['nama_instansi'];
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

    public function list_all()
    {
        $tglAwal = $this->model->where('tanggal', date('Y-m-d', strtotime($this->today)))->countAllResults();     
        $dataAkhir = $this->model->orderBy('id', 'DESC')->get()->getRow();
        $tglAkhir = date('Y-m-d', strtotime('0 day', strtotime(@$dataAkhir->tanggal)));
        $tglAwal = date('Y-m-d', strtotime('-1 day', strtotime($this->today)));

       
        $data = [
            'title' => $this->title,
            'items' => $this->model->get_data_list_all($tglAwal, $tglAkhir),
            'tgl_akhir' => $tglAkhir,
            'tgl_awal' => $tglAwal
        ];

        return view('Frontend/Buku-tamu/_list_all', $data);
    }

    public function cari_data_tamu()
    {
        $tglAwal = $this->model->where('tanggal', date('Y-m-d', strtotime($this->today)))->countAllResults();     
        $dataAkhir = $this->model->orderBy('id')->get()->getRow();
        $tglAkhir = date('Y-m-d', strtotime('0 day', strtotime(@$dataAkhir->tanggal)));
     
        $tgl_awal = $this->request->getVar('tgl_awal');
        $tgl_akhir = $this->request->getVar('tgl_akhir');
     
        $data = [
            'title' => $this->title,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'items' => $this->model->get_data_list_all($tgl_awal, $tgl_akhir),

        ];

        return view('Frontend/Buku-tamu/_list_all', $data);
    }


}

