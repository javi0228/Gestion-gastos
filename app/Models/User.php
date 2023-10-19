<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'income',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Get all menages that user has done
    public function menages()
    {
        return $this->belongsToMany(Menage::class, 'user_menage');
    }

    // Get all expenses that user has done
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    // Get all expenses sum that user has done
    public function expensesSumByMenage($menage_id)
    {
        return $this->hasMany(Expense::class)->where('menage_id', $menage_id)->sum('amount');
    }


    /**
     * @param int $menage_id
     * @return int All expenses from the user in current month
     */
    public function currentMonthExpensesByMenage($menage_id)
    {
        return $this->hasMany(Expense::class)->where('menage_id',$menage_id)->whereMonth('created_at', '=', date('m'))->sum('amount');
    }

    /**
     * Function to create an expense
     * 
     * @param array $expenseData
     * Expense data to create it
     */
    public function addExpense($expenseData)
    {
        return $this->expenses()->create($expenseData);
    }
}