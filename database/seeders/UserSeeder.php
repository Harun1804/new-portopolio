<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'admin',
                'email'     => 'admin@mail.com',
                'password'  => 'admin',
                'role'      => 'admin'
            ],
            [
                'name'      => 'Harun Ar - Rasyid',
                'email'     => 'harun.arrasyid1804@gmail.com',
                'password'  => 'harun',
                'role'      => 'user'
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'name'      => $user['name'],
                'slug'      => Str::slug($user['name']),
                'email'     => $user['email'],
                'password'  => Hash::make($user['password']),
                'role'      => $user['role'],
            ]);
        }
    }
}
