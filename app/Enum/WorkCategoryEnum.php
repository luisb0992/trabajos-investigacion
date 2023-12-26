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
  const PROJECT = 1;
  const DEGREE_WORK = 2;
  const DOCTORAL_THESIS = 3;
  const PRODUCTIVE_PARTNER = 4;
  const SCIENTIFIC_ARTICLE = 5;

  // trabajo de grado y tesis: titulo, autor, linea de investigación y resumen.
  // articulo científico: autor, linea de investigación, correo, perfil,
  // código orcid, resumen, adjuntar articulo
  // ambos colocar resumen en ingles y español

  // categorias:
  // Proyectos
  // Trabajos de grado
  // Tesis doctoral
  // Socio productivo
  // Artículo científico

  public static function getCategory(?int $category): string
  {
    switch ($category) {
      case self::PROJECT:
        return 'Proyectos';
      case self::DEGREE_WORK:
        return 'Trabajo de grado';
      case self::DOCTORAL_THESIS:
        return 'Tesis doctoral';
      case self::PRODUCTIVE_PARTNER:
        return 'Socio productivo';
      case self::SCIENTIFIC_ARTICLE:
        return 'Articulo científico';
      default:
        return 'Sin Categoria';
    }
  }
}
