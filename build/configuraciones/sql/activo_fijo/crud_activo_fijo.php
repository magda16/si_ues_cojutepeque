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
        $nserie="";
        $lote="";
        $categoria=$_REQUEST["categoria"];
        $tipo_bien=$_REQUEST["tipo_bien"];
        $codigo_af=$_REQUEST["codigo_af"];
        $numcorrelativo=$_REQUEST["numcorrelativo"];
        $descripcion=$_REQUEST["descripcion"];
        $observacion_act=$_REQUEST["observacion_act"];
        $calidad=$_REQUEST["calidad"];
        $marca=$_REQUEST["marca"];
        $modelo=$_REQUEST["modelo"];
        $nserie=$_REQUEST["nserie"];
        $cantidad_lote=$_REQUEST["cantidad_lote"];
        $fechaadq=$_REQUEST["fecha"];
        $financiamiento=$_REQUEST["financiamiento"];
        $valor=$_REQUEST["valor"];
        $valor_est=$_REQUEST["valor_est"];
        $proveedor=$_REQUEST["proveedor"];
        $observacion_af = "Registro";
      
        $ruta = "../../../../Activo_Fijo";
        $ruta2 = "../../../../Activo_Fijo/".$codigo_af;

       /* echo "ca ". $categoria."/n";
        echo "tipo ".$tipo_bien;
        echo "cod ".$codigo_af;
        
        echo "des ".$descripcion;
        echo "obs ".$observacion_act;
        echo "cali ".$calidad;
        echo "mar ".$marca;
        echo "mode ".$modelo;
        echo "nserie ".$nserie;
        echo "cant ".$cantidad_lote;
        echo "fecha ".$fechaadq;
        echo "finan ".$financiamiento;
        echo "valor ".$valor;
        echo "valor es ".$valor_est;
        echo "prove ".$proveedor;*/
        
     
     function llenarArchivos($ruta3){
        $dbcertificado_medico = null;

    
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

        $cmtype = $_FILES['doc_adq']['type'];
        $certificado_medico_guardada = $_FILES['doc_adq']['tmp_name'];
        $cmtipo=validarTipoDoc($cmtype);
        
        if(move_uploaded_file($certificado_medico_guardada, $ruta3."/activo_fijo".$cmtipo)){
            $dbcertificado_medico  = $ruta3."/activo_fijo".$cmtipo;
        }

        $datos = array(
            0 => $dbcertificado_medico,
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

    
  
    $fecha=$fechaadq;
    list($dia, $mes, $year)=explode("/", $fecha);
    $fecha=$year."-".$mes."-".$dia;
    if($nserie!=""){
        $numeroConCeros = str_pad($numcorrelativo, 5, "0", STR_PAD_LEFT);
        $codigo=$codigo_af."-".$numeroConCeros;
        $consulta  = "INSERT INTO inventario_af(categoria_inv,tipo_bien_inv,codigo,descripcion,observacion,calidad,marca,modelo,nserie,lote,fecha_adquisicion,financiamiento,valor_adq,valor_estimado,doc_adquisicion,estado_af,observacion_af,idproveedorfk) VALUES('$categoria','$tipo_bien','$codigo','$descripcion','$observacion_act','$calidad','$marca','$modelo','$nserie','$lote','$fecha','$financiamiento','$valor','$valor_est','$dato[0]','1','$observacion_af','$proveedor')";
        $nc=$numcorrelativo;
        $result = $con->query($consulta);
    }else{
        $lote="lote-".$categoria."-".$tipo_bien;
        for($i=0; $i<$cantidad_lote; $i++){
            $numeroConCeros = str_pad($numcorrelativo, 5, "0", STR_PAD_LEFT);
            $codigo=$codigo_af."-".$numeroConCeros;
            $consulta  = "INSERT INTO inventario_af(categoria_inv,tipo_bien_inv,codigo,descripcion,observacion,calidad,marca,modelo,nserie,lote,fecha_adquisicion,financiamiento,valor_adq,valor_estimado,doc_adquisicion,estado_af,observacion_af,idproveedorfk) VALUES('$categoria','$tipo_bien','$codigo','$descripcion','$observacion_act','$calidad','$marca','$modelo','$nserie','$lote','$fecha','$financiamiento','$valor','$valor_est','$dato[0]','1','$observacion_af','$proveedor')";
            $result = $con->query($consulta);
            $numcorrelativo++;
        }
        $nc=$numcorrelativo-1;
    }
    
        if ($result) {
            $consulta1  = "UPDATE af_subcategoria SET cantidad_s='$nc' WHERE idafsubc='$tipo_bien'";
            $result1 = $con->query($consulta1);
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