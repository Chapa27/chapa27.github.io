<?php

namespace App\Controllers;

use App\Models\LaboratoriumModel;
use App\Models\MappSettingLabModel;
use App\Models\PelangganModel;
use App\Models\PengantarLhuModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
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
    protected $modelMapSetLab;
    protected $modelPelanggan;
    protected $time;
    protected $today;

    public function __construct()
    {
        $this->title = 'Pengantar LHU';
        $this->model = new PengantarLhuModel();
        $this->modelLab = new LaboratoriumModel();
        $this->modelMapSetLab = new MappSettingLabModel();
        $this->modelPelanggan = new PelangganModel();
        $this->time = Time::now('Asia/Jakarta'); 
        $this->today = $this->time->toDateTimeString();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data ' . $this->title
        ];
        return view('Backend/Modul/Pelayanan-sampel/Pengantar-lhu/index', $data);
    }

    public function generate_kode_lhu() 
    {
        // Hitung jumlah antrian yang sudah ada untuk tanggal hari ini
        $count = $this->model->countAllResults();
       
        // Buat nomor urut baru
        $nomorUrut = $count + 1;

        // Format nomor antrian
        $nomorAntrian = 'LH' . sprintf('%04d', $nomorUrut);
        
        return $nomorAntrian;
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
                'items' => $this->model->get_data(),
                'cek_setting_lab' => $this->modelMapSetLab->findAll()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan-sampel/Pengantar-lhu/_data', $data)
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
        if ($this->request->isAJAX()) {

            $data = [
                'title' => 'Tambah ' . $this->title,
                'masterPelanggan' => $this->modelPelanggan->where('is_active', 1)->findAll()
            ];
            $msg = [
                'data' => view('Backend/Modul/Pelayanan-sampel/Pengantar-lhu/_add', $data)
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
                'id_pelanggan' => [
                    'label' => 'Pelanggan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tanggal' => [
                    'label' => 'Tanggal',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'id_pelanggan' => $this->validation->getError('id_pelanggan'),
                        'tanggal' => $this->validation->getError('tanggal')
                    ]
                ];
            } else {
                $simpandata = [
                    'kode_pengantar' => $this->generate_kode_lhu(),
                    'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                    'tanggal' => $this->request->getVar('tanggal'),
                    'tahun' => date('Y', strtotime($this->today))
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

    public function setting_lab($id = null) 
    {
        if ($this->request->isAJAX()) {
            $data = [
                'title' => 'Setting Tujuan Laboratorium',
                'items' => $this->model->get_data_by_id_lhu($id),
                'masterLab' => $this->modelLab->findAll()
            ];
            $msg = [
                'sukses' => view('Backend/Modul/Pelayanan-sampel/Pengantar-lhu/_set_lab', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }       
    }

    public function create_setting_lab()
    {
         if ($this->request->isAJAX()) {
             $idLab = $this->request->getVar('id_laboratorium');
             $countJlhLab = count($idLab ?? []);

                for ($i=0; $i < $countJlhLab; $i++) { 

                    $simpandata = [
                        'id_pelanggan' => $this->request->getVar('id_pelanggan'),
                        'kode_pengantar' => $this->request->getVar('kode_pengantar'),
                        'id_laboratorium' => $idLab[$i]    
                    ];

                    $this->modelMapSetLab->save($simpandata);
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
