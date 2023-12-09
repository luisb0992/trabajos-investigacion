<?php

namespace App\Models;

use App\Models\Services\InvestigationWorkTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvestigationWork extends Model
{
    use InvestigationWorkTrait;

    protected $table = 'investigation_works';

    protected $fillable = [
        'category_id',
        'line_id',
        'area_id',
        'title',
        'es_summary',
        'en_summary',
        'email',
        'profile',
        'orcid_code',
        'type',
        'status',
        'location',
        'approach',
        'justification',
        'background',
        'general_objective',
        'specific_objective',
        'expected_results',
        'methodology',
        'file',
    ];

    public function line(): BelongsTo
    {
        return $this->belongsTo(Line::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function authors(): HasMany
    {
        return $this->hasMany(WorkAuthor::class);
    }
}
