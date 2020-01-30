<?php


namespace App\Http\Interfaces;


interface ProductoInterface
{
public function Listar();
public function crear($data);
public function getproducto($id);
public function Actualizar($data,$id);
}
