<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'end',
        'start',
        'user_id',
        'institution',
        'designation',
        'salary',
        'id'
    ];
}
