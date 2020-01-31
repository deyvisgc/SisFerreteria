<?php


namespace App\Http\Repositorios;


use App\Http\Interfaces\OfertasInterface;
use App\Modelos\Ofertas;
use DB;
use Request;
class OfertaRepository implements OfertasInterface
{
    /**
     * @var Ofertas
     */
    private $ofertas;

    /**
     * OfertaRepository constructor.
     * @param Ofertas $ofertas
     */
    public function __construct(Ofertas $ofertas)
    {
        $this->ofertas = $ofertas;
    }

    public function listar()
    {
        return  DB::table('ofertas as of')
            ->join('productos as p','of.Productos_idProductos','=','p.idProductos')
            ->where('of.estado_oferta','=',1)
            ->select('of.nombre_oferta','of.precio_oferta','of.fecha_ini_oferta','of.Imagen_Oferta','of.fecha_fin_oferta','of.rango',
                'of.Descripcion_oferta','of.estado_oferta','p.idProductos','p.Nombre_Productos')
            ->get();
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $oferta=new $this->ofertas();
            $oferta->nombre_oferta=$data->nombre_oferta;
            $oferta->precio_oferta=$data->precio_Ofer;
            $oferta->Productos_idProductos=$data->productos;
            $oferta->fecha_ini_oferta=$data->fecha_ini;
            $oferta->fecha_fin_oferta=$data->fecha_fin;
            $oferta->Descripcion_oferta=$data->descripcion;
            $oferta->estado_oferta=1;
            $oferta->rango=1;
            if($oferta->Imagen_Oferta==null){
                if (Request::hasFile('fotoOferta')) {
                    $file = Request::file('fotoOferta');
                    $file->move(public_path() . '/Imagenes/Ofertas/', $file->getClientOriginalName());
                    $oferta->Imagen_Oferta =  $file->getClientOriginalName();
                }
            } else{
                $oferta->Imagen_Oferta='imagen-default.jpg';
            }
            $oferta->save();
            DB::commit();
            $data1['succes']=true;
        } catch (Exception $e) {
            DB::rollback();
        }
        return $data1;
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
