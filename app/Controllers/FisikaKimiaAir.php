<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FisikaKimiaAirModel;
use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use CodeIgniter\HTTP\ResponseInterface;

class FisikaKimiaAir extends BaseController
{
    protected $title;
    protected $model;
    protected $validation;
    protected $masterJenisSampel;
    protected $masterLab;

    public function __construct()
    {
        $this->title = 'Fisika kimia air';
        $this->model = new FisikaKimiaAirModel();
        $this->masterJenisSampel = new JenisSampelModel();
        $this->masterLab = new LaboratoriumModel();
        $this->validation = \Config\Services::validation();
    }

    public function index($param1, $param2)
    {
         $data = ['param1' => $param1];
         return view('Backend/Modul/Pelayanan-sampel/Lhu/Fisika-kimia-air/index', $data);
    }

     public function generate_kode_sampel() 
    {
        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini
        $count = $this->model->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $nomorAntrian = 'KP' . sprintf('%04d', $nomorUrut);
        
        return $nomorAntrian;
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
            $id_lab = $this->request->getVar('id_lab');
            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $data = [
                'title' => 'Tambah ' . $this->title,
                'masterLab' => $this->model->findAll(),
                'masterJenisSampel' => $this->masterJenisSampel->where('id_lab', $id_lab)->find(),
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar
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
