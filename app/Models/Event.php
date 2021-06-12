<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    protected $hidden = ['created_at', 'updated_at'];
}
