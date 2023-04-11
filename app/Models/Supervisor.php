<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supervisor extends Model
{
    use SoftDeletes;
    protected $table = 'supervisors';
    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'cuit'
    ];

    public function area()//muchos supervisors un area
    {
        return $this->belongsTo(Area::class,'area_id','id');
    }

    public function pedidos()//un supervisor muchos pedidos
    {
        return $this->hasMany(Pedido::class,'supervisor_id','id');
    }
}
