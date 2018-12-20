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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE AULAS</strong></h4>
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
              <div class="col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:RGB(205, 92, 92);">Lista de Aulas Activas.</h2>
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
                      <li><a data-toggle="tooltip" data-placement="top" title="Agregar Aula" href="../../../produccion/administracion/aula/registrar_aula.php" ><i class="fa fa-plus-circle"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <input type="hidden" name="bandera" id="bandera">
                    <input type="hidden" name="baccion" id="baccion">

                    <p class="text-muted font-13 m-b-30">
                      Lista de todas las Aulas Activas.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nombre</th>
                          <th>Ubicaci&oacute;n</th>
                          <th>Capacidad</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require '../../../build/configuraciones/conexion.php';
                          $con=conectarMysql();
                          $result = $con->query("SELECT idaula, nombre_au, ubicacion_au, cantidad_au FROM aula WHERE estado_au=1");
                          $contador=1;
                          if ($result) {
                            while ($fila = $result->fetch_object()) {
                             
                              echo "<tr>";
                              echo "<td>" .$contador. "</td>";
                              echo "<td>" . $fila->nombre_au . "</td>";
                              echo "<td>" . $fila->ubicacion_au . "</td>";
                              echo "<td>" . $fila->cantidad_au . "</td>";
                              echo "<td> <a class='btn btn-success openBtn' type='button' onclick='ver(".$fila->idaula.")' data-toggle='tooltip' data-placement='top' title='Mostrar Aula'><i class='fa fa-eye'></i></a>
                                        <a class='btn btn-info' onclick='editaraula(".$fila->idaula.")' data-toggle='tooltip' data-placement='top' title='Editar Aula'><i class='fa fa-edit'></i></a>
                                        <a class='btn btn-danger' onclick='confirmar(".$fila->idaula.")' data-toggle='tooltip' data-placement='top' title='Dar Baja Aula'><i class='fa fa-long-arrow-down'></i></a>
                                          </td>";
                              echo "</tr>";
                              $contador++;

                            }
                          }
                        ?>
                      </tbody>
                    </table>
                    <form id="fromeditaraula" name="fromeditaraula" action="../../../produccion/administracion/aula/editar_aula.php" method="POST">
                      <input type="hidden" id="id" name="id">
                    </form>
                        
                    

                    </div>
                  </div>
                </div>
              </div>
            </div>

   
            </div>

            <!-- Modal -->
            <div class="modal fade" id="datosAula" name="datosAula" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content" id="insertarhtmlaula">

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
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Dar Baja Aula</h4>
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
                          <button class="btn btn-round btn-primary" type="button"  id="modalguardar" name="modalguardar"><i class="fa fa-save">  Guardar</i></button>
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
    <script src="../../../build/configuraciones/validaciones/aula/validar_list.js"></script>
    
	
  </body>
</html>
