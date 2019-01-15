<?php
    require '../../build/configuraciones/conexion.php';
    
    function obtenerProveedor(){
    $con=conectarMysql();
    $consulta  = "SELECT idproveedor, proveedor FROM proveedor WHERE estado_p=1 ORDER BY proveedor ASC";
    $result = $con->query($consulta);
    $listas = "<option value=''>Seleccione Proveedor...</option>";
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $listas .= "<option value='".$fila->idproveedor."'>".$fila->proveedor."</option>";
        }//fin while
        return $listas;
      }
    }

    echo obtenerProveedor();
?>  