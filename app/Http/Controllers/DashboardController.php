<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Di sini Anda dapat menambahkan logika untuk halaman dashboard
        // Contoh: mengambil data dari database dan mengirimkannya ke tampilan

        return view('dashboard');
    }
}
