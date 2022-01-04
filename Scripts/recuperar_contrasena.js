$(function(){
	console.log("todo esta integrado");

	//$("#validando_codigo_correo").addClass("hidden");
	$("#validando_codigo_correo").css("display","none");
	$("#nueva_contra").css("display","none");

	$('#envio_correo').validate({
	    rules: {
	      email: {
	        required: true,
	        email: true,
	      },
	      password: {
	        required: true,
	        minlength: 5
	      },
	      terms: {
	        required: true
	      },
	    },
	    messages: {
	      email: {
	        required: "Por favor ingresa un email",
	        email: "Por favor ingresa un email valido"
	      },
	      password: {
	        required: "Please provide a password",
	        minlength: "Your password must be at least 5 characters long"
	      },
	      terms: "Please accept our terms"
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
 	
	
 	$(document).on("submit","#envio_correo",function(event){
 		event.preventDefault();
 		var Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 5000
    	});
		var datos = $("#envio_correo").serialize();
		console.log("datos: ",datos);
		
	    Toast.fire({
            icon: 'info',
            title: 'Enviando Correo...'
       	});	

		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'../Controladores/contrasena_controlador.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("El envio: ",json);
	    	if (json[0]=="Exito") {
	    	 		
				Toast.fire({
            	icon: 'success',
            	title: 'Correo Enviado!.'
       			});
       			$("#validando_codigo_correo").css("display","block");
       			$("#idusuario").val(json[4]);
       			$("#envio_correo").css("display","none");
	    	}else if(json[1]=="el mail no se obtuvo"){
	    	 	Toast.fire({
		            icon: 'info',
		            title: 'Este Correo no pertenece a ningun Usuario!'
		        });
	    	}else{
	    		Toast.fire({
		            icon: 'error',
		            title: 'No se pudo enviar el correo!'
		        });
	    	}
	    	
	    });
 		
 	});

 	$(document).on("submit","#validando_codigo_correo",function(event){
 		event.preventDefault();
 		var Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 5000
    	});
		var datos = $("#validando_codigo_correo").serialize();
		console.log("datos: ",datos);
		
	    Toast.fire({
            icon: 'info',
            title: 'Veridicando código...'
       	});	

		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'../Controladores/contrasena_controlador.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("El envio: ",json);
	    	if (json[0]=="Exito") {
	    	 		
				Toast.fire({
            	icon: 'success',
            	title: 'Código Correcto!'
       			});
       			$("#nueva_contra").css("display","block");
       			$("#idusuario2").val(json[3]);
       			$("#validando_codigo_correo").css("display","none");

	    	}else if(json[1]=="incorrecto"){
	    	 	Toast.fire({
		            icon: 'error',
		            title: 'Código incorrecto!'
		        });
	    	}else{
	    		Toast.fire({
		            icon: 'error',
		            title: 'No se encontro el usuario'
		        });
	    	}
	    	
	    });
 		
 	});

 	$(document).on("submit","#nueva_contra",function(event){
 		event.preventDefault();
 		var Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 5000
    	});
		var datos = $("#nueva_contra").serialize();
		console.log("datos: ",datos);
		
	    if ($("#new_password").val() != $("#repit_new_password").val()) {

 			Toast.fire({
		        icon: 'info',
		        title: 'Las contraseñas no coinciden!'
		    });
			return;
 		}

		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'../Controladores/contrasena_controlador.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("El envio: ",json);
	    	if (json[0]=="Exito") {
	    	 		
				Toast.fire({
	            	icon: 'success',
	            	title: 'Contraseña modificada Exitosamente!'
       			});

       			$("#nueva_contra").css("display","block");       			
       			$("#validando_codigo_correo").css("display","none");
       			$("#envio_correo").css("display","none");

				var timer = setInterval(function(){
					$(location).attr('href','../Vistas/index.php');
					clearTimeout(timer);
				},3500);	    	
	    	}else{
	    		Toast.fire({
		            icon: 'error',
		            title: 'No se pudo actualizar la contraseña!'
		        });
	    	}
	    	
	    });
 		
 	});
	
})

