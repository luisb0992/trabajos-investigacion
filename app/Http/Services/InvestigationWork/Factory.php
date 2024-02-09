<?php

namespace App\Http\Services\InvestigationWork;

use App\Enum\WorkCategoryEnum;
use App\Models\InvestigationWork;
use Illuminate\Http\UploadedFile;
use Exception;
use Illuminate\Http\Request;
use App\Http\Services\InvestigationWork\Util;
use Illuminate\Support\Facades\DB;

class Factory
{
  public function __construct(
    private InvestigationWork $model,
    private Util $util
  ) {
  }

  // guardar un nuevo trabajo de investigación
  public function save(Request $data): InvestigationWork
  {
    // evaluar según la Categoria del proyecto
    // WorkCategoryEnum
    $investigationWork = new InvestigationWork;
    $categoryID = intval($data->category_id);
    $authors = $data->authors;
    $file = $data->file;

    // Cat Proyectos
    if ($categoryID === WorkCategoryEnum::PROJECT) {
      // la data
      $array = $this->util->onlyDataProject($data);
      // guardar el archivo
      $array['file'] = $data->hasFile('file') ? $this->saveFile($file) : null;
      // guardar el proyecto
      $investigationWork = $this->model->create($array);
      // guardar los autores
      $this->saveAuthors($authors, $investigationWork);
    }

    // Cat trabajos de grado
    // Cat tesis doctoral
    // cat socio productivo
    if (
      $categoryID === WorkCategoryEnum::DEGREE_WORK ||
      $categoryID === WorkCategoryEnum::DOCTORAL_THESIS ||
      $categoryID === WorkCategoryEnum::PRODUCTIVE_PARTNER
    ) {

      $investigationWork = DB::transaction(function () use ($data, $authors, $investigationWork) {
        $degree = $this->util->onlyDataDegreeAndDoctoralAndProductive($data);
        $homeland = $this->util->onlyDataHomeland($data);
        $aspects = $this->util->filterAspects($data->aspects);
        $items = $this->util->filterItems($data->items);
        $activities = $this->util->filterActivities($data->activities);

        // crear el proyecto
        $investigationWork = $this->model->create($degree);
        // guardar los autores
        $this->saveAuthors($authors, $investigationWork);
        // guardar plan de la patria
        $investigationWork->homelandPlan()->create($homeland);
        // guardar aspectos éticos
        $investigationWork->ethicalAspect()->create($aspects);
        // guardar rubros
        $investigationWork->itemService()->create($items);
        // guardar cronograma de actividades
        $investigationWork->scheduleActivity()->create($activities);

        return $investigationWork;
      });
    }

    // cat articulo científico
    if ($categoryID === WorkCategoryEnum::SCIENTIFIC_ARTICLE) {
      // la data
      $array = $this->util->onlyDataScientific($data);
      // guardar el archivo
      $array['file'] = $data->hasFile('file') ? $this->saveFile($file) : null;
      // guardar el proyecto
      $investigationWork = $this->model->create($array);
      // guardar los autores
      $this->saveAuthors($authors, $investigationWork);
    }

    return $investigationWork;
  }

  // guardar el archivo en el disco
  public function saveFile(UploadedFile $file): string
  {
    $fullname = 'Archivo' . '_' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
    $path = config('filesystems.paths.inv_work');
    $saved = $file->storeAs($path, $fullname);

    if (!$saved) {
      throw new Exception('No se pudo guardar el archivo');
    }

    return $fullname;
  }

  // guardar los autores del trabajo de investigación
  public function saveAuthors(array $authors, InvestigationWork $investigationWork): void
  {
    $investigationWork->authors()->delete();
    foreach ($authors as $author) {
      $investigationWork->authors()->create([
        'dni' => $author['dni'],
        'firstname' => $author['name'],
        'lastname' => $author['lastname'],
        'email' => $author['email'],
        'phone' => $author['phone'],
        'level_instruction' => $author['level_instruction'],
        'address' => $author['address'],
        'function_project' => $author['function_project'],
      ]);
    }
  }

  // eliminar un trabajo de investigación
  public function destroy(InvestigationWork $work): bool
  {
    return $work->delete();
  }

  // eliminar el archivo del disco
  public function deleteFile(InvestigationWork $work): bool
  {
    try {
      $path = config('filesystems.paths.inv_work') . '/' . $work->file;
      return unlink(storage_path('app/' . $path));
    } catch (Exception $e) {
      return false;
    }
  }

  // actualizar un trabajo de investigación
  public function update(array $data, InvestigationWork $work): InvestigationWork
  {
    $data = new Request($data);
    $authors = $data->authors;
    $file = $data->file;
    $categoryID = intval($data->category_id);
    $updateData = [];

    // cat proyecto
    if ($categoryID === WorkCategoryEnum::PROJECT) {
      $updateData = $this->util->onlyDataProject($data);

      if ($file instanceof UploadedFile) {
        $updateData['file'] = $this->saveFile($file);
        $this->deleteFile($work);
      }
    }

    // Cat trabajos de grado
    // Cat tesis doctoral
    // cat socio productivo
    if (
      $categoryID === WorkCategoryEnum::DEGREE_WORK ||
      $categoryID === WorkCategoryEnum::DOCTORAL_THESIS ||
      $categoryID === WorkCategoryEnum::PRODUCTIVE_PARTNER
    ) {
      $updateData = $this->util->onlyDataDegreeAndDoctoralAndProductive($data);
      $homeland = $this->util->onlyDataHomeland($data);
      $aspects = $this->util->filterAspects($data->aspects);
      $items = $this->util->filterItems($data->items);
      $activities = $this->util->filterActivities($data->activities);

      // guardar plan de la patria
      $work->homelandPlan()->delete();
      $work->homelandPlan()->create($homeland);
      // guardar aspectos éticos
      $work->ethicalAspect()->delete();
      $work->ethicalAspect()->create($aspects);
      // guardar rubros
      $work->itemService()->delete();
      $work->itemService()->create($items);
      // guardar actividades
      $work->scheduleActivity()->delete();
      $work->scheduleActivity()->create($activities);
    }

    // cat articulo científico
    if ($categoryID === WorkCategoryEnum::SCIENTIFIC_ARTICLE) {
      // la data
      $updateData = $this->util->onlyDataScientific($data);
      // actualizar el archivo
      if ($file instanceof UploadedFile) {
        $updateData['file'] = $this->saveFile($file);
        $this->deleteFile($work);
      }
    }

    $work->update($updateData);
    $this->saveAuthors($authors, $work);

    return $work;
  }
}
