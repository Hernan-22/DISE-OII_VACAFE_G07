$(function (){	

	cargar_taba_productos();

	
	$('#formulario_registro_compra').validate({
	    rules: {	     
	    },
	    errorElement: 'span',
	    errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.form-group').append(error);
	    },
	    highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	    },
	    unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	    }
	});

/*	
	$(document).on("change","#imagen_persona",function(e){
		validar_archivo($(this));

	});
	

	$(document).on("click",".btn_editar",function(e){

		e.preventDefault(); 
		var id = $(this).attr("data-idusuario");		
		var email_empleado = $(this).attr("data-email_empleado");
		console.log("El id es: ",id);
		console.log("El id emil es: ",email_empleado);

		var datos = {"consultar_info":"si_coneste_id","id":id,"correo_emp":email_empleado}

		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'../Controladores/usuarios_controlador.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("EL consultar especifico",json);
	    	if (json[0]=="Exito") {	    		

	    		$('#llave_usuario').val(id);
	    		$('#ingreso_datos').val("si_actualizalo");
	    		$('#empleado_usuario').empty().html(json[3][0]);
	    		$('#nombre_usuario').val(json[2]['nva_nom_usuario']);
	    		$('#contrasena_usuario').val(json[2]['nva_contraseña_usuario']);
	    		$('#recontrasena_usuario').val(json[2]['nva_contraseña_usuario']);
	    		$('#correo_usuario').val(email_empleado);	    		
	    		$('#md_edit_usuario').modal('show');
	    		
	    	}
	    	 
	    }).fail(function(){

	    }).always(function(){

	    });


	});
*/
	$(document).on("submit","#formulario_registro_compra",function(e){
		e.preventDefault();
		var datos = $("#formulario_registro_compra").serialize();
		var Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 5000
    	});
    	
    	if ($("#proveedor_compra").val() == "Todos"){
 			Toast.fire({
		        icon: 'info',
		        title: 'Debe elegir un Proveedor'
		    });
			return;
 		} 		
		console.log("Imprimiendo datos: ",datos);
		//mostrar_mensaje("Almacenando información","Por favor no recargue la página");
		$.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/compra_indumosmedi_controlador.php',
            data : datos,
        }).done(function(json) {
        	console.log("EL GUARDAR",json);        	
	        if (json[0]=="Exito") {
	        		    	 	
				Toast.fire({
	            	icon: 'success',
	            	title: 'Compra registrada exitosamente!.'
       			}); 				
				
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
		            title: 'No ha productos ha seleccionado productos!'
		        });
	    	}
        	
        	
        });


	});
	$(document).on("click",".btn_seleecionado",function(e){ 
        e.preventDefault();
        var elemento = $(this);
        var data_idpro = elemento.attr('data-idproducto_seleccionado');
        console.log("Si se ejecuta",data_idpro);

        var datos = {"agregar_seleccionado":"si_este","idproducto":data_idpro};
        console.log("los datos enviados: ",datos);
        //return;
        $.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/compra_indumosmedi_controlador.php',
            data : datos,
        }).done(function(json) {
        
         if (json[0]=="Exito") {
         	$("#tablaDetalleDerivados").empty().html(json[1]);
			
			/*var total = numeral(json[4][0]);
			var subtotal =  numeral(json[4][1]);
			var iva = numeral(json[4][2]);*/

			var total = json[4][0];
			var subtotal = json[4][1];
			var iva =json[4][2];

			console.log("subtotal",subtotal);
			console.log("esto trae el json",json[4][1]);
 			
 			
 			console.log("subtotal_producto",subtotal_producto);

         	/*$('#subtotal_compra').val(subtotal.format('$0,0.00'));
         	$('#total_compra').val(total.format('$0,0.00'));
         	$('#iva_compra').val(iva.format('$0,0.00'));*/

         	$('#Subtotal_compra').val(subtotal);
         	$('#Total_compra').val(total);
         	$('#Iva_compra').val(iva);


         	$('.validcion_solo_numeros_totales').keypress(function(e) {
		        tecla = (document.all) ? e.keyCode : e.which;
		        if (tecla==8) return true;
		        else if (tecla==0 || tecla==9 || tecla==46)  return true;
		        // patron =/[0-9\s]/;// -> solo letras
		        patron =/[0-9\s]/;// -> solo numeros
		        te = String.fromCharCode(tecla);
		        return patron.test(te);
		  	});
         }   
         return false;
        }); 
    });


    $('.validcion_solo_numeros_fact').keypress(function(e) {

        tecla = (document.all) ? e.keyCode : e.which;
        if (tecla==8) return true;
        else if (tecla==0 || tecla==9)  return true;
        // patron =/[0-9\s]/;// -> solo letras
        patron =/[0-9\s]/;// -> solo numeros
        te = String.fromCharCode(tecla);
        return patron.test(te);
  	});
  	




  /*  $(document).on("click",".btn_listo",function(e){ 
        e.preventDefault();

        var datos = {"destruye_session":"si_destruyela"};
        console.log("los datos enviados: ",datos);
        //return;
        $.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/compra_indumosmedi_controlador.php',
            data : datos,
        }).done(function(json) {
         return false;
        }); 
    });*/

     
});


function cargar_taba_productos(){
	//mostrar_mensaje("Consultando datos");
	var datos = {"consultar_info":"si_consultala"}
	$.ajax({
        dataType: "json",
        method: "POST",
        url:'../Controladores/compra_indumosmedi_controlador.php',
        data : datos,
    }).done(function(json) {
    	console.log("EL consultar",json);
    	$("#tb_seleccion_productos").empty().html(json[1]);     	
    }).fail(function(){

    }).always(function(){
    	//Swal.close();
    });
}