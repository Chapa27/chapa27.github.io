<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function __construct()
    {
        $this->title = 'Home';
    }

    public function index(): string
    {
        $data['title'] = $this->title;
        return view('Backend/Layout/_home', $data);
    }

    public function dashboard(): string
    {
        $data['title'] = $this->title;
        return view('Backend/Layout/_dashboard', $data);
    }
}
