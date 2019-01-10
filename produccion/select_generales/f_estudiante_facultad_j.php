<?php
    require '../../build/configuraciones/conexion.php';
    
    function obtenerFacultad(){
    $con=conectarMysql();
    $consulta  = "SELECT DISTINCT es.idfacultad, fa.nombre_fa FROM estudiante as es, facultad as fa WHERE es.idfacultad=fa.idfacultad ORDER BY fa.nombre_fa ASC";
    $result = $con->query($consulta);
    $listas = "<option value=''>Seleccione Facultad...</option>";
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $listas .= "<option value='".$fila->idfacultad."'>".$fila->nombre_fa."</option>";
        }//fin while
        return $listas;
      }
    }

    echo obtenerFacultad();
?>  