<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseConfiguration extends Model
{
    protected $fillable = [
        'id_course', 'min_year', 'min_semester', 'min_hours', 'min_months', 'min_months_ctps', 'min_grade',
    ];
}
