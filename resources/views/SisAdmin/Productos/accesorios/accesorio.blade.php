@extends('SisAdmin.Layaouts.header')
@section('contenido')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Acecesorios</font></font></h4>
                    <button type="button" data-toggle="modal" data-target="#CrerAccesorios" class="btn btn-icon btn-success"><i class="fas fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <table id="tbAccesorios" class="table">
                        <thead>
                        <tr>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Precio</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Modelo</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cantidad</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Imagen</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Operaciones</font></font></th>
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
    <!-- Modal -->
    <!-- Modal -->
    @include('SisAdmin.modals.modalsAccesorios')

@endsection
@section('scripts')
    <script>
        var table;
        var idacc;
        var idimagen;
        $(document).ready(function () {
            document.getElementById('loader').style.display = 'none';
            table = $('#tbAccesorios').dataTable({
                stateSave: true,
                responsive: true,
                processing: false,
                serverSide: true,
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Ningún dato disponible en esta tabla",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                },
                ajax: '{{url('Accesorios')}}',
                columns: [
                    {data: 'nombre_accesorio', name: 'nombre_accesorio'},
                    {data: 'precio_acc', name: 'precio_acc'},
                    {data: 'modelo_acc', name: 'modelo_acc'},
                    {data: 'cantidad_acc', name: 'cantidad_acc'},
                    {data: 'imagen', name: 'imagen', orderable: true, searchable: true},
                    {data: 'esta_acce', name: 'esta_acce'},
                    {
                        mRender: function (data, type, row) {
                            return '<button type="button" style="margin-left: 10px" onclick="ActualizarAccesorio(' + row.id_Accesorios + ')" class="btn btn-icon btn-info"><i class="far fa-edit"></i></button>' +
                                '<button type="button" style="margin-left: 10px" onclick="Eliminar(' + row.id_Accesorios + ')"  class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>'


                        }
                    }]
            })


           $('#RegisAcc').click(function (e) {
               e.preventDefault();
               var formData = new FormData(document.getElementById("RegisAcceso"));
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
               document.getElementById('loader').style.display = 'block';
               $.ajax({
                   url:'{{url('Accesorios')}}',
                   dataType:'json',
                   type:'post',
                   data:formData,
                   cache: false,
                   contentType: false,
                   processData: false,
                   success:function (response) {
                       $('#CrerAccesorios').modal('hide');
                       document.getElementById('loader').style.display = 'none';
                       table.api().ajax.reload();
                       console.log(response);
                   },
                   error: function(){
                       alert("error in ajax form submission");
                   }
               });

           })
        });
        function ActualizarAccesorio(id) {
            $.ajax({
                url: '{{url('Accesorios')}}/'+id,
                dataType: 'json',
                type: 'get',
                cache: false,
                success: function (respon) {
                    $.each(respon, function (index, va) {
                        $('#update_nombre_Acce').val(va.nombre_accesorio);
                        $('#update_precio_Acc').val(va.precio_acc);
                        $('#update_modelo_Acc').val(va.modelo_acc);
                        $('#update_cantidad_Acc').val(va.cantidad_acc);
                        $('#imagen_Accesorio').removeAttr('src');
                        $('#imagen_Accesorio').attr('src', '{{asset('Imagenes/Accesorios/')}}/' + va.ruta_imagen);


                    });
                    $('#UpdateAccesorios').modal('show');
                    idacc=respon[0]['id_Accesorios'];
                    idimagen=respon[0]['idImagenes'];
                }


            });
        }
        $('#UpdateAcc').click(function (e) {
            e.preventDefault();
            var formData = new FormData(document.getElementById("UpdateAcceso"));
             formData.append('idimagen',idimagen);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            document.getElementById('loader').style.display = 'block';
            $.ajax({
                url:'{{url('UpdateAccesorios')}}/'+idacc,
                dataType:'json',
                type:'post',
                data:formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function (response) {
                    if (response.succes == true) {
                        iziToast.success({
                            title: 'succes',
                            message: 'Actualizado correctamente',
                        });
                        document.getElementById('loader').style.display = 'none';
                        table.api().ajax.reload();
                        $('#UpdateAccesorios').modal('hide');
                        document.getElementById('loader').style.display = 'none';
                        table.api().ajax.reload();
                        $('#fotoAccesorio').val("");
                    } else {
                        iziToast.error({
                            title: 'Error',
                            message: 'Eror al actualizar producto',
                        });
                    }
                },
                error: function(){
                    alert("error in ajax form submission");
                }
            });
        })
    </script>
    @endsection
