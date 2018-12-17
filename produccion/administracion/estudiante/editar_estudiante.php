<?php
     require '../../../build/configuraciones/conexion.php';
     $con=conectarMysql();
     $id=$_REQUEST['id'];
     $result = $con->query("SELECT * FROM estudiante WHERE idestudiante=".$id);
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
         $facultad=$fila->idfacultad;
         $carrera=$fila->idcarrera;
       }
     }

?>
<!DOCTYPE html>
<html lang="es">
<!-- abrir head  -->
<head>

<?php include '../../global/head.php' ?>


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
              location.href='listar_Estudiante.php';
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
            <a href="#" class="site_title"><img src="../../../public/images/logo2.png"/><span> Sede Cojutepeque</span></a>
          </div>
          <div class="clearfix"></div>
        
          <br />
          <?php include '../../global/menu.php' ?>
        </div>
      </div>
     <?php include '../../global/navigation.php' ?>
      <!-- page content Panel de Trabajo -->
      <div class="right_col" role="main">
      <!--Monty: Aqui dentro iria todo lo necesario para el panel de trabajo -->

      <!--Magda titulo de plan -->
      <div class="page-title">
            <div class="col-sm-12 col-sm-offset-2 col-md-8 col-md-offset-2 ">
              <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACIÓN DE ESTUDIANTES.</strong></h4>
              </div> 
        </div>
        <div class="clearfix"></div>

        <div class="row" >
              <div class="col-sm-12 col-sm-offset-2 col-md-8 col-md-offset-2 ">
                <div class="x_panel" >
                  <div class="x_title">
                    <h4 style="color:RGB(205, 92, 92);">Registro de Estudiante.</h4>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a href="listar_Estudiante.php">Lista de Estudiantes</a>
                    </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="formestudiante" action="../../../build/config/sql/estudiante/guardar_estudiante.php" method="POST" data-parsley-validate class="form-horizontal form-label-left">
                  <input type="hidden" name="bandera" id="bandera">
                  <input type="hidden" name="baccion" id="baccion" value="<?php echo $idestudiante; ?>">
                       <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos Personales:</strong></p></h5>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="carne">Carné: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="canre" name="carne" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $carnet; ?>" tabindex="1" placeholder="Digite Carné">
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

                      <div class='form-group'>
                      <label class='col-md-3 col-sm-3 col-xs-12 control-label'>Genero: <span class="required" style="color: #CD5C5C;"> *</span></label>
                      <div class='radio col-md-6 col-sm-6 col-xs-12'>
                      <label>
                      <input type='radio' class='flat' id="genero_e" value="Masculino" name='genero_e' <?php if($genero=="Masculino") echo "checked"; ?>> Masculino </label>
                      <label>
                      <input type='radio' class='flat' id="genero_e" value="Femenino" name='genero_e' <?php if($genero=="Femenino") echo "checked"; ?>> Femenino </label>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit_e">NIT: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nit_e" name="nit_e" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nit; ?>" tabindex="4">
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui_e">DUI: <span class="required" style="color: #CD5C5C;"> *</span></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="dui_e" name="dui_e" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $dui; ?>" tabindex="5">
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>                                        
                      

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono_e">Teléfono: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="telefono_e" name= "telefono_e" required="required" tabindex="6" value="<?php echo $telefono; ?>" placeholder="Digite Número de Teléfono">
                      <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo_e">Correo Electrónico: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control has-feedback-left" id="correo_e" name= "correo_e" required="required" tabindex="7" value="<?php echo $correo; ?>" placeholder="Digite Correo Electrónico">
                      <span class="fa fa-envelope-o form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="direccion_e">Direcci&oacuten;: <span class="required" style="color: #CD5C5C;"> *</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="direccion_e" name="direccion_e" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $direccion; ?>" tabindex="8">
                      </div>
                      <span class="help-block" id="error"></span>
                      </div>
                      
                      <h5> <strong><p style="color:RGB(0, 0, 128);">Educación Media:</strong></p></h5> 
                      
                      <div class='form-group' >
                      <label class='col-md-3 col-sm-3 col-xs-12 control-label'>Procedencia: <span style="color:	#000080;"> '</span></label>
                      <div class='radio col-md-6 col-sm-6 col-xs-12'>
                      <label>
                      <input type='radio' class='flat' id="institucion_e" value="Publica" disabled name='institucion_e' <?php if($institucion=="Publica") echo "checked"; ?>> Pública </label>
                      <label>
                      <input type='radio' class='flat' id="institucion_e" value="Privada" disabled name='institucion_e' <?php if($institucion=="Privada") echo "checked"; ?>> Privada </label>
                      </div>
                      </div>                     
                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Educación Superior:</strong></p></h5> 

                   <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Facultad: <span style="color:	#000080;"> '</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="facultad" name="facultad" disabled>
                          <?php
                            
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
                      <script language="javascript">
                        document.forms['formestudiante']['facultad'].value=<?php echo $facultad; ?>;
                      </script>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Carrera: <span style="color:	#000080;"> '</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" id="carrera" name="carrera" disabled>
                          <?php
                            
                            $consulta  = "SELECT * FROM carrera WHERE estado_ca='1' ORDER BY nombre_ca";
                            $result = $con->query($consulta);
                            if ($result) {
                              while ($fila = $result->fetch_object()) {
                                echo "<option value='".$fila->idcarrera."'>".$fila->nombre_ca."</option>";
                              }//fin while
                            }
                          ?>  
                        
                        </select>
                      </div>
                      <script language="javascript">
                        document.forms['formestudiante']['carrera'].value=<?php echo $carrera; ?>;
                      </script>
                    </div>                    

                    
                    <div class="ln_solid"></div>
                    <p style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                    <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios Editables.</p> 
                    <div class="form-group" align="right">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-round btn-primary" type="submit"  id="btnmodificar" value="moficicar"><i class="fa fa-refresh">  Actualizar</i></button>
                        <button class="btn btn-round btn-default" type="reset" onclick="cancelar()"><i class="fa fa-ban">  Cancelar</i></button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>
      
      </div>
      <!-- /page content -->    
      <?php include '../../global/footer.php' ?>
    </div>
  </div>       
  
  <?php include '../../global/script.php' ?> 
 <script src="../../../build/config/validaciones/estudiante/validarmod.js"></script>
</body>
</html>