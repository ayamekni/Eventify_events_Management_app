<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user'); // assuming a many-to-many relationship
    }
    public function createdEvents()
    {
        return $this->hasMany(Event::class);
    }
    

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class);
    }


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
// In App\Models\User.php

public function isUser()
{
    return $this->role === 'user';
}

public function isOrganiser()
{
    return $this->role === 'organiser';
}


}


