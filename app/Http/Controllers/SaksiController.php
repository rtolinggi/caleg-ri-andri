<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaksiController extends Controller
{
    public function home()
    {
        return view('saksi.home');
    }

    public function create()
    {
        return view('saksi.create');
    }

    public function success()
    {
        return view('saksi.success');
    }
}
