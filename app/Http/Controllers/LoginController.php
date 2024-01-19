<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('Login');
    }
    public function authenticate(LoginRequest $request){
        // dd($request->all());
        // $user = null;
        // auth()->attempt($request->only(['email','password']));
        // // dd($data);
        // if($data){
            $data = $request->only(['email','password']);
            // $data = $request->all();
            if(Auth::attempt(['email'=>$request->input('email')]+$data)){
               return  redirect()->route('Dashboard');
            }

         
    }
}
