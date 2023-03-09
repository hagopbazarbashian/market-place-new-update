<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;   
use App\Models\Subcategory;
use App\Models\Childcategory; 
use App\Models\Advertisement;
use App\Models\advertisement_user;
use App\Models\Image;
use App\Models\comment;
use App\Models\User;
use App\Models\Favoritelist;
use App\Models\Imageforelectro;
use Illuminate\Support\Facades\DB;
use App\Models\advertisementelectro;

class FrontEndController extends Controller
{
      public function showcategory($subcategory){

         $subs = Subcategory::where('ategory_id' ,$subcategory)->get();
         $categorys = Advertisement::showcategory($subcategory);

         return view('product.category',compact('categorys','subs'));
        
      }   
  
     public function filtersubcategory(Request $request , $subcategory){ 
        $Subcategory = Subcategory::where('slug' , $subcategory)->first();
        $sub_id = $Subcategory->id;  
        $query = Advertisement::with('img')->where('subcategory_id' , $sub_id)->get();
        $filterbysubcategory = Advertisement::where('subcategory_id' , $sub_id)->get()->unique('childcategory_id');
        return  view('product.subcategory')->with([
            'advertisements'=>$query,
            'filterbysubcategorys'=>$filterbysubcategory
        ]);
     }

      public function filterchildcategory($subcategory,$childcategory){
        
        $childcategory = Childcategory::where('slug' , $childcategory)->first();
        $child_id = $childcategory->id;
        $filterByChildCategorie = Advertisement::where('childcategory_id' , $child_id)->get();
        $filter = Advertisement::with('img')->where('childcategory_id' , $child_id)->first();
        return  view('product.childcategory')->with([
            'advertisements'=>$filterByChildCategorie,
            'filters'=>$filter
        ]);   

      }


      public function filterprice(Request $request){

        $query = Advertisement::query();
        $query->where('price', '=', $request->minPrice);
        $filters = $query->get();
        return view('product.filterprice',compact('filters'));
        
      } 
 
      public function singlepage($id,$slug){
        $advertisement_user = advertisement_user::where('advertisement_id' , $id)->first();

        $comments = comment::where('ad_id' , $id)->get();

        $advertisement = Advertisement::where('id' , $id)->where('slug' , $slug)->first();
        $images = Image::where('ad_id' , $advertisement->id)->get();

        $show_button = DB::table('ch_favorites')->where('favorite_id' , $advertisement->user->id )->first();
        // for Similar statements
        $childs = Advertisement::with('img')->where('childcategory_id' , $advertisement->childcategory_id)->get();

        return view('product.show',compact('advertisement' ,'advertisement_user', 'images' ,'comments' , 'show_button' ,'childs'));
      }

      // single page for electronic only
      public function singlepageforonlyelectronic($id){  

        $advertisement_user = advertisement_user::where('advertisement_id' , $id)->first();

        $advertisementelectro = advertisementelectro::find($id);
        $images = Imageforelectro::where('ad_id' , $advertisementelectro->id)->get();

        return view('product.singlepageonlyelectronic')->with([
          'advertisement_user'=>$advertisement_user,
          'advertisement'=>$advertisementelectro,
          'images'=>$images
        ]);
 

      }

      public function viewuser(Request $request , $userId){
        $advertisements = Advertisement::with('img')->where('user_id' ,$userId)->simplePaginate(20);
        $user = User::find($userId);
        return view('seller.ads' ,compact('advertisements' ,'user'));
      }

      public function comment(Request $request){
        comment::create([
          'user_id'=>auth()->user()->id,
          'ad_id'=>$request->advertisement_id,
          'comment_body'=>$request->comment
        ]);
        $advertisement = Advertisement::find($request->advertisement_id);
        $comment = comment::where('ad_id' , $request->advertisement_id)->first();

        $html = '';
        $html .= '
        <div class="bg-white p-2">';
        $html .= '<div class="d-flex flex-row user-info">';
        if (auth()->user()->avatar){
          $html .= '<img class="rounded-circle" src="/img/man.jpg" width="40">';
        }else
        $html .= '<img class="rounded-circle" src="/img/man.jpg" width="40">';
        $html .= '<div class="d-flex flex-column justify-content-start ml-2" style="margin: 0 0 0 12px;"><span class="d-block font-weight-bold name">'.auth()->user()->name.'</span><span class="date text-black-50">'.$comment->created_at.'</span></div>
              </div>
              <div class="mt-2">
                  <p class="comment-text">'.$comment->comment_body.'</p>
              </div>
        </div><hr>';
        return $html ;
 
      }


      public function showallcomments(Request $request){
        $advertisement = Advertisement::find($request->advertisement_id);
        $comments = comment::where('ad_id' , $request->advertisement_id)->first();

        $comments->update([
          'like'=>1
        ]);

        $html = '';
        $html.='';
        
        return $html ;

      }
      
      public function updaterate(Request $request){
        $advertisement = Advertisement::find($request->adid); 
        $advertisement->update([
          'star_rating'=>$request->insert
        ]);
        $html = '';
        $html.='<div class="alert alert-success"> <i style="color:#ffc700;font-size:10px" class="fa-solid fa-heart"></i> Successfully send your rate</div>';
        
        return $html ;

      }
      
      // favorit-list
      public function favoritlist(Request $request){
        $Advertisement = Advertisement::where('id' , $request->ad)->first();

        Favoritelist::create([
          'authuser'=>auth()->user()->id,
          'ad_id'=>$request->ad,
          'user_id'=>$Advertisement->user_id
        ]);
        $html = '';
        $html.= '<div class="alert alert-success" role="alert">This is a success alert—check it out!</div>';

        return $html;


      }
      
      public function showfavoritlist(Request $rqeuest , $authuser){
        
          $Favoritelists = Favoritelist::with('favorit')->where('authuser' , $authuser)->get()->unique('ad_id');
          return view('showfavoritlist.show-favorit-list' , compact('Favoritelists'));
      }
      
      public function removefavoritlist(Request $request , $id){
        $Favoritelists = Favoritelist::where('ad_id' , $id)->delete();
        return redirect()->back()->with('delete' , 'ad successfully deleted in your favorit list !');

      }

      

}
   