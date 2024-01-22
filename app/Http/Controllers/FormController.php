<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserUpdateRequest;

class FormController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            return redirect('/dashboard');
        }

        
        return view('Signup');
    }


    public function store(UserStoreRequest $request){
        $validatedData = $request->validated();
        $fileName = $request->file('profile')->getClientOriginalName();
        
        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($request['password'])
        ]);
    
        $user->userDetail()->create([
            'user_id' => $user->id,
            'contact' => $validatedData['contact'],
            'dob' => $validatedData['dob'],
            'gender' => $validatedData['gender'],
            'city' => $validatedData['city'],
            'image' => $fileName
        ]);
        
        $courses = $request->input('courses', []);
    $user->courses()->attach($courses);
        
        $request->file('profile')->storeAs('images', $fileName, 'images');

        return redirect()->route('login');
    }
    // editing the info of user
        public function edit($id){
            $allCourses = Course::all();
            $user = Auth::user();
            $courses = $user->courses;
            return view('Update',compact('user','allCourses'));
        }

        //updating the info in databse
        public function update(UserUpdateRequest $request){
            dd('here');
            $user = Auth::user();
            dd($user);
            $request->all();
            return view('Update');

        }

    
}

