<?php

namespace Devsheet\Spreadsheet\imports;

use Devsheet\Spreadsheet\models\Sheet;
use Devsheet\Spreadsheet\models\SheetHeader;
use Illuminate\Foundation\Http\FormRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

//use Maatwebsite\Excel\Concerns\ToModel;

class Spreadsheet implements ToCollection
{

    public function collection(Collection $rows)
    {
        // Obtener datos primera tabla 
        $code = $rows[1][1];
        $startDate = $rows[1][3];
        $endDate = $rows[1][5];
        $nombre = $rows[2][1];
        $centro = $rows[3][1];
        $municipio = $rows[4][1];
        $hp = $rows[5][1];
        $hj = $rows[6][1];
        $hpen = $rows[7][1];

        $header = SheetHeader::create([
            'ficha' => $code,
            'nombrePrograma' => $nombre,
            'centro' => $centro,
            'horasTotalesProgramadas' => $hp,
            'horasTotalesEjecutadas' => $hj,
            'horasTotalesPendientes' => $hpen,
            'fechaInicio' => $startDate,
            'fechaFin' => $endDate,   
        ]);

        $x = 0;
        $params = [];
        foreach ($rows as $row) 
        {
            if ($x >= 11) {
                $params = Sheet::create([
                    'NombreInstructor' => $row[0],
                    'ApellidoInstructor' => $row[1],
                    'EstadoInstructor' => $row[2],
                    'Competencia' => $row[3],
                    'FechaInicioProgramacion' => $row[4],
                    'FechaFinProgramacion' => $row[5],
                    'HorasProgramadas' => $row[6],
                    'reporte_instructor_header_id' => $header->id,
                ])->id;
            }
            $x++;
        }
    }
}