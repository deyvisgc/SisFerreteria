<div class="modal fade" id="CrerOfertas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Ofertas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form  id="RegisOfertas"  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Oferta</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input   name="nombre_oferta" class="form-control phone-number" placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Producto</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <select class="selectpicker" name="productos"  data-live-search="true">
                                                        <option readonly value="" >Seleccione Producto</option>
                                                        @foreach($producto as $prod)
                                                            <option value="{{$prod->idProductos}}">{{$prod->Nombre_Productos}}</option>
                                                            @endforeach
                                                    </select>
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
                                                    <input type="text" class="form-control phone-number"  name="precio_Ofer" placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Fecha Inicio</label>
                                                <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                                    <input class="form-control" type="text" name="fecha_ini" readonly />
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha Fin</label>
                                                <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
                                                    <input class="form-control" type="text" name="fecha_fin" readonly />
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Descripcion</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <textarea class="form-control" name="descripcion" rows="4">Escribe aqui......</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <input  name="fotoOferta" type="file" class="file"
                                               data-show-upload="false"
                                               data-theme="fa"
                                               data-language="es"
                                               data-show-caption="true"
                                               data-msg-placeholder="Select {files} para guardar..."
                                        >

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="RegisOfer">Guardar</button>
            </div>
        </div>
    </div>
</div>
