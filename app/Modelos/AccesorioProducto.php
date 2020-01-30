<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class AccesorioProducto extends Model
{
    protected  $table="acesorio_producto";
    protected $primaryKey="id_Acceso_Prod";
    public $timestamps=false;
    protected $fillable = [
        'id_accesorio', 'id_producto',
    ];
}
