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
    protected $validation;
    protected $countUserNow;
    protected $time;
    protected $today;
    protected $modelMapData;

    public function __construct()
    {
        $this->title = 'Buku Tamu';
        $this->time = Time::now('Asia/Jakarta'); 
        $this->masterDaerah = new DaerahModel();
        $this->masterKeperluan = new KeperluanModel();
        $this->today = $this->time->toDateTimeString();
    }

    public function index()
    {

        $this->model = new BukuTamuModel();

        $countUserNow = $this->model->where('tanggal', date('Y-m-d', strtotime($this->today)))->countAllResults();     
        $dataAkhir = $this->model->orderBy('id', 'DESC')->get()->getRow();
        $tglAkhir = date('Y-m-d', strtotime('-1 day', strtotime(@$dataAkhir->tanggal)));
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

    function generate_nomor_antrian() {
        $today = date('Y-m-d', strtotime($this->time));
        $this->model = new BukuTamuModel();

        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini
        $count = $this->model
                      ->where('tanggal', $today)
                      ->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $nomorAntrian = 'A' . sprintf('%02d', $nomorUrut);
        return $nomorAntrian;
    }

    public function list(){
      
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

    public function create1()
    {
        $validation = \Config\Services::validation();

        if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama pelanggan',
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
                'id_daerah' => [
                    'label' => 'Daerah',
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
                'catatan' => [
                    'label' => 'Catatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                    'no_telepon' => [
                    'label' => 'No.Telp',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} hanya angka'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'pengirim' => $validation->getError('pengirim'),
                        'id_daerah' => $validation->getError('id_daerah'),
                        'id_keperluan' => $validation->getError('id_keperluan'),
                        'no_telepon' => $validation->getError('no_telepon'),
                        'catatan' => $validation->getError('catatan'),
                        'jumlah_coolbox' => $validation->getError('jumlah_coolbox')
                    ]
                ];
            } else {
                $db = \Config\Database::connect();
                $idKeperluan = $this->request->getVar('id_keperluan');
                if ($idKeperluan != 1) {
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
                    ];
                    $this->model->save($simpandata);
                }else{
                   $db->transStart();
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
                    'jumlah_coolbox' => $validation->getError('jumlah_coolbox')
                    ];
                    $this->model->save($simpandata);
                    $idPenyakit = $this->request->getVar('id_penyakit');
                    $jlhSampel = $this->request->getVar('jumlah_sampel');
                    $mapdata = [
                        'id_buku_tamu' => $this->model->getInsertID(),
                        'jumlah_sampel' => $jlhSampel,
                        'id_penyakit' => $idPenyakit    
                        ];
                    $this->modelMapData = new MapBukuTamuModel();
                    $this->modelMapData->save($mapdata);
                    $db->transComplete();                  
                }

                $msg = [
                    'sukses' => 'Terimakasih atas kunjungannya, data disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    public function set_jam_keluar($id)
    {
            $this->model = new BukuTamuModel();

         if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->find($id),
                'title' => 'Jam keluar'
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

    public function cari_jenis_penyakit1()
    {
        if ($this->request->isAJAX()) {

            $modelPenyakitMaster = new PenyakitMaster();
            $content = '<h1>Response</h1';
            $data = [
                'items' => $modelPenyakitMaster->findAll()
            ];
            $msg = [
                'data' => view('Frontend/Buku-tamu/_jenis_penyakit', $data)
            ];
            $r['items'] = $modelPenyakitMaster->findAll();
            $msg = [
                'data' => view('Frontend/Buku-tamu/_jenis_penyakit', $r)
            ];

            // echo json_encode($msg);
        } else {
            exit('No Process');
        }
    }

    public function cari_jenis_penyakit()
    {
        if ($this->request->isAJAX()) {

            $modelPenyakitMaster = new PenyakitMaster();
            $items = $modelPenyakitMaster->findAll();
           
            $data['items'] = $modelPenyakitMaster->findAll();

            $msg = [
                'data' => view('Frontend/Buku-tamu/_jenis_penyakit', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('No Process');
        }
    }

     public function create()
    {
        $validation = \Config\Services::validation();

        if ($this->request->isAJAX()) {
                $db = \Config\Database::connect();

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
                    'catatan' => @$this->request->getVar('catatan'),
                    'jumlah_coolbox' => $this->request->getVar('jumlah_coolbox')
                ];
                $this->model->save($simpandata);
                $idPenyakit = $this->request->getVar('id_penyakit');
                $jlhSampel = $this->request->getVar('jumlah_sampel');
                    
                $mapdata = [
                        'id_buku_tamu' => $this->model->getInsertID(),
                        'jumlah_sampel' => $jlhSampel,
                        'id_penyakit' => $idPenyakit    
                ];
                $this->modelMapData->save($mapdata);
                $db->transComplete(); 
                    
                $msg = [
                    'sukses' => 'Terimakasih atas kunjungannya, data disimpan'
                ];
                echo json_encode($msg);
        }
    }

}

