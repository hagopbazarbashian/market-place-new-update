<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\advertisementelectro;

class Imageforelectro extends Model
{
    use HasFactory;
 
    protected $fillable = [ 
        'name',
        'ad_id'    
    ];

    
    public function imageforelectronoc()
    {
        return $this->belongsTo(advertisementelectro::class , 'ad_id' , 'id');
    }

}  
 