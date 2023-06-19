<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenageChat extends Model
{
    use HasFactory;
    protected $fillable=[
        'menage_id'
    ];

    /**
     * Method to get the messages of the chat
     */
    public function messages(){
        return $this->hasMany(ChatMessage::class,'chat_id');
    }
}
