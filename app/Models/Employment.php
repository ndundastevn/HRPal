<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Employment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'not_employed',
        'employer',
        'position',
        'doa',
        'salary',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'not_employed' => 'boolean',
    ];



    /**
     * Interact with the user's employment status.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    //  protected function not_employed(): Attribute
    //  {
    //      return new Attribute(
    //          get: fn ($value) =>  if($value === 0){'not_employe' => false},
    //          set: fn ($value) =>  Carbon::parse($value)->format('Y-m-d'),
    //      );
    //  }

    // public function staffpn(): Attribute
    // {
    //     // $user = Auth::User()->id;

    //     // return new Attribute(
    //     //     //get: fn ($value) => ucfirst($value),
    //     //     set: fn ($value) => [
    //     //         'staffpn' => $value,
    //     //         'user_id' => $user,
    //     //     ]
    //     // );
    // }
}
