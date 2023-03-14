<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;

class BusinessInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'advertisement_id',
        'businessphonenumber', 
        'businessaddress'
    ];

    public function business()
    {
        return $this->belongsTo(Advertisement::class , 'advertisement_id' , 'id');
    }
}
