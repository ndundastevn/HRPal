<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'cover_letter',
        'user_id'
    ];

    /**
     * Get the job that owns the application.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    /**
     * Get the job that owns the application.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
