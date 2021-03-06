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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE RECEPCI&Oacute;N DE DOCUMENTOS</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Lista de Documentos Activos.</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Agregar Documentos" href="../../../produccion/administracion/recepcion_documentos/registrar_re_doc.php"><i class="fa fa-plus-circle"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    

                    <input type="hidden" name="bandera" id="bandera">
                    <input type="hidden" name="baccion" id="baccion">

                    <div align="center">
                      <div class="form-group">
                        <label style="color: RGB(0, 0, 128);" class="control-label col-md-3 col-sm-3 col-xs-12 text-right">Facultad: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="facultad" name="facultad">
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label style="color: RGB(0, 0, 128);"class="control-label col-md-3 col-sm-3 col-xs-12 text-right">Carrera: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="carrera" name="carrera">
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                      
                    </div>
                    <div class="clearfix"></div>
                   </br></br>

                    
                    

                    <!-- inicio tabla-->
                    <div id="div_tabla_re_doc">
                    </div>
                    <!-- fin tabla-->

                    
                    
                    
                    <form id="fromrecepciondocumentos" name="fromrecepciondocumentos" action="../../../produccion/administracion/recepcion_documentos/editar_re_doc.php" method="POST">
                      <input type="hidden" id="id" name="id">
                    </form>

                    <form id="fromimprecepciondocumentos" name="fromimprecepciondocumentos" action="../../../build/configuraciones/reportes/recepcion_documentos/reporte_comprobante_estudiante.php" method="POST">
                      <input type="hidden" id="idimp" name="idimp">
                    </form>

                    <div>
                        <div class="ln_solid"></div>
                        <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios Editables.</p> 
                    </div>
                        
                   
                    

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
    <script src="../../../build/configuraciones/validaciones/recepcion_documentos/validar_list.js"></script>
    <script src="../../../build/configuraciones/validaciones/recepcion_documentos/ayuda_list.js"></script>
  </body>
</html>
