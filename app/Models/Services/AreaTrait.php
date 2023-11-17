<?php

namespace App\Models\Services;

trait AreaTrait
{
  public function getActiveAreas(): array
  {
    return $this
      ->where('active', 1)
      ->get([
        'id',
        'name',
      ])->toArray();
  }
}
