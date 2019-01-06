<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
        $facultad = $_POST['id'];
        $con=conectarMysql();
        $consulta  = "SELECT fa.nombre_fa, fa.telefono_fa, fa.correo_fa, fa.estado_fa, rf.nombre_rf, rf.apellido_rf FROM facultad as fa, representante_facultad as rf WHERE fa.id_re_fafk=rf.id_re_fa AND fa.idfacultad=".$facultad;
        $result = $con->query($consulta);
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $nombre=$fila->nombre_fa;
                $telefono=$fila->telefono_fa;
                $correo=$fila->correo_fa;
                $estado=$fila->estado_fa;
                $nombrerf=$fila->nombre_rf;
                $apellidorf=$fila->apellido_rf;
    
                if($estado==1){
                  $estado_fa="Activa";
                }else{
                  $estado_fa="Inactiva";
                }
            }//fin while
        }
    }
?>
<div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Mostrar Informaci&oacute;n Facultad</h4>
                        </div>
                        <div class="modal-body"
</br>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Estado Facultad:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Estado:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $estado_fa; ?></label></th>
                            </tr>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Datos Facultad:</h5></th>
                            </tr>   
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Nombre:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nombre; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Tel&eacute;fono:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $telefono; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Correo Electr&oacute;nico:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $correo; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Representante:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nombrerf." ".$apellidorf; ?></label></th>
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






                   
