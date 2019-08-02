<?php

namespace App\Models;

use Carbon\Carbon;

class Coordinator extends Model
{
    protected $fillable = [
        'user_id', 'course_id', 'start_date', 'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public static function actives()
    {
        return Coordinator::all()->where('end_date', '>', Carbon::today()->toDateString())->sortBy('id');
    }
}
