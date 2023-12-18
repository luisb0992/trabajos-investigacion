<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EthicalAspect extends Model
{
    protected $table = 'ethical_aspects';

    protected $fillable = [
        'investigation_work_id',
        'principles_beneficence',
        'ethics_commission',
        'biological_samples',
        'medical_attention',
        'protection_mechanisms',
        'collective_informed',
        'informed_consent',
        'person_investigation',
        'data_confidentiality',
        'research_impact',
        'description_procedures',
        'query_forecast',
        'consideration_impact',
        'animal_sacrifice',
        'study_animals',
        'animal_habitat',
    ];

    public function work()
    {
        return $this->belongsTo(InvestigationWork::class);
    }
}
