<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'date', 'location', 'description',
        // Add more attributes here if needed
    ];

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
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


}
