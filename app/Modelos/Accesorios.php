<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Accesorios extends Model
{
    protected  $table="accesorios";
    protected $primaryKey="id_Accesorios";
    public $timestamps=false;
    protected $fillable = [
        'nombre_accesorio', 'id_imagen','precio_acc','modelo_acc','esta_acce','cantidad_acc'
    ];

}
