<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomelandPlan extends Model
{
    protected $table = 'homeland_plans';

    protected $fillable = [
        'investigation_work_id',
        'bibliography',
        'homeland_plans',
        'historical_objectives',
        'national_objectives',
        'strategic_objectives',
        'general_objectives',
        'relationship_objectives',
    ];

    public function work()
    {
        return $this->belongsTo(InvestigationWork::class);
    }
}
