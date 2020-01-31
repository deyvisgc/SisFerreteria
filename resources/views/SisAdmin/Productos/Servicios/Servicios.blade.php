@extends('SisAdmin.Layaouts.header')
@section('contenido')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Servicios</font></font></h4>
                    <button type="button" data-toggle="modal" data-target="#CrerServicios" class="btn btn-icon btn-success"><i class="fas fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <table id="tboservicios" class="table">
                        <thead>
                        <tr>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Precio</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hora</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Maestro</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tipo Servicio</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Imagen</font></font></th>
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
    @include('SisAdmin.modals.modalServicio')
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $("#datepicker1").datepicker({
                format: "yyyy/mm/dd",
                language: "es",
                autoclose: true,
                todayHighlight: true
            }).datepicker('update', new Date());
            document.getElementById('loader').style.display = 'none';
            table = $('#tboservicios').dataTable({
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
                ajax: '{{url('Servicios')}}',
                columns: [
                    {data: 'Precio_servicio', name: 'Precio_servicio'},
                    {data: 'Hora_servicio', name: 'Hora_servicio'},
                    {data: 'nombre_per', name: 'nombre_per'},
                    {data: 'Tipo_ser', name: 'Tipo_ser'},
                    {data: 'imagen', name: 'imagen', orderable: true, searchable: true},
                    {
                        mRender: function (data, type, row) {
                            return '<button type="button" style="margin-left: 10px" onclick="ActualizarProducto(' + row.idProductos + ')" class="btn btn-icon btn-info"><i class="far fa-edit"></i></button>' +
                                '<button type="button" style="margin-left: 10px" onclick="Eliminar(' + row.idProductos + ')"  class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>'

                        }
                    }]
            });
            $('#RegisSer').click(function (e) {
                e.preventDefault();
                var formData = new FormData(document.getElementById("RegisServi"));
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                document.getElementById('loader').style.display = 'block';
                $.ajax({
                    url:'{{url('Servicios')}}',
                    dataType:'json',
                    type:'post',
                    data:formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function (response) {
                        $('#CrerOfertas').modal('hide');
                        $('.modal').on('hidden.bs.modal', function(){
                            $(this).find('form')[0].reset();
                        });
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

    </script>
@endsection
