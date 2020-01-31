<?php


namespace App\Http\Interfaces;


interface OfertasInterface
{
  public function listar();
  public function store($data);
  public function Edit($id);
  public function update($request,$id);
}
