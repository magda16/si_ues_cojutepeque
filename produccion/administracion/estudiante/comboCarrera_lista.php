<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    function obtenerCarrera(){
    $facultad = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT DISTINCT es.idcarrera, ca.nombre_ca FROM estudiante as es, carrera as ca WHERE es.idcarrera=ca.idcarrera AND idfacultadfk=".$facultad." ORDER BY ca.nombre_ca ASC";
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