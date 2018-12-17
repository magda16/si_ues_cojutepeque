<?php
    require "../../conexion.php"; 
    
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
      
        function obtenerResultado(){
        $nombre=$_POST["nombre_f"];
        $telefono=$_POST["telefono_f"];
        $correo=$_POST["correo_f"];
        $represent=$_POST["representante"];
        $result = 0;
      
        $con=conectarMysql();
  
        $consulta  = "INSERT INTO facultad(nombre_fa,telefono_fa,correo_fa,estado_fa,id_re_fafk) VALUES('$nombre','$telefono','$correo','1','$represent')";
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
      $nombre=$_POST["nombre"];
      
      $result = 0;
      $con=conectarMysql();

      $consulta  = "UPDATE carrera set nombre_ca='$nombre' where idcarrera=".$baccion;
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

      $consulta  = "UPDATE carrera set estado_ca='0', observacion_ca='$observacion' where idcarrera=".$baccion;
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

      $consulta  = "UPDATE carrera set estado_ca='1', observacion_ca='$observacion' where idcarrera=".$baccion;
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