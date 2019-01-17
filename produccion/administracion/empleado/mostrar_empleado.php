<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    $empleado = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT em.idempleado, em.nombre_em, em.apellido_em, em.DUI_em, em.NIT_em, em.direccion_em, em.cargo_em, em.genero_em, em.telefono_em, em.correo_em, em.estado_em, em.estado_ci, em.observacion_em, c.nombre_ca FROM empleado AS em, cargo AS c WHERE em.cargo_em=c.id_ca_em AND em.idempleado='$empleado'";
    $result = $con->query($consulta);
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $nombre=$fila->nombre_em;
          $apellido=$fila->apellido_em;
          $genero=$fila->genero_em;
          $nit=$fila->NIT_em;
          $dui=$fila->DUI_em;
          $telefono=$fila->telefono_em;
          $correo=$fila->correo_em;
          $direccion=$fila->direccion_em;
          $estado=$fila->estado_em;
          $estado_fam=$fila->estado_ci;
          $observacion=$fila->observacion_em;      
          $cargo=$fila->nombre_ca;
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
                          <h4 class="modal-title" id="myModalLabel" style="color: RGB(0, 0, 128);" align="center">Mostrar Informaci&oacute;n Recurso Humano</h4>
                        </div>
                        <div class="modal-body"
</br>

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">                
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th><h5 style="color:RGB(205, 92, 92);">Estado Recurso Humano:</h5></th>
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
                                <th><h5 style="color:RGB(205, 92, 92);">Datos Personales:</h5></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Cargo:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $cargo; ?></label></th>
                            </tr>   
    
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
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   DUI:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $dui; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   NIT:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $nit; ?></label></th>
                            </tr>
                            <tr>
                                <th style="padding-left:40px;" class="text-left"><b><i class=""></i>   Estado Familiar:<span style="color:	#000080;"> '</span></b></th>
                                <th><label class="text-center"><?php echo $estado_fam; ?></label></th>
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






                   
