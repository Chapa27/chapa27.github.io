<?php

namespace App\Controllers;

use App\Models\InstansiModel;
use App\Models\PengaturanCoolboxModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Config\Publisher;

class PengaturanCoolbox extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $masterInstansi;
    protected $validation;

    public function __construct()
    {
        $this->title = 'Coolbox';
        $this->model = new PengaturanCoolboxModel();
        $this->masterInstansi = new InstansiModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title,
        ];
        return view('Backend/Modul/Pengaturan-coolbox/Coolbox/index', $data);
    }

    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data_all()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pengaturan-coolbox/Coolbox/_data', $data)
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
                'coolbox' => $this->model->get_data()
            ];

            $msg = [
                'data' => view('Backend/Modul/Pengaturan-coolbox/Coolbox/_add', $data)
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
            $idCoolbox = $this->request->getVar('id_coolbox');
            $status = $this->request->getVar('status');
            $tanggal = $this->request->getVar('tanggal');
            
            $cek_data = $this->model->cek_data($idCoolbox, $status, $tanggal);
           
            $valid = $this->validate([
                'id_coolbox' => [
                    'label' => 'Kode coolbox',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'status' => [
                    'label' => 'Status',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_coolbox' => $this->validation->getError('id_coolbox'),
                        'status' => $this->validation->getError('status'),
                        'tanggal' => $this->validation->getError('tanggal')
                    ]
                ];
            } else if ($cek_data) {
                $msg = [
                    'error' => 'Data gagal disimpan'
                ];
            } else {
                $simpandata = [
                    'id_coolbox' => $idCoolbox,
                    'status' => $status,
                    'tanggal' => $tanggal,
                    'jam' => $this->request->getVar('jam'),
                    'keterangan' => $this->request->getVar('keterangan')
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
         if ($this->request->isAJAX()) {

            $data = [
                'items' => $this->model->find($id),
                'coolbox' => $this->model->get_data(),
                'title' => 'Edit ' . $this->title
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pengaturan-coolbox/Coolbox/_edit', $data)
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
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
        if ($this->request->isAJAX()) {
            $idCoolbox = $this->request->getVar('id_coolbox');
            $status = $this->request->getVar('status');
            $tanggal = $this->request->getVar('tanggal');
            
            $cek_data = $this->model->cek_data($idCoolbox, $status, $tanggal);
           
            $valid = $this->validate([
                'id_coolbox' => [
                    'label' => 'Kode coolbox',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'status' => [
                    'label' => 'Status',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_coolbox' => $this->validation->getError('id_coolbox'),
                        'status' => $this->validation->getError('status'),
                        'tanggal' => $this->validation->getError('tanggal')
                    ]
                ];
            } else if ($cek_data) {
                $msg = [
                    'error' => 'Data gagal disimpan'
                ];
            } else {
                $simpandata = [
                    'id' => $this->request->getVar('id'),
                    'id_coolbox' => $idCoolbox,
                    'status' => $status,
                    'tanggal' => $tanggal,
                    'jam' => $this->request->getVar('jam'),
                    'keterangan' => $this->request->getVar('keterangan')
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
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */

    public function delete($id = null) 
    {
        if ($this->request->isAJAX()) {

            $this->model->delete($id);
            $msg = [
                'sukses' => 'Data berhasil di hapus'
            ];
            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
    
}
