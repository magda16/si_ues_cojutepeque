<?php
  if(isset($_POST["estudiante"])){

        require "../../conexion.php"; 
        $con = conectarMysql();
        $estudiante=$_POST["estudiante"];
        $result=0;

        $consulta = $con->query("SELECT * FROM estudiante WHERE idestudiante='$estudiante'");
        $result = mysqli_fetch_array($consulta);

        $datos = array(
          0 => $result["idestudiante"],
          1 => $result["carnet_es"],
          2 => $result["procedencia_es"],
        );

        echo json_encode($datos);
        
}        
?>