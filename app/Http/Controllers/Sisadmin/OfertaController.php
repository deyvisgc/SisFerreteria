<?php

namespace App\Http\Controllers\Sisadmin;;

use App\Http\Controllers\Controller;
use App\Http\Repositorios\OfertaRepository;
use App\Modelos\Producto;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OfertaController extends Controller
{
    /**
     * @var OfertaRepository
     */
    private $repository;
    /**
     * @var Producto
     */
    private $producto;

    /**
     * OfertaController constructor.
     * @param OfertaRepository $repository
     * @param Producto $producto
     */
    public function __construct(OfertaRepository $repository,Producto $producto)
    {
        $this->repository = $repository;
        $this->producto = $producto;
    }

    public function index(Request $request){
        $ofertas= $this->repository->listar();
        $producto=$this->producto->where('Estado_Producto','=',1)->get();
        if ($request->ajax()){
            return Datatables::of($ofertas)
                ->addColumn('imagen', function ($pro){
                    $url= asset('Imagenes/Ofertas/'.$pro->Imagen_Oferta);
                    return '<img src="'.$url.'"  height="60px" width="60px"/>';
                })->rawColumns(['imagen'])->make(true);
        }
        return view('SisAdmin.Productos.ofertas.ofertas',compact('producto'));
    }
    public function store(Request $request){
        return response()->json($this->repository->store($request));
    }
}
