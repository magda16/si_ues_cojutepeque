<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
        $facultad = $_POST['id'];
        $con=conectarMysql();
        $consulta  = "SELECT * FROM representante_facultad WHERE id_re_fa=".$facultad;
        $result = $con->query($consulta);
          if ($result) {
            while ($fila = $result->fetch_object()) {
                $nombre=$fila->nombre_rf;
                $apellido=$fila->apellido_rf;
                $genero=$fila->genero_rf;
                $telefono=$fila->telefono_rf;
                $correo=$fila->correo_rf;
                $estado=$fila->estado_rf;
                $observacion=$fila->observacion_rf;
    
                if($estado==1){
                  $estado_rf="Activo";
                }else{
                  $estado_rf="Inactivo";
                }
            }//fin while
          }
        }
?>
<div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Mostrar Informaci&oacute;n Representante de Facultad</h4>
                        </div>
                        <div class="modal-body"
</br>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Estado Representante de Facultad:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Estado:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $estado_rf; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Observaci&oacute;n:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $observacion; ?></label></th>
                            </tr>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Datos Representante de Facultad:</h5></th>
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
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Tel&eacute;fono:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $telefono; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Correo Electr&oacute;nico:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $correo; ?></label></th>
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






                   
