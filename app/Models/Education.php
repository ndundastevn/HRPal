<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'y_ended',
        'institution',
        'level',
        'certificate',
        'user_id',
        'highest'
    ];

    protected $casts = [
        'highest' => 'boolean',
    ];

    public function y_ended(): Attribute
    {
        $user = Auth::User()->id;

        return new Attribute(
            //get: fn ($value) => ucfirst($value),
            set: fn ($value) => [
                'y_ended' => $value,
                'user_id' => $user,
            ]
        );
    }
}
