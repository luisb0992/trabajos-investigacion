<?php

namespace App\Models\Services;

trait InvestigationWorkTrait
{
  public function getInvestigationWorks(): array
  {
    return $this
      ->with(['line:id,name', 'area:id,name', 'authors'])
      ->get()->toArray();
  }
}
