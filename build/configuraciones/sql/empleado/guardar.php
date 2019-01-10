<!--Alertas -->
<script src="../../../../vendors/alertas/dist/sweetalert-dev.js"></script>
<link rel="stylesheet" type="text/css" href="../../../../vendors/alertas/dist/sweetalert.css"/>
<?php
include ('../../conexion.php');

//function guardar(){
    /*if(isset($_POST["dui"])){
        echo "la variable se imprimira";
    }*/
$cargo = $_POST['cargo'];
$dui = $_POST['dui'];
$nit = $_POST['nit'];
$nombre = $_POST['first'];
$apellido = $_POST['last'];
$direccion = $_POST['di'];
$genero = $_POST['genero'];
$estado = '1';
$estado_ci = $_POST['estado'];
$especialidad = $_POST['especialidad'];


/*$telefono= $_POST['telefono'];
for($i=0 ; $i <count($telefono); $i++ ){
    echo $telefono[$i];
 }
 
$correo = $_POST['correo'];

for($j=0 ; $j <count($correo); $j++ ){
    echo $correo[$j];
 }*/

echo "cargo ".$cargo;
echo "dui ".$dui;
echo "nit ".$nit;
echo "nombre ".$nombre;
echo "apellido ".$apellido;
echo "direccion ".$direccion;
echo "genero ".$genero;
echo "estado".$estado_ci;

//echo $estado;
echo "especialidad ".$especialidad;
//echo $telefono;
/*echo $correo;*/

$funcion=$_POST['funcion'];
$cod=$_POST['cod'];
$baja=$_POST['funcion_baja'];
$codbaja=$_POST['cod_baja'];
$alta=$_POST['funcion_alta'];
$codalta=$_POST['cod_alta'];
echo $funcion;



if($funcion=="modificar"){
    echo $cod;
    $conexion = conectarMysql();

   $sql="UPDATE empleado SET nombre_em='$nombre',apellido_em='$apellido',DUI_em='$dui',NIT_em='$nit',
   direccion_em='$direccion',cargo_em='$cargo',especialidad_em='$especialidad',genero_em='$genero',
   estado_em='$estado',estado_ci='$estado_ci' where idempleado=$cod";
    

}else if($baja=="baja"){

    echo $codbaja;
    $conexion = conectarMysql();

    $sql="UPDATE empleado SET nombre_em='$nombre',apellido_em='$apellido',DUI_em='$dui',NIT_em='$nit',
   direccion_em='$direccion',cargo_em='$cargo',especialidad_em='$especialidad',genero_em='$genero',
   estado_em='0',estado_ci='$estado_ci' where idempleado=$codbaja";


    
}else if($alta=="alta"){

    echo $codalta;
    $conexion = conectarMysql();

    $sql="UPDATE empleado SET nombre_em='$nombre',apellido_em='$apellido',DUI_em='$dui',NIT_em='$nit',
   direccion_em='$direccion',cargo_em='$cargo',especialidad_em='$especialidad',genero_em='$genero',
   estado_em='1',estado_ci='$estado_ci' where idempleado=$codalta";


}else{

    $conexion = conectarMysql();
    $result = $conexion->query("select max(idempleado)+1 as 'id' from empleado");
      if ($result) {
        while ($fila = $result->fetch_object()) {
          $id=$fila->id;
        }
      }
      if($id==null){
        $id=$id+1;
      }

      echo "id ".$id;

      $sql = "INSERT INTO empleado(idempleado,nombre_em,apellido_em,DUI_em,NIT_em,direccion_em,cargo_em,especialidad_em,genero_em,estado_em,estado_ci) 
    VALUES('$id','$nombre','$apellido','$dui','$nit','$direccion','$cargo','$especialidad','$genero','$estado','$estado_ci') ";
      }






    
        



//$sql1 = "INSERT INTO empleado_telefono (telefono_em) VALUES ('$telefono')";


//$sql2 = "INSERT INTO empleado_correo (correo_em) VALUES ('$correo') ";


//$conexion1 = conectarMysql();
//$conexion2 = conectarMysql();
$ejecutar=mysqli_query($conexion,$sql);
//$ejecutar1=mysqli_query($conexion1,$sql1);
//$ejecutar2=mysqli_query($conexion2,$sql2);
if($ejecutar){
echo 'exito';
echo "<script type='text/javascript'>";
echo "location.href='../../../../produccion/Administracion/Tutor/VistaTutor.php'";
echo "</script>"; 


}else{
    echo 'no';
}
/*if($ejecutar1){
    echo 'exito';
    }else{
        echo 'no';
    }
    if($ejecutar2){
        echo 'exito';
        }else{
            echo 'no';
        }*/
//$nombre.val(" ");
//return $ejecutar;


?>