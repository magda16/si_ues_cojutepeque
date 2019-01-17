<?php
    require "../../conexion.php"; 
    
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
      
        function obtenerResultado(){
        $cargo=$_POST["cargo"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $genero=$_POST["genero"];
        $dui=$_POST["dui"];
        $nit=$_POST["nit"];
        $estado=$_POST["estado"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $direccion=$_POST["direccion"];
        $observacion = "Registro";
        $result = 0;
        $con=conectarMysql();

        if($estado==1){
            $estado_e="Soltero (a)";
        }else if($estado==2){
            $estado_e="Casado (a)";
        }else if($estado==3){
            $estado_e="Viudo (a)";
        }
  
        $consulta  = "INSERT INTO empleado(nombre_em, apellido_em, DUI_em, NIT_em, direccion_em, cargo_em, genero_em, telefono_em, correo_em, estado_em, estado_ci, observacion_em)  
        VALUES('$nombre','$apellido','$dui','$nit','$direccion','$cargo','$genero','$telefono','$correo','1','$estado_e','$observacion')";
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
        $apellido=$_POST["apellido"];
        $genero=$_POST["genero"];
        $dui=$_POST["dui"];
        $nit=$_POST["nit"];
        $estado=$_POST["estado"];
        $telefono=$_POST["telefono"];
        $correo=$_POST["correo"];
        $direccion=$_POST["direccion"];
        $result = 0;
        $con=conectarMysql();

        if($estado==1){
            $estado_e="Soltero (a)";
        }else if($estado==2){
            $estado_e="Casado (a)";
        }else if($estado==3){
            $estado_e="Viudo (a)";
        }

      $consulta  = "UPDATE empleado set nombre_em='$nombre', apellido_em='$apellido', DUI_em='$dui', NIT_em='$nit', direccion_em='$direccion', genero_em='$genero', telefono_em='$telefono', correo_em='$correo', estado_ci='$estado_e' where idempleado=".$baccion;
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

      $consulta  = "UPDATE empleado set estado_em='0', observacion_em='$observacion' where idempleado=".$baccion;
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

      $consulta  = "UPDATE empleado set estado_em='1', observacion_em='$observacion' where idempleado=".$baccion;
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