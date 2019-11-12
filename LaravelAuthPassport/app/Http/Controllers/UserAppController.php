<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class UserAppController extends Controller
{
    public function users($email)
    {
      $users = DB::table('users')->where('email','=',$email)->first();
      return  response()->json($users);
    }
}
