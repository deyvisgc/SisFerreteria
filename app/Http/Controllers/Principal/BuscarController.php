<?php

namespace App\Http\Controllers\Principal;

use App\Http\Controllers\Controller;
use App\Http\Repositorios\BuscarRepository;
use Illuminate\Http\Request;
use Tecactus\Reniec\DNI;
class BuscarController extends Controller
{
    /**
     * @var BuscarRepository
     */
    private $repository;

    /**
     * BuscarController constructor.
     * @param BuscarRepository $repository
     */
    public function __construct(BuscarRepository $repository)
    {

        $this->repository = $repository;
    }

    public function buscardni(Request $request){
     $dni = $request->get('dni');
     $reniec = new \jossmp\reniec\padron();
    // $jne = new \jossmp\jne\rop();
     $search1 = $reniec->consulta( $dni );
     if( $search1->success == true )
     {
         return $search1->json(); // para llamadas desde JS
     }
 }
 public function Buscarruc(Request $request){
     $ruc = $request->get('ruc');
     return response()->json($this->repository->Buscarruc($ruc));

 }
}
