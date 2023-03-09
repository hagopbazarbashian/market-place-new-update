<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Advertisement;

class Childcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subategory_id',
        'name',   
        'slug'
    ];

    
    public function subcategory(){
        return $this->belongsTo(Subcategory::class , 'subategory_id' ,'id');
    }

    public function ads(){
        return $this->hasMany(Advertisement::class);
    }


    // scope
    public function scopeChildCar($query)
    {
        return $query->where('name' ,'Car')->first();
    }


}
