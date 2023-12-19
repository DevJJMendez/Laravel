<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('age', '>', 10)->orderBy('age', 'asc')->limit(2)->get();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        $users = new User();
        $users->name = "Jhaminton Mendez";
        $users->email = "thejjmendez@gmail.com";
        $users->age = 22;
        $users->password = Hash::make('7383836');
        $users->address = "Malambo - Atlantico";
        $users->zip_code = 23522;
        $users->save();

        User::create([
            "name" => "Alicia Mendez",
            "email" => "aliciamendez@gmail.com",
            "age" => 63,
            "password" => Hash::make('38387337'),
            "address" => "Malambo - Atlantico",
            "zip_code" => 7373

        ]);
        User::create([
            "name" => "Magaly Torres",
            "email" => "MagalyTorres@gmail.com",
            "age" => 77,
            "password" => Hash::make('83737'),
            "address" => "Malambo - Atlantico",
            "zip_code" => 23234
        ]);
        // Redireccion
        return redirect()->route('user.index');
    }
}
