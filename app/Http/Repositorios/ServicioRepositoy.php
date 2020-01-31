<?php


namespace App\Http\Repositorios;


use App\Http\Interfaces\SevicioInterface;
use App\Modelos\Servicios;
use DB;
use Request;
class ServicioRepositoy implements SevicioInterface
{

    public function listar()
    {
        return  DB::table('servicios as ser')
            ->join('persona as p','ser.id_tipo_persona','=','p.id_Persona')
            ->where('ser.estado_servi','=',1)
            ->select('ser.*','p.nombre_per')
            ->get();
    }

    public function crear($data)
    {
        try {
            DB::beginTransaction();
            $oferta=new Servicios();
            $oferta->descrip_servici=$data->descripcion_serv;
            $oferta->Precio_servicio=$data->precio_ser;
            $oferta->Hora_servicio=$data->hora_Ser;
            $oferta->Tipo_ser=$data->tiposer;
            $oferta->id_tipo_persona=$data->maestro;
            $oferta->rango=1;
            $oferta->estado_servi=1;
            if($oferta->imagen_servicios==null){
                if (Request::hasFile('fotoSer')) {
                    $file = Request::file('fotoSer');
                    $file->move(public_path() . '/Imagenes/Servicio/', $file->getClientOriginalName());
                    $oferta->imagen_servicios =  $file->getClientOriginalName();
                }
            } else{
                $oferta->imagen_servicios='imagen-default.jpg';
            }
            $oferta->save();
            DB::commit();
            $data1['succes']=true;
        } catch (Exception $e) {
            DB::rollback();
        }
        return $data1;
    }
    public function listarserviciosprincipla(){
        return DB::select("select servicios.imagen_servicios,servicios.descrip_servici,servicios.Precio_servicio,servicios.Hora_servicio,servicios.rango,tipo_servicio.nombre_tipo_servicio,concat(persona.nombre_per,' ',persona.apellidos_per) as nombres,persona.telefono_per FROM servicios,tipo_servicio,persona WHERE servicios.id_Tipo_ser=tipo_servicio.id_tipo_servicio and servicios.id_tipo_persona=persona.id_Persona LIMIT 4");
    }
}
