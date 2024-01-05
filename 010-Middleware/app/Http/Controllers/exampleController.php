<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class exampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('example');
    }
    public function index()
    {
        return response()->json('route without protection', 200);
    }
    public function noAccess()
    {
        return response()->json('route with protection', 200);
    }
}
