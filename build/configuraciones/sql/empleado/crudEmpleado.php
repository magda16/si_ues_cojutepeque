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
 
    $con = conectarMysql();

    if($bandera=="add"){
        $cargo = $_POST['cargo'];
        $dui = $_POST['dui'];
        $nit = $_POST['nit'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $genero = $_POST['genero'];
        $estado = '1';
        $estado_ci = $_POST['estado'];
        $especialidad = $_POST['especialidad'];

        $telefono= $_POST['telefono'];
        
        $correo = $_POST['correo'];

       
        $result = $con->query("select max(idempleado)+1 as 'id' from empleado");
        if ($result) {
            while ($fila = $result->fetch_object()) {
            $id=$fila->id;
            }
        }
        if($id==null){
            $id=$id+1;
        }

        echo "id ".$id;

        $consulta1 = "INSERT INTO empleado(idempleado,nombre_em,apellido_em,DUI_em,NIT_em,direccion_em,cargo_em,especialidad_em,genero_em,estado_em,estado_ci) 
        VALUES('$id','$nombre','$apellido','$dui','$nit','$direccion','$cargo','$especialidad','$genero','1','$estado_ci')";

       
        $result1 = mysqli_query($con,$consulta1);
        
        if (!$result1) {
         # code...
            echo "<script type='text/javascript'>";
            echo   "alert('Código o nombre ya existen');";
            echo "</script>"; 
       }else {
         
        echo "exito";
        for($i=0 ; $i <count($telefono); $i++ ){
            $consulta2 = "INSERT INTO empleado_telefono(telefono_em, idempleadotefk) VALUES ('$telefono[$i]','$id')";
            echo $consulta2;
            echo "</br>";
            $result2 =mysqli_query($con,$consulta2);
        }

        for($j=0 ; $j <count($correo); $j++ ){
            $consulta3 = "INSERT INTO empleado_correo(correo_em, idempleadocofk) VALUES ('$correo[$j]','$id')";
            echo $consulta3;
            echo "</br>";
            $result3 =mysqli_query($con,$consulta3);

        }

        echo "<script type='text/javascript'>";
        echo "location.href='../../../../produccion/Administracion/Empleado/registroEmpleado.php'";
        echo "</script>"; 

       }
     
       
         
 
      /*   if(!$result1 || !$result2){
           mysqli_query("rollback");
           echo "<script type='text/javascript'>";
           echo   "alert('Código o nombre ya existen');";
           echo "</script>"; 
         }else{
           mysqli_query("commit");
           echo "<script language='javascript'>";
           //echo "location.href='../../../../produccion/Administracion/carrera/registrocarrera.php';";
           echo "alert('Datos Almacenados');";
           echo "</script>";
          
         }//fin else*/
        

    }else if($bandera=="modificar"){
        $baccion=$_REQUEST["baccion"];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $genero = $_POST['genero'];
        $estado = '1';
        $estado_ci = $_POST['estadoff'];
        $especialidad = $_POST['especialidad'];
  
        $consulta2  = "UPDATE empleado SET nombre_em='$nombre', apellido_em='$apellido', direccion_em='$direccion', especialidad_em='$especialidad',genero_em='$genero', estado_ci='$estado_ci' WHERE idempleado=".$baccion."";
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

?>