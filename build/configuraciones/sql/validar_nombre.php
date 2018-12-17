<?php
    require "../conexion.php"; 
    if(isset($_POST['nombre'])){
        $tabla = $_POST['tabla'];
        $nombre = $_POST['nombre'];
        $nombre_campo = $_POST['nombre_campo'];
        $con=conectarMysql();
        $result = 0;
        $consulta  = "SELECT * FROM $tabla WHERE $nombre_campo='$nombre'";
        $result = $con->query($consulta);
        if ($result) {
            while ($fila = $result->fetch_object()) {
                echo $fila->$nombre_campo;
            }//fin while
        }
    }
   
?>