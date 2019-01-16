<?php
    require "../../conexion.php"; 
    
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
      
        function obtenerResultado(){
        $nombre_c=$_POST["nombre_c"];
        $apellido_c=$_POST["apellido_c"];
        $proveedor=$_POST["proveedor"];
        $nit_p=$_POST["nit_p"];
        $telefono_p=$_POST["telefono_p"];
        $correo_p=$_POST["correo_p"];
        $direccion_p=$_POST["direccion_p"];
        $descripcion_p=$_POST["descripcion_p"];
        $observacion_p=$_POST["observacion_p"];
        $observacion = "Registro";
        $result = 0;
        $con=conectarMysql();
  
        $consulta  = "INSERT INTO proveedor(nombre_c, apellido_c, proveedor, NIT_p, telefono_p, correo_p, direccion_p, descripcion_p, observacion_p, estado_p, observacion) VALUES('$nombre_c','$apellido_c','$proveedor','$nit_p','$telefono_p','$correo_p','$direccion_p','$descripcion_p','$observacion_p','1','$observacion')";
        $result = $con->query($consulta);
          if ($result) {
            $msj = "Exito";
          } else {
            $msj = "Error";
          }
          return $msj;
        }
    }else if($bandera=="edit"){
      $msj="Error";
    
      function obtenerResultado(){
     
      $baccion=$_POST["baccion"];
      $nombre_c=$_POST["nombre_c"];
      $apellido_c=$_POST["apellido_c"];
      $proveedor=$_POST["proveedor"];
      $nit_p=$_POST["nit_p"];
      $telefono_p=$_POST["telefono_p"];
      $correo_p=$_POST["correo_p"];
      $direccion_p=$_POST["direccion_p"];
      $descripcion_p=$_POST["descripcion_p"];
      $observacion_p=$_POST["observacion_p"];
      
      $result = 0;
      $con=conectarMysql();

      $consulta  = "UPDATE proveedor set nombre_c='$nombre_c', apellido_c='$apellido_c', proveedor='$proveedor', NIT_p='$nit_p', telefono_p='$telefono_p', correo_p='$correo_p', direccion_p='$direccion_p', descripcion_p='$descripcion_p', observacion_p='$observacion_p' where idproveedor=".$baccion;
      $result = $con->query($consulta);
        if ($result) {
          $msj = "Exito";
        } else {
          $msj = "Error";
        }
        return $msj;
      }
  }else if($bandera=="darbaja"){
      $msj="Error";
    
      function obtenerResultado(){
      
      $baccion=$_POST["baccion"];
      $observacion=$_POST["observacion"];
      $result = 0;
      $con = conectarMysql();

      $consulta  = "UPDATE proveedor set estado_p='0', observacion='$observacion' where idproveedor=".$baccion;
      $result = $con->query($consulta);
        if ($result) {
          $msj = "Exito";
        } else {
          $msj = "Error";
        }
        return $msj;
      }
    }else if($bandera=="daralta"){
      $msj="Error";
    
      function obtenerResultado(){
    
      $baccion=$_POST["baccion"];
      $observacion=$_POST["observacion"];
      $result = 0;
      $con = conectarMysql();

      $consulta  = "UPDATE proveedor set estado_p='1', observacion='$observacion' where idproveedor=".$baccion;
      $result = $con->query($consulta);
        if ($result) {
          $msj = "Exito";
        } else {
          $msj = "Error";
        }
        return $msj;
      }
    }

  }
 
    echo obtenerResultado();
?>