<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabajo extends Model
{
    use SoftDeletes;
    protected $table = 'trabajos';
    protected $fillable = [
        'descripcion',
        'fecha_inicio',
        'fecha_fin'
    ];

    public function trabajo_empleados()//un trabajo muchos trabajo:empleado
    {
        return $this->hasMany(Trabajo_empleado::class,'trabajo_id','id');
    }

    public function pedido()//un trabajo muchos trabajo:empleado
    {
        return $this->hasMany(Trabajo_empleado::class,'trabajo_id','id');
    }

    //uno a uno
    public function pedidoUno()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id','id');
    }
   
}
