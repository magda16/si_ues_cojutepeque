<?php
    require "../../conexion.php"; 
    
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
      
        function obtenerResultado(){
        $nombre=$_POST["nombres_r"];
        $apellido=$_POST["apellidos_r"];
        $genero=$_POST["genero"];
        $telefono=$_POST["telefono_r"];
        $correo=$_POST["correo_r"];
        $result = 0;
      
        $con=conectarMysql();
  
        $consulta  = "INSERT INTO representante_facultad(nombre_rf,apellido_rf,genero_rf,telefono_rf,correo_rf,estado_rf) VALUES ('$nombre','$apellido','$genero','$telefono','$correo', '1')";
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
      $telefono=$_POST["telefono_r"];
      $correo=$_POST["correo_r"];
      
      $result = 0;
      $con=conectarMysql();

      $consulta  = "UPDATE representante_facultad SET telefono_rf='$telefono', correo_rf='$correo' WHERE id_re_fa=".$baccion;
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

      $consulta  = "UPDATE representante_facultad set estado_rf='0', observacion_rf='$observacion' where id_re_fa=".$baccion;
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

      $consulta  = "UPDATE representante_facultad set estado_rf='1', observacion_rf='$observacion' where id_re_fa=".$baccion;
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