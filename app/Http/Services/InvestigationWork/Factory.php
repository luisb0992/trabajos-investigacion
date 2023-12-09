<?php

namespace App\Http\Services\InvestigationWork;

use App\Models\InvestigationWork;
use Illuminate\Http\UploadedFile;
use Exception;

class Factory
{
  public function __construct(private InvestigationWork $model)
  {
  }

  // guardar un nuevo trabajo de investigación
  public function save(array $data): InvestigationWork
  {
    $authors = $data['authors'];
    $file = $data['file'];

    $data['file'] = $this->saveFile($file);
    $investigationWork = $this->model->create($data);
    $this->saveAuthors($authors, $investigationWork);

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
        'firstname' => $author['name'],
        'lastname' => $author['lastname'],
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
    $authors = $data['authors'];
    $file = $data['file'];

    if ($file instanceof UploadedFile) {
      $data['file'] = $this->saveFile($file);
      $this->deleteFile($work);
    }

    $work->update($data);
    $this->saveAuthors($authors, $work);

    return $work;
  }
}
