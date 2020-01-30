<?php


namespace App\Http\Interfaces;


class OfertaRepository implements OfertasInterface
{

    public function listar()
    {
        return  DB::table('oferta as of')
            ->join('productos as p','of.Productos_idProductos','=','p.idProductos')
            ->where('of.estado_oferta','=',1)
            ->select('of.nombre_oferta','of.precio_oferta','of.fecha_ini_oferta','of.Imagen_Oferta','of.fecha_fin_oferta','of.rango',
                'of.Descripcion_oferta','of.estado_oferta','p.Nombre_Productos')
            ->get();
    }

    public function Sotore($data)
    {
        // TODO: Implement Sotore() method.
    }

    public function Edit($id)
    {
        // TODO: Implement Edit() method.
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }
}
