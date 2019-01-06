<?php
    require '../../build/configuraciones/conexion.php';
    if(isset($_POST['idfa']) && isset($_POST['idca'])){
    function obtenerEstudiante(){
    $facultad = $_POST['idfa'];
    $carrera = $_POST['idca'];
    $con=conectarMysql();
    $consulta  = "SELECT es.idestudiante, es.nombre_es, es.apellido_es FROM estudiante AS es LEFT JOIN documentos_es AS doces ON es.idestudiante=doces.idestudiantefk WHERE doces.idestudiantefk IS NULL AND es.idfacultad=".$facultad." AND es.idcarrera=".$carrera." AND es.estado_es=1 ORDER BY es.nombre_es ASC";
    $result = $con->query($consulta);
    $estudiantes = "<option value=''>Seleccione Estudiante...</option>";
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $estudiantes .= "<option value='".$fila->idestudiante."'>".$fila->nombre_es." ".$fila->apellido_es."</option>";
        }//fin while
        return $estudiantes;
      }
    }
  }

    echo obtenerEstudiante();
?>  