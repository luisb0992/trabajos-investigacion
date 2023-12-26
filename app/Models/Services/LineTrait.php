<?php

namespace App\Models\Services;

trait LineTrait
{
  public function getActiveLines(): array
  {
    return $this->where('active', 1)->get([
      'id',
      'name',
    ])->toArray();
  }
}
