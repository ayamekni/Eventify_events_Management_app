<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }


    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }


}
