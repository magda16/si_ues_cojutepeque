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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE FACULTADES</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Lista de Facultades Activas.</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Agregar Facultad" href="../../../produccion/administracion/facultad/registrar_facultad.php"><i class="fa fa-plus-circle"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Reporte Facultad" href="../../../build/configuraciones/reportes/facultad/reporte_lista_facultad.php"><i class="fa fa-print"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    

                    <input type="hidden" name="bandera" id="bandera">
                    <input type="hidden" name="baccion" id="baccion">

                    <p class="text-muted font-13 m-b-30">
                      Lista de todas las Facultades Activas.
                    </p>
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Facultad</th>
                          <th>Tel&eacute;fono</th>
                          <th>Correo</th>
                          <th>Representante</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require '../../../build/configuraciones/conexion.php';
                        $con=conectarMysql();
                        $result = $con->query("SELECT fa.idfacultad, fa.nombre_fa, fa.telefono_fa, fa.correo_fa, re.nombre_rf, re.apellido_rf FROM facultad as fa, representante_facultad as re WHERE fa.estado_fa=1 AND fa.id_re_fafk= re.id_re_fa ORDER BY fa.nombre_fa  ASC");
                        $contador=1;
                        if ($result) {
                            while ($fila = $result->fetch_object()) {
                            
                            echo "<tr>";
                            echo "<td>" .$contador. "</td>";
                            echo "<td>" . $fila->nombre_fa . "</td>";
                            echo "<td>" . $fila->telefono_fa . "</td>";
                            echo "<td>" . $fila->correo_fa . "</td>";
                            echo "<td>" . $fila->nombre_rf." ".$fila->apellido_rf. "</td>";
                            echo "<td> <a id='paso1' class='btn btn-success openBtn' type='button' onclick='ver(".$fila->idfacultad.")' data-toggle='tooltip' data-placement='top' title='Mostrar Facultad'><i class='fa fa-eye'></i></a>
                                       <a id='paso2' class='btn btn-info' onclick='editarfacultad(".$fila->idfacultad.")' data-toggle='tooltip' data-placement='top' title='Editar Facultad'><i class='fa fa-edit'></i></a>
                                    </td>";
                            echo "</tr>";
                            $contador++;

                            }
                        }
                        ?>
                      </tbody>
                    </table>
                    <form id="fromeditarfacultad" name="fromeditarfacultad" action="../../../produccion/administracion/facultad/editar_facultad.php" method="POST">
                      <input type="hidden" id="id" name="id">
                    </form>
                        
                    

                    </div>
                  </div>
                </div>
              </div>
            </div>

   
            </div>

            
            <!-- Modal -->
            <div class="modal fade" id="datosFacultad" name="datosFacultad" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content" id="insertarhtmlfacultad">

                    </div>
                </div>
            </div>
            <!-- Fin Modal -->

           
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
          <?php include ("../../complementos/pie_pagina.php"); ?>
          
        <!-- /footer content -->
      </div>
    </div>
    <?php include ("../../complementos/script_generales.php"); ?>
    <script src="../../../build/configuraciones/validaciones/facultad/validar_list.js"></script>
    <script src="../../../build/configuraciones/validaciones/facultad/ayuda_list.js"></script>
  </body>
</html>
