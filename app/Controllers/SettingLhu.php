<?php

namespace App\Controllers;

use App\Models\MappSettingLabModel;
use App\Models\PengantarLhuModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class SettingLhu extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    protected $title;
    protected $modelPengantarLhu;
    protected $modelMapSettingLab;

    public function __construct()
    {
        $this->title = 'Pengantar LHU';
        $this->modelPengantarLhu = new PengantarLhuModel();
        $this->modelMapSettingLab = new MappSettingLabModel();

    }

    public function index($id = null)
    {
        $pengantar_lhu = $this->modelPengantarLhu->find($id);
        $kode_lhu = $pengantar_lhu['kode_lhu'];
        $menu_lab = $this->modelMapSettingLab->get_data($kode_lhu);
        $data = [
            'title' => 'Entry ' . $this->title,
            'items' => $this->modelPengantarLhu->get_data_by_id_lhu($id),
            'menu_lab' => $menu_lab
        ];
       return view('Backend/Modul/Pelayanan-sampel/Lhu/index', $data);
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
}
