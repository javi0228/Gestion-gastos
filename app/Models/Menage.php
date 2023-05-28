<?php

namespace App\Models;

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

    // Get all users from the menage
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
     * @return int Menage's total incomes
     */
    public function totalIncome()
    {
        return $this->belongsToMany(User::class,'user_menage')->sum('income');
    }

    /**
     * @return int Menage's total expenses
     */
    public function totalExpenses()
    {
        return $this->hasMany(Expense::class)->sum('amount');
    }
}
