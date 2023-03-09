<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\Country;
use App\Models\User;
use App\Models\Image;
use App\Models\CurrencySymbols;
use Cohensive\Embed\Facades\Embed;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'feature_image',
        'first_image', 
        'second_image',
        'category_id',   
        'subcategory_id',
        'childcategory_id',
        'name',
        'description',
        'price',
        'price_status',
        'product_condition',
        'listing_location',
        'country_id',
        'state_id',
        'slug',
        'country_id',
        'city_id',
        'phone_number',
        'published',
        'link',
        'currency_id',
        'urgent',
        'star_rating',
        'adtype',
        'logobusiness'
    ];

    public function category(){ 
        return $this->hasOne(category::class , 'id' , 'category_id');
    }

    public function childcategory(){ 
        return $this->hasOne(Childcategory::class , 'id' , 'childcategory_id');
    }

    public function subbb(){ 
        return $this->hasOne(Subcategory::class ,'id' ,'subcategory_id');
    }


    public function user(){
        return $this->hasOne(User::class , 'id' ,'user_id');
    }
 
    public function country(){
        return $this->hasOne(Country::class , 'id' ,'country_id');
    }

    public function CurrencySymbol(){
        return $this->hasOne(CurrencySymbols::class , 'id' ,'currency_id');
    }

    public function img(){
        return $this->hasOne(Image::class , 'ad_id');
    }

    // scope
        public function scopeSubCategoryCar($query ,$childcategory){
            return $query->where('childcategory_id' ,$childcategory)->orderByDesc('id')->paginate('4');
        }

        public function scopeshowcategory($query ,$subcategory){
            return $query->with('img')->where('category_id' , $subcategory)->get();
        }

        public function scopesecoundSubCategoryCar($query ,$childcategory){
            $firstadvertisements = $this->scopeSubCategoryCar($query , $childcategory);
            return $query->where('childcategory_id' ,$childcategory)->whereNotIn('id' ,$firstadvertisements->pluck('id')->toArray())
            ->paginate('4');   
        }

        public function scopeSubcategoryFirstElectronoc($query ,$subcategoryId){
            return $query->where('subcategory_id' ,$subcategoryId)->orderByDesc('id')->paginate('4');
        }

        public function scopeSubCategorySecondElctrinic($query ,$subcategoryId){
            $SubcategoryFirstElectronoc = $this->scopeSubcategoryFirstElectronoc($query , $subcategoryId);
            return $query->where('subcategory_id' ,$subcategoryId)->whereNotIn('id' ,$SubcategoryFirstElectronoc->pluck('id')->toArray())
            ->get();  

        }


    //   
 
    // save add
    public function userads(){
        return $this->belongsToMany(User::class);
    }
  

}
