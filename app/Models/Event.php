<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    /**
     * Get the schedules for the event.
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'event_id', 'id');
    }

    // TODO: Hide timestamp and other non useful props
}
