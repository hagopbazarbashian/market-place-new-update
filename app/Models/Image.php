<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;

class Image extends Model 
{
    use HasFactory;
   
    protected $fillable = [
        'name',
        'ad_id'
    ];


    public function image()
    {
        return $this->belongsTo(Advertisement::class , 'ad_id' , 'id');
    }
}
  