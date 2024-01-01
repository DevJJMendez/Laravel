<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'juan',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('722663')
        ]);
        User::create([
            'name' => 'pedro',
            'email' => 'pedro@gmail.com',
            'password' => Hash::make('747383')
        ]);
        User::create([
            'name' => 'carlos',
            'email' => 'carlos@gmail.com',
            'password' => Hash::make('949483')
        ]);
        User::create([
            'name' => 'maria',
            'email' => 'maria@gmail.com',
            'password' => Hash::make('37372')
        ]);
    }
}
