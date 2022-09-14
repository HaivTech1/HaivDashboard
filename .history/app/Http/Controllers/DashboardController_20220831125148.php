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

        $exec = 'ipconfig | findstr /R /C:"IPv4.*"';
exec($exec, $output);
preg_match('/\d+\.\d+\.\d+\.\d+/', $output[0], $matches);
print_r($matches[0]);
        $ip = '192,168.43.249'; 

        $data = Location::get($ip);

        dd($data);
        return view('dashboard', [
            'galleries' => Gallery::get(),
            'data' => $data
        ]);
    }
}
