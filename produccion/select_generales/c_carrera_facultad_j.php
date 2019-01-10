<?php
    require '../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    function obtenerCarrera(){
    $facultad = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT DISTINCT es.idfacultad, fa.nombre_fa FROM estudiante as es, facultad as fa WHERE es.idfacultad=fa.idfacultad ORDER BY fa.nombre_fa ASC";
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