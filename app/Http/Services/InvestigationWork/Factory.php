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

  public function save(array $data): InvestigationWork
  {
    $authors = $data['authors'];
    $file = $data['file'];

    $data['file'] = $this->saveFile($file);
    $investigationWork = $this->model->create($data);
    $this->saveAuthors($authors, $investigationWork);

    return $investigationWork;
  }

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

  public function saveAuthors(array $authors, InvestigationWork $investigationWork): void
  {
    foreach ($authors as $author) {
      $investigationWork->authors()->create([
        'firstname' => $author['name'],
        'lastname' => $author['lastname'],
      ]);
    }
  }

  public function destroy(InvestigationWork $work): bool
  {
    return $work->delete();
  }

  public function deleteFile(InvestigationWork $work): bool
  {
    $path = config('filesystems.paths.inv_work') . '/' . $work->file;
    return unlink(storage_path('app/' . $path));
  }
}
