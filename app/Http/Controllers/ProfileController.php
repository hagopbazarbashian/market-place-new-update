<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserProfileRequest;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller  
{ 
     public function index(){
        return view('profile.index');
     }

     public function updateprofile(UserProfileRequest  $request){

        $user = User::find(auth()->user()->id);
        $image = $user->avatar;

        if($request->hasFile('image')){
            $image = $request->file('image')->store('public/avatar');
         }
        
        $user->update([
         'name'=>$request->name,
         'address'=>$request->address,
         'avatar'=>$image
        ]);

         return redirect()->back()->with('message','profile updated successfully');

     }
}
