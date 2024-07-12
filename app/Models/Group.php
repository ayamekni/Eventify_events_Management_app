<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model

{
    protected $fillable = ['name'];

    /**
     * The users that belong to the group.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}
