<?php

namespace App\Models;

class Company extends Model
{
    protected $fillable = [
        'cpf_cnpj', 'pj', 'name', 'fantasy_name', 'email', 'phone', 'representative_name', 'representative_role', 'active', 'address_id',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'company_courses');
    }

    public function sectors()
    {
        return $this->belongsToMany(Sector::class, 'company_sectors');
    }

    public function supervisors()
    {
        return $this->hasMany(Supervisor::class);
    }

    public function agreements()
    {
        return $this->hasMany(Agreement::class);
    }

    public function internships()
    {
        return $this->hasMany(Internship::class);
    }

    public function syncCourses($courses)
    {
        $this->courses()->sync($courses);
    }

    public function syncSectors($sectors)
    {
        $this->sectors()->sync($sectors);
    }
}