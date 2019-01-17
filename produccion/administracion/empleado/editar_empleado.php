<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    $empleado = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT em.idempleado, em.nombre_em, em.apellido_em, em.DUI_em, em.NIT_em, em.direccion_em, em.cargo_em, em.genero_em, em.telefono_em, em.correo_em, em.estado_em, em.estado_ci, em.observacion_em, c.nombre_ca FROM empleado AS em, cargo AS c WHERE em.cargo_em=c.id_ca_em AND em.idempleado='$empleado'";
    $result = $con->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $idempleado=$fila->idempleado;
          $nombre=$fila->nombre_em;
          $apellido=$fila->apellido_em;
          $genero=$fila->genero_em;
          $nit=$fila->NIT_em;
          $dui=$fila->DUI_em;
          $telefono=$fila->telefono_em;
          $correo=$fila->correo_em;
          $direccion=$fila->direccion_em;
          $estado=$fila->estado_em;
          $estado_fam=$fila->estado_ci;
          $observacion=$fila->observacion_em;      
          $cargo=$fila->nombre_ca;
          if($estado==1){
            $estado_es="Activo";
          }else{
            $estado_es="Inactivo";
          }
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
              location.href='lista_empleado.php';
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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE RECURSOS HUMANOS</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Editar Recurso Humano</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Recursos Humanos" href="../../../produccion/administracion/empleado/lista_empleado.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   
                    <form id="formempleado" name="formempleado" method="POST" class="form-horizontal form-label-left">

                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" id="baccion" name="baccion"  value="<?php echo $idempleado; ?>">
                      <input type="hidden" id="validarcampo" name="validarcampo" value="<?php echo $nombre; ?>">
                      
        
                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos Personales:</strong></p></h5>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo">Cargo: <span style="color:#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label  "><?php echo $cargo; ?> </label>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombres: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre" required="required" tabindex="1" value="<?php echo $nombre; ?>" placeholder="Ingrese Nombres">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido">Apellidos: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="apellido" name="apellido" tabindex="2" required="required" value="<?php echo $apellido; ?>" placeholder="Ingrese Apellidos">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div> 

                      <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Genero: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="radio col-md-6 col-sm-6 col-xs-12">
                        <label>
                        <input type="radio" class="flat" id="genero" value="Masculino" name="genero" <?php if($genero=="Masculino") echo "checked"; ?> > Masculino </label>
                        <label>
                        <input type="radio" class="flat" id="genero" value="Femenino" name="genero" <?php if($genero=="Femenino") echo "checked"; ?> > Femenino </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui">DUI: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="dui" name="dui" data-inputmask="'mask': '99999999-9'" required="required" class="form-control col-md-7 col-xs-12" tabindex="3" value="<?php echo $dui; ?>" placeholder="Ingrese DUI">
                          <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div> 

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit">NIT: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="nit" name="nit" data-inputmask="'mask': '9999-999999-999-9'" required="required" class="form-control col-md-7 col-xs-12" tabindex="4" value="<?php echo $nit; ?>" placeholder="Ingrese NIT">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado Familiar: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="estado" name="estado">
                          <option selected="selected" value="">Seleccione Estado Familiar...</option>
                            <option value="1" <?php if($estado_fam=="Soltero (a)") echo "selected"; ?> >Soltero (a)</option>
                            <option value="2" <?php if($estado_fam=="Casado (a)") echo "selected"; ?> >Casado (a)</option>
                            <option value="3" <?php if($estado_fam=="Viudo (a)") echo "selected"; ?> >Viudo (a)</option>
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                                                             
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="telefono" name= "telefono" data-inputmask="'mask': '9999-9999'" required="required" tabindex="5" value="<?php echo $telefono; ?>" placeholder="Ingrese Número de Teléfono">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo">Correo Electrónico: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="correo" name= "correo" required="required" tabindex="6" value="<?php echo $correo; ?>" placeholder="Ingrese Correo Electrónico">
                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion">Direcci&oacute;n: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="direccion" name="direccion" required="required" tabindex="7" value="<?php echo $direccion; ?>" placeholder="Ingrese Direcci&oacute;n">
                          <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="ln_solid"></div>
                        <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
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
    <script src="../../../build/configuraciones/validaciones/empleado/validar_edit.js"></script>
    <script src="../../../build/configuraciones/validaciones/empleado/ayuda_edit.js"></script>
  </body>
</html>
