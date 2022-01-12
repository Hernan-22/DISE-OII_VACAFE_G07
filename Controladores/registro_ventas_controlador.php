<?php 
	
	require_once("../Conexion/Modelo.php");
	$modelo = new Modelo();		
	if (isset($_POST['ver_venta']) && $_POST['ver_venta']=="si_esta") {
		
		$htmltr = $html="";
		$subtotal = 00.00;

		$sql = "SELECT
					*
				FROM
					tb_venta
					INNER JOIN
					tb_empleado
					ON 
						tb_venta.int_idempleado = tb_empleado.int_idempleado
					INNER JOIN
					tb_clientes
					ON 
						tb_venta.int_id_cliente = tb_clientes.int_idcliente WHERE int_idventa = '$_POST[idventa]'";
		$resultado_venta = $modelo->get_query($sql);

		//==========================================================================================================	
		$sql_det_derivados ="SELECT
								*
							FROM
								tb_detalle_venta
								INNER JOIN
								tb_producto
								ON 
									tb_detalle_venta.int_idproducto = tb_producto.int_idproducto
							WHERE int_idventa = '$_POST[idventa]'";

		$resultado_detv_derivados = $modelo->get_query($sql_det_derivados);

		//=============================================================================================================
		$sql_det_bovinos ="SELECT
								* 
							FROM
								tb_detalle_venta
								INNER JOIN tb_expediente ON tb_detalle_venta.int_idexpediente = tb_expediente.int_idexpediente
								INNER JOIN tb_raza ON tb_expediente.int_idraza = tb_raza.int_idraza 
							WHERE
								int_idventa = '$_POST[idventa]'";
		$resultado_detbovino = $modelo->get_query($sql_det_bovinos);
		
		//=============================================================================================================
		if($resultado_venta[0]=='1'){

			if (($resultado_detv_derivados[0]=='1' && $resultado_detv_derivados[4]>=1)) {
				
					foreach ($resultado_detv_derivados[2] as $row) {
					$subtotal = $subtotal + $row['dou_subtotal_item_vender'];
				 	$htmltr.='<tr> 
				 				<td>'.$row['int_cantidad_vender'].'</td>
				                <td class="text-center">'.$row['nva_nom_producto'].'</td>
				                <td class="text-center">'."$".''.$row['dou_precio_venta'].'</td>
				               
				                <td class="text-center ">'."$".''.$row['dou_subtotal_item_vender'].'</td>
				            </tr>';		
					}
					$html.='<table class="table table-sm" width="100%">
		                    <thead>
					            <tr>
					            	<th>Cantidad</th>
					                <th class="text-center">Producto</th>
					                <th class="text-center" >Precio U</th>					                
					                <th class="text-center" >Sub Total</th>
					            </tr>
					        </thead>
	                    <tbody>';
		            $html.=$htmltr;
					$html.='</tbody>
		                    	</table>';					
				$array = array("Exito","detalle",$html,$_POST,$resultado_venta[2][0],$resultado_detv_derivados,$subtotal,$resultado_detv_derivados[4]);
				print json_encode($array);
				exit();
					
			}else if ($resultado_detbovino[0]=='1' && $resultado_detbovino[4]>=1) {
				foreach ($resultado_detbovino[2] as $row) {
					$subtotal = $subtotal + $row['dou_subtotal_item_vender'];
					$htmltr.='<tr>
					          <td>'.$row['nva_nom_bovino'].'</td>
						           <td class="text-center ">'.$row['nva_nom_raza'].'</td>
						           <td class="text-center ">'."$".''.$row['dou_subtotal_item_vender'].'</td>
					           </tr>';		
				}
				$html.='<table class="table" width="100%">
			                <thead>
						        <tr>
						            <th >Bovino</th>
                                    <th class="text-center col-2" >Raza</th>
                                    <th class="text-center col-2" >Costo $</th>
						        </tr>
						    </thead>
		                  <tbody>';
			    	$html.=$htmltr;
					$html.='</tbody>
			            </table>';
			    $array = array("Exito","detalle",$html,$_POST,$resultado_venta[2][0],$resultado_detv_derivados,$subtotal);
				print json_encode($array);
				exit();
			}else{
				$array = array("Error","no se pudo mostrar la tabla",$resultado_detv_derivados,$resultado_detbovino,$resultado_detv_derivados[4],$resultado_detbovino[4]);
				print json_encode($array);
				exit();
			}

			$array = array("Exito","mostrado_encabezado",$html,$_POST,$resultado_venta[2][0],$resultado_detv_derivados,$subtotal);
			print json_encode($array);
			exit();

        }else {
        	$array = array("Error","no se mostro la compra",$_POST,$resultado_venta,$resultado_detv_derivados);
        	print json_encode($array);
			exit();
        }

	}else{		

		$htmltr = $html="";
		$cuantos = 0;
		$sql ="SELECT
					* 
				FROM
					tb_venta
					INNER JOIN tb_clientes ON tb_venta.int_id_cliente = tb_clientes.int_idcliente;";
					
		$result = $modelo->get_query($sql);

		if($result[0]=='1'){
			
			foreach ($result[2] as $row) {
			$fecha = datetimeformateado($row['dat_fecha_venta']);
			$numero_venta = numerofactura($row['int_num_doc']);
				 $htmltr.='<tr>
				 				<td class="text-center">'.$numero_venta.'</td>
	                            <td class="text-center">'.$fecha.'</td>
	                            <td class="text-center">'.$row['nva_nom_cliente'].' '.$row['nva_ape_cliente'].'</td>
	                            <td class="text-center">'."$".''.$row['dou_total_venta'].'</td>
	                            <td class="text-center project-actions">
			                        <button class="btn btn-info btn-sm btn_ver" data-idventa='.$row['int_idventa'].'>
			                            <i class="fas fa-eye"></i>
			                        </button>
			                    </td>
	                        </tr>';	
			}
			$html.='<table id="example1" class="table table-striped projects" width="100%">
                    <thead>
                        <tr>
                        	<th class="text-center">Venta No.</th>
                        	<th class="text-center">Fecha y Hora</th>
                            <th class="text-center">Cliente</th>
                            <th class="text-center">Total $</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody>';
            $html.=$htmltr;
			$html.='</tbody>
                    	</table>';


        	print json_encode(array("Exito",$html,$cuantos,$_POST,$result));
			exit();

        }else {
        	print json_encode(array("Error",$_POST,$result));
			exit();
        }
	
	}

	function datetimeformateado($fecha3){

			//divido la feha de la hora
			$separacion= explode(" ",$fecha3);
			$hora = $separacion[1];
			$fecha = $separacion[0];

			$pos = strpos($fecha, "/");
			if ($pos === false) $fecha = explode("-",$fecha);
			else $fecha = explode("/",$fecha);
			$dia1 = (strlen($fecha[0])==1) ? '0'.$fecha[0] : $fecha[0];

			//Concateno la fecha formteada con la hora y un espacio
			$fecha1 = $fecha[2].'-'.$fecha[1].'-'.$dia1.' '.$hora;
			return $fecha1;
	}

	function numerofactura($numero){
		//divido la feha de la hora
		$cifras = $numero;
		$numero_factura = "";


		if (strlen($cifras) == 1) {
			return $numero_factura = '00000'.$numero;

		}else if (strlen($cifras) == 2){
			return $numero_factura = '0000'.$numero;

		}else if (strlen($cifras) == 3){
			return $numero_factura = '000'.$numero;

		}else if (strlen($cifras) == 4){
			return $numero_factura = '00'.$numero;

		}else if (strlen($cifras) == 5){
			return $numero_factura = '0'.$numero;

		}else{
			return $numero;
		}

	}


?>