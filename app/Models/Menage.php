<?php

namespace App\Models;

use App\Events\MenageCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menage extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'address',
        'color',
    ];

    public static function booted(){

    }

    /**
     * Get all users from the menage  
     * 
     * */ 
    public function users()
    {
        return $this->belongsToMany(User::class,'user_menage');
    }

    // Get all expenses from the menage
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * @return int Menage's total incomes in current month
     */
    public function totalIncome()
    {
        return $this->belongsToMany(User::class,'user_menage')->sum('income');
    }

    /**
     * Menage chat
     */
    public function chat() {
        return $this->hasMany(ChatMessage::class);
    }

    /**
     * @return int Menage's total expenses in current month
     */
    public function totalExpenses()
    {
        return $this->hasMany(Expense::class)->whereMonth('created_at','=',date('m'))->sum('amount');
    }
}
