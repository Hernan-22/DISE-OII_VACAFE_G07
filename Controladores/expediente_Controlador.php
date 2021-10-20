<?php 
     require_once("../Conexion/Conexion.php");

$action = (isset($_REQUEST["action"])) ? $_REQUEST["action"] : "";

 //variables de Guardar
 $nombre_b = (isset($_REQUEST["nombre_b"])) ? $_REQUEST["nombre_b"] : "";
 if(isset($_REQUEST['estado_b']) =="activo"){
    $estado_b = "activo";    
}
if(isset($_REQUEST["estado_b"])=='inactivo'){
    $estado_b = "inactivo"; 
}
$profile_pic="vaca.png";
if(isset($_REQUEST['sexo_b']) =="masculino"){
    $sexo_b = "masculino";    
}if(isset($_REQUEST["sexo_b"])=='femenino'){
    $sexo_b = "femenino";  
}

 $cantidad_partob = (isset($_REQUEST["cantidad_parto"])) ? $_REQUEST["cantidad_parto"] : "";
 $descripcion_b = (isset($_REQUEST["descripcion_b"])) ? $_REQUEST["descripcion_b"] : "";
 $propietario = (isset($_REQUEST["propietario"])) ? $_REQUEST["propietario"] : "";
 $cmb_raza = (isset($_REQUEST["cmb_raza"])) ? $_REQUEST["cmb_raza"] : "";
 $profile_pic_b="carta3.png";
if(isset($_REQUEST['t_bovino']) =="novia"){
    $t_bovino_b = "novia";    
}
if(isset($_REQUEST["t_bovino"])=='vaca_lechera'){
    $t_bovino_b = "vaca_lechera";  
}
if(isset($_REQUEST["t_bovino"])=='ternero'){
        $t_bovino_b = "ternero";  
}

 $fecha_ul_parto = (isset($_REQUEST["fecha_ul_parto"])) ? $_REQUEST["fecha_ul_parto"] : "";

 $formato_fecha = new DateTime($fecha_ul_parto);
 $fecha_ul_parto_nuevaf = date_format($fecha_ul_parto, "d/m/Y");
$instancia = new Conexion();

    if (isset($_POST['almacenar_datos']) && $_POST['almacenar_datos']=="datonuevo") {
        if($nombre_b!="" &&  $cantidad_partob !="" && $descripcion_b!="" ){
            try {
                $conectar = $instancia->obtener_conexion();

                $sql = "INSERT INTO tb_expediente(
                    int_idexpediente,nva_nom_bovino,nva_estado_bovino,nva_carta_venta,nva_sexo_bovino,int_cant_parto,txt_descrip_expediente,int_id_propietario,int_idraza,nva_foto_bovino,nva_tipo_bovino,dat_fecha_ult_parto) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

                $statement = $conectar->prepare($sql);                       
                $statement->execute(array(null,$nombre_b,$estado_b,$profile_pic,$sexo_b,$cantidad_partob,$descripcion_b,$propietario,$cmb_raza,$profile_pic_b,$t_bovino_b,$fecha_ul_parto));
                $afectados = $statement->rowCount();
                print json_encode(array("exito",$afectados));
            } catch (Exception $e) {
                print json_encode(array("error"));
            } 
        } else{}                
    }else{             
        print json_encode(array($html,$_POST,$datos));
    }
    
 ?>