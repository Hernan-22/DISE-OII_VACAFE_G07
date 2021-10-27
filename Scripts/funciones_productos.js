$(function (){
	console.log("funcionando");
	cargar_datos();
	// $(".select2").select2();
	$(document).on("blur",".validar_campos_unicos",function(e){
		e.preventDefault();
		if ($(this).val()=="") {
			return;
		}
		console.log("validar_campo",$(this).data('quien_es'));
		mostrar_mensaje("Espere","Validando "+$(this).data('quien_es'));
		var datos = {"validar_campos":"si_por_campo","campo":$(this).val(),"tipo":$(this).data('quien_es')};

		console.log("datos: ",datos);
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_usuarios.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("retorno de validacion",json);
	    	if (json[0]=="Exito") {
	    		 
	    	}
	    	console.log("El envio: ",json);
	    }).always(function(){
	    	Swal.close();
	    });

	});
	$(document).on("change","#imagen_persona",function(e){
		validar_archivo($(this));

	});
	$(document).on("change","#depto",function(e){
		e.preventDefault();
		console.log("el depto es: ",$("#depto").val());

		mostrar_mensaje("Espere","Consultando municipios");
		e.preventDefault();
		var datos = {"consultar_municipios":"si_pordeptos","depto":$("#depto").val()}
		console.log("datos: ",datos);
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_usuarios.php',
	        data : datos,
	    }).done(function(json) {
	    	if (json[0]=="Exito") {
	    		$("#municipio").empty().html(json[1][0]);
	    	}
	    	console.log("El envio: ",json);
	    }).always(function(){
	    	Swal.close();
	    });

	});

	$(document).on("click",".btn_recuperar_pass",function(e){
		mostrar_cargando("Espere","Enviando contraseña");
		e.preventDefault();
		var datos = {"enviar_contra":"si_enviala","email":$(this).attr('data-email'),"id":$(this).attr('data-id')}
		console.log("datos: ",datos);
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_usuarios.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("El envio: ",json);
	    }).always(function(){
	    	Swal.close();
	    });

	});

	
	$(document).on("click",".btn_cerrar_class",function(e){
		e.preventDefault();
		$("#formulario_registro").trigger('reset');
		$('#md_registrar_usuario').modal('hide');

	});

	
	//este eliminar
	$(document).on("click",".btn_eliminar",function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		var datos = {"eliminar_persona":"si_eliminala","id":id}
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_usuarios.php',
	        data : datos,
	    }).done(function(json) {
	    	cargar_datos();

	    });
	});

	//este editar
	$(document).on("click",".btn_editar",function(e){

		e.preventDefault(); 
		mostrar_mensaje("Consultando datos");
		var id = $(this).attr("data-id");
		console.log("El id es: ",id);
		var datos = {"consultar_info":"si_condui_especifico","id":id}
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'json_usuarios.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("EL consultar especifico",json);
	    	if (json[0]=="Exito") {
	    		var fecHA_string = json[2]['fecha_nacimiento'];
				var porciones = fecHA_string.split('-');
				var fecha = porciones[2]+"/"+porciones[1]+"/"+porciones[0]

	    		$('#llave_persona').val(id);
	    		$('#ingreso_datos').val("si_actualizalo");
	    		$('#nombre').val(json[2]['nombre']);
	    		$('#email').val(json[2]['email']);
	    		$('#dui').val(json[2]['dui']);
	    		$('#telefono').val(json[2]['telefono']);
	    		$('#fecha').val(fecha);
	    		$('#tipo_persona').val(json[2]['tipo_persona']);

	    		$("#usuario").removeAttr("required");
	    		$("#contrasenia").removeAttr("required");
	    		
				
	    		$('#md_registrar_usuario').modal('show');
	    	}
	    	 
	    }).fail(function(){

	    }).always(function(){
	    	Swal.close();
	    });

	});

	$(document).on("click","#btn_nuevo_producto",function(e){

		e.preventDefault();
		$("#mod_add_producto").modal("show");
	});



	$(document).on("click","#registrar_producto",function(e){
		e.preventDefault();
		console.log("Capturando evento");
		//$('#myModal').modal('show'); para abrir modal
		//$('#myModal').modal('hide'); para cerrar modal
		$('#mod_add_producto').modal('show');

		$(".select2").select2({
	    }).on("select2:opening", 
	        function(){
	            $(".modal").removeAttr("tabindex", "-1");
	    }).on("select2:close", 
	        function(){ 
	            $(".modal").attr("tabindex", "-1");
	    });
    
	});


	$(document).on("submit","#addProducto",function(e){
		e.preventDefault();
		var datos = $("#addProducto").serialize();
		console.log("Imprimiendo datos: ",datos);
		 var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    	});
		//mostrar_mensaje("Almacenando información","Por favor no recargue la página");
		$.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/productos_controlador.php',
            data : datos,
        }).done(function(json) {
        	console.log("EL GUARDAR",json);
        	cargar_datos();
        	 if (json[0]=="Exito") {
                	$("#nombre_Producto").val("");
	                $("#descrip_Producto").val(""); 
	                $("#fechav_Producto").val("");
	                $("#precio_Producto").val("");
	                $("#existencia_Producto").val("");
	                $("#categoria_Producto").val("");
					cargar_datos();
                    Toast.fire({
                    icon: 'success',
                    title: 'Producto registrado con Exito!.'
                     });
                }else{
                	console.error("Ocurrio un error");
                    Toast.fire({
                    icon: 'error',
                    title: 'Error!.'
                    });
                }
        	
        });
    });
});
     //Guardar Prducto


   

function cargar_datos(){
	//mostrar_mensaje("Consultando datos");
	var datos = {"consultar_info":"si_consultala"}
	$.ajax({
        dataType: "json",
        method: "POST",
        url:'../Controladores/productos_controlador.php',
        data : datos,
    }).done(function(json) {
    	console.log("EL consultar",json);
    	$("#tablaPro").empty().html(json[1]); 
    	$('#mod_add_producto').modal('hide');
        $("#categoria_Producto").empty().html(json[3][0]);
    }).fail(function(){

    }).always(function(){
    	Swal.close();
    });
}
	





