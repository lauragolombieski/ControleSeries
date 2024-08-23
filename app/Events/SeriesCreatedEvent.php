<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SeriesCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $seriesName;
    public int $seriesId;
    public int $seriesSeasons;
    public int $seriesEpisodes;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(                
        $seriesName,
        $seriesId,
        $seriesSeasons,
        $seriesEpisodes
    )
    {
        $this->seriesName = $seriesName;
        $this->seriesId = $seriesId;
        $this->seriesSeasons = $seriesSeasons;
        $this->seriesEpisodes = $seriesEpisodes;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
