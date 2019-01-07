<?php
    require '../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    function obtenerPlan(){
    $carrera = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT pe.idplanestudio, pe.anio_pe FROM plan_estudio AS pe, carrera AS ca WHERE pe.idcarrerafk=ca.idcarrera AND pe.idcarrerafk=".$carrera." AND estadolleno_pe=0 ORDER BY pe.anio_pe ASC";
    $result = $con->query($consulta);
    $listas = "<option value=''>Seleccione Plan de Estudio...</option>";
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $listas .= "<option value='".$fila->idplanestudio."'>".$fila->anio_pe."</option>";
        }//fin while
        return $listas;
      }
    }
}

    echo obtenerPlan();
?> 