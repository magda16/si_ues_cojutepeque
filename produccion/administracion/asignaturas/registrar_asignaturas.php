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
                <h4 style="color: RGB(0, 0, 128);"><strong>ADMINISTRACI&Oacute;N DE ASIGNATURAS</strong></h4>
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
                    <h2 style="color:RGB(205, 92, 92);">Plan de Estudio.</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    <!--  <li><a data-toggle="tooltip" data-placement="top" title="Agregar Facultad" href="../../../produccion/administracion/facultad/registrar_facultad.php"><i class="fa fa-plus-circle"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Reporte Facultad" href="../../../build/configuraciones/reportes/facultad/reporte_lista_facultad.php"><i class="fa fa-print"></i></a>
                      </li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <div align="center">
                    <form id="formplanestudio" name="formplanestudio" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" >
                        
                    

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right">Facultad: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="facultad" name="facultad">
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right">Carrera: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="carrera" name="carrera">
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right">A&ntilde;o: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <select class="form-control" id="plan" name="plan">
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                        <a id="agregar_planestudio" class="btn btn-danger" type="button" data-toggle="tooltip" data-placement="top" title="Agregar Plan de Estudio"><i class='fa fa-plus'></i></a>
                      </div>
                      </form>
                    </div>
                    <div class="clearfix"></div>
                    </br></br>

                    <form id="formasignaturas" name="formasignaturas" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" >
                    <input type="hidden" name="bandera" id="bandera">
                        
                    </form>

                   
       
                   
                        
                    

                    </div>
                  </div>
                </div>
              </div>
            </div>

            
                    <!-- Modal -->
                    <form id="fromplan" name="fromplan">
                    <div class="modal fade" id="registro_plan" name="registro_plan" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog ">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Agregar Plan de Estudio</h4>
                        </div>
                        

                        <div class="modal-body">
                        <br/>
                        
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12 text-right" for="anio">A&ntilde;o: <span class="required" style="color: #CD5C5C;"> *</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="anio" name="anio" placeholder="Digite año del Plan de Estudio" class="form-control col-md-7 col-xs-12" >
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
           
          
        </div>
        <!-- /page content -->

        <!-- footer content -->
          <?php include ("../../complementos/pie_pagina.php"); ?>
          
        <!-- /footer content -->
      </div>
    </div>
    <?php include ("../../complementos/script_generales.php"); ?>
    <script src="../../../build/configuraciones/validaciones/asignaturas/validar_add.js"></script>
    <script src="../../../build/configuraciones/validaciones/asignaturas/ayuda_add.js"></script>
  </body>
</html>
