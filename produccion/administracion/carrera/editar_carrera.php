<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    $carrera = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT ca.idcarrera, ca.codigo_ca, ca.nombre_ca, ca.duracion_ca, ca.estado_ca, fa.nombre_fa FROM carrera as ca, facultad as fa WHERE ca.idfacultadfk=fa.idfacultad AND ca.idcarrera=".$carrera;
    $result = $con->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
            $idcarrera=$fila->idcarrera;
            $codigo=$fila->codigo_ca;
            $nombre=$fila->nombre_ca;
            $duracion=$fila->duracion_ca." A&ntilde;os";
            $facultad=$fila->nombre_fa;
        }//fin while
      }
    } 
?>

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
              location.href='lista_carrera.php';
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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE CARRERAS</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Editar Carrera</h2>
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
                    <form id="formcarrera" name="formcarrera" method="POST" class="form-horizontal form-label-left">

                      <input type="hidden" id="bandera" name="bandera" >
                      <input type="hidden" id="baccion" name="baccion"  value="<?php echo $idcarrera; ?>">
                      <input type="hidden" id="validarcampo" name="validarcampo" value="<?php echo $nombre; ?>">
                      <div class="form-group" id="resultcod">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="codigo">C&oacute;digo: <span style="color:	#000080;"> '</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label  "><?php echo $codigo; ?> </label>
                        </div>
                      </div>

                      <div class="form-group" id="resultnom">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre: <span class="required" style="color: #CD5C5C;"> *</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre; ?>">
                        </div>
                        <span class="help-block" id="resultnomerror"></span>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Duraci&oacute;n Carrera: <span style="color:	#000080;"> '</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label  "><?php echo $duracion; ?> </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Facultad: <span style="color:	#000080;"> '</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label class="control-label  "><?php echo $facultad; ?> </label>
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
    <script src="../../../build/configuraciones/validaciones/carrera/validar_edit.js"></script>
    
	
  </body>
</html>

