<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Childcategory;
use App\Models\Category; 
use App\Models\Subcategory; 
use App\Models\Country;
use App\Models\City;
use App\Models\State;   
use App\Models\Image;
use App\Models\Imageforelectro;
use App\Models\Advertisement;
use App\Models\advertisementelectro;
use App\Models\CurrencySymbols;
use Str;
use Illuminate\Support\Facades\File;
use Mail;
use App\Mail\withaddproduct;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementrequest;

class AdvertisementController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }
    /**     
     * Display a listing of the resource.   
     * 
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $advertisement = Image::latest()->get()->unique('ad_id');
        // dd($advertisement);
        return view('ads.index')->with([

            'advertisements'=>$advertisement
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::All();
        $subcategory = Subcategory::All();
        $childcategory = Childcategory::All();
        $country = Country::All();
        $CurrencySymbols = CurrencySymbols::All();
        return view('ads.create')->with([

            'categorys'=>$category,
            'subcategorys'=>$subcategory,
            'childcategorys'=>$childcategory,
            'countrys'=>$country,
            'CurrencySymbols'=>$CurrencySymbols
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisementRequest $request)
    {  

            // save in electronik DB
            $data = $request->All(); 

            $data['slug'] = $request->name;
            $data['urgent'] = $request->urgent;
            $data['user_id'] = auth()->user()->id;
            $data['adtype'] = $request->ad_type;
            $m2 = Advertisement::create($data);

            
            if($request->hasfile('imageFile')) {
                foreach($request->file('imageFile') as $file) 
                {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path('images'), $name); 
                    $imgData[] = $name;  
                }
                  
            }

            foreach ($imgData as $key => $image) {
                $ad_images = Image::create([
                    'name'=>$image,
                    'ad_id'=>$m2->id
                ]);  
            }

            if($request->hasfile('logobusiness')) {

                $image = $request->file('logobusiness');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('logobusines'), $imageName);
                $m2->update([
                    'logobusiness'=>$imageName
                ]);
            }
            
 
            $adddata = [ 
                'userid'=>auth()->user()->id,
                'name' => auth()->user()->name,
                'email' => auth()->user()->email,
                'body' => $m2->name,
                'imgad'=>$ad_images->name,
                'adtime'=>$m2->created_at,
                'description'=>$m2->description
            ];


            Mail::to(auth()->user()->email)->send(new withaddproduct($adddata));

            return  redirect()->route('ads.index')->with('message' ,'You add was created');    
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function edit($id)
    {
        $category = Category::All();
        $subcategory = Subcategory::All();
        $childcategory = Childcategory::All();
        $country = Country::All();
        $image = Image::where('ad_id' ,$id)->get();
        $category_id = Advertisement::find($id);
        $CurrencySymbols = CurrencySymbols::All();

        $ad=Image::where('ad_id' , $id)->first();
            return view('ads.edit')->with([
                'ad'=>$ad,
                'categorys'=>$category,
                'countrys'=>$country,
                'image'=>$image,
                'category_id'=>$category_id,
                'CurrencySymbols'=>$CurrencySymbols
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisementrequest $request, $id)
    {
        $ad = Advertisement::find($id);

            if($request->hasfile('imageFile')) {
                foreach($request->file('imageFile') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->move(public_path('images'), $name); 
                    $imgData[] = $name;  
                }

    
                foreach ($imgData as $key => $image) {
                    Image::create([
                        'name'=>$image,
                        'ad_id'=>$ad->id
                    ]);
                }
                
            }  
            
            
            $ad->update([
                'user_id'=>auth()->user()->id,
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'childcategory_id'=>$request->childcategory_id,
                'name'=>$request->name,
                'slug'=>$request->name,
                'description'=>$request->description,
                'price'=>$request->price,
                'product_condition'=>$request->product_condition,
                'listing_location'=>$request->listing_location,
                'country_id'=>$request->country_id,
                'state_id'=>$request->state_id,
                'city_id'=>$request->city_id,
                'phone_number'=>$request->phone_number,
                'link'=>$request->link,
                'currency_id'=>$request->currency_id,
                'price_status'=>$request->price_status,
                'urgent'=> $request['urgent'] ?: 0,
                'adtype'=>$request->ad_type,
                'businesspagename'=>$request->businesspagename,
                'descriptionbusinesspage'=>$request->descriptionbusinesspage
                
            ]);

            if($request->hasfile('logobusiness')) {

                $image = $request->hasfile('logobusiness');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('logobusines'), $imageName);

                $ad->update([
                    'logobusiness'=>$imageName,
                ]);


            }

            return  redirect()->route('ads.index')->with('message' ,'You add was created');    
           

    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd("test");
        $advertisement = Advertisement::find($id);
        $Image = Image::where('ad_id' , $advertisement->id)->delete();
        $advertisement->delete();
        
        return redirect()->back()->with('message' , 'your product was deleted');

    }


    public function getCategory($id){

        $data = Subcategory::where('ategory_id',$id)->get();
        return response()->json(['data' => $data]);
    }

    public function getCategory2($id){
        $data = Childcategory::where('subategory_id',$id)->get();
        return response()->json(['data' => $data]);
    }

    public function pendingadds(){
        $ads = Advertisement::where('user_id' , auth()->user()->id)->where('published' , 0)->get();
        return view('ads.pending' , compact('ads'));
    }

    // Delete image with click edit ads
    public function deletewithclicktoimage(Request $request){
        if($request->category_id == 7){
            $advertisementelectro = advertisementelectro::where('name' , $request->ad_name)->first();

            $delete_image = Image::where('ad_id' , $request->ad_id)->first();

            $image_path = "images/".$delete_image->name;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }  
            
            $delete_image2 = Imageforelectro::where('ad_id' , $advertisementelectro->id)->first();
            $delete_image2->delete();
            $delete_image->delete();
              

        }else{

            $delete_image = Image::where('ad_id' , $request->ad_id)->first();
            $image_path = "images/".$delete_image->name;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $delete_image->delete();

        }
        
    }
}
