<?php 
  //numero de filas por pagina
  $numeroFilas=36;
  

  function msg1($texto){
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "</script>";
  }

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reporte</title>
<style type="text/css">
  @media all{
    div.saltopagina{
      display: none;
    }
  }
  @media print{
    div.saltopagina{
      display: block;
      page-break-before: always;
    }
  }
</style>
<script type="text/javascript"> 
  function ocultar(){
    document.formulario.boton.style.visibility="hidden";
    print();
    document.formulario.boton.style.visibility="visible";
  }
</script>

</head>

<body>
<form id="formulario" name="formulario" method="post" action="">
 <?php date_default_timezone_set("America/El_Salvador"); ?>
  <table align="center" width="900" border="0" >
    <?php function encabezado(){  
    ?>
    
    <tr>
      <td colspan="5"><img src="../../../../produccion/images/encabezado.png" width="" height="" /></td>
    </tr>  
    <tr>
      <td align="center" colspan="5"><strong><?php $fechaActual = date('d-m-Y'); echo "Fecha Consulta: ".$fechaActual; ?></strong>
      <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php $fechaActual = date('h:i:s a'); echo "Hora Consulta: ".$fechaActual; ?></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center" colspan="2"></td>
      <td align="center"></td>
    </tr>
    <tr>
      <td colspan="5" align="center" style="font-size: 28px;"><strong>REPORTE DE FACULTADES ACTIVAS</strong></td> 
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
    <tr style="font-size: 18px;">
      <td colspan="5" align="center"><table width="880" border="1" rules="all">
        <tr bgcolor="#b2b2b2" style="font-size: 18px;" align="center">
          <td width="50"><strong>N&deg;</strong></td>
          <td width="300"><strong>Facultad</strong></td>
          <td width="300"><strong>Tel&eacute;fono</strong></td>
          <td width="300"><strong>Correo</strong></td>
         
        </tr>
      </table>

        <?php }

    $contador=0;
    $numpagina=0;
    $datos=0;

   
        require "../../conexion.php"; 
        $con=conectarMysql();
        $consulta  = "SELECT rf.nombre_rf, rf.apellido_rf, rf.telefono_rf, rf.correo_rf, fa.nombre_fa, fa.telefono_fa, fa.correo_fa FROM representante_facultad AS rf, facultad AS fa WHERE rf.id_re_fa=fa.id_re_fafk";
        $result = $con->query($consulta);
        
        $cuantaspag=mysqli_num_rows($result);
       // $flor=explode(".", $cuantaspag*20);
        $flor=explode(".", $cuantaspag);
        $cuantaspag=$flor[0]+1;
        if ($result) {
        while ($fila = $result->fetch_object()) {
          //for($i=0; $i <=20; $i++){
          if($contador%$numeroFilas==0){
            encabezado();
            echo "<table width='880' border='1' rules='all'>";
          }
          $contador++;
          echo "<tr style='font-size: 18px;'>";
          echo "<td width='50' align='center'>".$contador."</td>";
          echo "<td width='300' >".$fila->nombre_fa."</td>";
          echo "<td width='300' >".$fila->telefono_fa."</td>";
          echo "<td width='300' >".$fila->correo_fa."</td>";
          
          echo "</tr>";
          if($contador%$numeroFilas==0){
            $numpagina++;
            echo "</table><br>";
            echo "<div align='right' style='font-size: 18px;'><strong>P&aacute;gina ".$numpagina." de ".ceil(number_format($cuantaspag/$numeroFilas,4))."</strong></div>";
            echo "<div class='saltopagina'></div>";
          }
        }
      }

    echo "</table>";
    

  ?>
  <tr>
  
  <td colspan="5">&nbsp;&nbsp;</td>
</tr>

   <tr>
  
      <td colspan="5"><strong><?php echo "<div align='right' style='font-size: 18px;'>P&aacute;gina ".($numpagina+1)." de ".ceil(number_format($cuantaspag/$numeroFilas,4))."</div>";
             ?><strong></td>
    </tr>
     
      </table></td>
    </tr>

   
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><div align="center">
      <input type="button" name="boton" id="boton" value="Imprimir" onclick="ocultar()"/>
    </div></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>