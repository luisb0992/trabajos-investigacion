<?php

namespace App\Models;

use App\Models\Services\AreaTrait;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use AreaTrait;

    protected $table = 'areas';

    protected $fillable = [
        'name',
        'active',
    ];
}
