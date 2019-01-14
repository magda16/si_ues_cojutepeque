<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include ("../../complementos/cabezera.php"); ?>
    <!-- bootstrap-datepicker -->
    <link href="../../../vendors/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
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
              location.href='registrar_activo_fijo.php';
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
                    <h2 style="color:RGB(205, 92, 92);">Registrar Activo Fijo Nuevo</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Aulas" href="../../../produccion/administracion/aula/lista_aula.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="formaf" name="formaf" action="../../../build/configuraciones/sql/activo_fijo/crud_activo_fijo.php" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" >
                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" name="codigo_af" id="codigo_af">
                        <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos Generales:</strong></p></h5>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="categoria" name="categoria">
                            </select>
                        </div>
                        <span class="help-block" id="error"></span>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Bien: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="tipo_bien" name="tipo_bien">
                            </select>
                        </div>
                        <span class="help-block" id="error"></span>
                        </div>

                  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo_inv">C&oacutedigo de Inventario: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="codigo_inv" name="codigo_inv" required="required" class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                            
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correlativo_inv">Correlativo: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="correlativo_inv" name="correlativo_inv" required="required" class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion">Descripci&oacute;n: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="descripcion" name="descripcion" required="required" placeholder="Ingrese una Descripci&oacute;n de el Activo Fijo" class="form-control col-md-7 col-xs-12" tabindex="3">
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observacion_act">Observaci&oacute;n: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="observacion_act" name="observacion_act" required="required" placeholder="Ingrese una Observaci&oacute;n de el Activo Fijo" class="form-control col-md-7 col-xs-12" tabindex="3">
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12 control-label">Calidad: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="radio col-md-6 col-sm-6 col-xs-12">
                        <label>
                        <input type="radio" class="flat" id="calidad" value="Bueno" name="calidad" checked> Bueno </label>
                        <label>
                        <input type="radio" class="flat" id="calidad" value="Regular" name="calidad"> Regular </label>
                        
                        <label>
                        <input type="radio" class="flat" id="calidad" value="Malo" name="calidad"> Malo </label>
                        </div>
                      </div>

                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos de el Activo Fijo:</strong></p></h5>
    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marca">Marca: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="marca" name="marca" required="required" placeholder="Ingrese la Marca de el Activo Fijo" class="form-control col-md-7 col-xs-12" tabindex="3">
                        </div>
                        <span class="help-block" id="error"></span> 
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="modelo">Modelo: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="modelo" name="modelo" required="required" placeholder="Ingrese el Modelo de el Activo Fijo" class="form-control col-md-7 col-xs-12" tabindex="3">
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                      <div id="gruposerie">
                      <div class="form-group" id="divserie">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nserie">N&uacute;mero de Serie: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nserie" name="nserie" required="required" placeholder="Ingrese el N&uacute;mero de Serie de el Activo Fijo" class="form-control col-md-7 col-xs-12" tabindex="3">
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Lote: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="checkbox" class="js-switch" id="switch1" name="switch1"/>
                        </div>
                      </div>

                      <div class="form-group" id="divcantidad_lote">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cantidad_lote">Cantidad: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="cantidad_lote" name="cantidad_lote" required="required" placeholder="Ingrese la Cantidad de Lote" class="form-control col-md-7 col-xs-12" tabindex="3">
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                      </div>
                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Forma de Financiamiento:</strong></p></h5>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha">Fecha de Adquisici&oacute;n: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fecha" name="fecha" required="required" class="form-control col-md-7 col-xs-12" data-date-end-date = "0d">
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Financiamiento: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="financiamiento" name="financiamiento">
                            <option selected="selected" value="">Seleccione forma de Financiamiento...</option>
                            <option value="1">ENTREGA DE MINED</option>
                            <option value="2">DONADO</option>
                            <option value="3">FONDOS GOES</option>
                            <option value="4">OTROS</option>
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor de  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Adquisici&oacute;n ($): 
                        </label><br>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="valor" name="valor" required="required" placeholder="Ingrese Valor de Adquisici&oacute;n de el Activo Fijo" class="form-control col-md-7 col-xs-12" tabindex="3">
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class='form-group'>
                      <label class='col-md-3 col-sm-3 col-xs-12 control-label'>Es Valor Estimado: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class='radio col-md-6 col-sm-6 col-xs-12'>
                        <label>
                        <input type='radio' class='flat' id="valor_est" value="si" name='valor_est' checked> Si </label>
                        <label>
                        <input type='radio' class='flat' id="valor_est" value="no" name='valor_est' > No </label>
                        </div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="doc_adq">Docuemto de Adquisici&oacute;n: 
                          </label><br>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="doc_adq" name="doc_adq"  accept=".pdf,.jpg,.png">
                          </div>
                          <a id="mostrar" name="mostrar" class="btn btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Mostrar Documento"><i class="fa fa-eye"></i></a>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveedor">Proveedor: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="proveedor" name="proveedor" required="required" placeholder="Ingrese Proveedor de el Activo Fijo" class="form-control col-md-7 col-xs-12" tabindex="3">
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <!-- <div class="form-group form-animate-text" style="margin-top:40px !important;">
                              <input type="text" class="form-text mask-fallback" id="fechanacimiento" name="fechanacimiento" tabindex="3" required>
                              <span class="bar"></span>
                              <label>Fecha de Nacimiento:</label>
                            </div> -->


                      <div class="ln_solid"></div>
                        <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
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
    <!-- bootstrap-datepicker -->
    <script src="../../../vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../../../build/configuraciones/validaciones/activo_fijo/validar_add.js"></script>
    <script src="../../../build/configuraciones/validaciones/activo_fijo/ayuda_add"></script>
	
  </body>
</html>
