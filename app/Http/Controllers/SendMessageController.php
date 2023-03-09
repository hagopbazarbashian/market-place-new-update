<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Subcategory;  
use App\Models\Childcategory; 
use App\Models\Message;
use App\Models\User;
use Mail;
use App\Mail\DemoMail;
use Response; 

class SendMessageController extends Controller
{
    public function sendmessagetosaller(Request $request){
        // dd($receiver_id);
        $message = Message::create([
            'user_id'=>auth()->user()->id,
            'receiver_id'=>$request->receiver_id,
            'ad_id'=>$request->ad_id,
            'body'=>$request->message,
            'status'=>'1'
        ]);
        
        return "message sent successfully";
        
        // return redirect()->back()->with('message' ,'message sent successfully');
    }

    public function index(){
        $conversations = Message::where('user_id' ,auth()->user()->id)
        ->orWhere('receiver_id' , auth()->user()->id)
        ->get();

        $users = $conversations->map(function($conversation){
            if($conversation->user_id==auth()->user()->id){
                return $conversation->receiver;
            }else{
                return $conversation->sender;
            }
        })->unique();
        return view('message.index',compact('users'));
    }

    public function showmessage(Request $request , $id){  
         $user_name =  User::find($id);
         $messages = Message::with('user' , 'ads')->where('receiver_id' , auth()->user()->id)
         ->where('user_id' , $id)
         ->orWhere('user_id',auth()->user()->id)
         ->where('receiver_id' ,$id)
         ->get();
        //  dd($messages);
         return view('message.show-chat',compact('messages','user_name'));
    }


    public function startconversation(Request $request){
        $message = Message::create([
            'user_id'=>auth()->user()->id,
            'receiver_id'=>$request->receiver_id,
            'body' =>$request->body
        ]);
        return  $message;
    }

}
