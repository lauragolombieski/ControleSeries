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
        $emails = User::pluck('email');
        foreach ($emails as $index => $email){
            $text = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasons,
                $event->seriesEpisodes,
            );
            $when = now()->addSeconds($index*3);
            Mail::to($email)->later($when, $text);
        }
    }
}
