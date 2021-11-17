$(function (){
	//$('#addvacuna').parsley();
	
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
	        url:'vacuna_controlador_Json.php',
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
	$(document).on("click",".btn_cerrar_class",function(e){
		e.preventDefault();
		$("#addvacuna").trigger('reset');
		$('#modalAddvacuna').modal('hide');


	});
	$(document).on("click",".btn_eliminar",function(e){
		e.preventDefault();
		var id_vehiculo = $(this).attr("data-int_id_control_vac");
		var datos = {"eliminar_persona":"si_eliminala","int_id_control_vac":int_id_control_vac}
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'vacuna_controlador_Json.php',
	        data : datos,
	    }).done(function(json) {
	    	cargar_datos();

	    });
	});
	$(document).on("click",".btn_editar",function(e){

		e.preventDefault(); 
		mostrar_mensaje("Consultando datos");
		var id_vehiculo = $(this).attr("data-int_id_control_vac");
		console.log("El id es: ",int_id_control_vac);
		var datos = {"consultar_info":"si_condui_especifico","int_id_control_vac":int_id_control_vac}
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'vacuna_controlador_Json.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("EL consultar especifico",json);
	    	if (json[0]=="Exito") {
	    		
	    		$('#llave_persona').val(int_id_control_vac);
	    		$('#ingreso_datos').val("si_actualizalo");
	    		$('#id_exped_aplicado').val(json[2]['id_exped_aplicado']);
	    		$('#dat_fecha_aplicacion').val(json[2]['dat_fecha_aplicacion']);
	    		$('#nva_vacuna_aplicada').val(json[2]['nva_vacuna_aplicada']);
	    		$('#modalAddvacuna').modal('show');
	    	}
	    	 
	    }).fail(function(){

	    }).always(function(){
	    	Swal.close();
	    });


	});


	$(document).on("submit","#addvacuna",function(e){
		e.preventDefault();
		var datos = $("#addvacuna").serialize();
		console.log("Imprimiendo datos: ",datos);
		$.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/vacuna_controlador_Json.php',
            data : datos,
        }).done(function(json) {
        	console.log("EL GUARDAR",json);
        	$('#modalAddvacuna').modal('hide');
        	cargar_datos();
        	
        }).fail(function(){

        }).always(function(){

        });


	});
});

function cargar_datos(){
	mostrar_mensaje("Consultando datos");
	var datos = {"consultar_info":"si_consultala"}
	$.ajax({
        dataType: "json",
        method: "POST",
        url:'../Controladores/vacuna_controlador_Json.php',
        data : datos,
    }).done(function(json) {
    	console.log("EL consultar",json);
    	$("#datos_tabla").empty().html(json[1]);
    	//$('#tabla_vacuna').DataTable();
    	$('#modalAddvacuna').modal('hide');
    }).fail(function(){

    }).always(function(){
    	Swal.close();
    });
}
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