<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvestigationWork extends Model
{
    protected $table = 'investigation_works';

    protected $fillable = [
        'line_id',
        'area_id',
        'title',
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

    // public function getFilePathAttribute(): string
    // {
    //     return asset('storage/' . $this->file);
    // }
}
