<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    $carrera = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT ca.codigo_ca, ca.nombre_ca, ca.duracion_ca, ca.estado_ca, ca.observacion_ca, fa.nombre_fa FROM carrera as ca, facultad as fa WHERE ca.idfacultadfk=fa.idfacultad AND ca.idcarrera=".$carrera;
    $result = $con->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
            $codigo=$fila->codigo_ca;
            $nombre=$fila->nombre_ca;
            $duracion=$fila->duracion_ca." A&ntilde;os";
            $estado=$fila->estado_ca;
            $observacion=$fila->observacion_ca;
            if($estado==1){
              $estado_ca="Activa";
            }else{
              $estado_ca="Inactiva";
            }
            $facultad=$fila->nombre_fa;
        }//fin while
      }
    } 
?>
<div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Mostrar Informaci&oacute;n Carrera</h4>
                        </div>
                        <div class="modal-body"
</br>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">                
                    <table class="table table-striped">
                        <thead>
                            
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Estado:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $estado_ca; ?></label></th>
                            </tr> 
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Observaci&oacute;n:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $observacion; ?></label></th>
                            </tr> 
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   C&oacute;digo:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $codigo; ?></label></th>
                            </tr>   
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Nombre:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nombre; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Duraci&oacute;n:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $duracion; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Facultad:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $facultad; ?></label></th>
                            </tr>
                            
                        </thead>
                        
                    </table> 
            </div>         
        </div>
    </div><br><br><br>
    </div>
                        <div class="modal-footer">
                          <p align="left"" style="color: RGB(0, 0, 128);">( ' ) Campos no Editables.</p>
                          <button type="button" class="btn btn-round btn-default" data-dismiss="modal"><i class="fa fa-ban">  Cancelar</i></button>
                          
                        </div>






                   
