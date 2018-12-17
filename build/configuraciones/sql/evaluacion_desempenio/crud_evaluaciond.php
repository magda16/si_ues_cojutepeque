<?php
    require "../../conexion.php"; 
    
    if(isset($_POST["bandera"])){
  
    $bandera=$_POST["bandera"];

    if($bandera=="add"){
        $msj="Error";
      
        function obtenerResultado(){
        $result = 0;
        $nombre=$_REQUEST["nombre"];
        $criterio=$_REQUEST["criterio"];
        $con = conectarMysql();
  
        $consulta  = "INSERT INTO evaluaciond(nombre_ed, criterio_ed, estado_ed) VALUES('$nombre','$criterio','0')";
        $result = $con->query($consulta);
          if ($result) {
            $msj = "Exito";
          } else {
            $msj = "Error";
          }
          return $msj;
        }
    }else if($bandera=="modificar"){
      $msj="Error";
    
      function obtenerResultado(){
      $result = 0;
      $nombre=$_REQUEST["nombre"];
      $criterio=$_POST["criterio"];
      $baccion=$_REQUEST["baccion"];

      $con = conectarMysql();

      $consulta  = "UPDATE evaluaciond set nombre_ed='$nombre',criterio_ed='$criterio' where id_ed='$baccion'";
      $result = $con->query($consulta);
        if ($result) {
          $msj = "Exito";
        } else {
          $msj = "Error";
        }
        return $msj;
      }
    }else if($bandera=="aspecto"){
      $msj="Error";
    
      function obtenerResultado(){
      $result = 0;
    
      $aspecto= $_POST['aspecto'];
      $id_ed=$_POST['evaluacion'];
      $con = conectarMysql();

        for($i=0 ; $i <count($aspecto); $i++ ){
          if($aspecto[$i] !=""){
          $consulta = "INSERT INTO ed_aspectos(ed_nomasp, ed_porasp, estado_asp, id_edfk) VALUES ('$aspecto[$i]','0','0','$id_ed')";
          $result = $con->query($consulta);
          }
        }
        if ($result) {
          $msj = "Exito";
        } else {
          $msj = "Error";
        }
        return $msj;
      }
  }else if($bandera=="editaraspecto"){
    $msj="Error";
  
    function obtenerResultado(){
    $result = 0;
    $nombre=$_REQUEST["aspecto"];
    $baccion=$_REQUEST["baccion"];

    $con = conectarMysql();

    $consulta  = "UPDATE ed_aspectos SET ed_nomasp='$nombre' WHERE ed_idaspectos='$baccion'";
    $result = $con->query($consulta);
      if ($result) {
        $msj = "Exito";
      } else {
        $msj = "Error";
      }
      return $msj;
    }
  }else if($bandera=="item"){
    $msj="Error";
  
    function obtenerResultado(){
    $result = 0;
  
    $item= $_POST['item'];
    $idasp=$_POST['idasp'];
    $con = conectarMysql();

      for($i=0 ; $i <count($item); $i++ ){
        if($item[$i] !=""){
        $consulta = "INSERT INTO ed_item(ed_nomitem, ed_poritem, estado_item, ed_idaspectofk) VALUES ('$item[$i]','0','0','$idasp')";
        $result = $con->query($consulta);
        }
      }
      if ($result) {
        $msj = "Exito";
      } else {
        $msj = "Error";
      }
      return $msj;
    }
}else if($bandera=="editaritem"){
  $msj="Error";

  function obtenerResultado(){
  $result = 0;
  $item=$_REQUEST["item"];
  $baccion=$_REQUEST["baccion"];

  $con = conectarMysql();

  $consulta  = "UPDATE ed_item SET ed_nomitem='$item' WHERE ed_iditem='$baccion'";
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