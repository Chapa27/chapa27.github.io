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

     public function generate_kode_sampel($idlab) 
    {
        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini

        $count = $this->model->where('id_laboratorium', intval($idlab))->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $getLab = $this->masterLab->find($idlab);
        if ($getLab['id'] == 1) {
           $ks = 'K';
        }else{
            $ks = 'O';
        }
        $nomorAntrian = $ks.'.' . sprintf('%04d', $nomorUrut);
        return $nomorAntrian;
    }

    public function list() 
    {
        if ($this->request->isAJAX()) {
            $id_lab = $this->request->getVar('id_lab');
            $kode_pengantar = $this->request->getVar('kode_pengantar');
            $data = [
                'items' => $this->model->get_data($kode_pengantar, $id_lab)
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

    public function create()
    {
         if ($this->request->isAJAX()) {
            $id_laboratorium = $this->request->getVar('id_laboratorium');

            $valid = $this->validate([
                'id_jenis_sampel' => [
                    'label' => 'Jenis sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'lokasi_pengambilan_sampel' => [
                    'label' => 'Lokasi pengambilan sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tgl_jam_pengambilan_sampel' => [
                    'label' => 'Tanggal & jam pengambilan sampel',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_jenis_sampel' => $this->validation->getError('id_jenis_sampel'),
                        'lokasi_pengambilan_sampel' => $this->validation->getError('lokasi_pengambilan_sampel'),
                        'tgl_jam_pengambilan_sampel' => $this->validation->getError('tgl_jam_pengambilan_sampel')
                    ]
                ];
            } else {

                $simpandata = [
                    'kode_sampel' => $this->generate_kode_sampel($id_laboratorium),
                    'id_jenis_sampel' => $this->request->getVar('id_jenis_sampel'),
                    'lokasi_pengambilan_sampel' => $this->request->getVar('lokasi_pengambilan_sampel'),
                    'tgl_jam_ambil_sampel' => $this->request->getVar('tgl_jam_pengambilan_sampel'),
                    'metode_pemeriksaan' => $this->request->getVar('metode_pemeriksaan'),
                    'volume_atau_berat' => $this->request->getVar('volume_berat'),
                    'jenis_wadah' => $this->request->getVar('jenis_wadah'),
                    'jenis_pengawet' => $this->request->getVar('jenis_pengawet'),
                    'kode_pengantar' => $this->request->getVar('kode_pengantar'),
                    'id_laboratorium' => $this->request->getVar('id_laboratorium'),
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

    public function cari_data() 
    {
         $q= $this->request->getVar('q'); 
            // $sql="SELECT `fname` FROM `Property` WHERE fname LIKE '%$q%'";
            // $result = mysql_query($sql);

            $data = $this->masterJenisSampel->find($q);
            $json = array();

            while($row = $data) {
                array_push($json, $row['jenis_sampel']);
            }

            echo json_encode($json);
    }
}
