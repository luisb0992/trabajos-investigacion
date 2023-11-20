<?php

namespace App\Models\Services;

use App\Models\InvestigationWork;

trait InvestigationWorkTrait
{
  public function getInvestigationWorks(): array
  {
    return $this
      ->with(['line:id,name', 'area:id,name', 'authors'])
      ->get()->toArray();
  }

  public function getInvestigationWork(): InvestigationWork
  {
    return $this
      ->load(['line:id,name', 'area:id,name', 'authors']);
  }
}
