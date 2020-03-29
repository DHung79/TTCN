<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    function userid($id)
    {
        $userid = user::find($id);
        return view('inforuser.id',['id'=>$id]);
    }
}
