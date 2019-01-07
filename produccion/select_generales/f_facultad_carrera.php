<?php
    require '../../build/configuraciones/conexion.php';
    
    function obtenerFacultad(){
    $con=conectarMysql();
    $consulta  = "SELECT DISTINCT fa.idfacultad, fa.nombre_fa FROM carrera AS ca, facultad AS fa WHERE ca.idfacultadfk=fa.idfacultad AND ca.estado_ca=1 ORDER BY fa.nombre_fa ASC";
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