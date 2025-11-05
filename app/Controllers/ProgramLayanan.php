<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuTamuModel;
use App\Models\DaerahModel;
use App\Models\KeperluanModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProgramLayanan extends BaseController
{

    protected $validation;
    protected $masterDaerah;
    protected $masterKeperluan;
    protected $model;

     public function __construct()
    {
        $this->model = new BukuTamuModel();
        $this->masterDaerah = new DaerahModel();
        $this->masterKeperluan = new KeperluanModel();
        $this->validation = \Config\Services::validation();
    }


    public function index()
    {
        return view('Frontend/Layout/_home');
    }

    public function buku_tamu()
    {
        return view('Frontend/Layout/_buku_tamu');
    }

    public function new_buku_tamu()
    {
       
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Buku Tamu',
                'daerah' => $this->masterDaerah->orderBy('nama_daerah')->findAll(),
                'keperluan' => $this->masterKeperluan->findAll()
            ];
            $msg = [
                'data' => view('Frontend/Layout/_add', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }


    public function create_buku_tamu()
    {
        if ($this->request->isAJAX()) {
        $validation = \Config\Services::validation();

            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                    ],
                'id_keperluan' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                    ],
                'id_daerah' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'alamat' => $validation->getError('alamat'),
                        'id_daerah' => $validation->getError('id_daerah'),
                        'id_keperluan' => $validation->getError('id_keperluan')
                    ]
                ];
            }else{
                $simpandata = [
                    'no_urut' => 'A1',
                    'nama' => $this->request->getVar('nama'),
                    'id_daerah' => $this->request->getVar('id_daerah'),
                    'id_keperluan' => $this->request->getVar('id_keperluan'),
                    'catatan' => $this->request->getVar('catatan'),
                    'jumlah_sampel' => $this->request->getVar('jumlah_sampel'),
                    'tgl_kunjung' => date('Y-m-d'),
                    'jam_masuk' => date('H:i:s'),
                ];
                
            $this->model->save($simpandata);

            $msg = [
                'sukses' => 'Data berhasil disimpan'
            ];
            echo json_encode($msg);
            }

        } else {
            exit('Not Process');
        }
    }
}
