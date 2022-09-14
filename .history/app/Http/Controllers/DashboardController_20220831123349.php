<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;


class DashboardController extends Controller
{
    public function __contruct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('dashboard', [
            'galleries' => Gallery::get()
        ]);
    }
}
