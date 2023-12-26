<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function work(): BelongsTo
    {
        return $this->belongsTo(InvestigationWork::class);
    }
}
