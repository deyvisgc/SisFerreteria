<?php

namespace App\Http\Controllers\Sisadmin;;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\OfertaRepository;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OfertaController extends Controller
{
    /**
     * @var OfertaRepository
     */
    private $repository;

    /**
     * OfertaController constructor.
     * @param OfertaRepository $repository
     */
    public function __construct(OfertaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request){
        $ofertas= $this->repository->listar();
        if ($request->ajax()){
            return Datatables::of($ofertas)
                ->addColumn('imagen', function ($pro){
                    $url= asset('Imagenes/Accesorios/'.$pro->ruta_imagen);
                    return '<img src="'.$url.'"  height="60px" width="60px"/>';
                })->rawColumns(['imagen'])->make(true);
        }
        return view('SisAdmin.Productos.ofertas.ofertas');
    }
}
