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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE CATALOGO</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Lista Catalogo de Activo Fijo.</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Agregar Carrera" href="../../../produccion/administracion/carrera/registrar_carrera.php"><i class="fa fa-plus-circle"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Reporte Carrera" href="../../../build/configuraciones/reportes/carrera/reporte_lista_carrera.php"><i class="fa fa-print"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  

                    <input type="hidden" name="bandera" id="bandera">
                    <input type="hidden" name="baccion" id="baccion">

                    <p class="text-muted font-13 m-b-30">
                      Lista de todas las Cuentas de Activo Fijo.
                    </p>
                    <!-- inicio del div panel -->
                    <div>
                    <?php

                    echo "<table id='datatable-responsive1' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%'>";
                    
                    
                    require '../../../build/configuraciones/conexion.php';
                    $con=conectarMysql();
                    $result = $con->query("SELECT * FROM af_categoria");
                    $cont=1;
                    if ($result) {
                      while ($fila = $result->fetch_object()) {
                        $categoria=$fila->idafcategoria;

                   
                   
                        

                    echo "<input type='hidden' name='bandera' id='bandera'>";
                    echo "<input type='hidden' name='baccion' id='baccion'>";

                         
                
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th colspan='4'> <h4 style='color: RGB(0, 0, 128);'>".$fila->nombre_c.".</h4></th>";                    
                    echo "<th ><div align='center'><a id='paso4' class='btn btn-danger' type='button' onclick='imprecepciondocumentos(".$fila->idafcategoria.")' data-toggle='tooltip' data-placement='top' title='Agregar Tipo de Bien'><i class='fa fa-plus'></i></a>";
                    echo "<a id='paso4' class='btn btn-default' type='button' onclick='imprecepciondocumentos(".$fila->idafcategoria.")' data-toggle='tooltip' data-placement='top' title='Imprimir Carrera por Facultad'><i class='fa fa-print'></i></a></div></th>";
                    echo "</tr>";
                    
                   
                    echo "<tr>";
                    echo "<th color: RGB(0, 0, 128);'>No.</th>";
                    echo "<th color: RGB(0, 0, 128);'>C&oacute;digo</th>";
                    echo "<th color: RGB(0, 0, 128);'>Tipo de Bien</th>";
                    echo "<th color: RGB(0, 0, 128);'>Abreviaci&oacute;n</th>";
                    

                    echo "<th>Acciones</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                             
                                
                                $result2 = $con->query("SELECT * FROM af_subcategoria WHERE idafcategoriafk='$categoria'");
                                $contador=1;
                                if ($result2) {
                                  while ($fila2 = $result2->fetch_object()) {
                                  
                                    echo "<tr>";
                                    echo "<td>" .$contador. "</td>";
                                    echo "<td>" . $fila2->codigo_s . "</td>";
                                    echo "<td>" . $fila2->nombre_s . "</td>";
                                    echo "<td>" . $fila2->id_nombre_s . "</td>";
                                   
                                    echo "<td align='center'> <a id='paso1' class='btn btn-success' type='button' onclick='ver(".$fila2->idafsubc.")' data-toggle='tooltip' data-placement='top' title='Mostrar Carrera'><i class='fa fa-eye'></i></a>
                                              <a id='paso2' class='btn btn-info' onclick='editarcarrera(".$fila2->idafsubc.")' data-toggle='tooltip' data-placement='top' title='Editar Carrera'><i class='fa fa-edit'></i></a>
                                              </td>";
                                    echo "</tr>";
                                    
                                    $contador++;

                                  }
                                }
                             
                            
                            
              }
            }
            echo "</tbody>";
            echo "</table>";
          ?>
                    </div>
                    <!-- fin div panel -->

                    


                    <form id="fromeditarcarrera" name="fromeditarcarrera" action="../../../produccion/administracion/carrera/editar_carrera.php" method="POST">
                      <input type="hidden" id="id" name="id">
                    </form>
                        
                    

                    </div>
                  </div>
                </div>
              </div>
            </div>

   
            </div>

            <!-- Modal -->
            <div class="modal fade" id="datosCarrera" name="datosCarrera" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog ">
                <div class="modal-content" id="insertarhtmlcarrera">

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
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Dar Baja Carrera</h4>
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
    <script src="../../../build/configuraciones/validaciones/carrera/validar_list.js"></script>
    <script src="../../../build/configuraciones/validaciones/carrera/ayuda_list.js"></script>
	
  </body>
</html>
