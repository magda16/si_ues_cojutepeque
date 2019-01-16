<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    $proveedor = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT  * FROM proveedor WHERE idproveedor=".$proveedor;
    $result = $con->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $nombre=$fila->nombre_c;
          $apellido=$fila->apellido_c;
          $proveedor=$fila->proveedor;
          $nit=$fila->NIT_p;
          $telefono=$fila->telefono_p;
          $correo=$fila->correo_p;
          $direccion=$fila->direccion_p;
          $descripcion_p=$fila->descripcion_p;
          $observacion_p=$fila->observacion_p;
          $observacion=$fila->observacion;
          $estado=$fila->estado_p;
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
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Mostrar Informaci&oacute;n Proveedor</h4>
                        </div>
                        <div class="modal-body"
</br>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Estado Proveedor:</h5></th>
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
                                <th><h5 style="color:RGB(205, 92, 92);">Datos de el Contacto:</h5></th>
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
                                <th><h5 style="color:RGB(205, 92, 92);">Datos de el Proveedor:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Proveedor:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $proveedor; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   NIT:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nit; ?></label></th>
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
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Direcci&oacute;n:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $direccion; ?></label></th>
                            </tr>
                            <?php 

                            if($descripcion_p!=""){ ?>
                                <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Descripci&oacute;n:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $descripcion_p; ?></label></th>
                                </tr>
                            <?php
                            }
                            if($observacion_p!=""){ ?>
                                <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Observaci&oacute;n:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $observacion_p; ?></label></th>
                                </tr>
                           <?php }
                            
                            ?>
                           
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






                   
