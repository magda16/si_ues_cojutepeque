<?php
  if(isset($_POST["evaluacion"])){

      

        require "../../conexion.php"; 
        $con = conectarMysql();
        $evaluacion=$_POST["evaluacion"];
        $result=0;

        $consulta = $con->query("SELECT * FROM evaluaciond WHERE id_ed='$evaluacion'");
        $result = mysqli_fetch_array($consulta);

        $datos = array(
          0 => $result["nombre_ed"],
          1 => $result["criterio_ed"],
        );

        echo json_encode($datos);
        
}        
?>