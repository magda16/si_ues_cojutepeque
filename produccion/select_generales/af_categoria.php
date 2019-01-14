<?php
    require '../../build/configuraciones/conexion.php';
    
    function obtenerCategoria(){
    $con=conectarMysql();
    $consulta  = "SELECT idafcategoria, codigo_c, id_nombre_c, nombre_c, idafinsfk FROM af_categoria";
    $result = $con->query($consulta);
    $listas = "<option value=''>Seleccione Categoria...</option>";
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $listas .= "<option value='".$fila->idafcategoria."'>".$fila->nombre_c."</option>";
        }//fin while
        return $listas;
      }
    }

    echo obtenerCategoria();
?>  