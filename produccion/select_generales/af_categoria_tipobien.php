<?php
    require '../../build/configuraciones/conexion.php';
    if(isset($_POST['id'])){
    function obtenerTipobien(){
    $categoria = $_POST['id'];
    $con=conectarMysql();
    $consulta  = "SELECT af_s.idafsubc, af_s.nombre_s FROM af_subcategoria AS af_s, af_categoria AS af_c WHERE af_s.idafcategoriafk=af_c.idafcategoria AND af_s.idafcategoriafk='$categoria'";
    $result = $con->query($consulta);
    $carreras = "<option value=''>Seleccione Tipo de Bien...</option>";
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $carreras .= "<option value='".$fila->idafsubc."'>".$fila->nombre_s."</option>";
        }//fin while
        return $carreras;
      }
    }
  }

    echo obtenerTipobien();
?> 