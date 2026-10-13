<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'club_id', 'title', 'description', 'event_date',
        'location', 'status', 'venue_id', 'start_time', 'end_time'
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function isRegisteredBy($userId)
    {
        return $this->registrations()->where('user_id', $userId)->exists();
    }
}