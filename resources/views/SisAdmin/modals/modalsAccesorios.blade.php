<div class="modal fade" id="CrerAccesorios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Accesorios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form  id="RegisAcceso"  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="nombre_Acce" name="nombre_Acce" class="form-control phone-number" placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Precio</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control phone-number" id="precio_Acc" name="precio_Acc" placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Modelo</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="modelo_Acc" name="modelo_Acc" class="form-control phone-number"placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Cantidad</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control phone-number" id="cantidad_Acc" name="cantidad_Acc" placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12">
                                    <input id="fotoAccesorio" name="fotoAccesorio" type="file" class="file"
                                           data-show-upload="false"
                                           data-theme="fa"
                                           data-language="es"
                                           data-show-caption="true"
                                           data-msg-placeholder="Select {files} para guardar..."
                                    >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="RegisAcc">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="AddAccesorios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Accesorios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <select class="selectpicker" id="accesorios"  data-live-search="true" multiple>

                            </select>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="RegisAccsesorios">Registrar Accesorios</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="UpdateAccesorios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Accesorios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form  id="UpdateAcceso"  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="update_nombre_Acce" name="update_nombre_Acce" class="form-control phone-number" placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Precio</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control phone-number" id="update_precio_Acc" name="update_precio_Acc" placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Modelo</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="update_modelo_Acc" name="update_modelo_Acc" class="form-control phone-number"placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Cantidad</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control phone-number" id="update_cantidad_Acc" name="update_cantidad_Acc" placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12">
                                    <input id="fotoAccesorio" name="fotoAccesorio" type="file" class="file"
                                           data-show-upload="false"
                                           data-theme="fa"
                                           data-language="es"
                                           data-show-caption="true"
                                           data-msg-placeholder="Select {files} para guardar..."
                                    >
                                    <img src="" id="imagen_Accesorio" name="imagen_Accesorio" style="width: 100px; height: 100px;" alt="">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="UpdateAcc">Actualizar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detalleccesorios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle de  Accesorios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <table id="tbdetalleAccesorio" class="table">
                                <thead>
                                <tr>
                                    <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nombre Accesorio</font></font></th>
                                    <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Modelo</font></font></th>
                                    <th scope="col"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Imagen</font></font></th>
                                    <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Operaciones</font></font></th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
