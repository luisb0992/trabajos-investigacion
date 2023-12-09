<?php

/**
 * Gestion de tipos para los proyectos
 */

namespace App\Enum;

final class WorkTypeEnum
{
  const INDIVIDUAL = 1;
  const GROUP = 2;

  public static function getType(?int $type): string
  {
    switch ($type) {
      case self::INDIVIDUAL:
        return 'Individual';
      case self::GROUP:
        return 'Grupal';
      default:
        return 'Sin Tipo';
    }
  }
}
