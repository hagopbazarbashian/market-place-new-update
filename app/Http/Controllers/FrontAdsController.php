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

class FrontAdsController extends Controller
{   
     public function index(){  
        $categorys = Category::get();  
        $categoryelectronic = Category::CategoryElectronic();
        $aa = Advertisement::with('img')->latest()->simplepaginate(30);
        $car = Advertisement::with('img')->where('category_id' , '9')->get();
        $electronic= Advertisement::with('img')->where('category_id' , '7')->get();
        $businesspages = Advertisement::where('adtype' , '1')->get();
        $country = Country::All();
  
            return view('index')->with([ 
                'categoryelectronic'=>$categoryelectronic,
                'aa'=>$aa,
                'cars'=>$car,
                'electronics'=>$electronic,
                'countrys'=>$country,
                'categories'=>$categorys,
                'businesspage'=>$businesspages 
            ]);
    
     }


      public function findcountry(Request $request){
        $find_first_name = Advertisement::with('img')->where('country_id' , $request->country_id)->first();
        $find = Advertisement::with('img')->where('country_id' , $request->country_id)->simplepaginate(30);
        return view('findwithcountry')->with([
            'find'=>$find,
            'find_first_name'=>$find_first_name
        ]);
      }


       public function findcountryinbaner(Request $request){
          $countrys = Country::All();
          return view('findwithcountryforbaner' , compact('countrys'));
       }
}
  