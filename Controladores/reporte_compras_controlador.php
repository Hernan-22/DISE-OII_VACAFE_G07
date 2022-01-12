<?php 
	session_start();
	require_once("../Conexion/Modelo.php");
	$modelo = new Modelo();	
	$agregar_pro_seleccionado = [];
	$tipo_doc = "";

	
	if (isset($_POST['almacenar_venta']) && $_POST['almacenar_venta']=="nueva_venta") {

		
				//VERIFICAMOS SI HAY PRODUCTOS SELECCIONADOS
		
		if(isset($_POST['idproducto_v']) && isset($_POST['precio_item_venta']) && isset($_POST['cantidad'])){
				$idproducto_v = $_POST['idproducto_v'];
				$precio_item = $_POST['precio_item_venta'];
				$cantidad = $_POST['cantidad'];

				//INSERTO EL ENCBEZADO DE LA VENTA
				$id_insertar = $modelo->retonrar_id_insertar("tb_venta");
				$sitio_compra = "n/a";				
		        $array_insertar = array(
		            "table" => "tb_venta",
		            "int_idventa"=>$id_insertar,
		            "dou_total_venta" => $_POST['total_g_venta_d'],
		            "dou_iva_venta" => $_POST['iva_g_venta_d'],
		            "dat_fecha_venta" => $modelo->formatear_fecha_hora($_POST['fecha_venta_d']),		            
		            "dat_fecha_sistema_venta" => date("Y-m-d G:i:s"),
		            "nva_tipo_documento" => $_POST['tipo_doc_venta'],
		            "int_idempleado" => $_POST['empleado_venta'],
		            "int_id_cliente" => $_POST['cliente_venta_d'],
		            "int_num_doc" => $_POST['num_fact_guardar']
		        );
		        $result_venta = $modelo->insertar_generica($array_insertar);
				$tipo_doc = $_POST['tipo_doc_venta'];
				$numfact = $_POST['num_fact_guardar'];
				$id_venta_previo = $id_insertar;
		    if($result_venta[0]=='1'){//EVALUA SI LA VENTA SE RALIAZÓ CORRECTAMENTE

										
		        	//CON ESTA CONSULTA OBTENGO EL ÚLTIMO REGISTRO INGRESADO EN EL ENCABEZADO DE LA VEENTA
			        $sql ="SELECT * FROM tb_venta ORDER BY int_idventa DESC LIMIT 1;";
					$result_ultima_venta = $modelo->get_query($sql);

					$num_elementos=0;

					if($result_ultima_venta[0]=='1'){						
						
						while ($num_elementos < count($idproducto_v)) {
							//OBTENGO LA EXISTENCIA ACTUAL DE CADA PRODUCTO A COMPRAR PARA RESTAR LA CANTIDAD A VENDER
						 	$sql ="SELECT * FROM tb_producto WHERE int_idproducto = '$idproducto_v[$num_elementos]'";
							$result_existencia = $modelo->get_query($sql);

							if($result_existencia[0]=='1' && $result_existencia[4]>0){
								//SUMO LA CANTIDAD A COMPRAR, CON LA EXISTENCIA ACTUAL DEL PRODUCTO
								$existencia_Actual = $result_existencia[2][0]['int_existencia'];
								$nueva_existencia = 0;
								$nueva_existencia = $existencia_Actual - $cantidad[$num_elementos];
							}else{
								//ENVIO EL ERROR OBTENIDO EN ESTA POSICIÓN
								$array = array("Error","existencias",$result_existencia,$idproducto_v);
								print json_encode($array);
								exit();
							}

							//INSERTANDO EN LA TABLA DETALLE-VENTA
							$id_insertar = $modelo->retonrar_id_insertar("tb_detalle_venta");				
					        $array_insertar = array(
					            "table" => "tb_detalle_venta",
					            "int_iddventa"=> $id_insertar,
					            "int_cantidad_vender" => $cantidad[$num_elementos],
					            "dou_precio_venta" => $precio_item[$num_elementos],
					            "dou_subtotal_item_vender" => $cantidad[$num_elementos] * $precio_item[$num_elementos],
					            "int_idproducto" =>  $idproducto_v[$num_elementos],
					            "int_idventa" => $result_ultima_venta[2][0]['int_idventa']
					        );
					        $result_det_compra = $modelo->insertar_generica($array_insertar);
					        //ACTUALIZO L EXISTANCIA DE LOS PRODUCTOS COMPRADOS 
				        	$array_update_stock_productos = array(
					            "table" => "tb_producto",
					            "int_idproducto" => $idproducto_v[$num_elementos],
					            "int_existencia"=> $nueva_existencia           
				       		);
							$resultado_stock = $modelo->actualizar_generica($array_update_stock_productos);							
						 	$num_elementos=$num_elementos+1;
						}
					}else{
						//ENVIO EL ERROR OBTENIDO EN ESTA POSICIÓN
						$array = array("Error","ultimaventa",$result_existencia);
						print json_encode($array);
						exit(); 
					}
					
		        	
		        	print json_encode(array("Exito",$_POST,$result_venta,$tipo_doc,$id_venta_previo,$numfact));
					exit();
	        }else {
	        	//ENVIO EL ERROR OBTENIDO EN ESTA POSICIÓN
				$array = array("Error","en la insercion de la venta",$result_venta);
				print json_encode($array);
				exit();
	        }
    	}else {
	        //CUANDO NO HAY PRODUCTOS SELECCIONADOS
			$array = array("Error","no hay productos",$_POST);
			print json_encode($array);
			exit();
	    }		 
	}else{

		$array_select = array(
			"table"=>"tb_proveedor",
			"int_idproveedor"=>"nva_nom_proveedor"

		);
		 
		$result_select = $modelo->crear_select($array_select);	
		if (!$result_select[3]) {
			print json_encode(array("Exito",$result_select));
			exit();
		}else {
        	print json_encode(array("Error",$result_select));
			exit();
        }
	}



?>