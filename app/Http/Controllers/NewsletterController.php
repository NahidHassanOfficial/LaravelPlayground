<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewsLetterMailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;

class NewsletterController extends Controller
{
    public function sendLetter()
    {
        $user = User::inRandomOrder()->first();

        $signedUrl = URL::temporarySignedRoute('unsubscribeNewsletter', now()->addMinutes(1), ['userID' => $user->id]);

        Notification::send($user, new NewsLetterMailNotification($signedUrl));
        return back()->with('success', 'Newsletter Sent');
    }

    public function unsubscribeNewsletter($userID)
    {
        if (! request()->hasValidSignature()) {
            return response()->json('invalid');
        }

        //necessary actions in db to unsubscribe

        return response()->json(['status' => 'success', 'message' => 'your email has been unsubscribed']);

    }
}
