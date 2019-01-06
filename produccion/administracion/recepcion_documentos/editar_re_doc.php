<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
        $id=$_REQUEST['id'];
        $con=conectarMysql();
        $consulta  = "SELECT * FROM representante_facultad WHERE id_re_fa=".$id;
        $result = $con->query($consulta);
            if ($result) {
            while ($fila = $result->fetch_object()) {
                $id_re_fa=$fila->id_re_fa;
                $nombre=$fila->nombre_rf;
                $apellido=$fila->apellido_rf;
                $genero=$fila->genero_rf;
                $telefono=$fila->telefono_rf;
                $correo=$fila->correo_rf;
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
              location.href='lista_re_doc.php';
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
              <div class="col-sm-12 col-sm-offset-2 col-md-8 col-md-offset-2">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 style="color:RGB(205, 92, 92);">Editar Recepci&oacute;n de Documentos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a data-toggle="tooltip" data-placement="top" title="Lista Recepci&oacute;n de Documentos" href="../../../produccion/administracion/recepcion_documentos/lista_re_doc.php" ><i class="fa fa-list"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <?php
                      $consulta  = "SELECT rf.id_re_fa, rf.nombre_rf, rf.apellido_rf FROM representante_facultad AS rf LEFT JOIN facultad AS f ON rf.id_re_fa=f.id_re_fafk WHERE f.id_re_fafk IS NULL ORDER BY nombre_rf";
                      $result = $con->query($consulta);
                      $obtenerfilas=mysqli_num_rows($result);
                      /*echo "<script language='javascript'>";
                      echo "alert($obtenerfilas);";
                      echo "</script>";*/


                      if ($obtenerfilas==0) {
                        echo "<div class='alert alert-danger alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Advertencia!</strong> Necesita Agregar un Representante para Administrar la Facultad.</div>";
                      }

                    ?>
                    <form id="formredoc" name="formredoc" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" >
                      <input type="hidden" name="bandera" id="bandera">
                      <input type="hidden" name="carpeta" id="carpeta">
                      <input type="hidden" name="idestudiante" id="idestudiante">

                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos Academicos:</strong></p></h5>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Facultad: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="facultad" name="facultad">
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Carrera: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="carrera" name="carrera">
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Estudiante: <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="estudiante" name="estudiante">
                          </select>
                        </div>
                        <span class="help-block" id="error"></span>
                      </div>
                      <br>
                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Datos Certificado M&eacute;dico:</strong></p></h5>
                      <div class='form-group'>
                        <label class='col-md-3 col-sm-3 col-xs-12 control-label'>Pago de Certificado M&eacute;dico ($) : <span class="required" style="color: #CD5C5C;"> *</span></label>
                        <br>
                        <div class='radio col-md-6 col-sm-6 col-xs-12'>
                        <label>
                        <input type='radio' class='flat' id="pagocertificado" value="Pendiente" name='pagocertificado' checked> Pendiente </label>
                        <label>
                        <input type='radio' class='flat' id="pagocertificado" value="Cancelado" name='pagocertificado'> Cancelado </label>
                        </div>
                        </div>

                        <div class="form-group" id="cm">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="certificado_medico">Certificado M&eacute;dico: <span class="required" style="color: #CD5C5C;"> </span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="certificado_medico" name="certificado_medico" accept=".pdf,.jpg,.png">
                        </div>
                        <a class="btn btn-success" type="button" id="mostrar" name="mostrar" data-toggle="tooltip" data-placement="top" title="Mostrar Certificado M&eacute;dico"><i class="fa fa-eye"></i></a>
                      </div>

                      <br>
                      <h5> <strong><p style="color:RGB(0, 0, 128);"> Documentos Requeridos:</strong></p></h5>
                      <div id="privada">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="matricula">Matricula: <span class="required" style="color: #CD5C5C;"> </span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="matricula" name="matricula"  accept=".pdf,.jpg,.png">
                          </div>
                          <a class="btn btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Mostrar Matricula"><i class="fa fa-eye"></i></a>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pcuota">Primera Cuota: <span class="required" style="color: #CD5C5C;"> </span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="pcuota" name="pcuota"  accept=".pdf,.jpg,.png">
                          </div>
                          <a class="btn btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Mostrar Primera Cuota"><i class="fa fa-eye"></i></a>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dui">DUI: <span class="required" style="color: #CD5C5C;"> </span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="dui" name="dui"  accept=".pdf,.jpg,.png">
                        </div>
                        <a class="btn btn-success" type="button" id="mostrar_dui" name="mostrar_dui"  data-toggle="tooltip" data-placement="top" title="Mostrar DUI"><i class="fa fa-eye"></i></a>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nit">NIT: <span class="required" style="color: #CD5C5C;"> </span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="nit" name="nit"  accept=".pdf,.jpg,.png">
                        </div>
                        <a class="btn btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Mostrar NIT"><i class="fa fa-eye"></i></a>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="paes">Paes: <span class="required" style="color: #CD5C5C;"> </span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="paes" name="paes"  accept=".pdf,.jpg,.png">
                        </div>
                        <a class="btn btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Mostrar Paes"><i class="fa fa-eye"></i></a>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="partida">Partida de Nacimiento: <span class="required" style="color: #CD5C5C;"> </span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="partida" name="partida"  accept=".pdf,.jpg,.png">
                        </div>
                        <a class="btn btn-success" type="button" data-toggle="tooltip" data-placement="top" title="Mostrar Partida de Nacimiento"><i class="fa fa-eye"></i></a>
                      </div>

                      <div class="ln_solid"></div>
                        <p style="color:RGB(205, 92, 92);">( * ) Campos Obligatorios.</p>
                        <div class="form-group" align="right">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
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
    <script src="../../../build/configuraciones/validaciones/recepcion_documentos/validar_edit.js"></script>
    <script src="../../../build/configuraciones/validaciones/recepcion_documentos/ayuda_edit.js"></script>
  </body>
</html>
