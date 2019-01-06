<?php
    require '../../build/configuraciones/conexion.php';
    
    function obtenerFacultad(){
    $con=conectarMysql();
    $consulta  = "SELECT DISTINCT es.idfacultad, fa.nombre_fa FROM  facultad AS fa, estudiante AS es LEFT JOIN documentos_es AS doces ON es.idestudiante=doces.idestudiantefk WHERE doces.idestudiantefk IS NOT NULL AND es.estado_es=1 AND es.idfacultad=fa.idfacultad ORDER BY fa.nombre_fa ASC";
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