<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Ofertas extends Model
{
    protected  $table="ofertas";
    protected $primaryKey="idOfertas";
    public $timestamps=false;
    protected $fillable = [
        'nombre_oferta', 'precio_oferta','fecha_ini_oferta','Productos_idProductos','Imagen_Oferta','fecha_fin_oferta',
        'rango','Descripcion_oferta','estado_oferta'
    ];
}
