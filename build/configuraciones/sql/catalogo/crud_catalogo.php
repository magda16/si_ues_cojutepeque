<?php
    require "../../conexion.php"; 
    
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="addcat"){
        $msj="Error";
      
        function obtenerResultado(){
        $categoria=$_POST["categoria"];
        $abre_cate=$_POST["abre_cate"];
        $result = 0;
        $result1 = 0;
        $con=conectarMysql();

        $result1 = $con->query("SELECT MAX(codigo_c)+1000 AS 'codigo' FROM af_categoria");
        if ($result1) {
            while ($fila1 = $result1->fetch_object()) {
            $codigo=$fila1->codigo;
            }
        }
        if($codigo==null){
            $codigo=1000;
        }

        $numeroConCeros = str_pad($codigo, 5, "0", STR_PAD_LEFT);
  
        $consulta  = "INSERT INTO af_categoria(codigo_c, id_nombre_c, nombre_c, idafinsfk) VALUES('$numeroConCeros','$abre_cate','$categoria','1')";
        $result = $con->query($consulta);
          if ($result) {
            $msj = "Exito";
          } else {
            $msj = "Error";
          }
          return $msj;
        }
    }else if($bandera=="addtipobien"){
      $msj="Error";
    
      function obtenerResultado(){
      $categoria=$_POST["categoria"];
      $subcategoria=$_POST["subcategoria"];
      $abre_subcate=$_POST["abre_subcate"];
      $result = 0;
      $result1 = 0;
      $con=conectarMysql();

      $result1 = $con->query("SELECT MAX(codigo_s)+1 AS 'codigo' FROM af_subcategoria");
      if ($result1) {
          while ($fila1 = $result1->fetch_object()) {
          $codigo=$fila1->codigo;
          }
      }
      if($codigo==null){
          $codigo=1;
      }

      $numeroConCeros = str_pad($codigo, 5, "0", STR_PAD_LEFT);

      $consulta  = "INSERT INTO af_subcategoria(codigo_s,id_nombre_s,nombre_s,cantidad_s,idafcategoriafk) VALUES('$numeroConCeros','$abre_subcate','$subcategoria','0','$categoria')";
      $result = $con->query($consulta);
        if ($result) {
          $msj = "Exito";
        } else {
          $msj = "Error";
        }
        return $msj;
      }
  }
    else if($bandera=="edit"){
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