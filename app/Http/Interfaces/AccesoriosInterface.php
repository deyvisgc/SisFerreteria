<?php


namespace App\Http\Interfaces;


interface AccesoriosInterface
{
    public function listar();
    public function Crear($data);
    public function edit($id);
    public function actualizar($data,$id);
    public function delete($id);
    public function getaccesorios();
    public function cearAcceProducto($idacc,$idproduc);
    public function detalleAccesorios($id);
    public function deleteaccxusuario($idpro,$idacc);
}
