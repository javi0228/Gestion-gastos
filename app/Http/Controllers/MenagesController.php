<?php

namespace App\Http\Controllers;

use App\Models\Menage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MenagesController extends Controller
{
    // Display user's menages
    public function index(): View
    {
        // Get user's menages
        $menages = Auth::user()->menages()->distinct()->get();

        // Get user invitations
        $invitations = Auth::user()->unreadNotifications;
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

    /**
     * Show the menage chat
     * 
     * @param Menage $id
     *  Menage id
     *  
     * @return view Returns the view that contains menage chat
     */
    public function chat(Menage $menage): View
    {

        // Get users to manage its chat
        $users = $menage->users;
        return view('menages.inhabitants-chat', ['menage' => $menage, 'users' => $users]);
    }

    /**
     * Show the menage expenses
     * 
     * @param Menage $menage
     *  Menage id
     *  
     * @return view Returns the view that contains menage expenses
     */
    public function expenses(Menage $menage): View
    {
        return view('menages.expenses', ['menage' => $menage]);
    }

    public function addUserExpense(Request $request, $id)
    {

        if (Auth::user()->addExpense(['amount' => $request->amount, 'menage_id' => $id, 'description' => $request->description]))
            return back()->with('status', 'expenseAdded');

        return back();
    }
}