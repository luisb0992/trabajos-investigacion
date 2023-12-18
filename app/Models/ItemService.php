<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemService extends Model
{
    protected $table = 'item_services';

    protected $fillable = [
        'investigation_work_id',
        'incentive',
        'material_supplier',
        'services',
        'viatic',
        'mobilization',
    ];

    public function work()
    {
        return $this->belongsTo(InvestigationWork::class);
    }
}
