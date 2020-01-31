<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected  $table="servicios";
    protected $primaryKey="idservicios";
    public $timestamps=false;
    protected $fillable = [
        'descrip_servici', 'imagen_servicios','Precio_servicio','Hora_servicio','Tipo_ser','id_tipo_persona',
        'rango','estado_servi'
    ];
}
