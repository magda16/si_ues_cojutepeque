<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    $proveedor = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT  * FROM proveedor WHERE idproveedor=".$proveedor;
    $result = $con->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $idproveedor=$fila->idproveedor;
          $nombre=$fila->nombre_c;
          $apellido=$fila->apellido_c;
          $proveedor=$fila->proveedor;
          $nit=$fila->NIT_p;
          $telefono=$fila->telefono_p;
          $correo=$fila->correo_p;
          $direccion=$fila->direccion_p;
          $descripcion_p=$fila->descripcion_p;
          $observacion_p=$fila->observacion_p;
          $observacion=$fila->observacion;
        }//fin while
      }

    } 
?>
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
              location.href='lista_proveedor.php';
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
            <a  class="site_title"><span>UESaD</span></a>
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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE PROVEEDORES</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Editar Proveedor</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Proveedores" href="../../../produccion/administracion/proveedor/lista_proveedor.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   
                    <form id="formproveedor" name="formproveedor" method="POST" class="form-horizontal form-label-left">

                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" id="baccion" name="baccion"  value="<?php echo $idproveedor; ?>">
                      <input type="hidden" id="vproveedor" name="vproveedor" value="<?php echo $proveedor; ?>">
                      <input type="hidden" id="vnit" name="vnit" value="<?php echo $nit; ?>">
                      <input type="hidden" id="vtelefono" name="vtelefono" value="<?php echo $telefono; ?>">
                      <input type="hidden" id="vcorreo" name="vcorreo" value="<?php echo $correo; ?>">

        
                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos de el Contacto:</strong></p></h5>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_c">Nombres: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="nombre_c" name="nombre_c" required="required" tabindex="1" placeholder="Ingrese Nombres" value="<?php echo $nombre; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido_c">Apellidos: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="apellido_c" name="apellido_c" tabindex="2" required="required" placeholder="Ingrese Apellidos" value="<?php echo $apellido; ?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div> 

                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos de el Proveedor:</strong></p></h5>
                      
                      <div class="form-group" id="resultpro">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveedor">Nombre: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="proveedor" name="proveedor" required="required" tabindex="3" placeholder="Ingrese Nombre" value="<?php echo $proveedor; ?>">
                        <span class="fa fa-institution form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="resultproerror"></span>
                      </div>

                      <div class="form-group" id="resultnit">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit_p">NIT: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="nit_p" name="nit_p" data-inputmask="'mask': '9999-999999-999-9'" required="required" class="form-control col-md-7 col-xs-12" tabindex="4" placeholder="Ingrese NIT" value="<?php echo $nit; ?>">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="resultniterror"></span>
                      </div>

                      <div class="form-group" id="resultel">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono_p">Teléfono: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="telefono_p" name= "telefono_p" data-inputmask="'mask': '9999-9999'" required="required" tabindex="5" placeholder="Ingrese Número de Teléfono" value="<?php echo $telefono; ?>">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="resultelerror"></span>
                      </div>

                      <div class="form-group" id="resultcor">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo_p">Correo Electrónico: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="correo_p" name= "correo_p" required="required" tabindex="6" placeholder="Ingrese Correo Electrónico" value="<?php echo $correo; ?>">
                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="resultcorerror"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion_p">Direcci&oacute;n: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="direccion_p" name="direccion_p" required="required" tabindex="7" placeholder="Ingrese Direcci&oacute;n" value="<?php echo $direccion; ?>">
                          <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion_p">Descripci&oacute;n:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="descripcion_p" name="descripcion_p" required="required" placeholder="Ingrese una Descripci&oacute;n" tabindex="8" value="<?php echo $descripcion_p; ?>">
                          <span class="fa fa-pencil-square-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observacion_p">Observaci&oacute;n: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="observacion_p" name="observacion_p" required="required" placeholder="Ingrese una Observaci&oacute;n" tabindex="9" value="<?php echo $observacion_p; ?>">
                          <span class="fa fa-pencil-square-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      
                      <div class="ln_solid"></div>
                        <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                        <div class="form-group" align="right">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-round btn-primary" type="button"  id="btneditar" name="btneditar"><i class="fa fa-refresh">  Actualizar</i></button>
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
    <script src="../../../build/configuraciones/validaciones/proveedor/validar_edit.js"></script>
    <script src="../../../build/configuraciones/validaciones/proveedor/ayuda_edit.js"></script>
  </body>
</html>
