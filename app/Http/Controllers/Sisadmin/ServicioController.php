<?php

namespace App\Http\Controllers\Sisadmin;;

use App\Http\Controllers\Controller;
use App\Http\Repositorios\ProductoRepository;
use App\Http\Repositorios\ServicioRepositoy;
use App\Modelos\Servicios;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
class ServicioController extends Controller
{
    /**
     * @var ServicioRepositoy
     */
    private $repositoy;

    /**
     * ServicioController constructor.
     * @param ServicioRepositoy $repositoy
     * @param ProductoRepository $productoRepository
     */
    public function __construct(ServicioRepositoy $repositoy,ProductoRepository $productoRepository)
    {
        $this->repositoy = $repositoy;
        $this->productrepositoy = $productoRepository;
    }
    public function index(Request $request){
        $servi= $this->repositoy->listar();
        $per=DB::table('persona')->get();
        if ($request->ajax()){
            return Datatables::of($servi)
                ->addColumn('imagen', function ($pro){
                    $url= asset('Imagenes/Servicio/'.$pro->imagen_servicios);
                    return '<img src="'.$url.'"  height="60px" width="60px"/>';
                })->rawColumns(['imagen'])->make(true);
        }
        return view('SisAdmin.Productos.Servicios.Servicios',compact('per'));
    }
    public function store(Request $request){
        return response()->json($this->repositoy->crear($request));
    }
    public function listarserviciosprincipal(){
        $vista=$this->repositoy->listarserviciosprincipla();
        $product=$this->productrepositoy->listarproductoprincipal();
        return view('Principal.index',['vista'=>$vista,'produc'=>$product]);

    }
}
