<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        // Get invitated user
        $invitated = User::where('email', $request->email)->get();

        if (count($invitated) > 0) {
            $user = $invitated[0];

            // Create invitation
            Invitation::create(['from' => Auth::user()->id, 'to' => $user->id, 'menage_id' => $id]);

            return back()->with('status', 'user-invited');
        }
        return back()->with('status','user-not-found');
    }


    public function accept(Invitation $invitation)
    {
        // Associate the menage with the user
        Auth::user()->menages()->attach($invitation->menage_id);

        $invitation->delete();

        return back()->with('status', 'accepted');
    }

    /**
     * Remove the specified invitation from storage.
     */
    public function reject(Invitation $invitation)
    {
        $invitation->delete();

        return back()->with('status', 'rejected');
    }
}