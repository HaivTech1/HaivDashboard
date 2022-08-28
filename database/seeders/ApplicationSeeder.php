<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $application = [
            [
            'id'        => 1,
            'name'      =>  'HaivTech',
            'alias'     =>  'HT',
            'email'     =>  'Haivtech1@gmail.com',
            'line1'        =>  '09066100815',
            'line2'        =>  '09066100815',
            'whatsapp'        =>  '09066100815',
            'instagram'        =>  'HaivTech',
            'facebook'        =>  'HaivTech',
            'linkedin'        =>  'HaivTech',
            'twitter'        =>  'HaivTech',
            'image'      =>  'applications/haivtech.png',
            'address'       =>  'Unique Solutions for You!',
            'motto'     =>  'Unique Solutions for You!',
            'slogan'        =>  'Unique Solutions for You!',
            'regNo'        =>  'RC43243',
            'description'       =>  'HaivTech is an end-to-end provider of business development services. Whether you’re looking for a turnkey marketing strategy, financial strategy, or services specific to a short-term campaign and an all round Software development. Our experience and approach are sure to prove to be a valuable asset',
            
            ],
        ];
        
        Application::insert($application);
    }
}