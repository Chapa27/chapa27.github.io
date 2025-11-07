<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuTamu as ModelsBukuTamu;
use App\Models\BukuTamuModel;
use App\Models\DaerahModel;
use App\Models\KeperluanModel;
use CodeIgniter\HTTP\ResponseInterface;
use SebastianBergmann\Diff\Diff;

class BukuTamu extends BaseController
{
    protected $title;
    protected $model;
    protected $masterDaerah;
    protected $masterKeperluan;
    protected $validation;
    protected $countUserNow;

    public function __construct()
    {
        $this->title = 'Buku Tamu';
        // $this->model = new BukuTamu();
        $this->masterDaerah = new DaerahModel();
        $this->masterKeperluan = new KeperluanModel();
       
    }

    public function index()
    {

        $today = date('Y-m-d');
        $this->model = new BukuTamuModel();

        $countUserNow = $this->model->where('tanggal', $today)->countAllResults();
        $items = $this->model->orderBy('id', 'DESC')->get()->getRow();
        $tglAkhir = date('Y-m-d', strtotime('-1 day', strtotime($items->tanggal)));
        $countUserYesterday = $this->model->where('tanggal', $tglAkhir)->countAllResults();
        
         $data = [
            'title' => $this->title,
            'pelanggan_hari_ini' => $countUserNow,
            'pelanggan_kemarin' => $countUserYesterday
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
        $today = date('Y-m-d');
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
        $this->model = new BukuTamuModel();
         if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->findAll()
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
                 'no_telepon' => [
                    'label' => 'Keperluan',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus angka',

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
                    ]
                ];
            } else {
                $simpandata = [
                    'no_urut' => $this->generate_nomor_antrian(),
                    'tanggal' => date('Y-m-d'),
                    'nama' => $this->request->getVar('nama'),
                    'pengirim' => $this->request->getVar('pengirim'),
                    'id_daerah' => $this->request->getVar('id_daerah'),
                    'id_keperluan' => $this->request->getVar('id_keperluan'),
                    'no_telepon' => $this->request->getVar('no_telepon')
                ];
                $this->model->save($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
}

