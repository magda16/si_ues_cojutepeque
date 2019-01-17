<?php
    $carrera=0;
    $estado=0;
    if(isset($_REQUEST['cargo'])){
        $cargo = $_REQUEST['cargo'];
        $estado = $_REQUEST['estado'];
    }

    if($estado==1){
        echo "<p class='text-muted font-13 m-b-30' >Lista de todo el Recurso Humano Activo.</p>";
    }else if($estado==0){
        echo "<p class='text-muted font-13 m-b-30' >Lista de todo el Recurso Humano Inactivo.</p>";
    }
    
    ?>
    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th style="color: RGB(0, 0, 128);" width="5%">No.</th>
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
                $result = $con->query("SELECT * FROM empleado WHERE cargo_em='$cargo' AND estado_em='$estado'");
                $contador=1;
                if ($result) {
                    while ($fila = $result->fetch_object()) {
                                
                        echo "<tr>";
                        echo "<td>" .$contador. "</td>";
                        echo "<td>" . $fila->nombre_em . "</td>";
                        echo "<td>" . $fila->apellido_em. "</td>";
                        echo "<td>" . $fila->telefono_em. "</td>";
                        echo "<td>" . $fila->correo_em. "</td>";
                        echo "<td> <a id='paso1' class='btn btn-success' type='button' onclick='ver(".$fila->idempleado.")' data-toggle='tooltip' data-placement='top' title='Mostrar Recurso Humano'><i class='fa fa-eye'></i></a>";
                        if($estado==1){
                        echo "<a id='paso2' class='btn btn-info' type='button' onclick='editarempleado(".$fila->idempleado.")' data-toggle='tooltip' data-placement='top' title='Editar Recurso Humano'><i class='fa fa-edit'></i></a>";
                        echo "<a id='paso3' class='btn btn-danger' type='button' onclick='confirmar(".$fila->idempleado.")' data-toggle='tooltip' data-placement='top' title='Dar Baja Recurso Humano' ><i class='fa fa-long-arrow-down'></i></a>";
                         }else if($estado==0){
                             echo "<a id='paso2' class='btn btn-primary' onclick='confirmaralta(".$fila->idempleado.")' data-toggle='tooltip' data-placement='top' title='Dar Alta Recurso Humano'><i class='fa fa-long-arrow-up'></i></a> ";
                         }
                        echo "</td>";
                        $contador++;
                    }
                }
            ?>
        </tbody>
    </table>
    