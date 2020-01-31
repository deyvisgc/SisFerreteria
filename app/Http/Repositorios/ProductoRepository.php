<?php


namespace App\Http\Repositorios;
use App\Http\Interfaces\ProductoInterface;
use App\Modelos\Imagen;
use App\Modelos\Producto;
use DB;
use Request;
class ProductoRepository implements ProductoInterface
{
    /**
     * @var Producto
     */
    private $producto;
    /**
     * @var Imagen
     */
    private $imagen;

    /**
     * ProductoRepository constructor.
     * @param Producto $producto
     * @param Imagen $imagen
     */
    public function __construct(Producto $producto,Imagen $imagen)
    {
        $this->producto = $producto;
        $this->imagen = $imagen;
    }

    public function Listar()
    {
        // TODO: Implement Listar() method.
    }

    public function crear($data)
    {
        try {
            DB::beginTransaction();
             $imagen=new $this->imagen();

            if($imagen->ruta_imagen==null){
                if (Request::hasFile('imagen1')) {
                    $file = Request::file('imagen1');
                    $file->move(public_path() . '/Imagenes/Productos/', $file->getClientOriginalName());
                    $imagen->ruta_imagen =  $file->getClientOriginalName();
                }
                } else{
                $imagen->ruta_imagen='imagen-default.jpg';
                }
                 $imagen->save();
                $producto=new $this->producto();
                $producto->Nombre_Productos=$data->get('nombreProducto');
                $producto->categoria_idcategoria=$data->get('cate');
                $producto->Precio_Productos=$data->get('precio');
                $producto->Stock_Productos=$data->get('cantidad');
               $producto->descripcion_Productos=$data->get('descripcion');
               $producto->modelo_producto=$data->get('modelo');
               $producto->Imagenes_idImagenes= $imagen->idImagenes;
               $producto->Estado_Producto=1;
               $producto->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return response()->json('succes');

    }


    public function getproducto($id)
    {
         $produc=Db::table('productos as p')
            ->join('categoria as ca','p.categoria_idcategoria','=','ca.idcategoria')
            ->join('imagenes as im','p.Imagenes_idImagenes','=','im.idImagenes')
            ->select('p.Nombre_Productos','p.Precio_Productos','p.Stock_Productos','p.descripcion_Productos',
                'p.modelo_producto','im.ruta_imagen','p.categoria_idcategoria','p.idProductos','im.idImagenes')
            ->where('idProductos','=',$id)
            ->get();
         $cate=Db::table('categoria')->where('Estado_categoria','=',1)->get();
          return array('produc'=>$produc,'cate'=>$cate);
    }

    public function Actualizar($data,$id)
    {
        try {
            DB::beginTransaction();
            $image=Imagen::find($data->idimagen);
            $image_path="Imagenes/Productos/$image->ruta_imagen";
            if(\File::exists(Public_path($image_path))){
                \File::delete(Public_path($image_path));
            }
            if (Request::hasFile('imagen')) {
                $file = Request::file('imagen');
                $file->move(public_path() . '/Imagenes/Productos/', $file->getClientOriginalName());
                $image->ruta_imagen =  $file->getClientOriginalName();
            }
            $image->save();
            $producto=Producto::find($id);
            $producto->Nombre_Productos=$data->get('nombreProducto');
            $producto->categoria_idcategoria=$data->get('cate');
            $producto->Precio_Productos=$data->get('precio');
            $producto->Stock_Productos=$data->get('cantidad');
            $producto->descripcion_Productos=$data->get('descripcion');
            $producto->modelo_producto=$data->get('modelo');
            $producto->Imagenes_idImagenes= $image->idImagenes;
            $producto->Estado_Producto=1;
            $producto->save();
            DB::commit();
            $data['succes']=true;
        } catch (Exception $e) {
            DB::rollback();
        }
        return $data;
    }
    public function listarproductoprincipal(){
        return DB::select("select p.Nombre_Productos,p.Precio_Productos,im.ruta_imagen,p.idProductos from productos as p, imagenes as im where p.rango BETWEEN 3 AND 5 and p.Imagenes_idImagenes=im.idImagenes");
    }

}
