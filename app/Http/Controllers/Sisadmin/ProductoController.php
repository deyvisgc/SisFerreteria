<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Sisadmin;
use App\Http\Controllers\Controller;
use App\Http\Repositorios\ProductoRepository;
use App\Modelos\Categorias;
use App\Modelos\Producto;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
class ProductoController extends Controller
{
    /**
     * @var ProductoRepository
     */
    private $repository;


    /**
     * ProductoController constructor.
     * @param ProductoRepository $repository
     */
    public function __construct(ProductoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request){
        $cate=Db::table('categoria')->where('Estado_categoria','=',1)->get();
        $producto=DB::table('productos as pr')
             ->join('categoria as ca','pr.categoria_idcategoria','=','ca.idcategoria')
             ->join('imagenes as im','pr.Imagenes_idImagenes','=','im.idImagenes')
             ->where('pr.Estado_Producto','=',1)
             ->select('pr.Nombre_Productos','pr.Precio_Productos','pr.idProductos','pr.descripcion_Productos','ca.Nombre_Categoria','im.ruta_imagen', 'pr.Stock_Productos','pr.Estado_Producto')
              ->get();
    if ($request->ajax()){
        return Datatables::of($producto)
            ->addColumn('imagen', function ($pro){
                $url= asset('Imagenes/Productos/'.$pro->ruta_imagen);
                return '<img src="'.$url.'"  height="60px" width="60px"/>';
            })->rawColumns(['imagen'])->make(true);
    }
    return view('SisAdmin.Productos.productos',['cate'=>$cate]);
}
public function store(Request $request){
        return response()->json($this->repository->crear($request));
}
public function show($id){
    return response()->json($this->repository->getproducto($id));

}
public function actualizar(Request $request,$id){
    return response()->json($this->repository->Actualizar($request,$id));
}

}
