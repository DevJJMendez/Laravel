<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'user'
        ]);
        Role::create([
            'name' => 'staff'
        ]);
        Role::create([
            'name' => 'guest'
        ]);

        // Juan
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
            'added_by' => 'SYS-ADMIN',
        ]);
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 2,
            'added_by' => 'SYS-ADMIN',
        ]);
        // Pedro
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 4,
            'added_by' => 'SYS-ADMIN',
        ]);
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 3,
            'added_by' => 'SYS-ADMIN',
        ]);
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 3,
            'added_by' => 'SYS-ADMIN',
        ]);
        // Carlos
        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 1,
            'added_by' => 'SYS-ADMIN',
        ]);
        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 2,
            'added_by' => 'SYS-ADMIN',
        ]);
        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 3,
            'added_by' => 'SYS-ADMIN',
        ]);
        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 4,
            'added_by' => 'SYS-ADMIN',
        ]);
        // Maria
        DB::table('role_user')->insert([
            'user_id' => 4,
            'role_id' => 1,
            'added_by' => 'SYS-ADMIN',
        ]);
        DB::table('role_user')->insert([
            'user_id' => 4,
            'role_id' => 3,
            'added_by' => 'SYS-ADMIN',
        ]);
    }
}
