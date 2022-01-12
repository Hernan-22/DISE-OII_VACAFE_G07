	var impuesto=18;
	var cont=0;
	var detalles=0;
	var subtotal_todos = 0;
	cargar_tabla_bovinos();
	$('#msg_decimales_b').css("display","none");
$(function (){	

	var fecha_hoy = new Date();
	$(".form_datetime").datetimepicker({
		format: 'd-mm-yyyy HH:ii:ss',
		endDate: fecha_hoy,
		todayBtn: true
	});
	
	$('#formulario_registro_venta_b').validate({
	    rules: {	     
	    },
	    message:{
			'fecha_venta_b':{
				required:'La Fecha no puede quedar vacía',				
			}			
		},
	    errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.input-group').append(error);
	    },
	    highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	    }
	});


	$(document).on("submit","#formulario_registro_venta_b",function(e){
		e.preventDefault();
		var datos = $("#formulario_registro_venta_b").serialize();
		var Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 5000
    	});
    	
    	if ($("#cliente_venta_b").val() == "Seleccione"){
 			Toast.fire({
		        icon: 'info',
		        title: 'Debe elegir un Clinte'
		    });
			return;
 		}
 		if ($("#subtotal_g_venta_b").val() < 0){

 			$("#msg_adver").empty().html('No se permite guardar totales menores que cero');
			
			$('#md_precio_actualizar').modal('show');

			return;
 		} 		
		console.log("Imprimiendo datos: ",datos);
		$.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/venta_bovinos_controlador.php',
            data : datos,
        }).done(function(json) {
        	console.log("EL GUARDAR",json);        	
	        if (json[0]=="Exito") {
	        	limpiar(json[5]);
				Toast.fire({
	            	icon: 'success',
	            	title: 'Venta registrada exitosamente!.'
       			});
       			var timer = setInterval(function(){
						var datos = {"ver_venta":"si_esta","idventa":json[4]};
				        console.log("los datos enviados: ",datos);
				        //return;
				        $.ajax({
				            dataType: "json",
				            method: "POST",
				            url:'../Controladores/registro_ventas_controlador.php',
				            data : datos,
				        }).done(function(json) {
				        
					        if (json[0]=="Exito") {

					        	if (json[4]['nva_tipo_documento'] == "Factura" || json[4]['nva_tipo_documento'] == "Crédito Fiscal") {


									var hora = formateartime(json[4]['dat_fecha_venta']);
						        	var fecha = formatearDate(json[4]['dat_fecha_venta']);
						        	var hora_sistema = formateartime(json[4]['dat_fecha_sistema_venta']);
						        	var fecha_sistema = formatearDate(json[4]['dat_fecha_sistema_venta']);

						        

						        	var num_fact = numerofactura(json[4]['int_num_doc']);

									var apellido_cliente_v = "";
					        		if (json[4]['nva_ape_cliente'] == null) {
						        		apellido_cliente_v = "";
						        	}else{
										apellido_cliente_v = json[4]['nva_ape_cliente'];
						        	}

					        		$('#tipo_doc_ver_fact').empty().html(json[4]['nva_tipo_documento']);
						    		$('#num_doc_ver_fact').empty().html('#'+num_fact);
						    		$('#fecha_fact').empty().html(fecha);
						    		$('#hora_fact').empty().html(fecha);

						    		$('#nom_cliente_fact').empty().html(json[4]['nva_nom_cliente']+' '+apellido_cliente_v);
						    		$('#dui_cliente_fact').empty().html(json[4]['nva_dui_cliente']);
						    		$('#direc_cliente_fact').empty().html(json[4]['txt_direc_cliente']);
						    		$('#tel_cliente_fact').empty().html(json[4]['nva_telefono_cliente']);
						    		
									$('#vendedor_fact').empty().html(json[4]['nva_nom_empleado']+' '+json[4]['nva_ape_empleado']);
						    		$('#fecha_fact_sis').empty().html(fecha_sistema);
						    		$('#hora_fact_sis').empty().html(hora_sistema);

						    		$('#iva_fact').val('$'+json[4]['dou_iva_venta']);
						    		$('#sub_total_fact').empty().html('$'+json[6]);
									$('#total_fact').empty().html('$'+json[4]['dou_total_venta']);					


						         	$("#tb_Detalle_Derivados_Ver").empty().html(json[2]);
						         	$('#md_ver_venta_b').modal('show');

					        	}else{
									var hora_sistema = formateartime(json[4]['dat_fecha_venta']);
						        	var fecha_sistema = formatearDate(json[4]['dat_fecha_sistema_venta']);
						        	var num_fact_ticket = numerofactura(json[4]['int_num_doc']);
									var apellido_cliente_v = "";
						        	if (json[4]['nva_ape_cliente'] == null) {
						        		apellido_cliente_v = "";
						        	}else{
										apellido_cliente_v = json[4]['nva_ape_cliente'];
						        	}

						    		$('#tipo_doc_t_v').empty().html(json[4]['nva_tipo_documento']);
						    		$('#ticket_v').empty().html(json[4]['int_num_doc']);

						    		$('#fecha_v').empty().html('Fecha: '+fecha_sistema);
						    		$('#hora_v').empty().html('Hora: '+hora_sistema);

						    		$('#cliente_v').empty().html('Cliente: '+json[4]['nva_nom_cliente']+' '+apellido_cliente_v);
						    		$('#ticket_v').empty().html('Ticket: #'+num_fact_ticket);
						    		
						    		
									$('#total_v').empty().html('Total: $'+json[4]['dou_total_venta']);
									$('#vendedor_v').empty().html('Vendedor: '+json[4]['nva_nom_empleado']+' '+json[4]['nva_ape_empleado']);


						         	$("#tb_Detalle_Derivados_Ver_t").empty().html(json[2]);
						         	$('#md_ticket_b').modal('show');
					        	
					        	}
					        }   
				         
				        });
					clearTimeout(timer);
				},3500);
				

	    	}else if (json[0]=="Error" && json[1]=="existencias"){
	    	 	Toast.fire({
		            icon: 'error',
		            title: 'No se pudo obtener la exitencia!'
		        });
	    	 	
	    	}else if (json[0]=="Error" && json[1]=="ultimacompra"){
	    	 	Toast.fire({
		            icon: 'error',
		            title: 'No se pudo obtener la ultima compra!'
		        });
	    	 	
	    	}else if (json[0]=="Error" && json[1]=="en la insercion de la compra"){
	    	 	Toast.fire({
		            icon: 'error',
		            title: 'No se pudo registrar la compra!'
		        });
	    	 	
	    	}else{
	    	 	Toast.fire({
		            icon: 'info',
		            title: 'No ha seleccionado productos!'
		        });
	    	}
        });
	});

	//selecionando y añadiento el producto a la lista del detalle


	$(document).on("click",".btn_bovino_seleccionado",function(e){ 
        e.preventDefault();
        var elemento = $(this);
        var data_idbovino = elemento.attr('data-idbovino_seleccionado');
		var data_nombrebovino = elemento.attr('data-nombre_bovino_selec');
		var data_precio_bovino = elemento.attr('data-precio_bovino_selec');
		var data_foto = elemento.attr('data-foto_bovino_selec');
		var data_raza = elemento.attr('data-raza_bovino_selec');
		
        console.log("viene este id: ",data_idbovino);
        console.log("producto: ",data_nombrebovino);
        console.log("precio: ",data_precio_bovino);
        console.log("imagen: ",data_foto);
        console.log("raza: ",data_raza);
        var Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 5000
    	});

       	var cantidad=1;
		var precio_bovino_venta=data_precio_bovino;
		
		if (data_idbovino) {
			var subtotal=cantidad*precio_bovino_venta;
			var fila='<tr class="filas" id="fila'+cont+'">'+	        
	       '<td><input type="hidden" class="form-control" id="idexpediente[]" name="idexpediente[]" value="'+data_idbovino+'">'+data_nombrebovino+'</td>'+

	       	'<td class="text-center"><div class="product-image-thumb active"><img alt="Product Image" style="width: 89px; height: 81px;" src="'+data_foto+'"></div></td>'+

	       	'<td class="text-center"><span id="raza_bovino" name="raza_bovino" >'+data_raza+'</span> </td>'+

	        '<td class="text-center" ><input type="number" autocomplete="off" min="0" step="00.01" class="form-control" name="precio_bovino_venta[]" id="precio_bovino_venta[]" value="'+precio_bovino_venta+'">'+

	        '<input type="hidden" autocomplete="off" class="form-control" name="cantidad[]" id="cantidad[]" value="'+cantidad+'">'+

	        '<span style="display:none" id="subtotal'+cont+'" name="subtotal" >'+subtotal+'</span>'+

	        '<input type="hidden" class="form-control" name="subtotal_guardar[]"  id="subtotal_guardar[]" value="'+subtotal+'">'+'</td>'+

	        '<td class="text-center project-actions"><button type="button" onclick="verificar_precios('+cont+')" class="btn btn-info"><i class="fa fa-sync-alt"></i></button>'+
	        
	        	'<button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')"><i class="fas fa-trash"></i></button>'+
	        '</td>'+
			'</tr>';
			cont++;
			subtotal_todos = subtotal_todos + subtotal;
			detalles++;
			$("#subtotal_v_venta_b").val("$"+subtotal_todos);
			$('#tablaDetalleVentaB').append(fila);
			
			console.log("vuelve tener est: ",data_idbovino);
			$('#msg_decimales_b').css("display","block");
		}else{
			Toast.fire({
		        icon: 'error',
		        title: 'El ID no está llegando!'
		    });
	    	 	
		}
		
    });

    

    $(document).on("click",".btn_limpiar_b",function(e){
    	var num_fact_nuevo = 0;
    	limpiar(num_fact_nuevo);
    });
     
});

	function verificar_precios(indice){
		var precio_v=document.getElementsByName("precio_bovino_venta[]");
		
		
		var fila = $("#fila"+indice);
		
		console.log("existencia que agarro del input: ",precio_v);		
		console.log("fila: ",fila);

		if (precio_v[indice].value < 0) {
			
			$("#msg_adver").empty().html('No se permite actualizar precios menores que cero');
			
			$('#md_precio_actualizar').modal('show');

		}else{
			modificarSubtotales();
		}	
	

	}


function modificarSubtotales(){
	var cant=document.getElementsByName("cantidad[]");
	var prec=document.getElementsByName("precio_bovino_venta[]");
	var sub=document.getElementsByName("subtotal");

	
	for (var i = 0; i < cant.length; i++) {
		var inpC=cant[i];
		var inpP=prec[i];
		var inpS=sub[i];


		inpS.value=inpC.value*inpP.value;
		document.getElementsByName("subtotal")[i].innerHTML=inpS.value;
	}

	calcularTotales();
}

function calcularTotales(){
	var sub = document.getElementsByName("subtotal");
	var subt  = 0.0;	
	var total=0.0;
	var iva = 0.0;

	for (var i = 0; i < sub.length; i++) {
		total += document.getElementsByName("subtotal")[i].value;
		subt = subt + document.getElementsByName("subtotal")[i].value;
	}

	if ($("#tipo_doc_venta_b").val() == "Crédito Fiscal"){

 			
		total = (parseFloat(subt) + parseFloat(subt*0.13)).toFixed(2);
		iva = total-subt;	

		$("#iva_v_venta_b").val("$"+iva.toFixed(2));
		$("#iva_g_venta_b").val(iva);

		$("#total_v_venta_b").val("$"+total);
		$("#total_g_venta_b").val(total);
	}else{
 		$("#total_v_venta_b").val("$"+total);
		$("#total_g_venta_b").val(total);
 	}
		$("#subtotal_v_venta_b").val("$"+subt.toFixed(2));
		$("#subtotal_g_venta_b").val(subt);
	
	
	evaluar();
}

function evaluar(){

	if (detalles>0) 
	{
		$("#btnGuardar").show();
	}
	else
	{
		$("#btnGuardar").hide();
		cont=0;
	}
}

function eliminarDetalle(indice){
	$("#fila"+indice).remove();
	calcularTotales();
	detalles=detalles-1;
	cont=cont-1

	if (cont >= 1 ) {
		$('#msg_decimales_b').css("display","block");
	}else{
		$('#msg_decimales_b').css("display","none");
	}

}

//funcion limpiar
function limpiar(num_fact_nuevo){
	if (num_fact_nuevo != 0) {
		var numfact = Number(num_fact_nuevo) + 1;
		$("#num_fact").empty().html(numerofactura(numfact.toString()));
	}
	var cont = 0;
	var detalles = 0;
	$("#formulario_registro_venta_b").trigger('reset');	
	$('#msg_decimales_b').css("display","none");
	$(".filas").remove();

}

function cargar_tabla_bovinos(){
	//mostrar_mensaje("Consultando datos");
	var datos = {"consultar_info":"si_consultala"}
	$.ajax({
        dataType: "json",
        method: "POST",
        url:'../Controladores/venta_bovinos_controlador.php',
        data : datos,
    }).done(function(json) {
    	console.log("EL consultar",json);
    	$("#tb_seleccion_bovinos").empty().html(json[1]);
    	$('#example1').DataTable();

    	var numfact = Number(json[6]) + 1;
		
		$("#num_fact").empty().html(numerofactura(numfact.toString()));
		$("#num_fact_guardar_b").val(numfact);

    	$("#cliente_venta_b").empty().html(json[5][0]);     	
    }).fail(function(){

    }).always(function(){
    	//Swal.close();
    });
}

function numerofactura(numero){
	//divido la feha de la hora
	var cifras = numero;
	var numero_factura = "";		
	if (cifras.length == 1) {
		return numero_factura = "00000"+""+numero;
	}else if (cifras.length == 2) {
		return numero_factura = "0000"+""+numero;
	}else if (cifras.length == 3) {
		return numero_factura = "000"+""+numero;
	}else if (cifras.length == 4){
		return numero_factura = "00"+""+numero;
	}else if (cifras.length == 5){
		return numero_factura = "0"+""+numero;
	}else{
		return numero;
	}

}

function formatearDate(date){
	//divido la feha de la hora
	var fecha_string = date;
	var separacion = fecha_string.split(' ');
	var fecha = separacion[0];
	var hora = separacion[1];
	var fecha_formateada = "";

	//Formteo la fecha
	var porciones_fecha = fecha.split('-');
	var fecha1 = porciones_fecha[2]+"-"+porciones_fecha[1]+"-"+porciones_fecha[0];

	//envio la fecha formateada
	fecha_formateada = fecha1;
	return fecha_formateada;

}
function formateartime(datetime){
	//divido la feha de la hora
	var fecha_string = datetime;
	var separacion = fecha_string.split(' ');
	var fecha = separacion[0];
	var hora = separacion[1];
	
	//envio la hora
	return hora;
}