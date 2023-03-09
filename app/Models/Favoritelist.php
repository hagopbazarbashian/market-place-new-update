<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;

class Favoritelist extends Model
{
    use HasFactory;

    protected $fillable = [
        'authuser',
        'ad_id',
        'user_id',
        'status'
    ];
    
    public function favorit(){
        return $this->belongsTo(Advertisement::class ,'ad_id','id');
    }
}
