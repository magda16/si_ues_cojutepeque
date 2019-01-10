<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
        $aula = $_POST['id'];
        $con=conectarMysql();
        $consulta  = "SELECT * FROM aula WHERE idaula=".$aula;
        $result = $con->query($consulta);
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $nombre=$fila->nombre_au;
                $ubicacion=$fila->ubicacion_au;
                $capacidad=$fila->cantidad_au;
                $observacion=$fila->observacion_au;
                $estado=$fila->estado_au;
                if($estado==1){
                $estado_au="Activa";
                }else{
                $estado_au="Inactiva";
                }
            }//fin while
        }
    } 
?>
<div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Mostrar Informaci&oacute;n Aula</h4>
                        </div>
                        <div class="modal-body"
</br>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Estado Aula:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Estado:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $estado_au; ?></label></th>
                            </tr> 
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Observaci&oacute;n:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $observacion; ?></label></th>
                            </tr> 
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Datos Aula:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Nombre:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nombre; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Ubicaci&oacute;n:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $ubicacion; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Capacidad:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $capacidad; ?></label></th>
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






                   
