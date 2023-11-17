<?php

namespace App\Models;

use App\Models\Services\LineTrait;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use LineTrait;

    protected $table = 'lines';

    protected $fillable = [
        'name',
        'active',
    ];
}
