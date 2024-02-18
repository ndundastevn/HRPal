<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $dates = [ 'created_at', 'updated_at', ];
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
     * Accessor to modify created_at to readable format
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('d-m-Y', strtotime($value))
        );
    }

    /**
     * Get the personalinfo associated with the user.
     */
    public function personalinfo()
    {
        return $this->hasOne(Personalinfo::class);
    }
    /**
     * Get user contacts.
     */
    public function contactinfo()
    {
        return $this->hasOne(Contactinfo::class);
    }
    /**
     * Get next of Kin.
     */
    public function kin()
    {
        return $this->hasOne(Kin::class);
    }

    /**
     * Get the all education belonging to the user
     */
    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    /**
     * Get the all referee belonging to the user
     */
    public function referees()
    {
        return $this->hasMany(Referee::class);
    }
    /**
     * Get the all Job applications belonging to the user
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Get the all experince belonging to the user
     */
    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    /**
     * Get the all Employment belonging to the user
     */
    public function employment()
    {
        return $this->hasOne(Employment::class);
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
    ];
}
