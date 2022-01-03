<?php 
	@session_start();
	require_once("../Conexion/Modelo.php");
	$modelo = new Modelo();		
	if (isset($_POST['consultar_info_emp']) && $_POST['consultar_info_emp']=="si_esta") {
		
		
		$sql = "SELECT
					* 
				FROM
					tb_empleado 
				WHERE
					int_idempleado = '$_SESSION[idempleado]'";
		$resultado_empleado = $modelo->get_query($sql);			
		//======================================================================================================
		$sql2 = "SELECT
					*
				FROM
					tb_usuario
				WHERE
					int_idempleado = '$_SESSION[idempleado]'";
		$resultado_usuario = $modelo->get_query($sql2);			
		
		if($resultado_empleado[0]=='1' || $resultado_usuario[0]=='1'){
			
			$fecha_actual = date("Y-m-d");
			$separado = explode("-", $fecha_actual);

			$fecha_naci = $resultado_empleado[2][0]['dat_fechanaci_empleado'];
			$separado2 = explode("-", $fecha_naci);

			$anio_actual = $separado[0];
			$anio_naci = $separado2[0];

			$edad = $anio_actual - $anio_naci;


			$array = array("Exito",$_POST,$resultado_empleado[2][0],$resultado_usuario[2][0],$edad);
			print json_encode($array);
			exit();

        }else {
        	$array = array("Error",$_POST,$resultado_empleado,$resultado_usuario);
        	print json_encode($array);
			exit();
        }

	}else{		

		$sql = "SELECT
					*
				FROM
					tb_usuario
				WHERE
					int_idempleado = '$_SESSION[idempleado]'";
		$resultado_usuario = $modelo->get_query($sql);			
		//======================================================================================================			
		
		if($resultado_usuario[0]=='1'){
			

			$array = array("Exito",$_POST,$resultado_usuario[2][0]);
			print json_encode($array);
			exit();

        }else {
        	$array = array("Error",$_POST,$resultado_usuario);
        	print json_encode($array);
			exit();
        }
	}

	


?>