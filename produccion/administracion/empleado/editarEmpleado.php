<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
        $empleado = $_POST['id'];
        $con=conectarMysql();
        $consulta  = "SELECT * FROM empleado WHERE idempleado=".$empleado;
        $result = $con->query($consulta);
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $idempleado=$fila->idempleado;
                $nombre=$fila->nombre_em;
                $apellido=$fila->apellido_em;
                $dui=$fila->DUI_em;
                $nit=$fila->NIT_em;
                $direccion=$fila->direccion_em;
                $cargo=$fila->cargo_em;
                $estado_em=$fila->estado_ci;
                $telefono=$fila->telefono_em;
                $correo=$fila->correo_em;
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
              location.href='listaEmpleado.php';
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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE EMPLEADOS</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Editar Empleado</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Empleado" href="../../../produccion/administracion/empleado/listaEmpleado.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="formempleado" name="formempleado" method="POST" class="form-horizontal form-label-left">

                      <input type="hidden" id="bandera" name="bandera" >
                      <input type="hidden" id="baccion" name="baccion"  value="<?php echo $idempleado; ?>" >
                      <input type="hidden" id="validarcampo" name="validarcampo" value="<?php echo $nombre; ?>" >

                      <div class="form-group" id="resultnom">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre"> <span class="required" style="color: #CD5C5C;"> </span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="hidden" id="cargo" name="cargo" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" value="<?php echo $cargo; ?>" disabled>
                        </div>
                        <span class="help-block" id="resultnomerror"></span>
                      </div>
                     
                      <div class="form-group" id="resultnom">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" value="<?php echo $nombre; ?>" placeholder="Digite Nombre" >
                        </div>
                        <span class="help-block" id="resultnomerror"></span>
                      </div>

                      <div class="form-group" id="resultnom">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Apellido: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="apellido" name="apellido" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" value="<?php echo $apellido; ?>" placeholder="Digite Nombre" >
                        </div>
                        <span class="help-block" id="resultnomerror"></span>
                      </div>
                      <div class="form-group" id="resultnom">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Dui: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="dui" name="dui" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" value="<?php echo $dui; ?>" placeholder="Digite Nombre" >
                        </div>
                        <span class="help-block" id="resultnomerror"></span>
                      </div>
                      <div class="form-group" id="resultnom">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nit: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nit" name="nit" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" value="<?php echo $nit; ?>" placeholder="Digite Nombre" >
                        </div>
                        <span class="help-block" id="resultnomerror"></span>
                      </div>
                      <div class="form-group" id="resultnom">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Direccion: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="direccion" name="direccion" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" value="<?php echo $direccion; ?>" placeholder="Digite Nombre" >
                        </div>
                        <span class="help-block" id="resultnomerror"></span>
                      </div>
                      <div class="form-group" id="resultnom">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Estado: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="estado" name="estado" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" value="<?php echo $estado_em; ?>" placeholder="Digite Nombre" >
                        </div>
                        <span class="help-block" id="resultnomerror"></span>
                      </div>
                      <div class="form-group" id="resultnom">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Telefono: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="telefono" name="telefono" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" value="<?php echo $telefono; ?>" placeholder="Digite Nombre" >
                        </div>
                        <span class="help-block" id="resultnomerror"></span>
                      </div>
                      <div class="form-group" id="resultnom">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Correo: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="correo" name="correo" required="required" class="form-control col-md-7 col-xs-12" tabindex="1" value="<?php echo $correo; ?>" placeholder="Digite Nombre" >
                        </div>
                        <span class="help-block" id="resultnomerror"></span>
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
    <script src="../../../build/configuraciones/validaciones/empleado/validar_add.js"></script>
    <script src="../../../build/configuraciones/validaciones/empleado/ayuda_edit.js"></script>
	
  </body>
</html>

