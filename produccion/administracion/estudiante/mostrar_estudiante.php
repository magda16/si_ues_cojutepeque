<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    $estudiante = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT es.idestudiante, es.carnet_es, es.nombre_es, es.apellido_es, es.genero_es, es.NIT_es, es.DUI_es, es.direccion_es, es.telefono_es, es.correo_es, es.procedencia_es, es.estado_es, fa.nombre_fa, ca.nombre_ca, pe.anio_pe, es.nivel, es.observacion_es FROM estudiante AS es, facultad AS fa, carrera AS ca, plan_estudio AS pe WHERE es.idfacultad=fa.idfacultad AND es.idcarrera=ca.idcarrera AND es.idplan_estudio=pe.idplanestudio AND es.idestudiante=".$estudiante;
    $result = $con->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $carnet=$fila->carnet_es;
          $nombre=$fila->nombre_es;
          $apellido=$fila->apellido_es;
          $genero=$fila->genero_es;
          $nit=$fila->NIT_es;
          $dui=$fila->DUI_es;
          $telefono=$fila->telefono_es;
          $correo=$fila->correo_es;
          $direccion=$fila->direccion_es;
          $procedencia=$fila->procedencia_es;
          $observacion=$fila->observacion_es;
          $facultad=$fila->nombre_fa;
          $carrera=$fila->nombre_ca;
          $planestudio=$fila->anio_pe;
          $nivel=$fila->nivel;
          $estado=$fila->estado_es;
          if($estado==1){
            $estado_es="Activo";
          }else{
            $estado_es="Inactivo";
          }
        }//fin while
      }

    } 
?>
<div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Expediente Estudiantil</h4>
                        </div>
                        <div class="modal-body"
</br>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Estado Estudiante:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Estado:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $estado_es; ?></label></th>
                            </tr> 
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Observaci&oacute;n:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $observacion; ?></label></th>
                            </tr> 
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Educación Superior:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Facultad:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $facultad; ?></label></th>
                            </tr>   
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Carrera:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $carrera; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Plan de Estudio:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $planestudio; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Nivel:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nivel; ?></label></th>
                            </tr>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Educación Media:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Procedencia:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $procedencia; ?></label></th>
                            </tr>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Datos Personales:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Carnet:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $carnet; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Nombres:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nombre; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Apellidos:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $apellido; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Genero:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $genero; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   NIT:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nit; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   DUI:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $dui; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Teléfono:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $telefono; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Correo Electrónico:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $correo; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Dirección:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $direccion; ?></label></th>
                            </tr>
                            
                        </thead>
                        
                    </table> 
            </div>         
        </div>
    </div>
    <div class="clearfix"></div>
    </div>
                        <div class="modal-footer">
                          <p align="left"" style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button type="button" class="btn btn-round btn-default" data-dismiss="modal"><i class="fa fa-ban">  Cancelar</i></button>
                          
                        </div>






                   
