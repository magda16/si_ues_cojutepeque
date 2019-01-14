<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include ("../../complementos/cabezera.php"); ?>
    <script type="text/javascript">
        function salir(){
          swal({ 
            title: "Advertencia",
            text: "¿Seguro que Desea Cerrar Sesión?",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "No",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "Si",
            closeOnConfirm: false },

            function(){ 
            swal({ 
            title:'Éxito',
            text: 'Sesión Cerrada',
            type: 'success'
          },
            function(){
              //event to perform on click of ok button of sweetalert
              location.href='logout.php';
           });
          });
        }

      
        function cancelar(){
          swal({ 
            title: "Advertencia",
            text: "Se Eliminarán Datos Ingresados ",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Aceptar",
            closeOnConfirm: false },

            function(){ 
            swal({ 
            title:'Éxito',
            text: 'Datos Eliminados',
            type: 'success'
          },
            function(){
              //event to perform on click of ok button of sweetalert
              location.href='registrar_activo_f.php';
            });
          });
        }
    </script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i><span>SI-UES_COJUTEPEQUE</span></a>
            </div>

            <div class="clearfix"></div>

            <?php include ("../../complementos/menu_principal.php"); ?>

          </div>
        </div>

        <!-- top navigation -->
        <?php include ("../../complementos/navegacion.php"); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="col-sm-12 col-sm-offset-2 col-md-8 col-md-offset-2">
            <div class="page-title ">
              <div class="title_left">
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE ACTIVO FIJO</strong></h4>
              </div>

              <div class="title_right">
              <div class="col-md-2  form-group pull-right top_search">
                  <img src="../../../produccion/images/ayuda.png" width="55px" height="60px" class="" data-toggle="tooltip" data-placement="top" title="Ayuda"  id="startTourBtn" />
                </div>
              </div>
            </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-sm-12 col-sm-offset-2 col-md-8 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title">
                    <h3 style="color:RGB(205, 92, 92);">Registrar Nuevo Activo</h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Representantes" href=""><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="formrepresentante" name="formrepresentante" method="POST" class="form-horizontal form-label-left">

                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" name="codigo_af" id="codigo_af">

                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos Generales:</strong></p></h5>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="categoria" name="categoria" tabindex="3">
                            <option selected="selected" value="">Seleccione la Categoria del Bien a Registrar...</option>
                            <option value="1">Bienes Muebles</option>
                            <option value="2">Recursos Didacticos</option>
                            <option value="3">Material de Mantenimiento</option>
                            <option value="4">Material de Limpieza</option>
                            <option value="5">Bibliotecario</option>
                            <option value="6">Generalidades</option>
                            <option value="7">Equipo de Computo</option>
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Bien: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="tipo_bien" name="tipo_bien" tabindex="3">
                            <option selected="selected" value="">Seleccione tipo de Bien a Registrar...</option>
                            <option value="1">Bienes Muebles</option>
                            <option value="2">Recursos Didacticos</option>
                            <option value="3">Material de Mantenimiento</option>
                            <option value="4">Material de Limpieza</option>
                            <option value="5">Bibliotecario</option>
                            <option value="6">Generalidades</option>
                            <option value="7">Equipos Informáticos</option>
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo_inv">Código de Inventario: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="codigo_inv" name="codigo_inv" required="required" tabindex="2" placeholder="11792-00000-00001-00000">
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correlativo_inv">Correaltivo: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="correlativo_inv" name="correlativo_inv" tabindex="3" required="required" placeholder="00000">
                       </div>
                      <span class="help-block" id="error"></span>
                      </div> 

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripción: <span class="required" style="color: #CD5C5C;"> </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="descripcion" name="descripcion" tabindex="3" required="required" placeholder="Ingrese una descripcion para el activo">
                       </div>
                      <span class="help-block" id="error"></span>
                      </div> 

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observacion_act">Observación: <span class="required" style="color: #CD5C5C;"> </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="observacion_act" name="observacion_act" tabindex="3" required="required" placeholder="Ingrese una observacion del activo">
                       </div>
                      <span class="help-block" id="error"></span>
                      </div>     

                      <div class='form-group'>
                      <label class='col-md-3 col-sm-3 col-xs-12 control-label'>Calidad: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class='radio col-md-6 col-sm-6 col-xs-12'>
                        <label>
                        <input type='radio' class='flat' id="calidad" value="Bueno" name='calidad'checked> Bueno </label>
                        <label>
                        <input type='radio' class='flat' id="calidad" value="Regular" name='calidad' > Regular </label>
                        <label>
                        <input type='radio' class='flat' id="calidad" value="Malo" name='calidad'> Malo </label>
                        </div>
                      </div>

                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos del Activo:</strong></p></h5>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marca">Marca: <span class="required" style="color: #CD5C5C;"> </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="marca" name="marca" tabindex="3" required="required" placeholder="Ingrese la marca del activo">
                       </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="modelo">Modelo: <span class="required" style="color: #CD5C5C;"> </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="modelo" name="modelo" tabindex="3" required="required" placeholder="Ingrese el modelo del activo">
                       </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="serie">No de Serie: <span class="required" style="color: #CD5C5C;"> </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="serie" name="serie" tabindex="3" required="required" placeholder="Ingrese No de Serie del activo">
                       </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class='form-group'>
                      <label class='col-md-3 col-sm-3 col-xs-12 control-label' for="cantidad">Lote: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class='radio col-md-6 col-sm-6 col-xs-12'>
                        <label>
                      <input type="radio" id="lote" value="lote" name="rad" onclick="cantidad.disabled = false" Unchecked/>Si</label>
                      <label>
                      <input type="radio"  id="lote" value="lote" name="rad" onclick="cantidad.disabled = true" checked/>No</label>
                      <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cantidad</label>
                      <input type="text" id="cantidad" name="cantidad" disabled="disabled" />
                        </div>
                      </div>

                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Forma de Fianaciamiento:</strong></p></h5>
                      
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha de Adquisición: <span class="required" style="color: #CD5C5C;"> </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="fecha" name="fecha" tabindex="3" required="required" placeholder="">
                       </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fianciamiento: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="financiamiento" name="financiamiento" tabindex="3">
                            <option selected="selected" value="">Seleccione forma de Fianciamiento...</option>
                            <option value="1">ENTREGA DE MINED</option>
                            <option value="2">DONADO</option>
                            <option value="3">FONDOS GOES</option>
                            <option value="4">OTROS</option>
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor Adquisición: <span class="required" style="color: #CD5C5C;"> </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="valor" name="valor" tabindex="3" required="required" placeholder="">
                       </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      
                      <div class='form-group'>
                      <label class='col-md-3 col-sm-3 col-xs-12 control-label'>Es Valor Estimado: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class='radio col-md-6 col-sm-6 col-xs-12'>
                        <label>
                        <input type='radio' class='flat' id="valor_est" value="si" name='calidad'> SI </label>
                        <label>
                        <input type='radio' class='flat' id="valor_est" value="no" name='calidad' > NO </label>
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="doc_adq">Docuemto de Adquisición: 
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="doc_adq" name="doc_adq"  accept=".pdf,.jpg,.png">
                          </div>
                          <a class="btn btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Mostrar Documento"><i class="fa fa-eye"></i></a>
                        </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveedor">Proveedor: <span class="required" style="color: #CD5C5C;"> </span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="proveedor" name="fecha" tabindex="3" required="required" placeholder="">
                       </div>
                      <span class="help-block" id="error"></span>
                      </div>

                     
                     
                      <div class="ln_solid"></div>
                        <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                        <div class="form-group" align="right">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-round btn-primary" type="button"  id="btnguardar" value="guardar"><i class="fa fa-save">  Guardar</i></button>
                            <button class="btn btn-round btn-default" type="reset" onclick="cancelar()"><i class="fa fa-ban">  Cancelar</i></button>
                          </div>
                        </div>
                        
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

   
            </div>
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
          <?php include ("../../complementos/pie_pagina.php"); ?>
          
        <!-- /footer content -->
      </div>
    </div>
    <?php include ("../../complementos/script_generales.php"); ?>
   
  </body>
</html>
