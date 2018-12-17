<?php
    require '../../../build/configuraciones/conexion.php';
    if(isset($_POST['evaluacion'])){
    $evaluacion = $_POST['evaluacion'];
    $con=conectarMysql();
    $consulta  = "SELECT ed.id_ed, ed.nombre_ed, ed.criterio_ed, ed.estado_ed, COUNT(asp.ed_idaspectos) as maximo FROM evaluaciond as ed, ed_aspectos as asp  WHERE ed.id_ed='$evaluacion' AND ed.id_ed=asp.id_edfk";
    $result = $con->query($consulta);
    
    }
?>

<input type="hidden" name="bandera" id="bandera">
                    <input type="hidden" name="baccion" id="baccion">

					
                    <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th style='color: RGB(0, 0, 128);' width="40%" colspan="2"><strong>Nombre</strong></th>
                          <th style='color: RGB(0, 0, 128);' ><strong>Criterio</strong></th>
                          <th style='color: RGB(0, 0, 128);'><strong>Acciones</strong></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      <?php
                      $contador=1;
                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                         
                          echo "<tr>";
                          echo "<td colspan='2'>" . $fila->nombre_ed . "</td>";
                          echo "<td >" . $fila->criterio_ed . "</td>";
                          echo "<td WIDTH='20%' align='center'>  <ACRONYM title='Modificar Evaluación'><a class=\"btn btn-info\" onclick=\"edited(".$fila->id_ed." , '". $fila->nombre_ed ."', '". $fila->criterio_ed ."')\" ><i class=\"fa fa-edit\"></i></a></ACRONYM>";
                                      if($fila->maximo<7){
                          echo " <ACRONYM title='Agregar Aspecto'><a class='btn btn-success' onclick='agregar(".$fila->id_ed.")' ><i class='fa fa-plus-circle'></i></a></ACRONYM>";
                                      }
                                      echo "<ACRONYM title='Asignar Porcentajes'><a class='btn btn-primary' onclick='additem(".$fila->id_ed.")' ><i class='fa fa-send-o'></i></a></ACRONYM>";
                                      echo "</td>";
                          echo "</tr>";
                          $contador++;

                        }
                       }
                      ?>

                      <tr>
                        <th <th colspan="4">
                        <div class="responsive-table">
                        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                        <tr>
                         
                          <th <th colspan="4">&nbsp;
                          
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      <?php
                      $consulta  = "SELECT * FROM ed_aspectos WHERE id_edfk=".$evaluacion;
                      $result = $con->query($consulta);
                      $contador=1;
                      if ($result) {
                        while ($fila = $result->fetch_object()) {
                         
                          echo "<tr>";
                          echo "<td align='center' style='color: RGB(0, 0, 128);' width='8%'><strong> Aspecto " .$contador. "</strong></td>";
                          echo "<td colspan='2' style='color: RGB(0, 0, 128);'><strong>" . $fila->ed_nomasp . "</strong></td>";
                          echo "<td WIDTH='20%' align='center'> <ACRONYM title='Modificar Aspecto'><a class=\"btn btn-info\" onclick=\"editaspecto(".$fila->ed_idaspectos." , '". $fila->ed_nomasp ."')\" ><i class=\"fa fa-edit\"></i></a></ACRONYM>
                              <ACRONYM title='Agregar Ítem'><a class='btn btn-success' onclick='additem(".$fila->ed_idaspectos.")' ><i class='fa fa-plus-circle'></i></a></ACRONYM>
                                      
                                      </td>";
                          echo "</tr>";
                          $contador++;
                          
                          ?>
                          
                          <div id="mostraritem" name="mostraritem">
                          <thead>
                        <tr>
                          <th>No.</th>
                          <th colspan="2">Item</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      <?php
                      $consulta2  = "SELECT * FROM ed_item WHERE ed_idaspectofk=".$fila->ed_idaspectos;
                      $result2 = $con->query($consulta2);
                      $cont=1;
                      if ($result2) {
                        while ($fila2 = $result2->fetch_object()) {
                         
                          echo "<tr>";
                          echo "<td>" .$cont. "</td>";
                          echo "<td colspan='2'>" . $fila2->ed_nomitem . "</td>";
                          echo "<td align='center'>  <ACRONYM title='Modificar Ítem'><a class=\"btn btn-info\" onclick=\"edititem(".$fila2->ed_iditem." , '". $fila2->ed_nomitem ."')\" ><i class=\"fa fa-edit\"></i></a></ACRONYM>
                      
                                      </td>";
                          echo "</tr>";
                          $cont++;

                        }
                       }
                      ?>
                      </tbody>
                       </div>
                       <tr>
                          
                          <th colspan="4">&nbsp;</th>
                          
                        </tr>


                          <?php

                        }
                       }
                      ?>

                      </tbody>
                        </table>
                        </div>
                        </th>
                      </tr>
                      </tbody>
                      
                    </table>
                    </div>