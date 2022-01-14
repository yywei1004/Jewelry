<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){

        $user = User::get();
        return view('backstage.user.user',compact('user'));
    }

    public function look($id){

        $user = User::find($id);
        return view('backstage.user.user-look',compact('user'));
    }

    public function update($id, Request $request){

        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/user');
    }
}
