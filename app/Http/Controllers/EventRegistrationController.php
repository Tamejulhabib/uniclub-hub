<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    // Student joins an event
    public function join(Event $event)
    {
        // Prevent duplicate registration
        $already = EventRegistration::where('event_id', $event->id)
                    ->where('user_id', Auth::id())
                    ->exists();

        if ($already) {
            return redirect()->back()->with('info', 'You are already registered for this event!');
        }

        EventRegistration::create([
            'event_id' => $event->id,
            'user_id'  => Auth::id(),
        ]);

        return redirect()->back()->with('success', '🎉 You have successfully joined "' . $event->title . '"!');
    }

    // Student leaves an event
    public function leave(Event $event)
    {
        EventRegistration::where('event_id', $event->id)
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->back()->with('success', 'You have cancelled your registration for "' . $event->title . '".');
    }
}