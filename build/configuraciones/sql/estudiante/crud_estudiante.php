<?php
    require "../../conexion.php"; 
    
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
      
        function obtenerResultado(){
            $carnet=$_POST["carnet"];
            $nombre=$_POST["nombre_e"];
            $apellido=$_POST["apellido_e"];
            $genero=$_POST["genero_e"];
            $nit=$_POST["nit_e"];
            $dui=$_POST["dui_e"];
            $direccion=$_POST["direccion_e"];
            $telefono=$_POST["telefono_e"];
            $correo=$_POST["correo_e"];
            $institucion=$_POST["institucion_e"];  
            $facultad=$_POST["facultad"];
            $carrera=$_POST["carrera"]; 
            $planestudio=$_POST["planestudio"]; 
            $observacion = "Registro"; 
        $result = 0;
        $con=conectarMysql();
  
        $consulta  = "INSERT INTO estudiante(carnet_es, nombre_es, apellido_es, genero_es, NIT_es, DUI_es, direccion_es, telefono_es, correo_es, procedencia_es, estado_es, idfacultad, idcarrera, idplan_estudio, observacion_es)  
        VALUES('$carnet','$nombre','$apellido','$genero','$nit','$dui','$direccion','$telefono','$correo','$institucion','1','$facultad','$carrera','$planestudio','$observacion')";
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