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
    public function index(){
        return view("Signup");
        
    }


    public function store(UserStoreRequest $request){
        // dd('here in controll', $request->file('profile'));
        // dd($request);
        
        $validatedData = $request->validated();
        $fileName = $request->file('profile')->getClientOriginalName();


        // $image = $request->file('profile');
        // $path = $image->store('uploads', 'public');

        
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
        
        $courses = Course::whereIn('course', $request->input('courses', []))->pluck('id')->toArray();
        $user->Courses()->attach($courses);
        
        $request->file('profile')->storeAs('images', $fileName, 'images');



        return redirect()->route('login');
    }


        public function edit($id){
            $allCourses = Course::all();

            $user = Auth::user();
            // $userDetail = $user->userDetail;
            $courses = $user->courses;
            // dd($allCourses);
            return view('Update',compact('user','allCourses'));
        }
        public function update(UserUpdateRequest $request){
            dd('here');
            $user = Auth::user();
            dd($user);
            $request->all();
            return view('Update');

        }

    
}

