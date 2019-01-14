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
  <table width="100%" border="0">
  <?php 
  
    $numeroFilas=34;

    function encabezado(){  
      
   ?>
  <tr>
    <th width="26" scope="col">&nbsp;</th>
    <th colspan="3" scope="col">&nbsp;</th>
    <th width="26" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" align="center"><img src="../../../../produccion/images/encabezado.png" width="" height="" /></td>
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

    


        
        <?php 
       
      }

    $contador=0;
    $numpagina=0;
    $datos=0;
    $filasagregadas=0;

   
        require "../../conexion.php"; 
        $con=conectarMysql();
        $consulta  = "SELECT * FROM carrera";
        $result = $con->query($consulta);
        
        $filasconsulta=mysqli_num_rows($result);
  
        $contadorpag=ceil(number_format($filasconsulta/$numeroFilas,4));

        $filasagregadas=(($numeroFilas*$contadorpag)+3)-$filasconsulta;
        
        $result1 = $con->query("SELECT DISTINCT fa.idfacultad, fa.nombre_fa FROM carrera AS ca, facultad AS fa WHERE ca.idfacultadfk=fa.idfacultad AND ca.estado_ca=1 ORDER BY fa.nombre_fa ASC");
        
        if ($result1) {
        while ($fila =$result1->fetch_object()) {
          $facultad=$fila->idfacultad;
          

          echo "<table width='900' border='0' rules='all' align='center'>";
          echo "<tr>";
          echo "<th><table width='100%' border='1'>";
          echo "<tr>";
          echo "<th colspan='4'><strong>&nbsp;".$fila->nombre_fa."&nbsp;</strong></th>";
          echo "</tr>";
          echo "<tr>";
          echo "<td width='5%' align='center'><strong>&nbsp;&nbsp;N&deg;&nbsp;</strong></td>";
          echo "<td width='15%'><strong>&nbsp;C&oacute;digo&nbsp;</strong></td>";
          echo "<td width='70%'><strong>&nbsp;Carrera&nbsp;</strong></td>";
          echo "<td width='10%'><strong>&nbsp;Duraci&oacute;n&nbsp;</strong></td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>&nbsp;</td>";
          echo "<td>&nbsp;</td>";
          echo "<td>&nbsp;</td>";
          echo "<td>&nbsp;</td>";
          echo "</tr>";
          
          echo "</table></th>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>&nbsp;</td>";
          echo "</tr>";
          echo "</table>";
          echo "<tr style='font-size: 14px;'>";
          echo "<td align='center'>&nbsp;".$contador."&nbsp;</td>";
          echo "<td>&nbsp;".$fila->codigo_ca."&nbsp;</td>";
          echo "<td>&nbsp;".$fila->nombre_ca."&nbsp;</td>";
          echo "<td>&nbsp;".$fila->duracion_ca." A&ntilde;os &nbsp;</td>";
          echo "</tr>";
          if($contadorpag>1){
            if($contador%$numeroFilas==0){

              echo "</td>";
              echo "<td>&nbsp;</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>&nbsp;</td>";
              echo "<td colspan='3'>&nbsp;</td>";
              echo "<td>&nbsp;</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>&nbsp;</td>";
              echo "<td width='320'>&nbsp;</td>";
              echo "<td width='173'>&nbsp;</td>";
              echo "<td width='321'>";
          
              echo "<strong><div align='right' style='font-size: 18px;'>P&aacute;gina ".($numpagina+1)." de ".ceil(number_format($filasconsulta/$numeroFilas,4))."</div></strong>";
          
              echo "</td>";
              echo "<td>&nbsp;</td>";
              echo "</tr>";
              echo "<tr>";
              echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";
              echo "<td>&nbsp;</td>";
              echo "</tr>";
              $numpagina++;
              encabezado();
              
              
              echo "<div class='saltopagina'></div>";
            }
            
          }
        }
        
      }
        ?>
        
    

    </td>
    <td>&nbsp;</td>
  </tr>

  <?php
      for($i=0; $i<=$filasagregadas; $i++){
        echo "<tr>";
        echo "<td>&nbsp;</td>";
        echo "<td colspan='3'>&nbsp;</td>";
        echo "<td>&nbsp;</td>";
        echo "</tr>";
      }




  ?>
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
    
    <strong><?php echo "<div align='right' style='font-size: 18px;'>P&aacute;gina ".($numpagina+1)." de ".ceil(number_format($filasconsulta/$numeroFilas,4))."</div>"; ?><strong>
    
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>

    <div align="center">
      <button class="btn btn-round " type="button"  id="boton" name="boton" onclick="ocultar()"><i class="fa fa-print">  Imprimir</i></button>
                            
    </div>

    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
    
    <!-- jQuery -->
    <script src="../../../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	
  </body>
  
</html>
