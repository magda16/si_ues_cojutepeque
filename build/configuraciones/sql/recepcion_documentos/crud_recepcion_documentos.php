<?php
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
{
  require "../../conexion.php"; 
  if(isset($_POST["bandera"])){

    $bandera=$_POST["bandera"];
   
    if($bandera=="add"){
    $msj="Error";
    function obtenerResultado(){
        
        $result = 0;
        $con=conectarMysql();
        $idestudiante=$_REQUEST["idestudiante"];
        $carpeta=$_REQUEST["carpeta"];
        $pagocertificado=$_REQUEST["pagocertificado"];
      
        $ruta = "../../../../Archivos";
        $ruta2 = "../../../../Archivos/".$carpeta;

        
     
     function llenarArchivos($ruta3){
        $dbcertificado_medico = null;
        $dbmatricula = null;
        $dbpcuota = null;
        $dbdui = null;
        $dbnit = null;
        $dbpaes = null;
        $dbpartida = null;
        $dbtituloba = null;
    
        function validarTipoDoc($doc){
            $tipo=null;
            if($doc=="application/pdf"){
                $tipo=".pdf";
            }else if ($doc=="image/jpg") {
                $tipo=".jpg";
            }else if ($doc=="image/jpeg") {
                $tipo=".jpeg";
            }else if ($doc=="image/png") {
                $tipo=".png";
            }
            return $tipo;
        }

        $cmtype = $_FILES['certificado_medico']['type'];
        $certificado_medico_guardada = $_FILES['certificado_medico']['tmp_name'];
        $cmtipo=validarTipoDoc($cmtype);
        
        if(move_uploaded_file($certificado_medico_guardada, $ruta3."/certificado_medico".$cmtipo)){
            $dbcertificado_medico  = $ruta3."/certificado_medico".$cmtipo;
        }

        $mtype = $_FILES['matricula']['type'];
        $matricula_guardada = $_FILES['matricula']['tmp_name'];
        $mtipo=validarTipoDoc($mtype);
        
        if(move_uploaded_file($matricula_guardada, $ruta3."/matricula".$mtipo)){
            $dbmatricula  = $ruta3."/matricula".$mtipo;
        }
        
        $pctype = $_FILES['pcuota']['type'];
        $pcuota_guardada = $_FILES['pcuota']['tmp_name'];
        $pctipo=validarTipoDoc($pctype);

        if(move_uploaded_file($pcuota_guardada, $ruta3."/primera_cuota".$pctipo)){
            $dbpcuota = $ruta3."/primera_cuota".$pctipo;
        }

        $dtype = $_FILES['dui']['type'];
        $dui_guardado = $_FILES['dui']['tmp_name'];
        $dtipo=validarTipoDoc($dtype);

        if(move_uploaded_file($dui_guardado, $ruta3."/dui".$dtipo)){
            $dbdui = $ruta3."/dui".$dtipo;
        }

        $ntype = $_FILES['nit']['type'];
        $nit_guardado = $_FILES['nit']['tmp_name'];
        $ntipo=validarTipoDoc($ntype);

        if(move_uploaded_file($nit_guardado, $ruta3."/nit".$ntipo)){
            $dbnit = $ruta3."/nit".$ntipo;
        }

        $patype = $_FILES['paes']['type'];
        $paes_guardada = $_FILES['paes']['tmp_name'];
        $patipo=validarTipoDoc($patype);

        if(move_uploaded_file($paes_guardada, $ruta3."/paes".$patipo)){
            $dbpaes = $ruta3."/paes".$patipo;
        }

        $partype = $_FILES['partida']['type'];
        $partida_guardada = $_FILES['partida']['tmp_name'];
        $partipo=validarTipoDoc($partype);

        if(move_uploaded_file($partida_guardada, $ruta3."/partida_nacimiento".$partipo)){
            $dbpartida = $ruta3."/partida_nacimiento".$partipo;
        }

        $tbtype = $_FILES['titulo_bachiller']['type'];
        $titulo_bachiller_guardada = $_FILES['titulo_bachiller']['tmp_name'];
        $tbtipo=validarTipoDoc($tbtype);
        
        if(move_uploaded_file($titulo_bachiller_guardada, $ruta3."/titulo_bachiller".$tbtipo)){
            $dbtituloba = $ruta3."/titulo_bachiller".$tbtipo;
        }


        $datos = array(
            0 => $dbcertificado_medico,
            1 => $dbmatricula,
            2 => $dbpcuota,
            3 => $dbdui,
            4 => $dbnit,
            5 => $dbpaes,
            6 => $dbpartida,
            7 => $dbtituloba,
        );
  
        return $datos;    
     }

     $dato = null;

     if(!file_exists($ruta)){
         mkdir($ruta, 0777,true);
            if(!file_exists($ruta2)){
                mkdir($ruta2, 0777,true);
                if(file_exists($ruta2)){
        
                    $dato = llenarArchivos($ruta2);
                }
            }else{
                
                $dato = llenarArchivos($ruta2);
                

            }
     }else{
        if(!file_exists($ruta2)){
            mkdir($ruta2, 0777,true);
            if(file_exists($ruta2)){
    
                $dato = llenarArchivos($ruta2);
            }
        }else{
            
            $dato = llenarArchivos($ruta2);
        }
     }

    /*echo $idestudiante;
    echo $dato[0];
    echo $dato[1];
    echo $dato[2];
    echo $dato[3];
    echo $dato[4];
    echo $dato[5];
    echo $dato[6];*/

    $consulta  = "INSERT INTO documentos_es(pago_certificado_doces,certificado_medico_doces,matricula_doces,primera_cuota_doces,DUI_doces,NIT_doces,paes_doces,partida_nacimiento_doces,tituloba_doces,estado_doces,idestudiantefk)  VALUES('$pagocertificado','$dato[0]','$dato[1]','$dato[2]','$dato[3]','$dato[4]','$dato[5]','$dato[6]','$dato[7]','1','$idestudiante')";
    $result = $con->query($consulta);
        if ($result) {
            $msj = "Exito";
        } else {
            $msj = "Error";
        }
        return $msj;
        }
    }
  }

}else{
    throw new Exception("Error Processing Request", 1);   
}

  echo obtenerResultado();

?>