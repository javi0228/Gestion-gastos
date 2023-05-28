<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to',
        'menage_id',
        'accepted'
    ];

    public function fromUser()
    {
        return $this->belongsTo(User::class,'from','id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class,'to','id');
    }

    public function menage()
    {
        return $this->belongsTo(Menage::class,'menage_id','id');
    }
}
