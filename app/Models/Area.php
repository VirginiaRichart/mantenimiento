<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;
    protected $table = 'areas';
    protected $fillable = [
        'nombre'
    ];

    public function supervisors()//un area muchos supervisores
    {
        return $this->hasMany(Supervisor::class,'area_id','id');
    }
}
