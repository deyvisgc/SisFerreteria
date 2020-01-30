<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected  $table="imagenes";
    protected $primaryKey="idImagenes";
    public $timestamps=false;
    protected $fillable = [
        'ruta_imagen',
    ];
}
