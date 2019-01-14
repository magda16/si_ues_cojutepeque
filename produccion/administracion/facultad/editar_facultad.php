<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
        $facultad = $_POST['id'];
        $con=conectarMysql();
        $consulta  = "SELECT fa.idfacultad, fa.nombre_fa, fa.telefono_fa, fa.correo_fa, fa.estado_fa, rf.id_re_fa, rf.nombre_rf, rf.apellido_rf FROM facultad as fa, representante_facultad as rf WHERE fa.id_re_fafk=rf.id_re_fa AND fa.idfacultad=".$facultad;
        $result = $con->query($consulta);
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $idfacultad=$fila->idfacultad;
                $nombre=$fila->nombre_fa;
                $telefono=$fila->telefono_fa;
                $correo=$fila->correo_fa;
                $idrepresent=$fila->id_re_fa;
                $nombrerf=$fila->nombre_rf;
                $apellidorf=$fila->apellido_rf;
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
              location.href='lista_facultad.php';
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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE FACULTADES</strong></h4>
              </div>

              <div class="title_right">
                <div class="col-md-1  form-group pull-right top_search">
                  <a data-toggle="tooltip" data-placement="top" title="Add career" ><i class="fa fa-plus-circle"></i></a>
                </div>
              </div>
            </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-sm-12 col-sm-offset-2 col-md-8 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:RGB(205, 92, 92);">Editar Facultad</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Facultades" href="../../../produccion/administracion/facultad/lista_facultad.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="formfacultad" name="formfacultad" method="POST" class="form-horizontal form-label-left">

                      <input type="hidden" id="bandera" name="bandera" >
                      <input type="hidden" id="baccion" name="baccion"  value="<?php echo $idfacultad; ?>">
                      <input type="hidden" id="validarcampo" name="validarcampo" value="<?php echo $nombre; ?>">
                      <input type="hidden" id="represent" name="represent" value="<?php echo $idrepresent; ?>">

                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre: <span style="color:	#000080;"> '</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label  "><?php echo $nombre; ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono_f">Tel&eacute;fono: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="telefono_f" name= "telefono_f" data-inputmask="'mask': '9999-9999'" required="required" tabindex="1" placeholder="Digite Número de Teléfono" value="<?php echo $telefono; ?>">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo_f">Correo Electr&oacute;nico: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="correo_f" name= "correo_f" required="required" tabindex="2" placeholder="Digite Correo Electrónico" value="<?php echo $correo; ?>">
                        <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Representante: <span style="color:	#000080;"> '</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label  "><?php echo $nombrerf." ".$apellidorf; ?> </label>
                        </div>
                      </div>
                      <?php
                      $consulta  = "SELECT rf.id_re_fa, rf.nombre_rf, rf.apellido_rf FROM representante_facultad AS rf LEFT JOIN facultad AS f ON rf.id_re_fa=f.id_re_fafk WHERE f.id_re_fafk IS NULL ORDER BY nombre_rf";
                      $result = $con->query($consulta);
                      $obtenerfilas=mysqli_num_rows($result);
                      
                      if ($obtenerfilas>0) { ?>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >¿Desea Cambiar Representante?
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          </br>
                          <input type="checkbox" class="js-switch" id="switch1" name="switch1"/>
                        </div>
                      </div>

                      <div class="form-group" id="divrepresentante">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Representante: <span class="required" style="color: #CD5C5C;"> *</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="representante" name="representante" tabindex="3">
                          <option selected="selected" value="">Seleccione Representante...</option>
                          <?php
                            $sql_fa  = "Select rf.id_re_fa, rf.nombre_rf, rf.apellido_rf from representante_facultad as rf left join facultad as f on rf.id_re_fa=f.id_re_fafk where f.id_re_fafk is null ORDER BY nombre_rf";
                            $result = $con->query($sql_fa);
                            if ($result) {
                              while ($fila = $result->fetch_object()) {
                                echo "<option value='".$fila->id_re_fa."'>".$fila->nombre_rf."  ".$fila->apellido_rf."</option>";
                              }//fin while
                            }
                          ?>  
                        </select>
                      </div>
                      <span class="help-block" id="error"></span>
                    </div>
                     
                    <?php
                      }
                    ?>
                    
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
    <script src="../../../build/configuraciones/validaciones/facultad/validar_edit.js"></script>
    
	
  </body>
</html>

