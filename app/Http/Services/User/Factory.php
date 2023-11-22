<?php

namespace App\Http\Services\User;

use App\Models\User;
use Exception;

class Factory
{
  public function __construct(private User $model)
  {
  }

  // eliminar usuario (desactivar)
  public function deleteUser(User $user): void
  {
    try {

      if ($user->id === auth()->user()->id) {
        throw new Exception('No puedes eliminar tu propio usuario');
      }

      $user->desactive();
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  // crear usuario
  public function save(array $data): void
  {
    try {
      $this->model->create([
        'name' => $data['name'],
        'email' => $data['email'],
        'rol_id' => $data['rol_id'],
        'password' => bcrypt($data['password']),
      ]);
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  // actualizar usuario
  public function update(array $data, User $user): void
  {
    try {
      $user->update([
        'name' => $data['name'],
        'email' => $data['email'],
        'rol_id' => $data['rol_id'],
      ]);

      if ($data['checked']) {
        $data['password'] = bcrypt($data['password']);
        $user->update(['password' => $data['password']]);
      }
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }
}
