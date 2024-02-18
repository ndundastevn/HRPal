<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;

class Contactinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'town',
        'phone1',
        'phone2',
        'residence',
        'user_id',
        'kin_name',
        'kin_gender',
        'kin_relationship',
        'kin_phone',
    ];

    public function address(): Attribute
    {
        $user = Auth::User()->id;

        return new Attribute(
            //get: fn ($value) => ucfirst($value),
            set: fn ($value) => [
                'address' => $value,
                'user_id' => $user,
            ]
        );
    }
}
