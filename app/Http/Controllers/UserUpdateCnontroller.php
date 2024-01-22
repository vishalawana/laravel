<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserUpdateCnontroller extends Controller
{
    // editing the info of user
    public function edit($id){
        $allCourses = Course::all();
        $user = Auth::user();
        $courses = $user->courses;
        return view('Update',compact('user','allCourses'));
    }

    public function update(UserUpdateRequest $request)
    {
        // Validate the request
        $validatedData = $request->validated();

        // Get the authenticated user
        $user = Auth::user();

        // Update the user information
        $user->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            // Add other fields you want to update
        ]);

        // Update user detail
        $user->userDetail()->update([
            'contact' => $validatedData['contact'],
            'dob' => $validatedData['dob'],
            'gender' => $validatedData['gender'],
            'city' => $validatedData['city'],
            // Add other fields you want to update in user detail
        ]);

        // Update attached courses
        $courses = $request->input('courses', []);
        $user->courses()->sync($courses);

        // Handle profile image update if needed
        if ($request->hasFile('profile')) {
            $fileName = $request->file('profile')->getClientOriginalName();
            $request->file('profile')->storeAs('images', $fileName, 'images');
            $user->userDetail()->update(['image' => $fileName]);
        }

        return redirect()->route('dashboard'); // or any other route you want to redirect to after updating
    }
}

