<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\User;
use App\Models\Image;

class AdminListingController extends Controller
{  
     public function index(){ 
        $ads = Advertisement::with('img')->simplePaginate(20);
        return view('backend.listing.index' , compact('ads'));
     }
     
     
      public function showalluser(){
      $Users = User::simplePaginate(20);
      return view('backend.listing.show-all-register-user' ,compact('Users'));
     }

     public function removealluser(Request $request , $id){ 

      $user = User::find($id);
      $Advertisement = Advertisement::where('user_id' , $id)->get();

      foreach($Advertisement as $Advert){
         $image = Image::where('ad_id' , $Advert->id)->delete();
         $Advert->delete(); 
      }

      $user->delete();
      return redirect()->back();
     }
}
        