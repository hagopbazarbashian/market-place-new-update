<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

class ShowCommentUserController extends Controller
{ 
     public function index(){
        $comments = comment::simplePaginate(20);
        return view('backend.comment.show-all-coment' ,compact('comments')); 
    }


    public function remove(Request $request , $id){
        $comments = comment::find($id);
        $comments->delete();
        return redirect()->back()->with('message' , 'User Comment was deleted');
    }
    
      
}  
