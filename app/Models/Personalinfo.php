<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Stringable;

class Personalinfo extends Model
{
    //use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'f_name',
        's_name',
        'sername',
        'gender',
        'civil_status',
        'yob',
        'nationality',
        'country',
        'nationality2',
        'county',
        'ethinicity',
        'disability',
        'd_nature',
        'd_registration',
        'user_id',
    ];

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'nationality' => 'boolean',
        'disability' => 'boolean',
    ];


    public function title(): Attribute
    {
        $user = Auth::User()->id;
        $col = Personalinfo::where('user_id', $user)->get('id');
//dd($col);
        return new Attribute(
            //get: fn ($value) => ucfirst($value),
            set: fn ($value) => [
                'title' => $value,
                'user_id' => $user,
            ]
        );
    }
}
