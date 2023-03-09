<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Messanger; 
use App\Models\User;
use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
Use Carbon\Carbon;

class SendEmailWithClickController extends Controller
{
     public function index(Request $request){

      // dd($request->send_email_to_user);
      $chatroom = DB::table('ch_messages')->where('from_id' , $request->send_email_to_user)->first();
      $find_user = User::where('id' ,$chatroom->from_id)->first();
      // $Advertisement = Advertisement::where('user_id' , $find_user->id)->first();
      // dd($Advertisement);

         $messanger = [
            'name'=>auth()->user()->name,
            // 'phonenumber' => $Advertisement->phone_number,
            // 'time' =>$chatroom->created_at,
            // 'body' =>$chatroom->body
            // 'imgad'=>$ad_images2->name,
            // 'adtime'=>$m1->created_at,
            // 'description'=>$m1->description
         ];


        Mail::to($find_user->email)->send(new Messanger($messanger));
     } 
     
   //   auto chat system
     public function update(Request  $request){
        $id = random_int(100000, 999999);
        $now = now();
        $created_at = $now->addDays(30);

         $date = Carbon::parse($created_at);
         DB::table('ch_favorites')->insert(
            ['id'=>$id , 'user_id' => auth()->user()->id, 'favorite_id' => $request->add_user]
         );
        //  $id = random_int(100000, 999999);
        //  DB::table('ch_messages')->insert(
        //     ['id'=>$id , 'type'=> 'user' , 'from_id' => $request->add_user, 'to_id' =>auth()->user()->id ,'body'=>'how can i help you' ,'seen'=>0 ,'created_at'=>$date , 'ad_image'=>$request->show_ad_image]
        //  );

      }

}
