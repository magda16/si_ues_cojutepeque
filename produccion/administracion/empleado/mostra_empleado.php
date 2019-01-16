<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
        $empleado = $_POST['id'];
        $con=conectarMysql();
        $consulta  = "SELECT * FROM empleado WHERE idempleado=".$empleado;
        $result = $con->query($consulta);
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $nombre=$fila->nombre_em;
                $apellido=$fila->apellido_em;
                $dui=$fila->DUI_em;
                $nit=$fila->NIT_em;
                $direccion=$fila->direccion_em;
                $cargo=$fila->cargo_em;
                $estado_em=$fila->estado_ci;
                $telefono=$fila->telefono_em;
                $correo=$fila->correo_em;
                $estado=$fila->estado_em;
                if($estado==1){
                $estado_em="Activa";
                }else{
                $estado_em="Inactiva";
                }
            }//fin while
        }
    } 
?>
<div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Mostrar Informaci&oacute;n Empleado</h4>
                        </div>
                        <div class="modal-body"
</br>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Estado Empleado:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Estado:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $estado_em; ?></label></th>
                            </tr> 
                            <tr>
                             
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Datos Empleado:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Nombre:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nombre; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Apellido:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $apellido; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   DUI:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $dui; ?></label></th>
                            </tr>
                            <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   NIT:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nit; ?></label></th>
                            </tr>
                            <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Direcci&oacute;n:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $direccion; ?></label></th>
                            </tr>
                            <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Cargo:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $cargo; ?></label></th>
                            </tr>
                            <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Estado:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $estado_em; ?></label></th>
                            </tr>
                            <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Telefono:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $telefono; ?></label></th>
                            </tr>
                            <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Correo:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $correo; ?></label></th>
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






                   
