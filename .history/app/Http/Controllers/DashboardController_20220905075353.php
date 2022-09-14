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
        
        if($output){
            preg_match('/\d+\.\d+\.\d+\.\d+/', $output[0], $matches);
            $ip = strval($matches[0]);
            $exploding = explode(".",$ip);
            $exploded = $exploding[0] .','. $exploding[1] .'.'. $exploding[2] .'.'. $exploding[3];
            $data = Location::get($exploded);

            return view('dashboard', [
                'galleries' => Gallery::get(),
                'data' => $data 
            ]);
        }


        return view('dashboard', [
            'galleries' => Gallery::get()
        ]);
    }
}
