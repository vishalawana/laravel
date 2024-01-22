<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  
        public function index()
        {
            $user = Auth::user();

            $user = User::with('userDetail', 'courses')->find($user->id);
    
            
            $courses = $user->courses; 
            $details = $user->userDetail;
            // dd($courses,$details);
    
            if ($user) {
                return view('Dashboard', compact('user','courses'));
            } else {
                return redirect()->route('Login');
            }
        }
    
        public function logout()
        {
            
          dd('here');
            Auth::logout();
    
            return redirect()->route('/login');
        }
        public function test(){
            dd("hello");
        }
}
    



















//     public function index(){
//         // return view('Dashboard');
//         // $user = Auth::user();
//         $user = User::with('courses')->get();
//         dd($user);
//         $data = $user->course;
       
//         if($user){
//             return view('Dashboard',compact('user'));
//         }
//         else{
//             return redirect()->route('Login');
//         }
//     }
//     public function logout(){
//         Auth::logout();
//         return redirect()->route('Login');
//     }
// }
