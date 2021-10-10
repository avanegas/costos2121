<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Location;
use App\Models\Profile;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user = Role::where('name', 'User')->first();

        $user = User::create([
            'name'       => 'Angel Vanegas',
            'email'      => 'avanepe@hotmail.com',
            'password'   => '$2y$10$dbymzN9zuLXmIY5f/c5NzuWIHDv//EcVU/AeqaexOHuY6uJeduNx2' //alvape14
        ]);
        $user->roles()->attach($role_admin);
        $profile = Profile::factory(1)->create([
            'user_id' => $user->id
        ]);
        Location::factory(1)->create([
            'profile_id' => $user->id
        ]);
        $user->groups()->attach([
            rand(1,8)
        ]);
        $user->image()->save(Image::factory()->make([
            'url' => 'persona0.jpeg'
        ]));

        $users = User::factory(49)->create();

        foreach($users as $user){
            $user->roles()->attach($role_user);
            $profile = Profile::factory(1)->create([
                'user_id' => $user->id
            ]);
            Location::factory(1)->create([
                'profile_id' => $user->id
            ]);
            $user->groups()->attach([
                rand(1,8)
            ]);
            $user->image()->save(Image::factory()->make([
                'url' => 'profile.png'
            ]));
        }
    }
}
