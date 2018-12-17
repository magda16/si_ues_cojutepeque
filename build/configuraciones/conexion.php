<?php
//adentro estara el codigo php.
function conectarMysql(){
   
    $conexion=new mysqli("localhost","root","","ues"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
    }

    return $conexion;
}

?>