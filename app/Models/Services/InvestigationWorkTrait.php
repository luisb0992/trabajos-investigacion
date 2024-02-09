<?php

namespace App\Models\Services;

use App\Enum\WorkCategoryEnum;
use App\Models\InvestigationWork;

trait InvestigationWorkTrait
{
  public function getInvestigationWorks(): array
  {
    return $this
      ->with(['line:id,name', 'area:id,name', 'authors'])
      ->get()
      ->map(
        fn ($work)
        => array_merge($work->toArray(), ['category' => $work->getCategory()])
      )
      ->toArray();
  }

  public function getInvestigationWork(): InvestigationWork
  {
    return $this
      ->load(['line:id,name', 'area:id,name', 'authors']);
  }

  public function withAllRelations(): InvestigationWork
  {
    return $this
      ->load([
        'line:id,name',
        'area:id,name',
        'authors',
        'homelandPlan',
        'ethicalAspect',
        'itemService',
        'scheduleActivity'
      ]);
  }

  public function getCategory(): string
  {
    return WorkCategoryEnum::getCategory($this->category_id);
  }
}
