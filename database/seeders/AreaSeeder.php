<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = array(
            array(
                1,
                "Ingeniería en Sistema - Programa de Ingeniería en Informática ",
            ),
            array(
                2,
                "Ingeniería en Sistemas - Programa de Ingeniería en Electrónica ",
            ),
            array(
                3,
                "Área de Arquitectura, Ingeniería y tecnología - Programa de Ingeniería Industrial ",
            ),
            array(
                4,
                "Área de Arquitectura, Ingeniería y tecnología - Programa de Ingeniería en Hidrocarburos Mención Gas ",
            ),
            array(
                5,
                "Área de Arquitectura, Ingeniería y tecnología - Programa de Ingenieria Mención Petróleo ",
            ),
            array(
                6,
                "Área de Arquitectura, Ingeniería y tecnología - Programa de Ingeniería Civil ",
            ),
            array(
                7,
                "Medicina Veterinaria ",
            ),
            array(
                8,
                "Odontología ",
            ),
            array(
                9,
                "Ciencias Políticas y Jurídicas - Programa Municipalizado de Derecho ",
            ),
            array(
                10,
                "Área de Ciencias de la Educación - Programa de Educación Mención Computación ",
            ),
            array(
                11,
                "Área de Ciencias de la Educación - Programa de Educación Mención Integral",
            ),
            array(
                12,
                "Ingeniería Agronómica - Programa de Producción Vegetal",
            ),
            array(
                13,
                "Área de Ciencias de la Educación - Programa de Educación Mención Animal",
            ),
            array(
                14,
                "Ciencias Económicas y Sociales - Programa de administración ",
            ),
            array(
                15,
                "Ciencias Económicas y Sociales - Programa de Comunicación Social ",
            ),
            array(
                16,
                "Ciencias Económicas y Sociales - Programa de Economía ",
            ),
            array(
                17,
                "Ciencias Económicas y Sociales - Programa de Contaduría ",
            ),
            array(
                18,
                "Ciencias Económicas y Sociales - Programa de Contaduría ",
            ),
            array(
                19,
                "PNF",
            ),
            array(
                20,
                "CIESA",
            ),
            array(
                21,
                "CENSA",
            ),
            array(
                22,
                "CEIMUJER",
            ),
            array(
                23,
                "IDESSA",
            ),
        );

        Area::truncate();
        foreach ($areas as $area) {
            Area::create([
                'id' => $area[0],
                'name' => $area[1],
            ]);
        }
    }
}
