<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    function show()
    {
      $data = users::all();
      return view('admin.view_users',['users'=>$data]);
    }
}
