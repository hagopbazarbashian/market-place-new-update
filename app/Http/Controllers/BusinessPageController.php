<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Subcategory;   
use App\Models\Image;
use App\Models\Imageforelectro;  
use App\Models\Childcategory; 
use App\Models\Advertisement; 
use App\Models\advertisement_user; 
use App\Models\SendToBusinessPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Models\CurrencySymbols;
use Mail; 
use App\Mail\Messanger; 

class BusinessPageController extends Controller
{
    public function index(){
    $businesspages = Advertisement::where('adtype' , '1')->simplepaginate(30);
    return view('business-page' , compact('businesspages'));

    }

    public function manage(){
        $managebusinesspages = Advertisement::with('img')->where('user_id' , auth()->user()->id)->get();
        foreach($managebusinesspages as $managebusinesspage){
            $find_business_page = $managebusinesspage::where('adtype' , '1')->first();
        }
       
        return view('manage-business-pages.manage-business-pages' , compact('managebusinesspages' , 'find_business_page'));
    }

    public function sendtobusinesspage(Request $request){
        $checkeds = $request->data;
        $status = Advertisement::find($checkeds);

        $delete = SendToBusinessPage::where('advertisement_id' ,$checkeds)->first();
        if($delete){

            $delete->delete();
            $status->update([
                'status'=>'0'
            ]);

        }else{
            $SendToBusinessPage = SendToBusinessPage::create([
                'advertisement_id'=>$checkeds,
            ]);
            $status->update([
                'status'=>'1'
            ]);
        }

        $html = '';

        if($delete){
            $html.= '<div class="alert alert-danger" role="alert">Successfully deleted with your Business Page.</div>';
            
        }else{
            $html.= '<div class="alert alert-success" role="alert">Successfully added your Business Page.</div>';
        }

        return $html;
       
    }

    public function singlebusinesspage(Request $request){
         $SendToBusinessPages = SendToBusinessPage::with('ad')->get();
         
         return  view('manage-business-pages.business-single-page' , compact('SendToBusinessPages'));

    }
}
