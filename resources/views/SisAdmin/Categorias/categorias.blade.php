@extends('SisAdmin.Layaouts.header')
@section('contenido')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Historial Categorias</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <div id="order-listing_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <button type="button" id="registrarcate" title="Nueva Categoria" class="btn btn-inverse-success btn-icon" data-toggle="modal" data-target="#CrearModal">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <div class="col-sm-12">
                                    <table id="tbcategoria" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="order-listing" aria-sort="ascending" aria-label="Order #: activate to sort column descending" >Nombre</th>
                                            <th class="sorting" tabindex="0" aria-controls="order-listing"  aria-label="Purchased On: activate to sort column ascending" >Estado</th>
                                            <th class="sorting" tabindex="0" aria-controls="order-listing"  aria-label="Actions: activate to sort column ascending">Acciones</th></tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="CrearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form class="forms-sample frmcate">
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Categoria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="Nom_Cate" name="Nom_Cate" placeholder="Escribia aqui.....">
                                <div class="text-danger" id="nomcategoria"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade updamodal" id="actmodal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form class="forms-sample frmcate">
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Categoria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="update_Cate" name="Nom_Cate" placeholder="Escribia aqui.....">

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script>

        $(document).ready( function () {
            var tabla;
           tabla= $('#tbcategoria').DataTable({
                processing: false,
                serverSide: true,
                ajax: "{{ url('categorias1') }}",
                columns: [
                    { data: 'Nombre_Categoria', name: 'Nombre_Categoria' },
                    {
                        mRender: function(data, type, row) {
                            if(row.Estado_categoria==1){
                                return '<div class="badge badge-warning">Activo</div>'
                            }else{
                                return '<div class="badge badge-danger">Desactivo</div>'
                            }

                        }
                    },
                    {
                        mRender: function(data, type, row) {
                            return '<button type="button" onclick="Actualizar('+row.idcategoria+')" class="btn btn-outline-success btn-fw">Actualizar</button>'+
                                '<button type="button" onclick="Eliminar('+row.idcategoria+')"  class="btn btn-outline-danger btn-fw">Eliminar</button>'



                        }
                    },
                ]
            });
            $('#guardar').click(function (e) {
                var frm=$('.frmcate');
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url:'{{url('categorias')}}',
                type:'post',
                dataType:'json',
                data:frm.serialize(),
                success:function (data) {
                    if(data.success==true){
                        alert('registrado correctamente');
                        console.log(data);
                        tabla.ajax.reload( null, false );
                    }else{
                        alert('no se pudo crear');
                    }


                }
            })
            })
        });
        function Actualizar(id) {
            $('#actmodal').modal({ show: true });
            $.ajax({
                url:'{{url('categorias')}}/'+id,
                type:'get',
                dataType:'json',
                success:function (data) {
                    console.log(data);
                    $('#update_Cate').val(data.Nombre_Categoria);

                }
            })

        }
    </script>
    @endsection
