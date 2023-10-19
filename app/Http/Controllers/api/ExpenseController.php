<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Menage;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ExpenseController extends Controller
{
    public function expensesByMenage(Menage $menage)
    {
        $expenses = $menage->expenses->map(function (Expense $expense) {
            if ($expense->user_id == Auth::user()->id) {
                return [...$expense->toArray(), 'canEdit' => true, 'date' => $expense->created_at->toDayDateTimeString()];
            }
            return [...$expense->toArray(), 'canEdit' => false, 'date' => $expense->created_at->toDayDateTimeString()];
        });

        return json_encode($expenses);
    }

    public function getAllExpenses(Request $request)
    {
        // dd($request);
        $result = Expense::query()
            ->when($request->filter, function ($query) use ($request) {
                $query->where('description', 'like', '%' . $request->filter . '%')
                    ->orWhere('amount', 'like', '%' . $request->filter . '%')
                    ->orWhere('users.name', 'like', '%' . $request->filter . '%');
            })
            ->where('menage_id', $request->menageId)
            ->join('users', 'user_id', '=', 'users.id')->get();

        return json_encode(['data' => $result]);
    }
}