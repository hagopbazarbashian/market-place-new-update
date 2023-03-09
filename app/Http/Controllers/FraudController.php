<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Fraud;
use App\Models\Advertisement;

class FraudController extends Controller
{
     public function store(Request $request){
        Fraud::create([
            'reason'=>$request->reason,
            'email'=>$request->email,
            'message'=>$request->message,
            'ad_id'=>$request->ad_id
        ]);
        return back()->with('report' , 'your report has been recorded. Thank you for the feedback');
     }

    //  for admin section
    public function index(){
        $ads = Fraud::simplePaginate(20);
        // dd($ads);
        return view('backend.fraud.index' , compact('ads'));
    }

    // remove report
    public function remove($id){
        $raud = Fraud::find($id);
        $raud->delete();
        return back()->with('message' ,'Report Remove successfully');

    }
    
}  
