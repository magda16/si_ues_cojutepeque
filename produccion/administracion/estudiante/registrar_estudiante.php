<!DOCTYPE html>
<html lang="en">
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
              location.href='registrar_estudiante.php';
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

          <!-- inicia todo el panel de trabajo para estudiante -->
        <div class="right_col" role="main">
          <div class="col-sm-12 col-sm-offset-2 col-md-8 col-md-offset-2">
            <div class="page-title ">
              <div class="title_left">
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE ESTUDIANTES</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Registrar Estudiante</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Add career" ><i class="fa fa-plus-circle"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="formestudiante" name="formestudiante" action="../../../build/configuraciones/sql/estudiante/guardar_estudiante.php"  method="POST" class="form-horizontal form-label-left">

                      <input type="hidden" name="bandera" id="bandera">

                        <!-- Inicia panel de cajitas para estudiante -->
                      
                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos Personales:</strong></p></h5>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carnet">Carnet: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="canret" name="carnet" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" placeholder="Digite Carnet">
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_e">Nombres: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="nombre_e" name="nombre_e" required="required" tabindex="2" placeholder="Digite Nombres">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido_e">Apellidos: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="apellido_e" name="apellido_e" tabindex="3" required="required" placeholder="Digite Apellidos">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div> 

                      <div class='form-group'>
                      <label class='col-md-3 col-sm-3 col-xs-12 control-label'>Genero: <span class="required" style="color: #CD5C5C;"> *</span></label>
                      <div class='radio col-md-6 col-sm-6 col-xs-12'>
                      <label>
                      <input type='radio' class='flat' id="genero_e" value="Masculino" name='genero_e' checked> Masculino </label>
                      <label>
                      <input type='radio' class='flat' id="genero_e" value="Femenino" name='genero_e'> Femenino </label>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit_e">NIT: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nit_e" name="nit_e" required="required" class="form-control col-md-7 col-xs-12" tabindex="4" placeholder="Digite Número de NIT">
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui_e">DUI: <span class="required" style="color: #CD5C5C;"> *</span></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="dui_e" name="dui_e" required="required" class="form-control col-md-7 col-xs-12" tabindex="5" placeholder="Digite Número de DUI">
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>                                        
                      

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono_e">Teléfono: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="telefono_e" name= "telefono_e" required="required" tabindex="6" placeholder="Digite Número de Teléfono">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo_e">Correo Electrónico: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="correo_e" name= "correo_e" required="required" tabindex="7" placeholder="Digite Correo Electrónico">
                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion_e">Direcci&oacute;n: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="direccion_e" name="direccion_e" required="required" class="form-control col-md-7 col-xs-12" tabindex="8">
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>
                      
                      <h5> <strong><p style="color:RGB(0, 0, 128);">Educación Media:</strong></p></h5> 
                      
                      <div class='form-group'>
                      <label class='col-md-3 col-sm-3 col-xs-12 control-label'>Procedencia: <span class="required" style="color: #CD5C5C;"> *</span></label>
                      <div class='radio col-md-6 col-sm-6 col-xs-12'>
                      <label>
                      <input type='radio' class='flat' id="institucion_e" value="Publica" name='institucion_e' checked> Pública </label>
                      <label>
                      <input type='radio' class='flat' id="institucion_e" value="Privada" name='institucion_e'> Privada </label>
                      </div>
                      </div>  
                      
                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Educación Superior:</strong></p></h5> 

                   <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Facultad: <span class="required" style="color: #CD5C5C;"> *</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="facultad" name="facultad">
                          <option selected="selected" value="">Seleccione Facultad...</option>
                          <?php
                            require '../../../build/configuraciones/conexion.php';
                            $con=conectarMysql();
                            $consulta  = "SELECT * FROM facultad WHERE estado_fa='1' ORDER BY nombre_fa";
                            $result = $con->query($consulta);
                            if ($result) {
                              while ($fila = $result->fetch_object()) {
                                echo "<option value='".$fila->idfacultad."'>".$fila->nombre_fa."</option>";
                              }//fin while
                            }
                          ?>  
                        </select>
                      </div>
                      <span class="help-block" id="error"></span>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Carrera: <span class="required" style="color: #CD5C5C;"> *</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="carrera" name="carrera">
                        </select>
                      </div>
                      <span class="help-block" id="error"></span>
                    </div>                  
                      <!-- Termina panel de trabajo para estudiante -->

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
    <script src="../../../build/configuraciones/validaciones/estudiante/validar_add.js"></script>
    
  </body>
</html>