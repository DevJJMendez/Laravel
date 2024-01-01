<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Maria
        Phone::create([
            'prefix' => '+57',
            'phone_number' => '3103559459',
            'user_id' => 4
        ]);
        Phone::create([
            'prefix' => '+57',
            'phone_number' => '3245346217',
            'user_id' => 4
        ]);
        Phone::create([
            'prefix' => '+57',
            'phone_number' => '3006566178',
            'user_id' => 4
        ]);
        // Juan
        Phone::create([
            'prefix' => '+11',
            'phone_number' => '7638239827',
            'user_id' => 1
        ]);
        Phone::create([
            'prefix' => '+11',
            'phone_number' => '8383772',
            'user_id' => 1
        ]);
        // Carlos
        Phone::create([
            'prefix' => '+57',
            'phone_number' => '3203273764',
            'user_id' => 3
        ]);
        Phone::create([
            'prefix' => '+93',
            'phone_number' => '38272727',
            'user_id' => 3
        ]);
        Phone::create([
            'prefix' => '+63',
            'phone_number' => '8337372',
            'user_id' => 3
        ]);
        Phone::create([
            'prefix' => '+57',
            'phone_number' => '37377322',
            'user_id' => 3
        ]);
        // Pedro
        Phone::create([
            'prefix' => '+82',
            'phone_number' => '9873645364',
            'user_id' => 2
        ]);
        Phone::create([
            'prefix' => '+99',
            'phone_number' => '93938828',
            'user_id' => 2
        ]);
        Phone::create([
            'prefix' => '+00',
            'phone_number' => '222200000',
            'user_id' => 2
        ]);
    }
}
