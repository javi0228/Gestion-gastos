<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Menage;
use App\Models\User;
use App\Notifications\MenageInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Menage $menage)
    {
        // Get invitated user
        $invitated = User::where('email', $request->email)->first();

        if ($invitated) {
            // Send notification
            $invitated->notify(new MenageInvitation($menage, auth()->user()));

            return back()->with('status', 'user-invited');
        }
        return back()->with('status', 'user-not-found');
    }


    public function accept($notification_id)
    {
        $notification = Auth::user()->notifications()->find($notification_id);
        // Associate the menage with the user
        Auth::user()->menages()->attach($notification->data['menage_id']);

        $notification->markAsRead();

        return back()->with('status', 'accepted');
    }

    /**
     * Remove the specified invitation from storage.
     */
    public function reject($notification_id)
    {
        $notification = Auth::user()->notifications()->find($notification_id);

        $notification->markAsRead();

        return back()->with('status', 'rejected');
    }
}