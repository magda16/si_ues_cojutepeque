<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    function obtenerCarrera(){
    $facultad = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT idcarrera, nombre_ca FROM carrera WHERE idfacultadfk=".$facultad." ORDER BY nombre_ca ASC";
    $result = $con->query($consulta);
    $carreras = "<option value=''>Seleccione Carrera...</option>";
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $carreras .= "<option value='".$fila->idcarrera."'>".$fila->nombre_ca."</option>";
        }//fin while
        return $carreras;
      }
    }
  }

    echo obtenerCarrera();
?>  