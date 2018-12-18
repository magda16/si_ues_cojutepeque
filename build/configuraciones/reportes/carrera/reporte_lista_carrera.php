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
       /* require "../../conexion.php"; 
        $con=conectarMysql();
        $con=conectarMysql();
        $consulta  = "SELECT * FrOM carrera";
        $result = $con->query($consulta);
        if ($result) {
            while ($fila = $result->fetch_object()) {
                $codigo=$fila->codigo_ca;
                $nombre=$fila->nombre_ca;
                $duracion=$fila->duracion_ca." A&ntilde;os";
                $estado=$fila->estado_ca;
                $observacion=$fila->observacion_ca;
                if($estado==1){
                $estado_ca="Activa";
                }else{
                $estado_ca="Inactiva";
                }
            }//fin while
        }*/
    ?>
    <!--
    <tr>
      <td rowspan="4"><img src="<?php //echo $logoR; ?>" width="200" height="200" /></td>
      <td></td>
      <td align="center" colspan="2"><strong><?php //echo strtoupper($nombreR); ?><strong><br>
                                    <strong><?php //echo strtoupper($direccionR); ?><strong><br></td> 
                                    
      <td>&nbsp;</td>
    </tr>
    -->
    <tr>
      <td>&nbsp;</td>
      <td align="center" colspan="3"></td>
      <td align="right"><strong><?php $fechaActual = date('d-m-Y'); echo "Fecha Consulta: ".$fechaActual; ?></strong><br>
      <strong><?php $fechaActual = date('h:i:s a'); echo "Hora Consulta: ".$fechaActual; ?></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="center" colspan="2"></td>
      <td align="center"></td>
    </tr>
    <tr>
      
      
      <td colspan="5" align="center" style="font-size: 28px;"><strong>REPORTE LISTA DE CARRERAS ACTIVAS</strong></td>
      
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>

    <tr style="font-size: 14px;">
      <td colspan="5" align="center"><table width="880" border="1" rules="all">
        <tr bgcolor="#b2b2b2" style="font-size: 18px;">
          <td width="50"><strong>N&deg;</strong></td>
          <td width="300"><strong>C&oacute;digo</strong></td>
          <td width="300"><strong>Carrera</strong></td>
          <td width="300"><strong>Duraci&oacute;n</strong></td>
        </tr>
      </table>

        <?php }

    $contador=0;
    $numpagina=0;
    $datos=0;

   
        require "../../conexion.php"; 
        $con=conectarMysql();
        $consulta  = "SELECT * FrOM carrera";
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
          echo "<td width='300' >".$fila->codigo_ca."</td>";
          echo "<td width='300' >".$fila->nombre_ca."</td>";
          echo "<td width='300' >".$fila->duracion_ca." A&ntilde;os </td>";
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