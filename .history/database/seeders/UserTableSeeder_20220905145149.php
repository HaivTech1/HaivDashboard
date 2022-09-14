<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name'      => 'Ojo Emmanuel',
            'email'     => 'ojotifeema@gmail.com',
            'password'  => bcrypt('password123'),
            'type'      => User::ADMIN,
            'profile_photo_path'    => null
        ]);

        $user = User::factory()->create([
            'name'      => 'Shittu Oluwaseun',
            'email'     => 'shittuopeyemi24@gmail.com',
            'password'  => bcrypt('midshot17'),
            'type'      => User::ADMIN,
            'profile_photo_path'  =>  null,
        ]);
        
        User::factory()->create([
            'name'      => 'Iyanu',
            'email'     => 'iyanujosef4real@gmail.com',
            'password'  => bcrypt('password123'),
            'type'      => User::ADMIN,
            'profile_photo_path'    => null
        ]);

        User::factory()->create([
            'name'      => 'Blizboi',
            'email'     => 'tobilobaemmanuel14@gmail.com',
            'password'  => bcrypt('password123'),
            'type'      => User::AGENT,
            'profile_photo_path'    => null
        ]);

        User::factory()->create([
            'name'      => 'Vicent Olu',
            'email'     => 'vakinkuoye@gmail.com',
            'password'  => bcrypt('password123'),
            'type'      => User::AGENT,
            'profile_photo_path'    => null
        ]);

        User::factory()->create([
            'name'      => 'Babydoc',
            'email'     => 'olukitibijohn13@gmail.com',
            'password'  => bcrypt('password123'),
            'type'      => User::AGENT,
            'profile_photo_path'    => null
        ]);
        

        // $user->ownedTeams()->save(Team::forceCreate([
        //     'user_id' => $user->id,
        //     'name' => 'Housing Team',
        //     'personal_team' => true,
        // ]));
    }
}