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
          <div class="col-sm-12">
            <div class="page-title ">
              <div class="title_left">
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE REPRESENTANTES DE FACULTAD</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Lista de Representantes de Facultad Activos.</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Agregar Representante" href="../../../produccion/administracion/representante/registrar_representante.php" ><i class="fa fa-plus-circle"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    

                    <input type="hidden" name="bandera" id="bandera">
                    <input type="hidden" name="baccion" id="baccion">

                    <p class="text-muted font-13 m-b-30">
                      Lista de todos los Representantes de Facultad Activos.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th style="color: RGB(0, 0, 128);">No.</th>
                          <th style="color: RGB(0, 0, 128);">Nombres</th>
                          <th style="color: RGB(0, 0, 128);">Apellidos</th>
                          <th style="color: RGB(0, 0, 128);">Tel&eacute;fono</th>
                          <th style="color: RGB(0, 0, 128);">Correo Electr&oacute;nico</th>
                          <th style="color: RGB(0, 0, 128);">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          require '../../../build/configuraciones/conexion.php';
                          $con=conectarMysql();
                          $result = $con->query("SELECT id_re_fa, nombre_rf, apellido_rf, genero_rf, telefono_rf, correo_rf, IF(EXISTS (SELECT * FROM facultad AS fa WHERE fa.id_re_fafk = rf.id_re_fa), 'no', 'si') AS editar FROM representante_facultad AS rf WHERE estado_rf=1 ORDER BY nombre_rf ASC");
                          $contador=1;
                          if ($result) {
                            while ($fila = $result->fetch_object()) {
                            
                              echo "<tr>";
                              echo "<td>" .$contador. "</td>";
                              echo "<td>" . $fila->nombre_rf . "</td>";
                              echo "<td>" . $fila->apellido_rf . "</td>";
                              echo "<td>" . $fila->telefono_rf . "</td>";
                              echo "<td>" . $fila->correo_rf. "</td>";
                              echo "<td> <a id='paso1' class='btn btn-success' type='button' onclick='ver(".$fila->id_re_fa.")' data-toggle='tooltip' data-placement='top' title='Mostrar Representante'><i class='fa fa-eye'></i></a>
                                        <a id='paso2' class='btn btn-info' onclick='editarrepresentante(".$fila->id_re_fa.")' data-toggle='tooltip' data-placement='top' title='Editar Representante'><i class='fa fa-edit'></i></a>";
                                        if($fila->editar=='si'){
                                        echo "<a id='paso3' class='btn btn-danger' onclick='confirmar(".$fila->id_re_fa.")' data-toggle='tooltip' data-placement='top' title='Dar Baja Representante'><i class='fa fa-long-arrow-down'></i></a>";
                                      }else{
                                        echo "<a id='paso3' class='btn btn-danger' data-toggle='tooltip' data-placement='top' title='No Editable' disabled><i class='fa fa-long-arrow-down'></i></a>";
                                      }
                                        echo "</td>";
                              echo "</tr>";
                              $contador++;

                            }
                          }
                        ?>
                      </tbody>
                    </table>
                    <form id="fromeditarrepresentante" name="fromeditarrepresentante" action="../../../produccion/administracion/representante/editar_representante.php" method="POST">
                      <input type="hidden" id="id" name="id">
                    </form>
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>

   
            </div>

            <!-- Modal -->
            <div class="modal fade" id="datosRepresentante" name="datosRepresentante" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content" id="insertarhtmlrepresentante">

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
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Dar Baja Representante de Facultad</h4>
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
    <script src="../../../build/configuraciones/validaciones/representante/validar_list.js"></script>
    <script src="../../../build/configuraciones/validaciones/representante/ayuda_list.js"></script>
    
	
  </body>
</html>
