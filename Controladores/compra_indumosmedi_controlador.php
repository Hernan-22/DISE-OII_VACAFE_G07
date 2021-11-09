<?php 
	session_start();
	require_once("../Conexion/Modelo.php");
	$modelo = new Modelo();	
	$agregar_pro_seleccionado = [];
	if (isset($_POST['agregar_seleccionado']) && $_POST['agregar_seleccionado']=="si_este") {

		//me trae el producto elegido
		$sql ="SELECT int_idproducto, nva_nom_producto, dou_costo_producto, int_existencia FROM tb_producto WHERE int_idproducto = '$_POST[idproducto]'";
		$result = $modelo->get_query($sql);

		$encontro = false;     
		$numero = 0;

			if($result[0]=='1'){

				if (isset($_SESSION['compra'])) {

					$agregar_pro_seleccionado = $_SESSION['compra'];
					for ($i=0; $i < count($agregar_pro_seleccionado) ; $i++) { 
						if ($agregar_pro_seleccionado[$i]['id'] == $_POST['idproducto']) {
							$encontro = true;
							// guardamos la posición del producto
							$numero = $i;
							
						}
					}

					if ($encontro) {
					// si el producto ya estaba en la lista, incrementamos la cantidad del mismo
						$agregar_pro_seleccionado[$numero]['cantidad']++;
						$_SESSION['compra'] = $agregar_pro_seleccionado;
					}else{
						// si no estaba, lo ponemos en la lista
						foreach($result[2] as $row){							
							$nombre_pro_selecciondo = $row['nva_nom_producto'];
							$costo_pro_selecciondo = $row['dou_costo_producto'];
							$cantidad_pro_selecciondo = 1;
						}
						// ponemos esas variables como atributos de un objeto de tipo producto
		            	// como es la primera vez que entra el producto al carrito el valor de cantidad por defecto es uno 
						$nuevoproducto = array('id'=>$_POST['idproducto'],
		            	               'nombre'=>$nombre_pro_selecciondo,
		            	               'costo'=>$costo_pro_selecciondo,
		            	               'cantidad'=>$cantidad_pro_selecciondo);
						array_push($agregar_pro_seleccionado, $nuevoproducto);

						$_SESSION['compra'] = $agregar_pro_seleccionado;
					}
					
				}else{		
					//asigno cada dato obtenido a una variable
				

					foreach($result[2] as $row){						
						$nombre_pro_seleccionado = $row['nva_nom_producto'];
						$costo_pro_seleccionado = $row['dou_costo_producto'];
						$cantidad_pro_selecciondo = 1;
					}
					//guardo estos datos del producto en mi array que va a la lista
					$agregar_pro_seleccionado[] = array('id'=>$_POST['idproducto'],
				            	               'nombre'=>$nombre_pro_seleccionado,
				            	               'costo'=>$costo_pro_seleccionado,
				            	               'cantidad'=>$cantidad_pro_selecciondo); 
					$_SESSION['compra'] = $agregar_pro_seleccionado;
				}
				// recorremos el arreglo buscando si el producto camprado ya estaba en la lista con anterioridad
				
				
			
				 	$agregar_pro_seleccionado =	$_SESSION['compra'];
					$subtotal_todos = 0;
					$total_todos = 0;
					$iva_total = 0;
					$iva_producto = 0;
					$htmltr = $html="";
					foreach ($agregar_pro_seleccionado as $row) {
							
							$subtotal_producto = $row['cantidad'] * $row['costo'];
							$subtotal_todos = $subtotal_todos + $subtotal_producto;

							 $htmltr.='<tr>
				                            <td>'.$row['nombre'].'</td>

				                            <td class="text-center "><input type="text" autocomplete="off" class="form-control validcion_solo_numeros_totales" id="costo_producto"placeholder="$1.50"  value = '.$row['costo'].'>
				                            </td>
				                            <td class="text-center"><input type="number" autocomplete="off" class="form-control" placeholder="25"
				                             value = '.$row['cantidad'].' >
				                            </td>
				                            <td class="text-center "><input type="text" autocomplete="off" class="form-control validcion_solo_numeros_totales" placeholder="$37.50" id="subtotal_producto" value = '.$subtotal_producto.'>
				                            </td>
				                            <td class="text-center project-actions">
			                                    <a class="btn btn-info btn-sm" href="#" >
			                                        <i class="fa fa-sync-alt"></i>
			                                    </a>
			                                    <a class="btn btn-danger btn-sm" href="#" >
			                                        <i class="fas fa-trash"></i>
			                                    </a>                     
			                                </td>
				                        </tr>';	
						}


						if ($iva_total == 0) {
							$total_todos = $subtotal_todos;
						}else{
							$total_todos = $subtotal_todos + $iva_total;
						}
						$totales = array($total_todos,$subtotal_todos,$iva_total);
						
						$html.='<table class="table table-striped projects" width="100%">
			                    <thead>
			                        <tr>
			                            <th >Producto</th>
			                            <th class="text-center col-2" >Costo Unitario</th>
			                            <th class="text-center col-2" >Cantidad</th>
			                            <th class="text-center col-2" >Sub Total</th>
			                            <th class="text-center col-2">Acción</th>
			                        </tr>
			                    </thead>
			                    <tbody>';
			            $html.=$htmltr;
						$html.='</tbody>
			                    	</table>';

						
			        	print json_encode(array("Exito",$html,$_POST,$result,$totales,$_SESSION));

						exit();

						/**/
				}else{
					print json_encode(array("Error",$_POST,$agregar_pro_seleccionado,$result,$_SESSION));
					xit();
				}
		
			//Confirma si la consulta query se ejecutó correctamente
			

	}else if (isset($_GET['subir_imagen']) && $_GET['subir_imagen']=="subir_imagen_ajax") {

		$file_path = "archivos_usuario/".basename($_FILES['file-0']['name']);
		try {
			$mover = move_uploaded_file($_FILES['file-0']['tmp_name'], $file_path);
			 
				 print json_encode("Exito",$mover);
				 exit();
			 
		} catch (Exception $e) {
			print json_encode("Error",$e);
				exit();
		}
		

	}else if (isset($_GET['destruye_session']) && $_GET['destruye_session']=="si_destruyela") {

		$_SESSION['carrito'] = null;
		//$_SESSION['carrito'] = session_destroy();

	}else if (isset($_POST['almacenar_datos']) && $_POST['almacenar_datos']=="si_actualizar_usuario") {

		$array_update = array(
            "table" => "tb_usuario",
            "int_idusuario"=>$_POST['llave_usuario'] ,
            "nva_nom_usuario" => $_POST['nombre_usuario'],
            "nva_contraseña_usuario" => $modelo->encriptarlas_contrasenas($_POST['contrasena_usuario']),
            "int_idempleado" => $_POST['empleado_usuario']            
        );
		$resultado = $modelo->actualizar_generica($array_update);

		if($resultado[0]=='1' && $resultado[4]>0){
			$array_update = array(
            "table" => "tb_empleado",
            "int_idempleado" => $_POST['empleado_usuario'],
            "nva_email_empleado"=>$_POST['correo_usuario']           
	        );
			$resultado_Empleado = $modelo->actualizar_generica($array_update);

        	print json_encode(array("Exito",$_POST,$resultado,$resultado_Empleado));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$resultado,$resultado_Empleado));
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


	}else if (isset($_POST['almacenar_compra']) && $_POST['almacenar_compra']=="nueva_compra") {

		//VERIFICAMOS SI HAY PRODUCTOS SELECCIONADOS
		if(isset($_SESSION['compra'])){

				$id_insertar = $modelo->retonrar_id_insertar("tb_compra");
				$sitio_compra = "n/a";
				//INSERTO EL ENCBEZADO DE LA COMPRA
		        $array_insertar = array(
		            "table" => "tb_compra",
		            "int_idcompra"=>$id_insertar,
		            "txt_descrip_compra" => $_POST['descrip_compra'],
		            "dou_total_compra" => $_POST['Total_compra'],
		            "dou_iva_aplicado" => $_POST['Iva_compra'],
		            "dat_fecha_compra" => $_POST['fecha_compra'],
		            "dat_fecha_sistema" => $_POST['fecha_sistema_compra'],
		            "nva_tipo_documento" => $_POST['tipo_doc_compra'],
		            "nva_numero_documento" => $_POST['num_doc_compra'],
		            "txt_sitio_compra" => $sitio_compra,
		            "int_idproveedor" => $_POST['proveedor_compra'],
		            "int_idempleado" => $_POST['empleado_compra']
		        );
		        $result_compra = $modelo->insertar_generica($array_insertar);

		    if($result_compra[0]=='1'){//EVALUA SI LA COMPRA SE RALIAZÓ CORRECTAMENTE

		        	//CON ESTA CONSULTA OBTENGO EL ÚLTIMO REGISTRO INGRESADO EN EL ENCABEZADO DE LA COMPRA
			        $sql ="SELECT * FROM tb_compra ORDER BY int_idcompra DESC LIMIT 1;";
					$result_ultima_compra = $modelo->get_query($sql);

					if($result_ultima_compra[0]=='1'){

						
						$lista_productos = $_SESSION['compra'];//ENVIO LA LISTA DE LOS PRODUCTOS A U NUEVO ARREGLO
						foreach ($lista_productos as $row) {

							//OBTENGO LA EXISTENCIA ACTUAL DE CADA PRODUCTO A COMPRAR PARA SUMAR LA CANTIDAD A COMPRAR
			 				$sql ="SELECT * FROM tb_producto WHERE int_idproducto = '$row[id]'";
							$result_existencia = $modelo->get_query($sql);

							if($result_existencia[0]=='1'){
								//SUMO LA CANTIDAD A COMPRAR, CON LA EXISTENCIA ACTUAL DEL PRODUCTO
								$existencia_Actual = $result_existencia[2][0]['int_existencia'];
								$nueva_existencia = 0;
								$nueva_existencia = $existencia_Actual + $row['cantidad'];
							}else{
								//ENVIO EL ERROR OBTENIDO EN ESTA POSICIÓN
								$array = array("Error","existencias",$result_existencia);
								print json_encode($array);
								exit();
							}
							//INSERTANDO EN LA TABLA DETALLE-COMPRA
							$id_insertar = $modelo->retonrar_id_insertar("tb_detalle_compra");				
					        $array_insertar = array(
					            "table" => "tb_detalle_compra",
					            "int_iddcompra"=> $id_insertar,
					            "int_cantidad_compra" => $row['cantidad'],
					            "dou_costo_compra" => $row['costo'],
					            "int_idproducto" =>  $row['id'],
					            "int_idcompra" => $result_ultima_compra[2][0]['int_idcompra']
					        );
					        $result_det_compra = $modelo->insertar_generica($array_insertar);
					        //ACTUALIZO L EXISTANCIA DE LOS PRODUCTOS COMPRADOS 
				        	$array_update_stock_productos = array(
					            "table" => "tb_producto",
					            "int_idproducto" => $row['id'],
					            "int_existencia"=> $nueva_existencia           
				       		);
							$resultado_stock = $modelo->actualizar_generica($array_update_stock_productos);
						}
					}else{
						//ENVIO EL ERROR OBTENIDO EN ESTA POSICIÓN
						$array = array("Error","ultimacompra",$result_existencia);
						print json_encode($array);
						exit();
					}
					
		        	
		        	print json_encode(array("Exito",$_POST,$result_compra,$_SESSION));
					exit();
	        }else {
	        	//ENVIO EL ERROR OBTENIDO EN ESTA POSICIÓN
				$array = array("Error","en la insercion de la compra",$result_compra);
				print json_encode($array);
				exit();
	        }
    	}else {
	        //CUANDO NO HAY PRODUCTOS SELECCIONADOS
			$array = array("Error","no hay productos",$_SESSION);
			print json_encode($array);
			exit();
	    }
		 
	}else{		

		$htmltr = $html="";
		$cuantos = 0;
		$sql ="SELECT int_idproducto, nva_nom_producto, dou_costo_producto FROM tb_producto";
		$result = $modelo->get_query($sql);
		if($result[0]=='1'){
			
			foreach ($result[2] as $row) {	
				 $htmltr.='<tr>
	                            <td class="text-center">'.$row['nva_nom_producto'].'</td>
	                            <td class="text-center">'.$row['dou_costo_producto'].'</td>
	                            <td class="text-center project-actions">
			                        <button class="btn btn-info btn-sm btn_seleecionado"
			                        	data-idproducto_seleccionado='.$row['int_idproducto'].'>
			                            <i class="fas fa-check"></i>
			                        </button>
			                    </td>
	                        </tr>';	
			}
			$html.='<table class="table table-striped projects" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Costo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
            $html.=$htmltr;
			$html.='</tbody>
                    	</table>';


        	print json_encode(array("Exito",$html,$cuantos,$_POST,$result,$_SESSION));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$result,$_SESSION));
			exit();
        }
	}



?>