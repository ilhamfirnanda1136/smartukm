<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        return view('admin.home.home_view');
    }

    public function indexAnggotaDashboard()
    {
        return view('anggota.home.home_view');
    }
}
