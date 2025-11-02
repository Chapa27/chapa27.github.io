<?php

namespace App\Controllers;

use App\Models\DaerahModel;
use App\Models\KeperluanModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class BukuTamu extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $validation;
    protected $masterDaerah;
    protected $masterKeperluan;

    public function __construct()
    {
        $this->title = 'Buku Tamu';
        $this->masterDaerah = new DaerahModel();
        $this->masterKeperluan = new KeperluanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        return view('Frontend/Buku-tamu/index');
    }

    public function list()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('Frontend/Buku-tamu/_data')
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah ' . $this->title,
                'daerah' => $this->masterDaerah->orderBy('nama_daerah')->findAll(),
                'keperluan' => $this->masterKeperluan->findAll()
            ];
            $msg = [
                'data' => view('Frontend/Buku-tamu/_add', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        if ($this->request->isAJAX()) {

            $valid = $this->validate([
                'id_deaerah' => [
                    'label' => 'Asal',
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
                    'label' => 'catata',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jumlah_sampel' => [
                    'label' => 'Jumlah sampel',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'numeric' => '{field} harus angka'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_daerah' => $this->validation->getError('id_daerah'),
                        'id_keperluan' => $this->validation->getError('id_keperluan'),
                        'catatan' => $this->validation->getError('catatan'),
                        'jumlah_sampel' => $this->validation->getError('jumlah_sampel')
                    ]
                ];
            } else {
                $simpandata = [
                    'nama' => $this->request->getVar('nama'),
                    'id_daerah' => $this->request->getVar('id_daerah'),
                    'catatan' => $this->request->getVar('catatan'),
                    'jumlah_sampel' => $this->request->getVar('jumlah_sampel'),
                    'tgl_kunjung' => date('Y-m-d'),
                    'jam_masuk' => date('H:i:s'),
                ];
                $this->model->insert($simpandata);
                $msg = [
                    'sukses' => 'Data berhasil disimpan'
                ];
            }
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
