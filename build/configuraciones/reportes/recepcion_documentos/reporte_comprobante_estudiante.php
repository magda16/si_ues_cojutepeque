<!DOCTYPE html>
<html lang="es">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reporte</title>
    
    <!-- Bootstrap -->
    <link href="../../../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

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
    <td colspan="3" align="center"><strong>Comprobante Entrega de Documentos</strong></td>
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
    require "../../conexion.php";
    if(isset($_POST['idimp'])){
        $estudiante = $_POST['idimp'];
        $con=conectarMysql();
        $consulta  = "SELECT es.carnet_es, es.nombre_es, es.apellido_es, es.genero_es, es.procedencia_es, fa.nombre_fa, ca.codigo_ca, ca.nombre_ca, pe.anio_pe, doces.certificado_medico_doces, doces.matricula_doces, doces.primera_cuota_doces, doces.DUI_doces, doces.NIT_doces, doces.paes_doces, doces.partida_nacimiento_doces, doces.tituloba_doces FROM estudiante AS es, facultad AS fa, carrera AS ca, plan_estudio AS pe, documentos_es AS doces WHERE es.idestudiante=".$estudiante." AND es.idfacultad=fa.idfacultad AND es.idcarrera=ca.idcarrera AND es.idplan_estudio=pe.idplanestudio AND es.idestudiante=doces.idestudiantefk";
        $result = $con->query($consulta);
        
        if ($result) {
            while ($fila = $result->fetch_object()) {
               
                echo "<table width='100%'' border='2' rules='all'>";
                echo "<tr>";
                echo "<th colspan='8' align='center'><div align='center'><strong>".$fila->nombre_fa."</strong></div></th>";
                echo "</tr>";
                echo "<tr>";
                echo "<td width='71'><strong>&nbsp;&nbsp;Código&nbsp;</strong></td>";
                echo "<td colspan='6'><strong>&nbsp;&nbsp;Carrera&nbsp;</strong></td>";
                echo "<td width='59'><strong>&nbsp;&nbsp;Plan&nbsp;</strong></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>&nbsp;&nbsp;".$fila->codigo_ca."&nbsp;</td>";
                echo "<td colspan='6'>&nbsp;&nbsp;".$fila->nombre_ca."&nbsp; </td>";
                echo "<td>&nbsp;&nbsp;".$fila->anio_pe."&nbsp;</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='2'><strong>&nbsp;&nbsp;Carnet&nbsp;</strong></td>";
                echo "<td width='270'><strong>&nbsp;&nbsp;Apellidos&nbsp;</strong></td>";
                echo "<td colspan='3'><strong>&nbsp;&nbsp;Nombres&nbsp;</strong></td>";
                echo "<td colspan='2'><strong>&nbsp;&nbsp;Genero&nbsp;</strong></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='2'>&nbsp;&nbsp;".$fila->carnet_es."&nbsp;</td>";
                echo "<td>&nbsp;&nbsp;".$fila->apellido_es."&nbsp;</td>";
                echo "<td colspan='3'>&nbsp;&nbsp;".$fila->nombre_es."&nbsp;</td>";
                echo "<td colspan='2'>&nbsp;&nbsp;".$fila->genero_es."&nbsp;</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='8'><div align='center'><strong>DOCUMENTOS PRESENTADOS.&nbsp;</strong></div></td>";
                echo "</tr>";
                echo "<tr>";
                if($fila->certificado_medico_doces!=""){
                echo "<td colspan='4'>&nbsp;&nbsp;<i class='fa fa-check-square-o'>&nbsp;&nbsp;</i>Certificado M&eacute;dico ($) </td>";
                }
                echo "<td colspan='4' rowspan='8'>
                <br><br>
                <div align='center'> F:_______________________________<br>
                    Silvia Dinora Menjivar Alvarenga. <br>Administradora de Sede.</div><br>
                </td>";
                echo "</tr>";
                echo "<tr>";
                if($fila->matricula_doces!=""){
                echo "<td colspan='4'>&nbsp;&nbsp;<i class='fa fa-check-square-o'>&nbsp;&nbsp;</i>Matricula</td>";
                }
                echo "</tr>";
                echo "<tr>";
                if($fila->primera_cuota_doces!=""){
                echo "<td colspan='4'>&nbsp;&nbsp;<i class='fa fa-check-square-o'>&nbsp;&nbsp;</i>Primera Cuota</td>";
                }
                echo "</tr>";
                echo "<tr>";
                if($fila->partida_nacimiento_doces!=""){
                echo "<td colspan='4'>&nbsp;&nbsp;<i class='fa fa-check-square-o'>&nbsp;&nbsp;</i>Partida de Nacimiento</td>";
                }
                echo "</tr>";
                echo "<tr>";
                if($fila->tituloba_doces!=""){
                echo "<td colspan='4'>&nbsp;&nbsp;<i class='fa fa-check-square-o'>&nbsp;&nbsp;</i>T&iacute;tulo de Bachiller</td>";
                }
                echo "</tr>";
                echo "<tr>";
                if($fila->DUI_doces!=""){
                echo "<td colspan='4'>&nbsp;&nbsp;<i class='fa fa-check-square-o'>&nbsp;&nbsp;</i>DUI</td>";
                }
                echo "</tr>";
                echo "<tr>";
                if($fila->NIT_doces!=""){
                echo "<td colspan='4'>&nbsp;&nbsp;<i class='fa fa-check-square-o'>&nbsp;&nbsp;</i>NIT</td>";
                }
                echo "</tr>";
                echo "<tr>";
                if($fila->paes_doces!=""){
                echo "<td colspan='4'>&nbsp;&nbsp;<i class='fa fa-check-square-o'>&nbsp;&nbsp;</i>PAES</td>";
                }
                echo "</tr>";
                
                echo "</table>";

            }//fin while
        }
    }
    ?>

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
    
    <strong><div align="right" style="font-size: 14px;">P&aacute;gina 1 de 1 </div><strong>
    
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
