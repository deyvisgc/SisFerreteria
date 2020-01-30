@extends('SisAdmin.Layaouts.header')
@section('contenido')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categorias</font></font></h4>
                   <button type="button" data-toggle="modal" data-target="#CreCateModal" class="btn btn-icon btn-success"><i class="fas fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <table id="tbcategoria" class="table">
                        <thead>
                        <tr>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Operaciones</font></font></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuarios</font></font></h4>
                    <button type="button" data-toggle="modal" data-target="#CreCateModal" class="btn btn-icon btn-success"><i class="fas fa-plus"></i></button>

                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></th>
                                <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rol</font></font></th>
                                <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Usuario</font></font></th>
                                <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Operaciones</font></font></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></th>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">marca</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Otón</font></font></td>
                                <td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">@mdo</font></font></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="CreCateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form class="forms-sample updamcate">
                        <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Categoria</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="update_Cate" name="Nom_Cate" placeholder="Escribia aqui.....">

                            </div>
                            <input type="hidden" class="form-control" id="id_Cate" placeholder="Escribia aqui.....">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="update();">Guardar</button>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    <script>
        var tabla;
        $(document).ready( function () {
           tabla= $('#tbcategoria').DataTable({
                processing: false,
                serverSide: true,
                ajax: "{{ url('categorias1') }}",
                columns: [
                    { data: 'Nombre_Categoria', name: 'Nombre_Categoria' },
                    {mRender: function(data, type, row) {
                            if(row.Estado_categoria==1){
                                return '<div class="badge badge-warning">Activo</div>'
                            }else{
                                return '<div class="badge badge-danger">Desactivo</div>'
                            }
                        }
                    },
                    {mRender: function(data, type, row) {
                            return '<button type="button" onclick="Actualizar('+row.idcategoria+')" class="btn btn-outline-success btn-fw">Actualizar</button>'+
                                '<button type="button" onclick="Eliminar('+row.idcategoria+')"  class="btn btn-outline-danger btn-fw">Eliminar</button>'



                        }
                    },
                ],
               destroy: true,
               order: [[1, "asc"]],
               language: {
                   decimal: "",
                   emptyTable: "No hay información",
                   info: "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                   infoEmpty: "Mostrando 0 to 0 of 0 Entradas",
                   infoFiltered: "(Filtrado de _MAX_ total entradas)",
                   infoPostFix: "",
                   thousands: ",",
                   lengthMenu: "Mostrar _MENU_ Entradas",
                   loadingRecords: "Cargando...",
                   processing: "Procesando...",
                   search: "Buscar:",
                   zeroRecords: "Sin resultados encontrados",
                   paginate: {
                       first: "Primero",
                       last: "Ultimo",
                       next: "Siguiente",
                       previous: "Anterior"
                   }
               }
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
                    $('#id_Cate').val(data.idcategoria);

                }
            })

        }
function update() {
 var id=$('#id_Cate').val();
    var frm=$('.updamcate');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'{{url('categorias')}}/'+id,
        type:'put',
        data:frm.serialize(),
        dataType:'json',
        success:function (data) {
            console.log(data);
            if(data.success==true){
                iziToast.success({
                    title: 'OK',
                    message: ' actualizado correctamente!',
                });

                console.log(data);
                tabla.ajax.reload( null, false );
                $('#actmodal').modal('hide');
            }else{
                alert('no se pudo crear');
            }


        }
    })
}
    </script>
    @endsection
