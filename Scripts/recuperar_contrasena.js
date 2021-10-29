$(function(){
	console.log("todo esta integrado");
	//$("#dui").mask("99999999-9");
 	
	
	$(document).on("submit","#actualizar_pass",function(event){
		event.preventDefault();
		if ($("#contrasena").val() != $("#recontrasena").val()) {

 			Swal.fire({
			  icon: 'error',
			  title: "Oops",
			  html:'Las contraseñas no coinciden'
			});
			return;
 		}
		//mostrar_mensaje("Procesando solicitud","Por favor espere mientras se actualiza su contraseña");
		var datos = $("#actualizar_pass").serialize();
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'../Controladores/contrasena_controlador.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("actualizar pass",json);
	    	if (json[0]=="Exito") {
	    		Swal.close();
	    		Swal.fire({
				  icon: 'success',
				  title: "Su contraseña se ha actualizado",
				  html:"Espere mientras se redirige al login"
				});
				var timer = setInterval(function(){
					$(location).attr('href','index.php?modulo=Home');
					clearTimeout(timer); 
				},3500)
	    	}
	    }).always(function(){
	    	
	    })

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
            	title: 'Corro Enviado!.'
       			});	    
				var timer = setInterval(function(){
					$(location).attr('href','../Vistas/index.php');
					clearTimeout(timer); 
				},3500);
	    	}else{
	    	 	Toast.fire({
		            icon: 'error',
		            title: 'No se pudo envir el correo!'
		        });;
	    	}
	    	
	    });
 		
 	});
	
})


function mostrar_mensaje(titulo,mensaje=""){
	Swal.fire({
	  title: titulo,
	  html: mensaje,
	  allowOutsideClick: false,
	  timerProgressBar: true,
	  didOpen: () => {
	    Swal.showLoading()
	     
	  },
	  willClose: () => {
	     
	  }
	}).then((result) => {
	  
	   
	})
}