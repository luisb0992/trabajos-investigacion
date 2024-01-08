<?php

namespace App\Models\Services;

use App\Enum\UserRolEnum;

trait UserTrait
{
  public function getAllUsers(): array
  {
    $query = $this
      ->where('active', 1)
      ->get([
        'id',
        'name',
        'email',
        'created_at',
        'active',
        'rol_id'
      ]);

    // agregar string para roles
    foreach ($query as $key => $value) {
      $query[$key]['rol'] = UserRolEnum::getRol($value['rol_id']);
    }

    return $query->toArray();
  }

  public function desactive(): void
  {
    $this->active = 0;
    $this->update();
  }

  public function isAdmin(): bool
  {
    return $this->rol_id === UserRolEnum::ADMIN;
  }

  public function isUser(): bool
  {
    return $this->rol_id === UserRolEnum::REGISTER;
  }
}
