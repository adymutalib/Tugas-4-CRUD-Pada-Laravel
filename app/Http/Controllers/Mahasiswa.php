<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Mahasiswa extends Controller
{
    public function index()
    {
        echo view('template.header');
        echo view('mahasiswa.index');
        echo view('template.footer');
    }
}
