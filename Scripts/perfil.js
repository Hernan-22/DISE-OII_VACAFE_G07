$(function (){	
	console.log("esta funcionando el json");
	cargar_datos_perfil_empleado();
	cargar_datos_perfil_usuario();
	

     
});


function cargar_datos_perfil_empleado(){
	//mostrar_mensaje("Consultando datos");
	var datos = {"consultar_info_emp":"si_esta"}
	$.ajax({
        dataType: "json",
        method: "POST",
        url:'../Controladores/perfil_controlador.php',
        data : datos,
    }).done(function(json) {
    	console.log("EL consultar",json);
    	if (json[0]=="Exito") {

    		var idcargo = json[2]['int_idcargo'];
    		var cargo ="";
    		if (idcargo == 1) {
    			cargo = "Administrador de Sistema";
    		}else if (idcargo = 2) {
    			cargo = "Vendedor";
    		}

    		//var nombre = UpperCase(json[2]['nva_nom_empleado']);

    		$('#nombre_perf').empty().html(json[2]['nva_nom_empleado']);
	    	$('#apellido_perf').empty().html(json[2]['nva_ape_empleado']);

	    	$('#dui_per').empty().html(json[2]['nva_dui_empledao']);
	    	$('#nombre_per').empty().html(json[2]['nva_nom_empleado']);
	    	$('#apellido_per').empty().html(json[2]['nva_ape_empleado']);
	    	$('#edad_per').empty().html(json[4]);
	    	$('#cargo_per').empty().html(cargo);
	    	$('#telefono_per').empty().html(json[2]['nva_telefono_empleado']);
	    	$('#correo_per').empty().html(json[2]['nva_email_empleado']);
	    	$('#direc_per').empty().html(json[2]['txt_direc_empleado']);
	    	$('#nombre_per_user').empty().html(json[3]['nva_nom_usuario']);   
	         
	    }
    }).fail(function(){

    }).always(function(){
    	//Swal.close();
    });
}

	
function cargar_datos_perfil_usuario(){
	//mostrar_mensaje("Consultando datos");
	var datos = {"consultar_info_us":"si_estos"}
	$.ajax({
	    dataType: "json",
	    method: "POST",
	    url:'../Controladores/perfil_controlador.php',
	    data : datos,
	}).done(function(json) {
	    console.log("EL consultar",json);
	    	
		if (json[0]=="Exito") {
			$("#nombre_per_user").empty().html(json[2]['nva_nom_usuario']);
		}   
	}).fail(function(){

	}).always(function(){
	   //Swal.close();
	});
}

