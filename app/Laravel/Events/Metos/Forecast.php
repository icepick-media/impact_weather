<?php

namespace App\Laravel\Events\Metos;


use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Input;

class Forecast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $station_id;
    public $model;
    public $request;
    public $forecast;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $data = [])
    {

        
        $this->request = collect(Input::all());
        $this->forecast= isset($data['response']) ? $data['response'] : [];
        $this->station_id = isset($data['station_id']) ? $data['station_id'] : 0;
    }

}
