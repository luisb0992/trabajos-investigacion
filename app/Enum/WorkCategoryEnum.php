<?php

/**
 * Gestion de categorias para los diferentes proyectos
 * 1 - Trabajo de grado
 * 2 - Proyecto de grado
 * 3 - Proyecto Socio productivo
 * 4 - Tesis de grado
 * 5 - Articulo científico
 */

namespace App\Enum;

final class WorkCategoryEnum
{
  const WORK = 1;
  const PROJECT = 2;
  const PRODUCTIVE_PARTNER = 3;
  const DEGREE_THESIS = 4;
  const SCIENTIFIC_ARTICLE = 5;

  // trabajos de grado, tesis y articulo científico
  // campos:
  // trabajo de grado y tesis: titulo, autor, linea de investigación y resumen.
  // articulo científico: autor, linea de investigación, correo, perfil, código orcid, resumen, adjuntar articulo
  // ambos colocar resumen en ingles y español

  public static function getCategory(?int $category): string
  {
    switch ($category) {
      case self::WORK:
        return 'Trabajo de grado';
      case self::PROJECT:
        return 'Proyecto de grado';
      case self::PRODUCTIVE_PARTNER:
        return 'Proyecto Socio productivo';
      case self::DEGREE_THESIS:
        return 'Tesis de grado';
      case self::SCIENTIFIC_ARTICLE:
        return 'Articulo científico';
      default:
        return 'Sin Categoria';
    }
  }
}
