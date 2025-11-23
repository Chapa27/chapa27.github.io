<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ResumeLayananPemeriksaan extends BaseController
{
    public function index()
    {
        //
    }

    public function pakta()
    {
        return view('Backend/Modul/Pelayanan-pemeriksaan/Lhu/Resume/Pakta');
    }
}
