<?php
    require '../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    function obtenerCarrera(){
    $facultad = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT DISTINCT es.idcarrera, ca.nombre_ca FROM  carrera AS ca, estudiante AS es LEFT JOIN documentos_es AS doces ON es.idestudiante=doces.idestudiantefk WHERE doces.idestudiantefk IS NOT NULL AND es.idfacultad=".$facultad."  AND es.estado_es=1 AND es.idcarrera=ca.idcarrera ORDER BY ca.nombre_ca ASC";
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
