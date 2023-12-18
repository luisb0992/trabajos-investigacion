<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleActivity extends Model
{
    protected $table = 'schedule_activities';

    protected $fillable = [
        'investigation_work_id',
        'revision',
        'description',
        'analysis',
        'drafting',
        'conclusions',
    ];

    public function work()
    {
        return $this->belongsTo(InvestigationWork::class);
    }
}
