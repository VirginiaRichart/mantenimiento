<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;
    protected $table = 'empleados';
    protected $fillable = [
        'cuit',
        'nombre',
        'apellido',
        'correo',
        'telefono'
    ];

    public function pedido_empleados()//un empleado muchos pedido_empleados
    {
        return $this->hasMany(Pedido_empleado::class,'empleado_id','id');
    }

}
