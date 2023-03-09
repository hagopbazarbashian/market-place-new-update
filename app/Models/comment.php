<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Advertisement;
use App\Models\User;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  
        'ad_id',  
        'comment_body',
        'like'
    ];
    
    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function Advertisement(){
        return $this->belongsTo(Advertisement::class , 'ad_id' , 'id');
    }
}  
