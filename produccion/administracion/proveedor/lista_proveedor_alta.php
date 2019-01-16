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
          <div class="col-sm-12">
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
              <div class="col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:RGB(205, 92, 92);">Lista de Proveedores Inactivos.</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    

                    <input type="hidden" name="bandera" id="bandera">
                    <input type="hidden" name="baccion" id="baccion">

                    <p class="text-muted font-13 m-b-30">
                      Lista de todos los Proveedores Inactivos.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nombre</th>
                          <th>Proveedor</th>
                          <th>Tel&eacute;fono</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require '../../../build/configuraciones/conexion.php';
                          $con=conectarMysql();
                          $result = $con->query("SELECT * FROM proveedor WHERE estado_p=0");
                          $contador=1;
                          if ($result) {
                            while ($fila = $result->fetch_object()) {
                             
                              echo "<tr>";
                              echo "<td>" .$contador. "</td>";
                              echo "<td>" . $fila->nombre_c ." ".$fila->apellido_c."</td>";
                              echo "<td>" . $fila->proveedor . "</td>";
                              echo "<td>" . $fila->telefono_p . "</td>";
                              echo "<td><a id='paso1' class='btn btn-success' type='button' onclick='ver(".$fila->idproveedor.")' data-toggle='tooltip' data-placement='top' title='Mostrar Proveedor'><i class='fa fa-eye'></i></a>
                                        <a id='paso2' class='btn btn-primary' onclick='confirmaralta(".$fila->idproveedor.")' data-toggle='tooltip' data-placement='top' title='Dar Alta Proveedor'><i class='fa fa-long-arrow-up'></i></a>
                                    </td>";
                              echo "</tr>";
                              $contador++;

                            }
                          }
                        ?>
                      </tbody>
                    </table>
                   
                    </div>
                  </div>
                </div>
              </div>
            </div>

   
            </div>

            <!-- Modal -->
            <div class="modal fade" id="datosProveedor" name="datosProveedor" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content" id="insertarhtmlproveedor">

                </div>
              </div>
            </div>
            <!-- Fin Modal -->


                    <!-- Modal -->
                    <form id="fromdarbaja" name="fromdarbaja">
                    <div class="modal fade" id="darBaja" name="darBaja" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog ">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Dar Alta Proveedor</h4>
                        </div>
                        

                        <div class="modal-body">
                        <br/>
                        
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observacion">Observaci&oacute;n: <span class="required" style="color: #CD5C5C;"> *</span>
                          </label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="observacion" name="observacion" placeholder="Digite una Observaci&oacute;n" class="form-control col-md-7 col-xs-12" tabindex="1">
                            <br>
                            <span class="help-block" id="error"></span>
                          </div>
                        </div>
                        <br><br><br><br>
                          
                        </div>
                        <div class="modal-footer">
                          <p align="left" style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                          <button class="btn btn-round btn-primary" type="button"  id="modalguardaralta" name="modalguardaralta"><i class="fa fa-save">  Guardar</i></button>
                        </div>

                       
                      </div>
                    </div>
                  </div>
                  </form>
                  <!-- Fin Modal -->
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
          <?php include ("../../complementos/pie_pagina.php"); ?>
          
        <!-- /footer content -->
      </div>
    </div>
    <?php include ("../../complementos/script_generales.php"); ?>
    <script src="../../../build/configuraciones/validaciones/proveedor/validar_list.js"></script>
    <script src="../../../build/configuraciones/validaciones/proveedor/ayuda_list_alta"></script>
	
  </body>
</html>
