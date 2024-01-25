<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.konten.dashboard');
    }

    function service()
    {
        return view('admin.konten.paket-hotel');
    }

    function treatment()
    {
        return view('admin.konten.paket-treatment');
    }

    function pesanan()
    {
        return view('admin.konten.pesanan');
    }

    function invoice()
    {
        return view('admin.konten.invoice');
    }

    function testimoni()
    {
        return view('admin.konten.testimoni');
    }
}
