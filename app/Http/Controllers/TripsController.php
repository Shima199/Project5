<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bus;

class TripsController extends Controller
{
    public function show()
    {
        $data = bus::all();
      return view('user.view_trips',['buses'=>$data]);
        
    }
}
