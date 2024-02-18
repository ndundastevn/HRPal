<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reference',
        'deadline',
        'vacancy',
        'position'
    ];

    /**
     * Get the all Job applications
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
