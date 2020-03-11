<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    //protected $guarded = [];
    protected $table = "sheets";
     protected $fillable=['NombreInstructor', 'ApellidoInstructor', 'EstadoInstructor',
        'Competencia','FechaInicioProgramacion', 'FechaFinProgramacion',
        'HorasProgramadas','sheet_header_id']; 

    public function sheetHeader()
    {
        return $this->belongsTo(SheetHeader::class);
    }
}
