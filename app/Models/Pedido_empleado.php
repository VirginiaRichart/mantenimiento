<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido_empleado extends Model
{
    use SoftDeletes; 
    protected $table = 'pedido_empleados';
    /*protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'cuit'
    ];*/

    public function pedido()//muchos pedido_empleados un pedido
    {
        return $this->belongsTo(Pedido::class,'pedido_id','id');
    }

    public function empleado()//muchos pedido_empleados un empleado
    {
        return $this->belongsTo(Empleado::class,'empleado_id','id');
    }

    public function trabajo()//muchos pedido_empleados un trabajo
    {
        return $this->belongsTo(Trabajo::class,'trabajo_id','id');
    }

}
