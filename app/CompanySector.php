<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySector extends Model
{
    protected $fillable = [
        'id_company', 'id_sector',
    ];
}
