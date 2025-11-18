<?php

namespace App\Controllers;

use App\Models\LaboratoriumModel;
use App\Models\PengantarLhuModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class PengantarLhu extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $model;
    protected $validation;
    protected $modelLab;

    public function __construct()
    {
        $this->title = 'Pengantar LHU';
        $this->model = new PengantarLhuModel();
        $this->modelLab = new LaboratoriumModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title,
        ];
        return view('Backend/Master/Pengantar-lhu/index', $data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function list()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->get_data()
            ];
            $msg = [
                'data' => view('Backend/Master/Pengantar-lhu/_data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }

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
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
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

    public function setting_lab($id = null) 
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Setting Tujuan Laboratorium',
                'items' => $this->model->get_data_by_id_lhu($id),
                'masterLab' => $this->modelLab->findAll()
            ];
            $msg = [
                'sukses' => view('Backend/Master/Pengantar-lhu/_set_lab', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }       
    }
}
