<?php

namespace App\Http\Services\InvestigationWork;

use App\Enum\WorkCategoryEnum;
use Illuminate\Http\Request;

final class Util
{
  public function baseAspect(): array
  {
    return [
      1 => 'principles_beneficence',
      2 => 'ethics_commission',
      3 => 'biological_samples',
      4 => 'medical_attention',
      5 => 'protection_mechanisms',
      6 => 'collective_informed',
      7 => 'informed_consent',
      8 => 'person_investigation',
      9 => 'data_confidentiality',
      10 => 'research_impact',
      11 => 'description_procedures',
      12 => 'query_forecast',
      13 => 'consideration_impact',
      14 => 'animal_sacrifice',
      15 => 'study_animals',
      16 => 'animal_habitat',
    ];
  }

  public function baseItems(): array
  {
    return [
      1 => 'incentive',
      2 => 'material_supplier',
      3 => 'services',
      4 => 'viatic',
      5 => 'mobilization',
    ];
  }

  public function baseActivities(): array
  {
    return [
      1 => 'revision',
      2 => 'description',
      3 => 'analysis',
      4 => 'drafting',
      5 => 'conclusions',
    ];
  }

  public function filterAspects(array $aspects): array
  {
    // los aspectos base
    $baseAspect = $this->baseAspect();
    // filtrar los aspectos
    $filter = array_filter($aspects, fn ($aspect) => $aspect);
    // obtener las keys
    $keys = array_keys($filter);
    // intersect las keys
    $filterKeys = array_intersect($keys, array_keys($baseAspect));
    // combinar ambos arrays
    return array_combine(array_map(function ($key) use ($baseAspect) {
      return $baseAspect[$key];
    }, $filterKeys), array_fill(0, count($filterKeys), true));
  }

  public function filterItems(array $items): array
  {
    // los items base
    $baseItems = $this->baseItems();
    // filtrar los items
    $filter = array_filter($items, fn ($i) => $i);
    // obtener las key
    $itemKeys = array_keys($filter);
    // intersect las key
    $filterItemKeys = array_intersect($itemKeys, array_keys($baseItems));
    // combinar ambos arrays con sus claves
    return array_combine(array_map(function ($key) use ($baseItems) {
      return $baseItems[$key];
    }, $filterItemKeys), array_map(function ($key) use ($filter) {
      return $filter[$key];
    }, $filterItemKeys));
  }

  public function filterActivities(array $activities): array
  {
    // los items base
    $baseActivities = $this->baseActivities();
    // filtrar los items
    $filter = array_filter($activities, fn ($i) => $i);
    // obtener las key
    $itemKeys = array_keys($filter);
    // intersect las key
    $filterItemKeys = array_intersect($itemKeys, array_keys($baseActivities));
    // combinar ambos arrays con sus claves
    return array_combine(array_map(function ($key) use ($baseActivities) {
      return $baseActivities[$key];
    }, $filterItemKeys), array_map(function ($key) use ($filter) {
      return json_encode($filter[$key]);
    }, $filterItemKeys));
  }

  public function onlyDataHomeland(Request $data): array
  {
    return [
      'bibliography' => $data->bibliography,
      'homeland_plans' => $data->homeland_plans,
      'historical_objectives' => $data->historical_objectives,
      'national_objectives' => $data->national_objectives,
      'strategic_objectives' => $data->strategic_objectives,
      'general_objectives' => $data->general_objectives,
      'relationship_objectives' => $data->relationship_objectives,
    ];
  }

  public function onlyDataDegreeAndDoctoralAndProductive(Request $data): array
  {
    return [
      'category_id' => $data->category_id,
      'title' => $data->title,
      'area_id' => $data->area_id,
      'line_id' => $data->line_id,
      'location' => $data->location,
      'status' => $data->status['id'] ?? null,
      'type' => $data->type['id'] ?? null,
      'es_summary' => $data->es_summary,
      'en_summary' => $data->en_summary,
      'approach' => $data->approach,
      'justification' => $data->justification,
      'background' => $data->background,
      'general_objective' => $data->general_objective,
      'specific_objective' => $data->specific_objective,
      'expected_results' => $data->expected_results,
      'methodology' => $data->methodology,
    ];
  }

  public function onlyDataProject(Request $data): array
  {
    return [
      'category_id' => WorkCategoryEnum::PROJECT,
      'title' => $data->title,
      'area_id' => $data->area_id,
      'line_id' => $data->line_id,
    ];
  }

  public function onlyDataScientific(Request $data): array
  {
    return [
      'category_id' => WorkCategoryEnum::SCIENTIFIC_ARTICLE,
      'title' => $data->title,
      'area_id' => $data->area_id,
      'line_id' => $data->line_id,
      'orcid_code' => $data->orcid_code,
      'es_summary' => $data->es_summary,
      'en_summary' => $data->en_summary,
    ];
  }
}
