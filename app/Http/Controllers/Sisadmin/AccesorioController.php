<?php

namespace App\Http\Controllers\Sisadmin;

use App\Http\Controllers\Controller;
use App\Http\Repositorios\AccesoriosRepository;
use App\Modelos\AccesorioProducto;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;
class AccesorioController extends Controller
{
    /**
     * @var AccesoriosRepository
     */
    private $repository;

    /**
     * AccesorioController constructor.
     * @param AccesoriosRepository $repository
     */
    public function __construct(AccesoriosRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request){
        $acc=DB::table('accesorios as ac')
            ->join('imagenes as im','ac.id_imagen','=','im.idImagenes')
            ->where('ac.esta_acce','=',1)
            ->select('ac.nombre_accesorio','ac.precio_acc','ac.id_Accesorios','ac.modelo_acc','ac.esta_acce','ac.cantidad_acc','im.ruta_imagen')
            ->get();
        if ($request->ajax()){
            return Datatables::of($acc)
                ->addColumn('imagen', function ($acceso){
                    $url= asset('Imagenes/Accesorios/'.$acceso->ruta_imagen);
                    return '<img src="'.$url.'"  height="60px" width="60px"/>';
                })->rawColumns(['imagen'])->make(true);
        }
        return view('SisAdmin.Productos.accesorios.accesorio');
    }
    public function store(Request $request){
        return response()->json($this->repository->Crear($request));
    }
    public function getAccesorios(){
        return response()->json($this->repository->getaccesorios());

    }
    public function crearr(Request $request){
        $idaccesorio=$request->idaccesorio;
        $id=$request->id;
        return response()->json($this->repository->cearAcceProducto($idaccesorio,$id));
    }
    public function show($id){
        return response()->json($this->repository->edit($id));
    }
    public function UpdateAccesorios(Request $request,$id){
        return response()->json($this->repository->actualizar($request,$id));
    }
    public function detalleAccesorios($id){

       $accesorio= $this->repository->detalleAccesorios($id);
        return Datatables::of($accesorio)
            ->addColumn('imagen', function ($pro){
                $url= asset('Imagenes/Accesorios/'.$pro->ruta_imagen);
                return '<img src="'.$url.'"  height="60px" width="60px"/>';
            })->rawColumns(['imagen'])->make(true);

    }
    public function DeleteAccesXPro(Request $request){
        $idpro= $request->idpro;
        $idacc= $request->idacc;
        return response()->json($this->repository->deleteaccxusuario($idpro,$idacc));

    }
}
