<!--Alertas -->
<script src="../../../../vendors/alertas/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../../../vendors/alertas/dist/sweetalert.css"/>
<?php
require "../../conexion.php";

if(isset($_POST["bandera"])){

    $bandera=$_POST["bandera"];
    
    
        
    
/*
    echo "cargo ".$cargo;
    echo "dui ".$dui;
    echo "nit ".$nit;
    echo "nombre ".$nombre;
    echo "apellido ".$apellido;
    echo "direccion ".$direccion;
    echo "genero ".$genero;
    echo "estado ".$estado_ci;

    //echo $estado;
    echo "especialidad ".$especialidad;*/
 
    

    if($bandera=="add"){
      $msj="Error";
      
        function obtenerResultado(){
        $result=0;
        $result1=0;
        $cargo = $_POST['cargo'];
        $dui = $_POST['dui'];
        $nit = $_POST['nit'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $genero = $_POST['genero'];
        $estado = '1';
        $estado_ci = $_POST['estado'];
        $telefono= $_POST['telefono'];
        $correo = $_POST['correo'];
       

        $con = conectarMysql();
        $consulta1 = "INSERT INTO empleado(nombre_em,apellido_em,DUI_em,NIT_em,direccion_em,cargo_em,genero_em,estado_em,estado_ci,telefono_em,correo_em) 
        VALUES('$nombre','$apellido','$dui','$nit','$direccion','$cargo','$genero','1','$estado_ci','$telefono','$correo')";
       
       $result = $con->query($consulta);
       if ($result) {
         $msj = "Exito";
       } else {
         $msj = "Error";
       }
       return $msj;
     }
    }else if($bandera=="modificar"){
        $baccion=$_REQUEST["baccion"];
        $dui = $_POST['dui'];
        $nit = $_POST['nit'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $genero = $_POST['genero'];
        $estado = '1';
        $estado_ci = $_POST['estado'];
        $telefono= $_POST['telefono'];
        $correo = $_POST['correo'];
       
  
        $consulta2  = "UPDATE empleado SET nombre_em='$nombre', apellido_em='$apellido', direccion_em='$direccion',genero_em='$genero', estado_ci='$estado_ci' telefono_em='$telefono',correo_em='$correo' WHERE idempleado=".$baccion."";
       // $result2 =mysqli_query($con,$consulta2);
        $result2 = $con->query($consulta2);
          if (result2) {
            echo "<script language='javascript'>";
                echo "swal({ 
                        title:'Éxito',
                        text: 'Datos Almacenados',
                        type: 'success'
                      },
                       function(){
                          //event to perform on click of ok button of sweetalert
                          location.href='../../../../produccion/Administracion/Empleado/listaEmpleado.php';
                      });";
                echo "</script>";
          } else {
                echo "<script type='text/javascript'>";
                echo   "swal('Error','Sin Conexión Dase Datos','error');";
                echo "</script>"; 
          }
      }
      else if($bandera=="darbaja"){
        $baccion=$_REQUEST["baccion"];
  
        $consulta3  = "UPDATE empleado set estado_em='0' where idempleado=".$baccion."";
       // $result2 =mysqli_query($con,$consulta2);
        $result3 = $con->query($consulta3);
          if (result3) {
            echo "<script language='javascript'>";
                echo "swal({ 
                        title:'Éxito',
                        text: 'Datos Almacenados',
                        type: 'success'
                      },
                       function(){
                          //event to perform on click of ok button of sweetalert
                          location.href='../../../../produccion/Administracion/Empleado/listaEmpleado.php';
                      });";
                echo "</script>";
          } else {
                echo "<script type='text/javascript'>";
                echo   "swal('Error','Sin Conexión Dase Datos','error');";
                echo "</script>"; 
          }
      }else if($bandera=="daralta"){
        $baccion=$_REQUEST["baccion"];
  
        $consulta4  = "UPDATE empleado set estado_em='1' where idempleado=".$baccion."";
        $result34= $con->query($consulta4);
        //$result3 =mysqli_query($con,$consulta3);
          if(result4) {
            echo "<script language='javascript'>";
                echo "swal({ 
                        title:'Éxito',
                        text: 'Datos Almacenados',
                        type: 'success'
                      },
                       function(){
                          //event to perform on click of ok button of sweetalert
                          location.href='../../../../produccion/Administracion/Empleado/listaEmpleadoDarAlta.php';
                      });";
                echo "</script>";
          } else {
                echo "<script type='text/javascript'>";
                echo   "swal('Error','Sin Conexión Dase Datos','error');";
                echo "</script>"; 
          }
      }

}
echo obtenerResultado();

?>