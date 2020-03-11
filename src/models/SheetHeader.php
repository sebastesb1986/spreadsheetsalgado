<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SheetHeader extends Model
{
    // protected $guarded = [];
    protected $table = "sheetheaders";
     protected $fillable=['ficha', 'nombrePrograma', 'centro', 'horasTotalesProgramadas',
       'horasTotalesEjecutadas', 'horasTotalesPendientes', 'fechaInicio', 'fechaFin']; 

    public function sheet()
    {
        return $this->hasMany(Sheet::class);
    }
}
