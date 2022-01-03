<?php 
	@session_start();
	require_once("../Conexion/Modelo.php");
	$modelo = new Modelo();
	

	if (isset($_POST['validar_campos']) && $_POST['validar_campos']=="si_por_campo") {

 
		/*$encontro = 0;
		$sql = "SELECT nva_nom_usuario FROM tb_usuario;";
		$result = $modelo->get_query($sql);
		if($result[0]=='1'){

			foreach ($result[2] as $row) {
				
				if ($row['nva_nom_usuario'] == $_POST['campo']) {
					$encontro = 1;
					return;
				}
			}

			if ($encontro == 1) {
				print json_encode(array("Error","existe",$result));
				exit();
			}else{
				print json_encode(array("Exito","no existe",$result));
				exit();
			}

		}else{
			print json_encode(array("Error","no se pueden obtener los usuarios",$result));
				exit();
		}*/
		$array_seleccionar = array();
		$array_seleccionar['table']="tb_usuario";
		$array_seleccionar['campo']="int_idusuario";

		if ($_POST['tipo']=="usuario_guardar") {
			$array_seleccionar['nva_nom_usuario']=$_POST['campo'];
		}else{}

		

		$resultado = $modelo->seleccionar_cualquiera($array_seleccionar);
		if ($resultado[0]==0 && $resultado[4]==0) {
			print json_encode(array("Exito",$resultado,$array_seleccionar));
			exit();
		}else{
			print json_encode(array("Error",$resultado,$array_seleccionar));
			exit();
		}


	}else if (isset($_GET['subir_imagen']) && $_GET['subir_imagen']=="subir_imagen_ajax") {
		$trozos = explode(".", $_FILES['file-0']['name']);
		$extension = end($trozos);
		$name = "user_".date("Yidisus")."_". $_GET['id'] . "." . $extension;
		$file_path = "../img/usuarios/".$name;
		try {

			$temporal = $_FILES['file-0']['tmp_name'];
			$nombre = $_FILES['file-0']['name'];
			$mimeType = $_FILES['file-0']['type'];

			if ($extension == "png") {
				//abre la foto original
				$original = imagecreatefrompng($temporal);				
			}else if ($extension == "jpg" || $extension == "jpeg"){
				//abre la foto original
				$original = imagecreatefromjpeg($temporal);				
			}else{
				print json_encode(array("Error","extension"));
				exit();
			}
			//dimensiones de la foto original
			$ancho_original = imagesx($original);
			$alto_original = imagesy($original);
			

			//crear un lienxo vacio(foto destino 128x128)
			$copia = imagecreatetruecolor(128,128);

			imagecopyresampled($copia, $original, 0,0,0,0, 128, 128, $ancho_original, $alto_original);

			if ($extension == "png") {
				//delvuelve la foto redimencionada
				imagepng($copia, $file_path);			
			}else{
				//delvuelve la foto redimencionada
				imagejpeg($copia, $file_path);				
			}


			$array_update = array(
			"table" => "tb_usuario",
			"int_idusuario" => $_GET['id'],
			"nva_fotografia" => $file_path, //campo en la tabla

			);
			$resultado = $modelo->actualizar_generica($array_update);
			if ($resultado[0] == '1' ) {

				$sql = "SELECT
						* 
					FROM
						tb_usuario 
					WHERE
						int_idusuario = '$_GET[id]';";
				$resultado_foto = $modelo->get_query($sql);
				if($resultado_foto[0]=='1' && $resultado_foto[4]>0){

					//Verifico que el usuario editado sea el correcto
					if ($_GET['id']  == $_SESSION['idusuario']) {
						//vuelvo a asignarla foto del usuario para mostrarla
						$_SESSION['foto']=$resultado_foto[2][0]['nva_fotografia'];
						$nueva_foto = $_SESSION['foto'];					
					}	
				}else{
					print json_encode(array("Error","no se pudo obtener la foto",$resultado_foto));
					exit();
				}

			} else {
				print json_encode(array("Error", $resultado));
				exit();
			}
			print json_encode(array("Exito", "foto actualizada", $nueva_foto, $resultado));
			exit();			 
		} catch (Exception $e) {
			print json_encode("Error",$e);
			exit();
		}
		

	}else if (isset($_POST['ingreso_datos']) && $_POST['ingreso_datos']=="si_actualizar") {

		$array_update = array(
            "table" => "tb_usuario",
            "int_idusuario"=>$_POST['llave_usuario_edit'],
            "nva_nom_usuario" => $_POST['nombre_usuario_edit'],
            "int_idempleado" => $_POST['empleado_usuario_edit']            
        );
		$resultado = $modelo->actualizar_generica($array_update);

		if($resultado[0]=='1'){

			$sql = "SELECT
						* 
					FROM
						tb_usuario 
					WHERE
						int_idusuario = '$_POST[llave_usuario_edit]';";


			$resultado1 = $modelo->get_query($sql);
			if($resultado1[0]=='1' && $resultado1[4]>0){

				//Verifico que el usuario editado sea el correcto
				if ($_POST['llave_usuario_edit']  == $_SESSION['idusuario']) {

					//vuelvo a asignar el nombre de usuario para mandarlo en session
					$_SESSION['usuario']=$resultado1[2][0]['nva_nom_usuario'];

					//esto es para mostrarlo en la vista
					$usuario_Actual = $_SESSION['usuario'];
				}

				//si no entra en la condición mantiene el usuario
				$usuario_Actual = $_SESSION['usuario'];
				
				
			}else{
				print json_encode(array("Error","no se pudo obtener el usuario",$_POST,$resultado1));
				exit();
			}
			$array_update = array(
            "table" => "tb_empleado",
            "int_idempleado" => $_POST['empleado_usuario_edit'],
            "nva_email_empleado"=>$_POST['correo_usuario_edit']           
	        );
			$resultado_Empleado = $modelo->actualizar_generica($array_update);

        	print json_encode(array("Exito",$_POST['llave_usuario_edit'],$_POST,$resultado,$resultado_Empleado,$usuario_Actual));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$resultado));
			exit();
        }


	}else if (isset($_POST['mod_contrasena']) && $_POST['mod_contrasena']=="si_mod_contrasena") {

		$array_update = array(
            "table" => "tb_usuario",
            "int_idusuario"=>$_POST['id_usuario'],
            "nva_contraseña_usuario" => $modelo->encriptarlas_contrasenas($_POST['contrasena_usuario'])
        );
		$resultado_contrasena = $modelo->actualizar_generica($array_update);

		if($resultado_contrasena[0]=='1' && $resultado_contrasena[4]>0){

        	print json_encode(array("Exito",$_POST,$resultado_contrasena));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$resultado_contrasena));
			exit();
        }


	}else if (isset($_POST['consultar_info']) && $_POST['consultar_info']=="si_coneste_id") {

		$array_select = array(
			"table"=>"tb_empleado",
			"int_idempleado"=>"nva_nom_empleado"
		);
		$where = "WHERE nva_email_empleado='".$_POST['correo_emp']."'";
		$result_select = $modelo->crear_select($array_select,$where);
		
		$resultado = $modelo->get_todos("tb_usuario","WHERE int_idusuario = '".$_POST['id']."'");
	
		
		if($resultado[0]=='1'){

			print json_encode(array("Exito",$_POST,$resultado[2][0],$result_select));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$resultado));
			exit();
        }


	}else if (isset($_POST['consultar_pass']) && $_POST['consultar_pass']=="si_coneste_id") {

		$resultado = $modelo->get_todos("tb_usuario","WHERE int_idusuario = '".$_POST['id']."'");	
		
		if($resultado[0]=='1'){

			print json_encode(array("Exito",$_POST,$resultado[2][0]));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$resultado));
			exit();
        }
	
	}else if (isset($_POST['almacenar_datos']) && $_POST['almacenar_datos']=="datonuevo") {		
		$id_insertar = $modelo->retonrar_id_insertar("tb_usuario");		
        $array_insertar = array(
            "table" => "tb_usuario",
            "int_idusuario"=>$id_insertar,
            "nva_nom_usuario" => $_POST['nombre_usuario'],
            "nva_contraseña_usuario" => $modelo->encriptarlas_contrasenas($_POST['contrasena_usuario']),
            "int_idempleado" => $_POST['empleado_usuario']            
        );
        $result = $modelo->insertar_generica($array_insertar);
        if($result[0]=='1'){

        	$array_update = array(
            "table" => "tb_empleado",
            "int_idempleado" => $_POST['empleado_usuario'],
            "nva_email_empleado"=>$_POST['correo_usuario']           
        );
		$resultado_nuevoU = $modelo->actualizar_generica($array_update);
        	
        	print json_encode(array("Exito",$id_insertar,$_POST,$result,$resultado_nuevoU));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$result,$resultado_nuevoU));
			exit();
        }
    
		 
	}else{
		$array_select = array(
			"table"=>"tb_empleado",
			"int_idempleado"=>"nva_nom_empleado"
		);
		$where = "WHERE int_idcargo = 202109351";
		$result_select_emp_save = $modelo->crear_select($array_select,$where);

		$htmltr = $html="";
		$cuantos = 0;
		$sql = "SELECT
					int_idusuario,
					nva_nom_usuario,
					nva_nom_empleado,					 
					nva_email_empleado,
					nva_fotografia 
				FROM
					tb_usuario
					INNER JOIN
					tb_empleado
					ON 
						tb_usuario.int_idempleado = tb_empleado.int_idempleado;";
		$result = $modelo->get_query($sql);
		if($result[0]=='1'){
			
			foreach ($result[2] as $row) {	
				 $htmltr.='<tr>
				  				<td class="text-center"><img class="profile-user-img img-fluid img-circle" alt="User profile picture" src="'.$row['nva_fotografia'].'">
	                             </td>
				 				<td class="text-center">'.$row['nva_nom_usuario'].'</td>
	                            <td class="text-center">'.$row['nva_nom_empleado'].'</td>
	                            <td class="text-center">'.$row['nva_email_empleado'].'</td>
	                            <td class="text-center project-actions">
			                        <button class="btn btn-info btn-sm btn_editar"
			                        	data-idusuario='.$row['int_idusuario'].' data-email_empleado='.$row['nva_email_empleado'].'>
			                            <i class="fas fa-pencil-alt"></i>
			                        </button>
			                        <button class="btn btn-info btn-sm btn_editar_pass"
			                        	data-idusuario='.$row['int_idusuario'].'>
			                            <i class="fas fa-key"></i>
			                        </button>
			                    </td>
	                        </tr>';	
			}
			$html.='<table id="example1" class="table table-striped projects" width="100%">
                    <thead>
                        <tr>
                        	<th class="text-center">Fotografía</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Empleado</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
            $html.=$htmltr;
			$html.='</tbody>
                    	</table>';


        	print json_encode(array("Exito",$html,$cuantos,$_POST,$result,$result_select_emp_save));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$result));
			exit();
        }
	}

	

?>