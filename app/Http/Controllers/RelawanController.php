<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelawanController extends Controller
{
    public function home()
    {
        return view('relawan.home');
    }

    public function create()
    {
        return view('relawan.create');
    }

    public function success()
    {
        return view('relawan.success');
    }
}
