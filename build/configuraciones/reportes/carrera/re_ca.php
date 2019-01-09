<!DOCTYPE html>
<html lang="es">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reporte</title>
    
    <!-- Bootstrap -->
    <link href="../../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

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
  <form id="formulario" name="formulario" method="POST" action="">
  <?php date_default_timezone_set("America/El_Salvador"); ?>
  <table width="100%" border="1">
  <?php 
  
    $numeroFilas=36;

    function encabezado(){  
      
   ?>
  <tr>
    <th width="26" scope="col">&nbsp;</th>
    <th colspan="3" scope="col">&nbsp;</th>
    <th width="26" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><img src="../../../../produccion/images/encabezado.png" width="" height="" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="center"><strong><?php $fechaActual = date('d-m-Y'); echo "Fecha Consulta: ".$fechaActual; ?></strong>
      <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php $fechaActual = date('h:i:s a'); echo "Hora Consulta: ".$fechaActual; ?></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="center"><strong>REPORTE LISTA DE CARRERAS ACTIVAS</strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">

    <table width="100%" border="1" rules="all">
    <tr style="font-size: 16px;">
      <td width="5%" align="center"><strong>&nbsp;&nbsp;N&deg;&nbsp;</strong></td>
      <td width="15%" ><strong>&nbsp;C&oacute;digo&nbsp;</strong></td>
      <td width="70%" ><strong>&nbsp;Carrera&nbsp;</strong></td>
      <td width="10%" ><strong>&nbsp;Duraci&oacute;n&nbsp;</strong></td>
    </tr>


        
        <?php 
        /*echo "<tr style='font-size: 11px;'>";
        echo "<td align='center'><strong>N&deg;</strong></td>";
        echo "<td ><strong>C&oacute;digo</strong></td>";
        echo "<td ><strong>Carrera</strong></td>";
        echo "<td ><strong>Duraci&oacute;n</strong></td>";
        echo "</tr>";*/
      
      }

    $contador=0;
    $numpagina=0;
    $datos=0;

   
        require "../../conexion.php"; 
        $con=conectarMysql();
        $consulta  = "SELECT * FROM carrera";
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
           // echo "<table width='100%' border='1' rules='all'>";
          }
          $contador++;
          echo "<tr style='font-size: 14px;'>";
          echo "<td align='center'>&nbsp;".$contador."&nbsp;</td>";
          echo "<td>&nbsp;".$fila->codigo_ca."&nbsp;</td>";
          echo "<td>&nbsp;".$fila->nombre_ca."&nbsp;</td>";
          echo "<td>&nbsp;".$fila->duracion_ca." A&ntilde;os &nbsp;</td>";
          echo "</tr>";
          if($contador%$numeroFilas==0){
            $numpagina++;
           // echo "</table><br>";
          //  echo "<div align='right' style='font-size: 18px;'><strong>P&aacute;gina ".$numpagina." de ".ceil(number_format($cuantaspag/$numeroFilas,4))."</strong></div>";
          //  echo "<div class='saltopagina'></div>";
          }
        }
      }

        ?>
        
    </table>

    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="320">&nbsp;</td>
    <td width="173">&nbsp;</td>
    <td width="321">
    
    <strong><?php echo "<div align='right' style='font-size: 18px;'>P&aacute;gina ".($numpagina+1)." de ".ceil(number_format($cuantaspag/$numeroFilas,4))."</div>"; ?><strong>
    
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>

    <div align="center">
      <!-- <input type="button" name="boton" id="boton" value="Imprimir" onclick="ocultar()"/> -->
      <button class="btn btn-round " type="button"  id="boton" name="boton" onclick="ocultar()"><i class="fa fa-print">  Imprimir</i></button>
                            
    </div>

    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
    
    <!-- Bootstrap -->
    <script src="../../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	
  </body>
  
</html>
