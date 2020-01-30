<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected  $table="productos";
    protected $primaryKey="idProductos";
    public $timestamps=false;
    protected $fillable = [
        'Nombre_Productos','Precio_Productos','descripcion_Productos','categoria_idcategoria','Imagenes_idImagenes',
        'Stock_Productos','Estado_Producto','modelo_producto'
    ];
}
