<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FisikaKimiaAir extends BaseController
{
    public function index($param1, $param2)
    {
         return view('Backend/Modul/Pelayanan-sampel/Lhu/Fisika-kimia-air/index');
    }
}
