$(function (){	

	cargar_taba_ventas();

	
	$(document).on("click",".btn_ver",function(e){ 
        e.preventDefault();
        var elemento = $(this);
        var data_idventa = elemento.attr('data-idventa');
        console.log("Si se ejecuta",data_idventa);

        var datos = {"ver_venta":"si_esta","idventa":data_idventa};
        console.log("los datos enviados: ",datos);
        //return;
        $.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/registro_ventas_controlador.php',
            data : datos,
        }).done(function(json) {
        
	        if (json[0]=="Exito") {

	        	var hora_sistema = formateartime(json[4]['dat_fecha_venta']);
	        	var fecha_sistema = formatearDate(json[4]['dat_fecha_sistema_venta']);

	    		
	    		$('#ticket_v').empty().html(json[4]['int_num_doc']);

	    		$('#fecha_v').empty().html(fecha_sistema);
	    		$('#hora_v').empty().html(hora_sistema);

	    		$('#total_compra').val('$'+json[4]['dou_total_venta']);
	    		$('#iva_compra').val('$'+json[4]['dou_iva_aplicado']);
	    		$('#subtotal_compra').val('$'+json[6]);



	         	$("#tb_Detalle_Derivados_Ver_t").empty().html(json[2]);
	         	$('#md_ver_venta_ticket').modal('show');
	        }   
         
        }); 
    });
     
});

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


function cargar_taba_ventas(){
	//mostrar_mensaje("Consultando datos");
	var datos = {"consultar_info":"si_consultala"}
	$.ajax({
        dataType: "json",
        method: "POST",
        url:'../Controladores/registro_ventas_controlador.php',
        data : datos,
    }).done(function(json) {
    	console.log("EL consultar",json);
    	$("#tabla_registro_ventas").empty().html(json[1]);
    	$('#example1').DataTable();    	
    }).fail(function(){

    }).always(function(){
    	//Swal.close();
    });
}