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

        
        $ip = strval($matches[0]);

        

        dd(explode($ip));
        $data = Location::get('192,168.43.249');
        dd($data);

        return view('dashboard', [
            'galleries' => Gallery::get(),
            'data' => $data
        ]);
    }
}
