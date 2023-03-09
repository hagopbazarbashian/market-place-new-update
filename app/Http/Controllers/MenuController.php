<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;  
use App\Models\Category; 
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Advertisement;

class MenuController extends Controller
{
   //   public function menu(){
      
   //      $childcategory = Childcategory::where('name' ,'Car')->first();
   //      $subcategory = Subcategory::where('id' , $childcategory->id)->first();

   //      $firstadvertisements = Advertisement::where('childcategory_id' ,$childcategory->id)->orderByDesc('id')
   //      ->paginate('4');
   //      $secondadvertisements = Advertisement::where('childcategory_id' ,$childcategory->id)->whereNotIn('id' ,$firstadvertisements->pluck('id')->toArray())
   //      ->paginate('4');
   //      return view('index',compact('firstadvertisements','secondadvertisements','childcategory','subcategory'));
   //   }
}
