<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;
    protected $table = 'pedidos';
    protected $fillable = [
        'numero',
        'fecha',
        'descripcion'
    ];

    public function supervisor()//muchos pedidos un supervisor
    {
        return $this->belongsTo(Supervisor::class,'supervisor_id','id');
    }

    public function estado()//muchos pedidos un supervisor
    {
        return $this->belongsTo(Estado::class,'estado_id','id');
    }

    //uno a uno
    public function trabajo()
    {
        return $this->hasOne(Trabajo::class, 'pedido_id', 'id');
    }
}
