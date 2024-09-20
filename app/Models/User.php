<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public function subscriptionplans(){

        return $this->belongsToMany(SubscriptionPlan::class, 'users_subscription_plans');
    }
    public function role(){

        return $this->belongsTo(Role::class);

    }

    public function books(){

        return $this->hasMany(Book::class);

    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'subscription_plan_id'
    ];
    public function isAdmin()
    {

        return $this->role->role_name === 'admin';
    }
    public function isPublisher()
    {

        return $this->role->role_name === 'publisher';
    }



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
    protected $attributes = [
        'role_id' => 3,
    ];



}
