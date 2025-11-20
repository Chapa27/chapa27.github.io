<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FisikaKimiaAirModel;
use CodeIgniter\HTTP\ResponseInterface;

class FisikaKimiaAir extends BaseController
{
    protected $title;
    protected $model;
    protected $validation;

    public function __construct()
    {
        $this->title = 'Fisika kimia air';
        $this->model = new FisikaKimiaAirModel();
        $this->validation = \Config\Services::validation();
    }

    public function index($param1, $param2)
    {
         return view('Backend/Modul/Pelayanan-sampel/Lhu/Fisika-kimia-air/index');
    }

    public function list() 
    {
        if ($this->request->isAJAX()) {
            $data = [
                'items' => $this->model->findAll()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan-sampel/Lhu/Fisika-kimia-air/_data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    
    }

    public function new()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Tambah ' . $this->title,
                'masterLab' => $this->model->findAll()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan-sampel/Lhu/Fisika-kimia-air/_add', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }
    }
}
