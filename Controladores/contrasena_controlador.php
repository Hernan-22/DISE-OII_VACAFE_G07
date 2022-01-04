<?php 
	
	require_once("../Conexion/Modelo.php");
	$modelo = new Modelo();
	if (isset($_POST['enviar_contra']) && $_POST['enviar_contra']=="si_enviala") {
        
       	$nueva_contra = $modelo->generarpass();

       	//cargo los datos del empleado ADMINISTRADOR DEL SISTEMA	
       	$sql = "SELECT * FROM tb_usuario 
       				INNER JOIN
					tb_empleado
					ON 
						tb_usuario.int_idempleado = tb_empleado.int_idempleado WHERE nva_email_empleado = '$_POST[email_enviar]'";
		$result = $modelo->get_query($sql);

		if ($result[0]=='1' && $result[4]>0) {
			$idusuario = $result[2][0]['int_idusuario'];
			$array_update = array(
	            "table" => "tb_usuario",
	            "int_idusuario" => $result[2][0]['int_idusuario'],
	            "nva_contraseña_usuario" => $modelo->encriptarlas_contrasenas($nueva_contra)
	        );
	        $resultado = $modelo->actualizar_generica($array_update);
	        if($resultado[0]=='1' && $resultado[4]>0){

	            $mensaje = $modelo->plantilla($nueva_contra);
	            $titulo="Recuperación de contraseña";
	            $para = $_POST['email_enviar'];

	            $resultado_envio = $modelo->envio_correo($para,$titulo,$mensaje);

	            if ($resultado_envio[0]==1) {
	                print json_encode(array("Exito",$_POST,$resultado_envio,$nueva_contra,$idusuario));
	                exit();
	            }else{
	                print json_encode(array("Error","al enviar",$_POST,$resultado_envio,$nueva_contra,$idusuario));
	                exit();
	            }

        	}else {
	            print json_encode(array("Error", "al actualizar", $_POST,$resultado));
	            exit();
        	}
		}else{        

        	print json_encode("Error","el mail no se obtuvo",$result,$_POST);
		}


    }else if (isset($_POST['verificar_correo']) && $_POST['verificar_correo']=="si_verificar") {

		
		$idusuario = $_POST['idusuario'];		

			$sql = "SELECT
						*
					FROM
						tb_usuario					
					WHERE
						int_idusuario = $idusuario";

			$result = $modelo->get_query($sql);

			
			if($result[0]=='1' && $result[4]>0){

				$verificacion = $modelo->desencrilas_contrasena($_POST['codigo_enviado'],$resultado[2][0]['nva_contraseña_usuario']);
				if ($verificacion[0]===1) {
					
					$array = array("Exito","correcto",$result,$idusuario);
					print json_encode($array);
				}else{
					$array = array("Error","incorrecto",$result);
					print json_encode($array);
				}
	        }else {
	        	print json_encode(array("Error", "no se encontro",$_POST,$result));
				exit();
	        }


	}else if (isset($_POST['actualizar_password']) && $_POST['actualizar_password']=="si_actualizar") {

		$array_update = array(
            "table" => "tb_usuario",
            "int_idusuario" => $_POST['idusuario2'],
            "nva_contraseña_usuario"=>$modelo->encriptarlas_contrasenas($_POST['repit_new_password']),
             
        );
		$resultado = $modelo->actualizar_generica($array_update);

		if($resultado[0]=='1' && $resultado[4]>0){
        	print json_encode(array("Exito",$_POST,$resultado));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$resultado));
			exit();
        }
		
	}

?>