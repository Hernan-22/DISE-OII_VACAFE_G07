$(function (){	
	console.log("esta funcionando el json");
	cargar_factura();
	cargar_totales();
	
	/*$(document).on("click",".btn_ver",function(e){ 
        e.preventDefault();
        var elemento = $(this);
        var data_idcom = elemento.attr('data-idcompra');
        console.log("Si se ejecuta",data_idcom);

        var datos = {"ver_venta":"si_esta","idcompra":data_idcom};
        console.log("los datos enviados: ",datos);
        //return;
        $.ajax({
            dataType: "json",
            method: "POST",
            url:'../Controladores/factura_previa_controlador.php',
            data : datos,
        }).done(function(json) {
        
	        if (json[0]=="Exito") {

	    		$('#proveedor').empty().html(json[4]['nva_nom_proveedor']);
	    		$('#tipo_doc').empty().html(json[4]['nva_tipo_documento']);
	    		$('#num_doc').empty().html(json[4]['nva_numero_documento']);
	    		$('#descrip').empty().html(json[4]['txt_descrip_compra']);
	    		$('#fecha_compra').empty().html(json[4]['dat_fecha_compra']);
	    		$('#fecha_sistema').empty().html(json[4]['dat_fecha_sistema']);
	    		$('#total_compra').val('$'+json[4]['dou_total_compra']);
	    		$('#iva_compra').val('$'+json[4]['dou_iva_aplicado']);
	    		$('#subtotal_compra').val('$'+json[6]);



	         	$("#tb_Detalle_Insumos_Ver").empty().html(json[2]);
	         	$('#md_ver_compra').modal('show');
	        }   
         
        }); 
    });*/
     
});


function cargar_factura(){
	//mostrar_mensaje("Consultando datos");
	var datos = {"consultar_info":"si_esta"}
	$.ajax({
        dataType: "json",
        method: "POST",
        url:'../Controladores/factura_previa_controlador.php',
        data : datos,
    }).done(function(json) {
    	console.log("EL consultar",json);
    	if (json[0]=="Exito") {

	    		$('#vendedor_fact').empty().html(json[4]['nva_nom_empleado']);
	    		$('#nom_cliente_fact').empty().html(json[4]['nva_nom_cliente']);
	    		$('#dui_cliente_fact').empty().html(json[4]['nva_dui_cliente']);
	    		$('#direc_cliente_fact').empty().html(json[4]['txt_direc_cliente']);
	    		$('#tel_cliente_fact').empty().html(json[4]['nva_telefono_cliente']);
	    		$('#num_fact').empty().html(json[4]['int_idventa']);
	    		$('#fecha_fact').empty().html(json[4]['dat_fecha_venta']);    

	         	$("#tb_factura_ver").empty().html(json[2]);
	         
	         
	    }
    }).fail(function(){

    }).always(function(){
    	//Swal.close();
    });
}
    function cargar_totales(){
		//mostrar_mensaje("Consultando datos");
		var datos = {"estos_totales":"si_estos"}
		$.ajax({
	        dataType: "json",
	        method: "POST",
	        url:'../Controladores/factura_previa_controlador.php',
	        data : datos,
	    }).done(function(json) {
	    	console.log("EL consultar",json);
	    	
		    if (json[0]=="obtenido") {
				$("#tb_sumas_factura").empty().html(json[3]);
		    }   
	    }).fail(function(){

	    }).always(function(){
	    	//Swal.close();
	    });
	}

