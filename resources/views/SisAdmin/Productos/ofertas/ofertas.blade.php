@extends('SisAdmin.Layaouts.header')

@section('contenido')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ofertas</font></font></h4>
                    <button type="button" data-toggle="modal" data-target="#CreCateModal" class="btn btn-icon btn-success"><i class="fas fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <table id="tbproducto" class="table">
                        <thead>
                        <tr>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Precio</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descripcion</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Imagen</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rango</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fecha Inicio</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fecha Fin</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Opciones</font></font></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div  class="loader" id="loader">Loading...</div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@endsection
