<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advertisementelectro extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'user_id',
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
        'advertisements_id',
        
    ];

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

}
