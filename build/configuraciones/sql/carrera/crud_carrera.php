<?php
    require "../../conexion.php"; 
    
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
      
        function obtenerResultado(){
        $codigo=$_POST["codigo"];
        $nombre=$_POST["nombre"];
        $duracion=$_POST["duracion"];
        $facultad=$_POST["facultad"];
        $result = 0;
      
        $con=conectarMysql();
  
        $consulta  = "INSERT INTO carrera(codigo_ca,nombre_ca,duracion_ca,estado_ca,idfacultadfk)  VALUES('$codigo','$nombre','$duracion','1','$facultad')";
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