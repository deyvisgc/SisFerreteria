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
                            <form>
                                <div class="form-row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Seleccionar Busqueda</label>
                                                <select class="selectpicker"  id="selecdniyruc" name="selecdniyruc"  data-live-search="true">
                                                    <option readonly value="" >Seleccione tipo</option>
                                                    <option readonly value="1" >DNI</option>
                                                    <option readonly value="2" >RUC</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label id="labelruc"></label>
                                            <div  class="input-group date">
                                                <input class="form-control" type="text" id="dniOruc" name="dniOruc" placeholder="Ingresar DNI/RUC" />
                                                <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-search"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Razon Social</label>
                                            <div class="input-group" >
                                                <input class="form-control" type="text" id="razon_social" name="razon_social" placeholder="Escriba aqui..." />
                                                <span  class="input-group-addon">
                                                        <i class="glyphicon glyphicon-search"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <div class="input-group date" >
                                                <input class="form-control" type="text" id="nombres" name="nombres"/>
                                                <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Apellidos</label>
                                            <div class="input-group date" >
                                                <input class="form-control" type="text" id="Apellidos" name="Apellidos"  />
                                                <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Producto</label>
                                            <div  class="input-group date">
                                                <input class="form-control" type="text" name="fecha_ini" readonly />
                                                <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Precio</label>
                                            <div class="input-group date" >
                                                <input class="form-control" type="text" name="fecha_ini" readonly/>
                                                <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <div class="input-group date" >
                                                <input class="form-control" type="text" name="fecha_ini"  />
                                                <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Gmail</label>
                                            <div class="input-group date" >
                                                <input class="form-control" type="text" name="fecha_ini"  />
                                                <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Direccion</label>
                                            <div class="input-group date">
                                                <textarea class="form-control" id="direccion" name="direccion" readonly rows="2"></textarea>
                                                <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Fecha Reserva</label>
                                            <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                                <input class="form-control" type="text" id="fecha_reser" name="fecha_reser"  />
                                                <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Fecha Vencimiento</label>
                                            <div id="datepicker1" class="input-group date" data-date-format="mm-dd-yyyy">
                                                <input class="form-control" type="text" id="fecha_venci" name="fecha_venci" readonly />
                                                <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button  type="button" class="btn btn-success" id="Buscardni">Buscar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="RegisSer">Reservar</button>
            </div>
        </div>
    </div>
</div>
