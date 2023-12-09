<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkAuthor extends Model
{
    protected $table = 'work_authors';

    protected $fillable = [
        'investigation_work_id',
        'firstname',
        'lastname',
        'email',
        'dni',
        'phone',
        'level_instruction',
        'address',
        'function_project',
        'active',
    ];
}
