<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Menage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MenagesController extends Controller
{
    // Display user's menages
    public function index(): View
    {
        // Get user's menages
        $menages = Auth::user()->menages()->distinct()->get();

        // Get user invitations
        $invitations = Auth::user()->invitations;

        return view('menages.index', ['menages' => $menages, 'invitations' => $invitations]);
    }

    // Create a menage
    public function store(Request $request)
    {
        //Not need validation because it's already validated by the view
        $menage = Menage::create([
            'name' => $request->name,
            'address' => $request->address,
            'color' => $request->color,
            'description' => $request->description,
        ]);

        // Associating the manage to user
        Auth::user()->menages()->attach($menage->id);

        // Redirect the user to index
        return back();
    }

    public function addUserExpense(Request $request, $id)
    {
        if (Auth::user()->addExpense(['amount' => $request->amount, 'menage_id' => $id]))
            return back()->with('status', 'expenseAdded');

        return back();
    }
}