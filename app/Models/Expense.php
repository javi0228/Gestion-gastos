<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'menage_id',
        'amount',
    ];

    // Get the user who did the expense
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Get the menage which the expense belongs
    public function menage()
    {
        return $this->belongsTo(Menage::class);
    }
}
