<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProgramLayanan extends BaseController
{
    public function index()
    {
        return view('Frontend/Layout/index');
    }
}
