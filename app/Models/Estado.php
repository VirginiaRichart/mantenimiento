<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes;
    protected $table = 'estados';
    protected $fillable = [
        'descripcion'
    ];

    public function pedidos()//un estado muchos pedidos
    {
        return $this->hasMany(Pedido::class,'estado_id','id');
    }

    public function trabajo_empleados()//un empleado muchos trabajo_empleado
    {
        return $this->hasMany(Trabajo_empleado::class,'empleado_id','id');
    }

}
