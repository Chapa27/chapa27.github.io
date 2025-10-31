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
}
