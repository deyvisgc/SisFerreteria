<?php


namespace App\Http\Repositorios;
use App\Http\Interfaces\BuscarInterface;
use Tecactus\Reniec\DNI;
/**
protected  $dni;
 */

class BuscarRepository implements BuscarInterface
{
    /**
     * @var DNI
     */
    protected  $dni;

    function __construct()
    {
        $this->dni=new DNI('ygvNiDt0mqi2CDxmC6V90Ne0HuqwiVLph8yuUZdS');
    }
    public function Buscardni($data)
    {
        return $this->dni->get($data,true);
    }

    public function Buscarruc($ruc)
    {
        $endpoint = "https://api.migoperu.pe/api/v1/ruc";
        $token = "5c252e7e-297e-4389-9990-3953ba183e90-dfc02fa6-538a-4aa2-b1c8-efee4730fdda";
        $data = array(
            "token"	=> $token,
            "ruc"   => $ruc
        );
        $ch = curl_init($endpoint);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
            )
        );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        return json_decode($json, true);
    }
}
