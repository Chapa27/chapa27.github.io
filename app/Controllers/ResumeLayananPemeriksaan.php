<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengantarLhuModel;
use CodeIgniter\HTTP\ResponseInterface;

class ResumeLayananPemeriksaan extends BaseController
{
    protected $title;
    protected $modelPengantarLhu;

    public function __construct()
    {
        $this->title = 'Resume';
        $this->modelPengantarLhu = new PengantarLhuModel();
    }

    public function pakta()
    {
        return view('Backend/Modul/Pelayanan-pemeriksaan/Lhu/Resume/Pakta');
    }
}
