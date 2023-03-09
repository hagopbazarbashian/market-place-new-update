<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Childcategory;
use App\Models\Subcategory;


class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
    ];
 

    public function subcategories(){
        return $this->hasMany(Subcategory::class ,'ategory_id');
    }

    public function ads(){
        return $this->hasMany(Advertisement::class);
    }

    // scope
    public function scopeCategoryElectronic($query){
        return $query->where('name' , 'Electronik')->first();
    }

    


}
