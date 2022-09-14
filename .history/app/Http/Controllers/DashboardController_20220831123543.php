<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Location;


class DashboardController extends Controller
{
    public function __contruct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $ip = '203.115.91.17'; 

        $data = Location::get($ip);
        return view('dashboard', [
            'galleries' => Gallery::get(),
            'data' => $data
        ]);
    }
}
