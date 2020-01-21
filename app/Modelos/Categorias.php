<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected  $table="categoria";
    protected $primaryKey="idcategoria";
    public $timestamps=false;
    protected $fillable = [
        'Nombre_Categoria', 'Estado_categoria',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


}
