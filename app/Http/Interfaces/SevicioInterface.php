<?php


namespace App\Http\Interfaces;


use http\Env\Request;

interface SevicioInterface
{
  public function listar();
  public function crear($data);
  public function listarserviciosprincipla();
}
