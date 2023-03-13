<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendToBusinessPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'advertisement_id',
        'status'
    ];


    public function ad()
    {
        return $this->belongsTo(Advertisement::class , 'advertisement_id' , 'id');
    }
}
