<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProgramLayanan extends BaseController
{

    public function __construct()
    {
        
    }

    public function index()
    {
        $data = [
            'title' => 'Program Layanan'
        ];
        return view('Frontend/Layout/_home', $data);
    }
}
