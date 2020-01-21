<?php

namespace App\Http\Controllers\Sisadmin;

use App\Modelos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use DB;


class CategoriaController extends Controller
{
    public function index(Request $request){

        return view('SisAdmin.categorias.categorias');
    }
    public function getkus(){
        $cate = DB::select("select * from categoria");
        return Datatables::of($cate)->make(true);
    }
    public function store(Request $request){
        $categoria=new Modelos\Categorias();
        $categoria->Nombre_Categoria=$request->get('Nom_Cate');
        $categoria->Estado_categoria=1;
        $categoria->save();
        return response()->json(array("success"=>true));

    }
    public function show($id){
        $cate = Modelos\Categorias::find($id);
        return response()->json($cate);
    }
    public function update(Request $request,$id){
        $cate = Modelos\Categorias::find($id);
        $cate->Nombre_Categoria=$request->get('Nom_Cate');
        $cate->save();
        return response()->json(array("success"=>true));
    }

}
