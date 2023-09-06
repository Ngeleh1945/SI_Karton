<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Di sini Anda dapat menambahkan logika untuk halaman dashboard
        // Contoh: mengambil data dari database dan mengirimkannya ke tampilan

        return view('dashboard.index');
    }
}
