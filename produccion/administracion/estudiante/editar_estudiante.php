<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    $estudiante = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT es.idestudiante, es.carnet_es, es.nombre_es, es.apellido_es, es.genero_es, es.NIT_es, es.DUI_es, es.direccion_es, es.telefono_es, es.correo_es, es.procedencia_es, es.estado_es, fa.nombre_fa,  ca.nombre_ca, pe.anio_pe,es.nivel, es.observacion_es FROM estudiante AS es, facultad AS fa, carrera AS ca, plan_estudio AS pe WHERE es.idfacultad=fa.idfacultad AND es.idcarrera=ca.idcarrera AND es.idplan_estudio=pe.idplanestudio AND es.idestudiante=".$estudiante;
    $result = $con->query($consulta);
     if ($result) {
       while ($fila = $result->fetch_object()) {
         $idestudiante=$fila->idestudiante;
         $carnet=$fila->carnet_es;
         $nombre=$fila->nombre_es;
         $apellido=$fila->apellido_es;
         $genero=$fila->genero_es;
         $institucion=$fila->procedencia_es;
         $nit=$fila->NIT_es;
         $dui=$fila->DUI_es;
         $direccion=$fila->direccion_es;
         $telefono=$fila->telefono_es;
         $correo=$fila->correo_es;
         $facultad=$fila->nombre_fa;
         $carrera=$fila->nombre_ca;
         $planestudio=$fila->anio_pe;
         $nivel=$fila->nivel;
       }
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
              location.href='lista_estudiante.php';
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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE ESTUDIANTES</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Editar Estudiante</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Estudiantes" href="../../../produccion/administracion/estudiante/lista_estudiante.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                   
                    <form id="formestudiante" name="formestudiante" method="POST" class="form-horizontal form-label-left">

                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" id="baccion" name="baccion"  value="<?php echo $idestudiante; ?>">
        
                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos Personales:</strong></p></h5>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carnet">Carnet: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="carnet" name="carnet" required="required" value="<?php echo $carnet; ?>" tabindex="1" placeholder="Digite Carnet">
                          <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_e">Nombres: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="nombre_e" name="nombre_e" required="required" value="<?php echo $nombre; ?>" tabindex="2" placeholder="Digite Nombres">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido_e">Apellidos: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="apellido_e" name="apellido_e" tabindex="3" required="required" value="<?php echo $apellido; ?>" placeholder="Digite Apellidos">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div> 

                      <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12 control-label">Genero: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="radio col-md-6 col-sm-6 col-xs-12">
                        <label>
                        <input type="radio" class="flat" id="genero_e" value="Masculino" name="genero_e" <?php if($genero=="Masculino") echo "checked"; ?> > Masculino </label>
                        <label>
                        <input type="radio" class="flat" id="genero_e" value="Femenino" name="genero_e" <?php if($genero=="Femenino") echo "checked"; ?> > Femenino </label>
                        </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit_e">NIT: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control has-feedback-left" id="nit_e" name="nit_e" data-inputmask="'mask': '9999-999999-999-9'" required="required" value="<?php echo $nit; ?>" tabindex="4" placeholder="Digite NIT">
                        <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui_e">DUI: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="dui_e" name="dui_e" data-inputmask="'mask': '99999999-9'" required="required" value="<?php echo $dui; ?>" tabindex="5" placeholder="Digite DUI">
                          <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>                                        
                      

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono_e">Teléfono: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="telefono_e" name= "telefono_e" data-inputmask="'mask': '9999-9999'" required="required" value="<?php echo $telefono; ?>" tabindex="6" placeholder="Digite Número de Teléfono">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo_e">Correo Electrónico: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="correo_e" name= "correo_e" required="required" value="<?php echo $correo; ?>" tabindex="7" placeholder="Digite Correo Electrónico">
                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion_e">Direcci&oacute;n: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control has-feedback-left" id="direccion_e" name="direccion_e" required="required" value="<?php echo $direccion; ?>" tabindex="8" placeholder="Digite Direcci&oacute;n">
                          <span class="fa fa-truck form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nivel en la Carrera: <span style="color:	#000080;"> '</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label  "><?php echo $nivel; ?> </label>
                        </div>
                      </div>
                      
                      <h5> <strong><p style="color:RGB(0, 0, 128);">Educación Media:</strong></p></h5> 
                      
                      <div class="form-group">
                      <label class="col-md-3 col-sm-3 col-xs-12 control-label">Procedencia: <span style="color:	#000080;"> '</span></label>
                        <div class="radio col-md-6 col-sm-6 col-xs-12">
                        <label>
                        <input type="radio" class="flat" id="institucion_e" value="Publica" disabled name='institucion_e' <?php if($institucion=="Publica") echo "checked"; ?> > Pública </label>
                        <label>
                        <input type="radio" class="flat" id="institucion_e" value="Privada" disabled name='institucion_e' <?php if($institucion=="Privada") echo "checked"; ?> > Privada </label>
                        </div>
                      </div> 
                      
                      
                      
                                          
                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Educación Superior:</strong></p></h5> 
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Facultad: <span style="color:	#000080;"> '</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label  "><?php echo $facultad; ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Carrera: <span style="color:	#000080;"> '</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label  "><?php echo $carrera; ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Plan de Estudio: <span style="color:	#000080;"> '</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label  "><?php echo $planestudio; ?> </label>
                        </div>
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
    <script src="../../../build/configuraciones/validaciones/estudiante/validar_edit.js"></script>
    <script src="../../../build/configuraciones/validaciones/estudiante/ayuda_edit.js"></script>
  </body>
</html>
