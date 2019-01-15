<?php
  if(isset($_POST["categoria"])){

        require "../../conexion.php"; 
        $con = conectarMysql();
        $categoria=$_POST["categoria"];
        $tipo_bien=$_POST["tipo_bien"];
        $result=0;

        $consulta = $con->query("SELECT af_ci.codigo,af_c.codigo_c, af_s.codigo_s, af_s.cantidad_s FROM af_cod_institucional AS af_ci, af_categoria AS af_c, af_subcategoria AS af_s WHERE af_c.idafinsfk=af_ci.idafins AND af_c.idafcategoria='$categoria' AND af_c.idafcategoria=af_s.idafcategoriafk AND af_s.idafsubc='$tipo_bien'");
        $result = mysqli_fetch_array($consulta);

        $correlativo=$result["cantidad_s"];
        $correlativo=$correlativo+1;
        $datos = array(
          0 => $result["codigo"]."-".$result["codigo_c"]."-".$result["codigo_s"],
          1 => $correlativo,
        );

        echo json_encode($datos);
        
}        
?>