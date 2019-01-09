<?php
    $carrera=0;
    if(isset($_REQUEST['carrera'])){
        $carrera = $_REQUEST['carrera'];
    }
?>
    <p class="text-muted font-13 m-b-30" >
        Lista de todos los Documentos Activos.
    </p>
    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Carnet</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require '../../../build/configuraciones/conexion.php';
                $con=conectarMysql();
                $result = $con->query("SELECT es.idestudiante, es.carnet_es, es.nombre_es, es.apellido_es FROM estudiante AS es, documentos_es AS doces WHERE es.idestudiante=doces.idestudiantefk AND es.idcarrera=".$carrera." AND es.estado_es=1 ORDER BY es.nombre_es ASC");
                $contador=1;
                if ($result) {
                    while ($fila = $result->fetch_object()) {
                                
                        echo "<tr>";
                        echo "<td>" .$contador. "</td>";
                        echo "<td>" . $fila->carnet_es. "</td>";
                        echo "<td>" . $fila->nombre_es . "</td>";
                        echo "<td>" . $fila->apellido_es. "</td>";
                        echo "<td> 
                                <a id='paso1' class='btn btn-info' onclick='editarrecepciondocumentos(".$fila->idestudiante.")' data-toggle='tooltip' data-placement='top' title='Editar Facultad'><i class='fa fa-edit'></i></a>
                                <a id='paso2' class='btn btn-default' type='button' onclick='imprecepciondocumentos(".$fila->idestudiante.")' data-toggle='tooltip' data-placement='top' title='Imprimir Comprobante'><i class='fa fa-print'></i></a>
                            </td>";
                        echo "</tr>";
                        $contador++;

                    }
                }
            ?>
        </tbody>
    </table>
    