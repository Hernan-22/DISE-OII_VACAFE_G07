$(function (){	
	cargar_datos();


	console.log("esta funcionando")
	$('#formulario_registro').validate({
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
	$('#formulario_editar').validate({
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

	$('#formulario_mod_pass').validate({
	   
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



	$(document).on("blur",".validar_campo_unico",function(e){
		e.preventDefault();
		if ($(this).val()=="") {
			return;
		}
		var Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 5000
    	});
		console.log("validar_campo",$(this).data('quien_es'));

		var datos = {"validar_campos":"si_por_campo","campo":$(this).val(),"tipo":$(this).data('quien_es')};

		console.log("datos: ",datos);
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'../Controladores/usuarios_controlador.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("retorno de validacion",json);
	    	if (json[0]=="Error") {
	    		
	    		Toast.fire({
			        icon: 'error',
			        title: 'Este nombre de usuario ya existe'
		    	});
		    	return;

	    	}
	    	console.log("El envio: ",json);
	    });
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

	    		$('#llave_usuario_edit').val(id);
	    		$('#ingreso_datos').val("si_actualizar");
	    		$('#empleado_usuario_edit').empty().html(json[3][0]);
	    		$('#nombre_usuario_edit').val(json[2]['nva_nom_usuario']);
	    		$('#correo_usuario_edit').val(email_empleado);	    		
	    		$('#md_edit_usuario').modal('show');	    		
	    	}
	    	 
	    }).fail(function(){

	    }).always(function(){

	    });


	});

	$(document).on("submit","#formulario_editar",function(e){
		e.preventDefault();
		var datos = $("#formulario_editar").serialize();
		var Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 5000
    	});
    	if ($("#empleado_usuario_edit").val() == "Seleccione"){
 			Toast.fire({
		        icon: 'info',
		        title: 'Debe Elegir un Empleado'
		    });
			return;
 		}
		console.log("Imprimiendo datos: ",datos);		
		$.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/usuarios_controlador.php',
            data : datos,
        }).done(function(json) {
        	console.log("EL GUARDAR",json);        	
	        if (json[0]=="Exito") {	    	 	
				if (json[5][0] != "") {
					$('#usuario_session').empty().html(json[5]);
				}
		    					
				$('#md_edit_usuario').modal('hide');

				console.log("el id del usuario: ",json[1]);
				if ($("#imagen_usuario_edit").val() != "") {
					subir_archivo($("#imagen_usuario_edit"), json[1]);
				}else{
					Toast.fire({
				        icon: 'info',
				        title: 'Imagen Vacía!'
		    		});
				}
				Toast.fire({
			        icon: 'success',
			        title: 'Usuario Modificado!'
		    	});	
				$("#formulario_editar").trigger('reset');
       			cargar_datos();
	    	}else if(json[0]=="Error"){
	    		Toast.fire({
		            icon: 'error',
		            title: 'No se pudo actualizar el usuario!'
		        });
	    	}
        });
	});


	$(document).on("click",".btn_editar_pass",function(e){

		e.preventDefault(); 
		var id = $(this).attr("data-idusuario");
		console.log("El id es: ",id);

		var datos = {"consultar_pass":"si_coneste_id","id":id}

		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'../Controladores/usuarios_controlador.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("EL consultar especifico",json);
	    	if (json[0]=="Exito") {	    		

	    		$('#id_usuario').val(id);
	    		console.log("id: ",id);
	    		$('#contrasena_usuario').val(json[2]['nva_contraseña_usuario']);
	    		$('#recontrasena_usuario').val(json[2]['nva_contraseña_usuario']);
	    		$('#md_edit_password').modal('show');
	    		
	    	}
	    	 
	    }).fail(function(){

	    }).always(function(){

	    });


	});

	$(document).on("submit","#formulario_mod_pass",function(e){
		e.preventDefault();
		var datos = $("#formulario_mod_pass").serialize();
		var Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 5000
    	});
    	if ($("#contrasena_usuario").val() != $("#recontrasena_usuario").val()) {

 			Toast.fire({
		        icon: 'info',
		        title: 'Las contraseñas no coinciden!'
		    });
			return;
 		}
		console.log("Imprimiendo datos: ",datos);		
		$.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/usuarios_controlador.php',
            data : datos,
        }).done(function(json) {
        	console.log("EL GUARDAR",json);        	
	        if (json[0]=="Exito") {	
				cargar_datos();				
				Toast.fire({
	            	icon: 'success',
	            	title: 'Contraseña modificada exitosamente!.'
       			});
       			$('#md_edit_password').modal('hide');
	    	}else {
	    		Toast.fire({
		            icon: 'error',
		            title: 'No se pudo actualizar la contraseña!'
		        });
	    	}
        });
	});

	$(document).on("submit","#formulario_registro",function(e){
		e.preventDefault();
		var datos = $("#formulario_registro").serialize();
		var Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 5000
    	});
    	if ($("#contrasena_usuario").val() != $("#recontrasena_usuario").val()) {

 			Toast.fire({
		        icon: 'info',
		        title: 'Las contraseñas no coinciden!'
		    });
			return;
 		}else if ($("#empleado_usuario").val() == "Seleccione"){
 			Toast.fire({
		        icon: 'info',
		        title: 'Debe Elegir un Empleado'
		    });
			return;
 		}
		console.log("Imprimiendo datos: ",datos);		
		$.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/usuarios_controlador.php',
            data : datos,
        }).done(function(json) {
        	console.log("EL GUARDAR",json);        	
	        if (json[0]=="Exito") {	    	 	
					    	
		    	$("#formulario_editar").trigger('reset');
				$('#md_registrar_usuario').modal('hide');
				if ($("#imagen_usuario").val() != "") {
					subir_archivo($("#imagen_usuario"), json[1]);
				}
       			cargar_datos();
       			Toast.fire({
			        icon: 'success',
			        title: 'Usuario registrado con exito!'
		    	});	
       			return;
	    	}else{
	    	 	Toast.fire({
		            icon: 'error',
		            title: 'Error al registrar!'
		        });
		        return;
	    	}
        });
	});

	$(document).on("change","#imagen_usuario_edit",function(e){
		validar_archivo($(this));
	});

	$(document).on("change","#imagen_usuario",function(e){
		validar_archivo($(this));
	});


});

function cargar_datos(){

	var datos = {"consultar_info":"si_consultala"}

	$.ajax({
        dataType: "json",
        method: "POST",
        url:'../Controladores/usuarios_controlador.php',
        data : datos,
    }).done(function(json) {
    	console.log("EL consultar",json);
    	$("#datos_tabla").empty().html(json[1]); 
    	$('#md_registrar_usuario').modal('hide');
    	$("#empleado_usuario").empty().html(json[5][0]);
    	$('#example1').DataTable(); 

    }).fail(function(){

    }).always(function(){
    	Swal.close();
    });
}




function subir_archivo(archivo,id_usuario){

  console.log("aca archivos",archivo,id_usuario);
  // return null;
    var file =archivo.files;
    var formData = new FormData();
    formData.append('formData', $("#crear_seccion_home"));
    var data = new FormData();
     //Append files infos
     jQuery.each(archivo[0].files, function(i, file) {
        data.append('file-'+i, file);
     });
    var Toast = Swal.mixin({
	    toast: true,
	    position: 'top-end',
	    showConfirmButton: false,
	    timer: 5000
    });

     console.log("data",data);
     $.ajax({  
        url: "../Controladores/usuarios_controlador.php?id="+id_usuario+'&subir_imagen=subir_imagen_ajax',  
        type: "POST", 
        dataType: "json",  
        data: data,  
        cache: false,
        processData: false,  
        contentType: false, 
        context: this,

        success: function (json) {
	          
	            console.log("el json_img",json);
	            
 			
 				console.log("img: ",json[2]);
 			 
	        if(json[0]=="Exito"){  	            
		    	
        	 	Toast.fire({
	            	icon: 'success',
	            	title: 'Datos registrados con exito!'
       			});
       			var timer = setInterval(function(){
					$(location).attr('href','../Vistas/v_usuarios.php');
					clearTimeout(timer);
				},1500);

            }else if(json[1]=="extension"){
                 Toast.fire({
			        icon: 'error',
			        title: 'Extensión no Permitida!'
		    	});
            }else{
                 Toast.fire({
			        icon: 'error',
			        title: 'Error en la imagen!'
		    	});
            }

        }
    });
}






function validar_archivo(file){
	console.log("validar_archivo",file);
	 
     var Lector;
     var Archivos = file[0].files;
     var archivo = file;
     var archivo2 = file.val();
     if (Archivos.length > 0) {


        Lector = new FileReader();
        Lector.onloadend = function(e) {
            var origen, tipo, tamanio;
            //Envia la imagen a la pantalla
            origen = e.target; //objeto FileReader
            //Prepara la información sobre la imagen

            tipo = archivo2.substring(archivo2.lastIndexOf("."));
            console.log("el tipo",tipo);
            tamanio = e.total / 1024;
            console.log("el tamaño",tamanio);

            if (tipo !== ".jpeg" && tipo !== ".JPEG" && tipo !== ".jpg" && tipo !== ".JPG" && tipo !== ".png" && tipo !== ".PNG") {
                //  
                console.log("error_tipo");
                $("#error_en_la_imagen").css('display','block');
            }
            else{
                 $("#error_en_la_imagen").css('display','none');
                console.log("en el else");
            }

       };
        Lector.onerror = function(e) {
        console.log(e)
       }
       Lector.readAsDataURL(Archivos[0]);
   }



}