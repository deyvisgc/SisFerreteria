<div class="modal fade" id="CreCateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="wrapper">
                    <div class="tabPanel-widget">
                        <label for="tab-1" tabindex="0"></label>
                        <input id="tab-1" type="radio" name="tabs" checked="true" aria-hidden="true">
                        <h2>Imagen Producto</h2>
                        <div>
                            <input id="foto" name="foto" type="file" class="file"
                                   data-show-upload="false"
                                   data-theme="fa"
                                   data-language="es"
                                   data-show-caption="true"
                                   data-msg-placeholder="Select {files} para guardar..."
                            >
                        </div>
                        <label for="tab-2" tabindex="0"></label>
                        <input id="tab-2" type="radio" name="tabs" aria-hidden="true">
                        <h2>Datos del Producto</h2>
                        <div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card">
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
                                                            <input type="text" id="nombre_Producto" name="nombre_Producto" class="form-control phone-number" placeholder="Escribi aqui......">
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
                                                            <input type="text" class="form-control phone-number" id="precio_Producto" name="precio_Producto" placeholder="Escribi aqui......">
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
                                                            <input type="text" class="form-control phone-number" id="cantidad_Producto" name="cantidad_Producto" placeholder="Escribi aqui......">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 col-lg-6">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Categoria</label>
                                                        <select class="form-control" id="cate_Producto" style="height: 49px" name="cate_Producto"  data-live-search="true">
                                                            @foreach($cate as $ca)
                                                            <option value="{{$ca->idcategoria}}">{{$ca->Nombre_Categoria}}</option>
                                                           @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Modelo</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-phone"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" id="modelo_Producto" name="modelo_Producto" class="form-control phone-number"placeholder="Escribi aqui......">
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
                                                            <textarea class="form-control" id="descripcion_Producto" name="descripcion_Producto" rows="3" id="comment"></textarea>                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="wrapper">
                    <div class="tabPanel-widget">
                        <label for="tab-4" tabindex="0"></label>
                        <input id="tab-4" type="radio" name="tabs" checked="true" aria-hidden="true">
                        <h2>Imagen Producto</h2>
                        <div>
                            <input id="foto1" name="foto" type="file" class="file"
                                   data-show-upload="false"
                                   data-theme="fa"
                                   data-language="es"
                                   data-show-caption="true"
                                   data-msg-placeholder="Select {files} para guardar..."
                            >
                            <img src="" id="imagen" name="foto" style="width: 100px; height: 100px;" alt="">
                            <input type="hidden" id="idprod" name="nombre_Producto" class="form-control phone-number" placeholder="Escribi aqui......">
                            <input type="hidden" id="idimagen" name="nombre_Producto" class="form-control phone-number" placeholder="Escribi aqui......">

                        </div>
                        <label for="tab-3" tabindex="0"></label>
                        <input id="tab-3" type="radio" name="tabs" aria-hidden="true">
                        <h2>Datos del Producto</h2>
                        <div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12">
                                    <div class="card">
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
                                                            <input type="text" id="nombre_Pro" name="nombre_Producto" class="form-control phone-number" placeholder="Escribi aqui......">
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
                                                            <input type="text" class="form-control phone-number" id="precio_Pro" name="precio_Producto" placeholder="Escribi aqui......">
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
                                                            <input type="text" class="form-control phone-number" id="cantidad_Pro" name="cantidad_Producto" placeholder="Escribi aqui......">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-6 col-lg-6">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Categoria</label>
                                                        <select class="form-control" id="cate_P" style="height: 49px" name="cate_Producto"  data-live-search="true">

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Modelo</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-phone"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" id="modelo_Pro" name="modelo_Producto" class="form-control phone-number"placeholder="Escribi aqui......">
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
                                                            <textarea class="form-control" id="descripcion_Pro" name="descripcion_Producto" rows="3" id="comment"></textarea>                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="actuali">Actualizar</button>
            </div>
        </div>
    </div>
</div>
