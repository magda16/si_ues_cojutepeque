<?php
    $carrera=0;
    $estado=0;
    if(isset($_REQUEST['carrera'])){
        $carrera = $_REQUEST['carrera'];
        $estado = $_REQUEST['estado'];
    }

    if($estado==1){
        echo "<p class='text-muted font-13 m-b-30' >Lista de Estudiantes Activos por Carrera.</p>";
    }else if($estado==0){
        echo "<p class='text-muted font-13 m-b-30' >Lista de Estudiantes Inactivos por Carrera.</p>";
    }
    
    ?>
    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style="color: RGB(0, 0, 128);" width="5%">No.</th>
                <th style="color: RGB(0, 0, 128);" width="10%">Carnet</th>
                <th style="color: RGB(0, 0, 128);" width="20%">Nombres</th>
                <th style="color: RGB(0, 0, 128);" width="20%">Apellidos</th>
                <th style="color: RGB(0, 0, 128);" width="15%">Teléfono</th>
                <th style="color: RGB(0, 0, 128);" width="15%">Correo Electrónico</th>
                <th style="color: RGB(0, 0, 128);" width="20%">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require '../../../build/configuraciones/conexion.php';
                $con=conectarMysql();
                $result = $con->query("SELECT es.idestudiante, es.carnet_es, es.nombre_es, es.apellido_es, es.correo_es, es.telefono_es FROM estudiante AS es WHERE es.idcarrera=".$carrera." AND es.estado_es=".$estado." ORDER BY es.nombre_es ASC");
                $contador=1;
                if ($result) {
                    while ($fila = $result->fetch_object()) {
                                
                        echo "<tr>";
                        echo "<td>" .$contador. "</td>";
                        echo "<td>" . $fila->carnet_es. "</td>";
                        echo "<td>" . $fila->nombre_es . "</td>";
                        echo "<td>" . $fila->apellido_es. "</td>";
                        echo "<td>" . $fila->telefono_es. "</td>";
                        echo "<td>" . $fila->correo_es. "</td>";
                        echo "<td> <a id='paso1' class='btn btn-success' type='button' onclick='ver(".$fila->idestudiante.")' data-toggle='tooltip' data-placement='top' title='Expediente Estudiantil'><i class='fa fa-eye'></i></a>";
                        if($estado==1){
                        echo "<a id='paso2' class='btn btn-info' type='button' onclick='editarestudiante(".$fila->idestudiante.")' data-toggle='tooltip' data-placement='top' title='Editar Expediente'><i class='fa fa-edit'></i></a>";
                        echo "<a id='paso3' class='btn btn-dark' type='button' onclick='tramites(".$fila->idestudiante.")' data-toggle='tooltip' data-placement='top' title='Ver Procesos' ><i class='fa fa-folder-o'></i></a>";
                        echo "<a id='paso4' class='btn btn-danger' type='button' onclick='confirmar(".$fila->idestudiante.")' data-toggle='tooltip' data-placement='top' title='Desactivar Estudiante' ><i class='fa fa-long-arrow-down'></i></a>";
                         }else if($estado==0){
                             echo "<a id='paso2' class='btn btn-primary' onclick='confirmaralta(".$fila->idestudiante.")' data-toggle='tooltip' data-placement='top' title='Activar Estudiante'><i class='fa fa-long-arrow-up'></i></a> ";
                         }
                        echo "</td>";
                        $contador++;
                    }
                }
            ?>
        </tbody>
    </table>
    