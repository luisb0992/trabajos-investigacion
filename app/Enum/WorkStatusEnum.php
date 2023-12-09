<?php

/**
 * Gestion los estatus para los proyectos
 */

namespace App\Enum;

final class WorkStatusEnum
{
  const IN_ACTION = 1;
  const ENDED = 2;

  public static function getStatus(?int $status): string
  {
    switch ($status) {
      case self::IN_ACTION:
        return 'En ejecución';
      case self::ENDED:
        return 'Finalizado';
      default:
        return 'Sin Estatus';
    }
  }
}
