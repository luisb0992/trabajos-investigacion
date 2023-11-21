<?php

/**
 * Gestion de roles para usuarios
 * 1 - Administrador
 * 2 - registrador
 * 3 - estudiante
 * 4 - BD
 */

 namespace App\Enum;

final class UserRolEnum
{
  const ADMIN = 1;
  const REGISTER = 2;
  const STUDENT = 3;
  const BD = 4;


  public static function getRol(?int $rol): string
  {
    switch ($rol) {
      case self::ADMIN:
        return 'Administrador';
      case self::REGISTER:
        return 'Registrador';
      case self::STUDENT:
        return 'Estudiante';
      case self::BD:
        return 'BD';
      default:
        return 'Sin rol';
    }
  }
}
