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
}
