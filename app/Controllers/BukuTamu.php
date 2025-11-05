<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BukuTamu extends BaseController
{
    public function __construct()
    {
        $this->title = 'Buku Tamu';
    }

    public function index()
    {
         $data = [
            'title' => $this->title
        ];
        return view('Frontend/Buku-tamu/index', $data);

    }

    public function new()
    {
         if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah ' . $this->title,
            ];
            $msg = [
                'data' => view('Frontend/Buku-tamu/_add', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
        
    }

    public function create()
    {
        $this->validation = \Config\Services::validation();

         if ($this->request->isAJAX()) {
            $valid = $this->validate([
                'nama' => [
                    'label' => 'Nama pelanggan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $this->validation->getError('nama')
                    ]
                ];
            } else {
                $simpandata = [
                    'nama' => $this->request->getVar('nama')
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

