<?php

namespace App;

use App\Models\Application;

class NullApplication extends Application
{
    protected $attributes = [
        'name' => 'Colony',
        'alias'=> 'CL',
        'email'=> 'colonyent@gmail.com',
        'line1'=> '09066100815',
        'line2'=> '09066100815',
        'image'=> 'applications/colony.png',
        'slogan'=> 'Default slogan',
        'motto'=> 'Default motto',
        'whatsapp'=> 'Default whatsapp',
        'facebook'=> 'Default facebook',
        'instagram'=> 'Default instagram',
        'address'=> 'Default address',
        'logistic'=> 1500,
        'cleaning'=> 1500,
        'regNo'=> 'RC45466',
        'description'=> 'Default descrption',
    ];
}