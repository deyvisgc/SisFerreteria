<div class="modal fade" id="CrerServicios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form  id="RegisServi"  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Descripcion</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input   name="descripcion_serv" class="form-control phone-number" placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo Servicio</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <select class="selectpicker" name="tiposer"  data-live-search="true">
                                                        <option readonly value="" >Seleccione Producto</option>
                                                        <option readonly value="1" >Reparacion</option>
                                                        <option readonly value="2" >Armamiento de estructuras</option>
                                                        <option readonly value="3" >Instalacion de Tanques</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Fecha Sevicio</label>
                                                <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
                                                    <input class="form-control" type="text" name="hora_Ser" readonly />
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Precio</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <input   name="precio_ser" class="form-control phone-number" placeholder="Escribi aqui......">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Maestro</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fas fa-phone"></i>
                                                        </div>
                                                    </div>
                                                    <select class="selectpicker" name="maestro"  data-live-search="true">
                                                        <option readonly value="" >Seleccione Maestro</option>
                                                        @foreach($per as $pers)
                                                            <option value="{{$pers->id_Persona}}">{{$pers->nombre_per}}{{$pers->apellidos_per}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <input  name="fotoSer" type="file" class="file"
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
                <button type="button" class="btn btn-primary" id="RegisSer">Guardar</button>
            </div>
        </div>
    </div>
</div>
