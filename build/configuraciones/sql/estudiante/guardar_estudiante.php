
<!--Alertas -->
<script src="../../../../vendors/alertas/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../../../vendors/alertas/dist/sweetalert.css"/>

<?php
require "../../conexion.php"; 


if(isset($_POST["bandera"])){

  $bandera=$_POST["bandera"];
  

 

 if($bandera=="add"){
   $datos=null;
   $result=0;
   $result1=0;

  $carnet=$_POST["carnet"];
  $nombre=$_POST["nombre_e"];
  $apellido=$_POST["apellido_e"];
  $genero=$_POST["genero_e"];
  $nit=$_POST["nit_e"];
  $dui=$_POST["dui_e"];
  $direccion=$_POST["direccion_e"];
  $telefono=$_POST["telefono_e"];
  $correo=$_POST["correo_e"];
  $institucion=$_POST["institucion_e"];  
  $facultad=$_POST["facultad"];
  $carrera=$_POST["carrera"]; 
  $observacion = "Registro"; 

  /*echo"add".$bandera;
  echo "carne".$carnet;
  echo "nombre_e".$nombre;
  echo "apellido_e".$apellido;
  echo "genero_e".$genero;
  echo "nit_e".$nit;
  echo "dui_e".$dui;
  echo "direccion_e".$direccion;
  echo "telefono_e".$telefono;
  echo "correo_e".$correo;
  echo "institucion_e".$institucion;
  echo "facultad".$facultad;
  echo "carrera".$carrera;
  echo "Observacion".$observacion;*/

  $con=conectarMysql();

  $consulta = "SELECT * FROM estudiante WHERE carnet_es='$carnet'";
   $result = $con->query($consulta);
    if ($result) {
      while ($fila = $result->fetch_object()) {
        $datos=$fila->nombre_es;
      }//fin while
    }
//echo "datos ".$datos;
  if($datos==null){
    $estudiante  = "INSERT INTO estudiante(carnet_es, nombre_es, apellido_es, genero_es, NIT_es, DUI_es, direccion_es, telefono_es, correo_es, procedencia_es, estado_es, idfacultad, idcarrera, observacion_es)  
    VALUES('$carnet','$nombre','$apellido','$genero','$nit','$dui','$direccion','$telefono','$correo','$institucion','1','$facultad','$carrera','$observacion')";
   $result1 =mysqli_query($con,$estudiante);
   }

   if($result1){
    echo ".";
      echo "<script language='javascript'>";
      echo "swal({ 
              title:'Éxito',
              text: 'Datos Almacenados',
              type: 'success'
            },
            function(){
                //event to perform on click of ok button of sweetalert
                location.href='../../../../produccion/administracion/estudiante/registrar_estudiante.php';
            });";
      echo "</script>";
    }else{
      echo "<script language='javascript'>";
      echo "swal({ 
              title:'Error',
              text: 'Sin Conexión Dase Datos',
              type: 'error'
            },
            function(){
                //event to perform on click of ok button of sweetalert
                location.href='../../../../produccion/administracion/estudiante/registrar_estudiante.php';
            });";
      echo "</script>";

      
        if($datos!=null){
          echo ".";
          echo "<script language='javascript'>";
          echo "swal({ 
                  title:'Error',
                  text: 'Nombre ya Existe',
                  type: 'error'
                },
                 function(){
                    //event to perform on click of ok button of sweetalert
                    location.href='../../../../produccion/administracion/estudiante/registrar_estudiante.php';
                });";
          echo "</script>";
          echo ".";
        }
    }
}else if($bandera=="modificar"){
  $datos=null;
  $result=0;
  $result1=0;

 $carnet=$_POST["carne"];
 $nombre=$_POST["nombre_e"];
 $apellido=$_POST["apellido_e"];
 $genero=$_POST["genero_e"];
 $nit=$_POST["nit_e"];
 $dui=$_POST["dui_e"];
 $direccion=$_POST["direccion_e"];
 $telefono=$_POST["telefono_e"];
 $correo=$_POST["correo_e"];
 $baccion=$_REQUEST["baccion"];
 

  /*
echo"add".$bandera;
 echo "carne".$carnet;
 echo "nombre_e".$nombre;
 echo "apellido_e".$apellido;
 echo "genero_e".$genero;
 echo "nit_e".$nit;
 echo "dui_e".$dui;
 echo "direccion_e".$direccion;
 echo "telefono_e".$telefono;
 echo "correo_e".$correo;
echo "institucion_e".$institucion;
 echo "facultad".$facultad;
 echo "carrera".$carrera;
 echo "Observacion".$observacion;*/

 $con=conectarMysql();

 
  $estudiante  = "UPDATE estudiante SET carnet_es='$carnet', nombre_es='$nombre', apellido_es='$apellido', genero_es='$genero', NIT_es='$nit', DUI_es='$dui', direccion_es='$direccion', telefono_es='$telefono', correo_es='$correo' WHERE idestudiante=".$baccion;
  $result1 =mysqli_query($con,$estudiante);
  

  if($result1){
    echo ".";
      echo "<script language='javascript'>";
      echo "swal({ 
              title:'Éxito',
              text: 'Datos Almacenados',
              type: 'success'
            },
            function(){
                //event to perform on click of ok button of sweetalert
                location.href='../../../../produccion/Administracion/Estudiante/listar_Estudiante.php';
            });";
      echo "</script>";
    }else{
      echo "<script language='javascript'>";
      echo "swal({ 
              title:'Error',
              text: 'Sin Conexión Dase Datos',
              type: 'error'
            },
            function(){
                //event to perform on click of ok button of sweetalert
                location.href='../../../../produccion/Administracion/Estudiante/listar_Estudiante.php';
            });";
      echo "</script>";

      
        if($datos!=null){
          echo ".";
          echo "<script language='javascript'>";
          echo "swal({ 
                  title:'Error',
                  text: 'Nombre ya Existe',
                  type: 'error'
                },
                 function(){
                    //event to perform on click of ok button of sweetalert
                    location.href='../../../../produccion/Administracion/Estudiante/listar_Estudiante.php';
                });";
          echo "</script>";
          echo ".";
        }
}

  

}


 
}
?>