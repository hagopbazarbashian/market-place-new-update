<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\advertisement_user;
use App\Models\User;

class SaveAddController extends Controller
{
     public function saveadd(Request $request){
        $advertisement_user = advertisement_user::create([
            'user_id'=>$request->user_id,
            'advertisement_id'=>$request->advertisement_id
        ]);
        $advertisement_user->update([
            'status'=>1
        ]);
        $html = '';
        $html .= '<div class="alert alert-success"> <i style="color:red;font-size:10px" class="fa-solid fa-heart"></i> Successfully send your rate for seller</div>';
        return $html ;
     }

     public function showadd(){
        $advertisement_user = advertisement_user::where('user_id' , auth()->user()->id)->pluck('advertisement_id');
        $ads = Advertisement::whereIn('id' , $advertisement_user)->get();
         return view('seller.saved-ads', compact('ads'));
     }

     public function removeadd(Request $request){
        $advertisement_user = advertisement_user::where('user_id' , auth()->user()->id)
        ->where('advertisement_id' , $request->adId)->delete();
        return redirect()->back()->with('message' , 'Ad remove from save list');
     }
}     
