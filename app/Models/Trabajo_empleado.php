<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabajo_empleado extends Model
{
    use SoftDeletes;
    protected $table = 'trabajo_empleados';
    /*protected $fillable = [
        'descripcion',
        'fecha_inicio',
        'fecha_fin'
    ];*/

    public function empleado()//muchos trabajo_empleados un empleado
    {
        return $this->belongsTo(Empleado::class,'empleado_id','id');
    }

}
