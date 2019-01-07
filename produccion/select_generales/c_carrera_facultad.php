<?php
    require '../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    function obtenerCarrera(){
    $facultad = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT ca.idcarrera, ca.codigo_ca, ca.nombre_ca FROM carrera AS ca, facultad AS fa WHERE ca.idfacultadfk=fa.idfacultad AND ca.estado_ca=1 AND ca.idfacultadfk=".$facultad." ORDER BY ca.nombre_ca ASC";
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