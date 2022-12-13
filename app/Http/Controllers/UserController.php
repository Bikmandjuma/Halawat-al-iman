<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function RegisterUser(Request $request){

    	$request->validate([
    		'name'=>'required',
    		'email'=>'required|email|unique:users,email',
    		'password'=>'required|min:8',
    	]);

    	$user=new User;
    	$user->name=$request->name;
    	$user->email=$request->email;
    	$user->password=bcrypt($request->password);
    	$user->save();

    	$credential=$request->only('email','password');

    	if (Auth::attempt($credential)) {
    		return view('Home');
    	}

    }

    public function UserLogin(Request $request){

    	$request->validate([
    		'email'=>'required|email',
    		'password'=>'required',
    	]);

    	$credential=$request->only('email','password');

    	if (Auth::attempt($credential)) {
    		return view('Home');
    	}

    	return back()->with('loginfialed','Wrong credential !');
    }

    public function Logout(){
    	return redirect(url('login'));
    }

}
