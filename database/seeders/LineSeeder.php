<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $lineas = array(
            array(
                1,
                "Área de Ciencia de la Educación - Formación e innovación pedagógica.",
            ),
            array(
                2,
                "Área de Ciencia de la Educación - Desarrollo Humano Integral.",
            ),
            array(
                3,
                "Área de Ciencia de la Educación - Educación Ambiental.",
            ),
            array(
                4,
                "Área de Ingeniería Agronómica - Ambiente, sustentabilidad y sostenibilidad.",
            ),
            array(
                5,
                "Área de Ingeniería Agronómica - Biotecnología y avances educativos aplicados al mejoramiento de producción Vegetal y Animal.",
            ),
            array(
                6,
                "Area de Ingeniería Agronómica - Las Organizaciones de Producción Social.",
            ),
            array(
                7,
                "Área de Ingeniería Agronómica - Participación y Producción  en el área agrícola Animal.",
            ),
            array(
                8,
                "Área de Ingeniería Agronómica - Participación y Producción en el área agrícola vegetal.",
            ),
            array(
                9,
                "Área de Ingeniería de Sistemas - Ingeniería de Software.",
            ),
            array(
                10,
                "Área de Ingeniería de Sistemas - Seguridad Informática.",
            ),
            array(
                11,
                "Área de Ingeniería de Sistemas - Edumática.",
            ),
            array(
                12,
                "Área de Ingeniería de Sistemas - Arquitectura del Hardware.",
            ),
            array(
                13,
                "Área de Ingeniería de Sistemas - Ingeniería de proyecto.",
            ),
            array(
                14,
                "Área de Ingeniería de Sistemas - Redes y telecomunicaciones.",
            ),
            array(
                15,
                "Área de Ingeniería de Sistemas - Análisis de datos.",
            ),
            array(
                16,
                "Área de Humanidades, letras y artes - Teoría y Método.",
            ),
            array(
                17,
                "Área de Humanidades, letras y artes - Historia social.",
            ),
            array(
                18,
                "Área de Humanidades, letras y artes - Historia Cultural.",
            ),
        );

        Line::truncate();
        foreach ($lineas as $linea) {
            Line::create([
                'id' => $linea[0],
                'name' => $linea[1],
            ]);
        }
    }
}
