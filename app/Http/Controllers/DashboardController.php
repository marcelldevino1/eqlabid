<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function siswa()
    {
        return view('siswa.dashboard'); // Pastikan view ini ada
    }

    public function guru()
    {
        return view('guru.dashboard'); // Pastikan view ini ada
    }
    public function ortu()
    {
        return view('ortu.dashboard'); // Pastikan view ini ada
    }
}

