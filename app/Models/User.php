<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];


    /*    public function setPasswordAttribute($password)
        {
            $this->attributes['password'] = Hash::make($password);
        }*/


//    this tells that there is a many-to-many relationship between the tables
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    //    laravel fortified actions
    // this function checks whether the user has the role that we are checking for
    public function hasAnyRole(string $role)
    {
        // this users roles where the name column has the role that we are gonna pass in here and we are going to get the first role thatis there
        return null !== $this->roles()->where('name', $role)->first();

    }

    /**
     * Check if the user has any given role
     * @param $role array
     * @return bool
     */
    public function hasAnyRoles(array $role)
    {
        // this users roles where the name column has the role that we are gonna pass in here and we are going to get the first role thatis there
        return null !== $this->roles()->whereIn('name', $role)->first();

    }
}
