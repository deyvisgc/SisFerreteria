<?php


namespace App\Http\Repositorios;


use App\Modelos\AccesorioProducto;
use App\Modelos\Accesorios;
use App\Http\Interfaces\AccesoriosInterface;
use App\Modelos\Imagen;
use Request;
use DB;
use phpDocumentor\Reflection\Types\This;
use Yajra\DataTables\DataTables;

class AccesoriosRepository implements AccesoriosInterface
{
    /**
     * @var Accesorios
     */
    private $accesorios;
    /**
     * @var Imagen
     */
    private $imagen;
    /**
     * @var AccesorioProducto
     */
    private $accesorioProducto;

    /**
     * AccesoriosRepository constructor.
     * @param Accesorios $accesorios
     * @param Imagen $imagen
     * @param AccesorioProducto $accesorioProducto
     */
    public function __construct(Accesorios $accesorios,Imagen $imagen,AccesorioProducto $accesorioProducto)
    {
        $this->accesorios = $accesorios;
        $this->imagen = $imagen;
        $this->accesorioProducto = $accesorioProducto;
    }

    public function listar()
    {
        // TODO: Implement listar() method.
    }

    public function Crear($data)
    {
        try {
            DB::beginTransaction();
            $imagen=new $this->imagen();
            if($imagen->ruta_imagen==null){
                if (Request::hasFile('fotoAccesorio')) {
                    $file = Request::file('fotoAccesorio');
                    $file->move(public_path() . '/Imagenes/Accesorios/', $file->getClientOriginalName());
                    $imagen->ruta_imagen =  $file->getClientOriginalName();
                }
            } else{
                $imagen->ruta_imagen='imagen-default.jpg';
            }
            $imagen->save();
            $accesorio=new $this->accesorios();
            $accesorio->nombre_accesorio=$data->nombre_Acce;
            $accesorio->id_imagen=$imagen->idImagenes;;
            $accesorio->precio_acc=$data->precio_Acc;;
            $accesorio->modelo_acc=$data->modelo_Acc;
            $accesorio->cantidad_acc=$data->cantidad_Acc;
            $accesorio->esta_acce=1;
            $accesorio->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return response()->json('succes');
    }

    public function edit($id)
    {
      return  $acc=DB::table('accesorios as ac')
            ->join('imagenes as im','ac.id_imagen','=','im.idImagenes')
            ->where('ac.esta_acce','=',1)
             ->where('ac.id_Accesorios','=',$id)
            ->select('ac.nombre_accesorio','ac.precio_acc','ac.id_Accesorios','ac.modelo_acc','ac.esta_acce','ac.cantidad_acc','im.ruta_imagen','im.idImagenes')
            ->get();
    }
    public function cearAcceProducto($idacc,$idpro){
        $my_array = json_decode($idacc,true);
        $dataArr = is_array($my_array) ? $my_array : array($my_array);
        foreach ($dataArr as $idacc)
        {
            for ($i=0; $i <= intval($idacc["size"]) - 1; $i++) {
                AccesorioProducto::create([
                    'id_producto'=>$idpro,
                    'id_accesorio'=>$idacc['id'][$i]['id']
                ]);
            }
        }
        $data['succes']=true;
        return $data;
    }

    public function actualizar($data, $id)
    {
        try {
            DB::beginTransaction();
            $image=Imagen::find($data->idimagen);
            if($data->fotoAccesorio==null){
                $accesorio=$this->accesorios->find($id);
                $accesorio->nombre_accesorio=$data->update_nombre_Acce;
                $accesorio->id_imagen=$image->idImagenes;
                $accesorio->precio_acc=$data->update_precio_Acc;;
                $accesorio->modelo_acc=$data->update_modelo_Acc;
                $accesorio->cantidad_acc=$data->update_cantidad_Acc;
                $accesorio->save();
                DB::commit();
            }else{
                $image_path="Imagenes/Accesorios/$image->ruta_imagen";
                if(\File::exists(Public_path($image_path))){
                    \File::delete(Public_path($image_path));
                }
                if (Request::hasFile('fotoAccesorio')) {
                    $file = Request::file('fotoAccesorio');
                    $file->move(public_path() . '/Imagenes/Accesorios/', $file->getClientOriginalName());
                    $image->ruta_imagen =  $file->getClientOriginalName();
                }
                $image->save();
                $accesorio=$this->accesorios->find($id);
                $accesorio->nombre_accesorio=$data->update_nombre_Acce;
                $accesorio->id_imagen=$image->idImagenes;;
                $accesorio->precio_acc=$data->update_precio_Acc;;
                $accesorio->modelo_acc=$data->update_modelo_Acc;
                $accesorio->cantidad_acc=$data->update_cantidad_Acc;
                $accesorio->save();
            }
            $data['succes']=true;
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        return $data;

    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
    public function getaccesorios(){
        return $cate=$this->accesorios->where('esta_acce','=',1)->get();
    }

    public function detalleAccesorios($id)
    {
      return  DB::table('acesorio_producto as acp')
            ->join('accesorios as ac','acp.id_accesorio','=','ac.id_Accesorios')
            ->join('productos as p','acp.id_producto','=','p.idProductos')
             ->join('imagenes as im','ac.id_imagen','=','im.idImagenes')
             ->where('acp.id_producto','=',$id)
            ->select('ac.nombre_accesorio','ac.modelo_acc','im.ruta_imagen','acp.id_accesorio','acp.id_producto','p.Nombre_Productos')
            ->get();
    }
    public function deleteaccxusuario($idpro,$idacc){

        $data= $this->accesorioProducto->where('id_producto','=',$idpro)->where('id_accesorio','=',$idacc)->delete();
        if ($data==true){
            return $data1['succes']=true;
        }else{
            return $data1['error']=false;
        }

    }
}
