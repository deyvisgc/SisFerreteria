<?php


namespace App\Http\Interfaces;


interface OfertasInterface
{
  public function listar();
  public function Sotore($data);
  public function Edit($id);
  public function update($request,$id);
}
