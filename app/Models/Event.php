<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'user_id', // Add user_id here
    ];

    // Optionally, define relationships if needed
    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }



    public function isOver()
    {
        // Get the current date
        $now = Carbon::now();
        
        // Convert the event date to a Carbon instance
        $eventDate = Carbon::createFromFormat('Y-m-d', $this->date);

        // Check if the event date is in the past
        return $eventDate->isPast();
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
