<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Advertisement;


class Subcategory extends Model
{
    use HasFactory; 
 
    protected $fillable = [
        'ategory_id',
        'name', 
        'slug',
    ];   
  

    public function category(){
        return $this->belongsTo(Category::class , 'ategory_id');
    }

    public function childcategories(){
        return $this->hasMany(Childcategory::class , 'subategory_id');
    }

    // scope
    public function scopeSubCategoryCar($query ,$childcategory){
        return $query->where('id' , $childcategory)->first();
    }

    public function scopeSubCategoryElectronic($query){
        return $query->where('name' , 'Phones')->first();
    }



    





    
}
 