<?php if (isset($_SESSION['carrito'])) {
		  	// por si queremos acceder al carrito
		  	if (isset($_POST['idproducto'])) {
		  		// ponemos lo que hay en la sesión (que es un arreglo de objetos productos) en una variable
			    $arreglo = $_SESSION['carrito'];
			    $encontro = false;     
			    $numero = 0;

			    // recorremos el arreglo buscando si el producto camprado ya estaba en el carrito con anterioridad
			    for ($i=0; $i < count($arreglo) ; $i++) { 
			    	if ($arreglo[$i]['id'] == $_POST['idproducto']) {
			    		$encontro = true;
			    		// guardamos la posición del producto
			    		$numero = $i;
			    	}
			    }

		        // si el producto ya estaba en el carrito, incrementamos la cantidad del mismo
			    if ($encontro) {
			    	$arreglo[$numero]['cantidad']++;
			    	$_SESSION['carrito'] = $arreglo;
			    }
		        // si no estaba, lo ponemos en la sesión
		        else{
		        	$nombre = "";
		       	    $precio = 0;
		       	    $imagen = "";
		       	     $sql ="SELECT int_idproducto, nva_nom_producto, dou_costo_producto FROM tb_producto WHERE int_idproducto = '$_POST[idproducto]'";
					$result = $modelo->get_query($sql);
		            // guardamos algunos datos del producto en variables
		            if($result[0]=='1'){

			           foreach($result[2] as $row){
							$id_pro_selecciondo = $row['int_idproducto'];
							$nombre_pro_selecciondo = $row['nva_nom_producto'];
							$costo_pro_selecciondo = $row['dou_costo_producto'];
							$cantidad_pro_selecciondo = 1;
						} 
					// ponemos esas variables como atributos de un objeto de tipo producto
		            // como es la primera vez que entra el producto al carrito el valor de cantidad por defecto es uno 
						$nuevoproducto = array('id'=>$id_pro_selecciondo,
		            	               'nombre'=>$nombre_pro_selecciondo,
		            	               'costo'=>$costo_pro_selecciondo,
		            	               'cantidad'=>$cantidad_pro_selecciondo);
  						// metemos al objeto producto en el vector
						 array_push($arreglo, $nuevoproducto);
						$_SESSION['carrito'] = $arreglo;
						// ponemos el arreglo en la sesión 
						$datos = $_SESSION['carrito'];
						//Lo enviamos a la tabla
						tabladetalle($datos);
			        }		           
		        }
		  	}
		}else{
		       // si no existe, comprobamos que recibimos un producto
		    if (isset($_POST['idproducto'])) {
		       	    
		       	    $sql ="SELECT int_idproducto, nva_nom_producto, dou_costo_producto FROM tb_producto WHERE int_idproducto = '$_POST[idproducto]'";
					$result = $modelo->get_query($sql);

		            // guardamos algunos datos del resultado en variables
		            if($result[0]=='1'){

			           foreach($result[2] as $row){
							$id_pro_selecciondo = $row['int_idproducto'];
							$nombre_pro_selecciondo = $row['nva_nom_producto'];
							$costo_pro_selecciondo = $row['dou_costo_producto'];
							$cantidad_pro_selecciondo = 1;
						} 
						$arreglo[] = array('id'=>$_POST['idproducto'],
		            	               'nombre'=>$nombre_pro_selecciondo,
		            	               'costo'=>$costo_pro_selecciondo,
		            	               'cantidad'=>1); 
						$_SESSION['carrito'] = $arreglo;

						$datos = $_SESSION['carrito'];
						tabladetalle($datos);
			        }
		            // ponemos esas variables como atributos de un objeto de un array de objetos
		            // como es la primera vez que entra (por condición de condicional) el valor de cantidad por defecto es uno 
		           

		            // metemos al vector en la sesión
		           
		    }
		} ?>