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
  
    $numeroFilas=26;

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
    <td colspan="3" align="center"><strong>REPORTE DE FACULTADES ACTIVAS</strong></td>
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
        $consulta  = "SELECT fa.nombre_fa, fa.telefono_fa, fa.correo_fa, rf.nombre_rf, rf.apellido_rf, rf.telefono_rf, rf.correo_rf FROM facultad AS fa, representante_facultad AS rf WHERE fa.id_re_fafk=rf.id_re_fa";
        $result = $con->query($consulta);
        
        $filasconsulta=mysqli_num_rows($result);
  
        $contadorpag=ceil(number_format($filasconsulta/$numeroFilas,4));

        $filasagregadas=(($numeroFilas*$contadorpag))-$filasconsulta;
        
        if ($result) {
        encabezado();
        while ($fila = $result->fetch_object()) {
          $contador++;
          echo "<table width='900' border='0' rules='all' align='center'>";
          echo "<tr>";
          echo "<th><table width='900' border='1' rules='all'>";
          echo "<tr style='font-size: 14px;'>";
          echo "<th width='396' >&nbsp;</th>";
          echo "<th width='360'>&nbsp; &nbsp;Correo&nbsp; &nbsp;</th>";
          echo "<th width='122'>&nbsp; &nbsp;Telefono&nbsp; &nbsp;</th>";
          echo "</tr>";
          echo "<tr style='font-size: 14px;'>";
          echo "<td>&nbsp; &nbsp;".$fila->nombre_fa."&nbsp; &nbsp;</td>";
          echo "<td>&nbsp; &nbsp;".$fila->correo_fa."&nbsp; &nbsp;</td>";
          echo "<td>&nbsp; &nbsp;".$fila->telefono_fa."&nbsp; &nbsp;</td>";
          echo "</tr>";
          echo "<tr style='font-size: 14px;'>";
          echo "<td>&nbsp; &nbsp;Representante ".$fila->nombre_rf." ".$fila->apellido_rf."&nbsp; &nbsp;</td>";
          echo "<td>&nbsp; &nbsp;".$fila->correo_rf."&nbsp; &nbsp;</td>";
          echo "<td> &nbsp; &nbsp;".$fila->telefono_rf." &nbsp; &nbsp;</td>";
          echo "</tr>";
              
          echo "</table></th>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>&nbsp;</td>";
          echo "</tr>";
          echo "</table>";

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