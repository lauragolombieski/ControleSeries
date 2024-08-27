<?php

namespace App\Listeners;

use App\Events\SeriesCreatedEvent;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailUsersAboutSeriesCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SeriesCreatedEvent $event)
    {
        $userList = User::all();
        foreach ($userList as $index => $user) {
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasons,
                $event->seriesEpisodes,
            );
            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when, $email);
        }
    }
}
