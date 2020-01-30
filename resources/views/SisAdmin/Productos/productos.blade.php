@extends('SisAdmin.Layaouts.header')

@section('contenido')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Productos</font></font></h4>
                    <button type="button" data-toggle="modal" data-target="#CreCateModal" class="btn btn-icon btn-success"><i class="fas fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <table id="tbproducto" class="table">
                        <thead>
                        <tr>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Precio</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Descripcion</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Categoria</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Imagenes</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cantidad</font></font></th>
                            <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Estado</font></font></th>
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




    <!-- Modal -->
   @include('SisAdmin.modals.modalProducto')
    @include('SisAdmin.modals.modalsAccesorios')

@endsection
@section('scripts')
    <script type="text/javascript">
        var table;
        var idaccesorio;
        var  tabla1;


            $(document).ready(function () {
                $('select').selectpicker();
                document.getElementById('loader').style.display = 'none';
                table = $('#tbproducto').dataTable({
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
                    ajax: '{{url('Productos')}}',
                    columns: [
                        {data: 'Nombre_Productos', name: 'Nombre_Productos'},
                        {data: 'Precio_Productos', name: 'Precio_Productos'},
                        {data: 'descripcion_Productos', name: 'descripcion_Productos'},
                        {data: 'Nombre_Categoria', name: 'Nombre_Categoria'},
                        {data: 'imagen', name: 'imagen', orderable: true, searchable: true},
                        {data: 'Stock_Productos', name: 'Stock_Productos'},
                        {data: 'Estado_Producto', name: 'Estado_Producto'},
                        {
                            mRender: function (data, type, row) {
                                return '<button type="button" style="margin-left: 10px" onclick="ActualizarProducto(' + row.idProductos + ')" class="btn btn-icon btn-info"><i class="far fa-edit"></i></button>' +
                                    '<button type="button" style="margin-left: 10px" onclick="Eliminar(' + row.idProductos + ')"  class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>'+
                                    '<button type="button" style="margin-left: 10px" onclick="AddAccesorios(' + row.idProductos + ')"  class="btn btn-icon btn-success"><i class="fas fa-plus"></i></button>'+
                                    '<button type="button" style="margin-left: 10px" onclick="DetalleAccesorios(' + row.idProductos + ')"  class="btn btn-icon btn-outline-warning"><i class="fas fa-eye"></i></button>'

                            }
                        }]
                })

                $("#foto").fileinput({
                    allowedFileExtensions: ['jpg', 'jpeg', 'png'],
                    maxFilesize: 1000,
                    showUpload: false,
                    showClose: false,
                    initialPreviewAsData: true,
                    dropZoneEnabled: true
                });
                $('#guardar').click(function (e) {
                    e.preventDefault();

                    var nombre = $('#nombre_Producto').val();
                    var cate = $('#cate_Producto').val();
                    var precio = $('#precio_Producto').val();
                    var cantidad = $('#cantidad_Producto').val();
                    var modelo = $('#modelo_Producto').val();
                    var descripcion = $('#descripcion_Producto').val();
                    var form = document.getElementById('foto');// You need to use standard javascript object here
                    var file = form.files[0];
                    var formData = new FormData();
                    formData.append('nombreProducto', nombre);
                    formData.append('cate', cate);
                    formData.append('precio', precio);
                    formData.append('cantidad', cantidad);
                    formData.append('modelo', modelo);
                    formData.append('descripcion', descripcion);
                    formData.append('imagen1', file);
                    //falta ahcer para mañana loca
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    document.getElementById('loader').style.display = 'block';

                    $.ajax({
                        url: '{{url('Productos')}}',
                        dataType: 'json',
                        type: 'post',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (respon) {
                            $('#CreCateModal').modal('hide');
                            document.getElementById('loader').style.display = 'none';
                            table.api().ajax.reload();
                            console.log(respon);
                        }
                    });
                    //   alert(imagen);

                })
                $('body').on('hidden.bs.modal', '.modal', function () {
                    $("#cate_P").empty();
                    $("#accesorios").empty();
                });

                $('#actuali').click(function (e) {
                    var id = $('#idprod').val();
                    e.preventDefault();
                    var nombre = $('#nombre_Pro').val();
                    var cate = $('#cate_P').val();
                    var precio = $('#precio_Pro').val();
                    var cantidad = $('#cantidad_Pro').val();
                    var modelo = $('#modelo_Pro').val();
                    var descripcion = $('#descripcion_Pro').val();
                    var idimagen = $('#idimagen').val();
                    var form = document.getElementById('foto1');// You need to use standard javascript object here
                    var file = form.files[0];
                    var formData1 = new FormData();
                    formData1.append('nombreProducto', nombre);
                    formData1.append('cate', cate);
                    formData1.append('precio', precio);
                    formData1.append('cantidad', cantidad);
                    formData1.append('modelo', modelo);
                    formData1.append('descripcion', descripcion);
                    formData1.append('imagen', file);
                    formData1.append('idimagen', idimagen);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{url('UpdateProductos')}}/' + id,
                        dataType: 'json',
                        type: 'post',
                        data: formData1,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (respon) {
                            if (respon.succes == true) {
                                succes('actualizar');
                                $('#Updatemodal').modal('hide');
                                document.getElementById('loader').style.display = 'none';
                                table.api().ajax.reload();
                                $('#foto1').val("");
                            } else {
                                iziToast.error({
                                    title: 'Error',
                                    message: 'Eror al actualizar producto',
                                });
                            }
                        }
                    });
                });

            });
        function Eliminar(id) {
            succes('eliminar', id);
        }
        function ActualizarProducto(id) {
            $.ajax({
                url: '{{url('Productos')}}/' + id,
                dataType: 'json',
                type: 'get',
                cache: false,
                success: function (respon) {
                    $.each(respon.produc, function (index, val) {
                        $('#nombre_Pro').val(val.Nombre_Productos);
                        $('#idprod').val(val.idProductos);
                        $('#precio_Pro').val(val.Precio_Productos);
                        $('#cantidad_Pro').val(val.Stock_Productos);
                        $("#foto1").fileinput({
                            allowedFileExtensions: ['jpg', 'jpeg', 'png'],
                            maxFilesize: 1000,
                            showUpload: false,
                            showClose: false,
                            initialPreviewAsData: false,
                            dropZoneEnabled: true,
                            //  defaultPreviewContent: '<img src="" alt="Your Avatar">',
                        });
                        $('#imagen').removeAttr('src');
                        $('#imagen').attr('src', '{{asset('Imagenes/Productos/')}}/' + val.ruta_imagen);
                        $('#modelo_Pro').val(val.modelo_producto);
                        $('#descripcion_Pro').val(val.descripcion_Productos);
                        $('#idimagen').val(val.idImagenes);
                        $.each(respon.cate, function (index, va) {
                            if (va.idcategoria == val.categoria_idcategoria) {
                                $('#cate_P').append('<option selected   value="' + va.idcategoria + '">' + va.Nombre_Categoria + '</option>');
                            } else {
                                $('#cate_P').append('<option    value="' + va.idcategoria + '">' + va.Nombre_Categoria + '</option>');
                            }
                            $('#cate_P').selectpicker('refresh');
                        });
                    });
                    $('#Updatemodal').modal('show');
                }


            })
        }
        function succes(data, id) {
            if (data == 'actualizar') {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Actualizado Correctamente'
                })
            } else if (data == 'eliminar') {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        alert(id);
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }else if(data == 'crear'){
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'success',
                            title: 'Registrado Correctamente'
                        })
                    }
                })
            }

        }
        function AddAccesorios(id) {
            var arrayprueba = [];
            var arraypruebapadre = [];
            $.ajax({
                url: '{{url('getAccesorios')}}',
                dataType: 'json',
                type: 'get',
                cache: false,
                contentType: false,
                processData: false,
                success: function (respon) {
                    $.each(respon, function (index, va) {
                        $('#accesorios').append('<option    value="' + va.id_Accesorios + '">' + va.nombre_accesorio + '</option>');
                        $('#accesorios').selectpicker('refresh');
                    });
                    $('#AddAccesorios').modal('show');
                    $('#accesorios').change(function (event) {
                        var val = $(this).val();
                        for (var index = 0; index < val.length; index++) {
                            arrayprueba.push({
                                "id" : val[index]
                            });
                        }
                        arraypruebapadre = [{
                            "id" : arrayprueba,
                            "size" : val.length
                        }];
                        //this.arrayprueba = [];
                        return arrayprueba = [];

                    });


                }
            });
            $('#RegisAccsesorios').click(function () {
                console.log(arraypruebapadre);
                var idaccesorio = JSON.stringify(arraypruebapadre);
                let formData = new FormData();
                formData.append('idaccesorio', idaccesorio);
                formData.append('id', id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

                    }
                });
                $.ajax({
                    url: '{{url('crearAccsesorios')}}',
                    dataType: 'json',
                    type: 'post',
                    data:formData,
                    cache: false,
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,
                    success: function (respon) {
                        if (respon.succes==true){
                            alert('dsds');
                            succes('crear');
                            console.log(respon);
                            table.api().ajax.reload();
                            $('#AddAccesorios').modal('hide');
                        }else{
                            alert('error');
                        }

                    }
                })
            })
        }
    function DetalleAccesorios(id) {
        tabla1 = $('#tbdetalleAccesorio').dataTable({
            stateSave: true,
            responsive: true,
            processing: false,
            serverSide: true,
            destroy:true,
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
            ajax: '{{url('detalleAccesorios')}}/'+id,
            columns: [
                {data: 'nombre_accesorio', name: 'nombre_accesorio'},
                {data: 'modelo_acc', name: 'modelo_acc'},
                {data: 'imagen', name: 'imagen', orderable: true, searchable: true},
                {
                    mRender: function (data, type, row) {
                        return'<button type="button" style="margin-left: 10px" onclick="EliminarAccesorio(' + row.id_accesorio + ')"  class="btn btn-icon btn-danger"><i class="fas fa-times"></i></button>'+
                            '<input type="hidden" id="idproducto" value="'+ row.id_producto+'">'
                    }
                }
                ],

        });
        $('#detalleccesorios').modal('show');
    }
            function EliminarAccesorio(id) {
            var data={};
                data.idpro=$('#idproducto').val();
                data.idacc=id;
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            }
                        });
                        $.ajax({
                                url: '{{url('DeleteAccesXPro')}}',
                                dataType: 'json',
                                type: 'post',
                                 data:data,
                                cache: false,
                                success: function (respon) {
                                    if (respon.success==true){
                                        swalWithBootstrapButtons.fire(
                                            'Deleted!',
                                            'Your file has been deleted.',
                                            'success'
                                        )
                                    }else{
                                        swalWithBootstrapButtons.fire(
                                            'Cancelled',
                                            'Your imaginary file is safe :)',
                                            'error'
                                        )
                                    }

                                }
                        })
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Your imaginary file is safe :)',
                            'error'
                        )
                    }
                })
            }
    </script>
@endsection
