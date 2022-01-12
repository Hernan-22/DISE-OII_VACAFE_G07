$('#formulario_r_compras_p').css("display","none");
$('#msg_decimales').css("display","none");
console.log("esta funcionando el js");
$(function(){

        var fecha_hoy_inicio = new Date();
        $(".form_datetime_inicio").datetimepicker({
                format: 'd-mm-yyyy HH:ii:ss',
               // endDate: fecha_hoy_inicio,
                todayBtn: true
        });
        var fecha_hoy_fin = new Date();
        $(".form_datetime_fin").datetimepicker({
                format: 'd-mm-yyyy HH:ii:ss',
                //startDate: fecha_hoy_fin,
                todayBtn: true
        });



 	$(document).on("click",".btn_compras_proveedor",function(e){ 
                e.preventDefault();
                console.log("si llega");
                $('#formulario_r_compras_p').css("display","block");
                cargar_proveedores();
        });

        $(document).on("submit","#formulario_r_compras_p",function(e){
                e.preventDefault();
                var datos = $("#formulario_r_compras_p").serialize();
                
                var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000
                });
                var Toast1 = Swal.mixin({
                        toast: true,
                        position: 'center',
                        showConfirmButton: false,
                        timer: 7000
                });
                console.log("Entro aqui");
                var fecha_inicio = $("#fecha_inicio_r_compras").val();
                var fecha_fin = $("#fecha_fin_r_compras").val();

                console.log("Inicio", fecha_inicio);
                console.log("Fin", fecha_fin);

                var f1 = new Date(fecha_inicio);
                var f2 = new Date(fecha_fin);

                console.log("F1", f1);
                console.log("F2", f2);

                if (f1.getTime() > f2.getTime()){
                        Toast1.fire({
                                icon: 'error',
                                title: 'La fecha final no puede ser menor que la incial'
                        });
                        return;
                }
                if ($("#proveedor_r_compras").val() == "Seleccione"){
                        Toast.fire({
                                icon: 'info',
                                title: 'Seleccione un Proveedor'
                        });
                        return;
                }
                if ($("#fecha_inicio_r_compras").val() == "" && $("#fecha_fin_r_compras").val() == ""){
                        Toast.fire({
                        icon: 'info',
                        title: 'Seleccione Fechas'
                    });
                        return;
                }
                if ($("#fecha_inicio_r_compras").val() == ""){                        
                        Toast.fire({
                                icon: 'info',
                                title: 'Seleccione una fecha de incio'
                        });
                        return;
                }
                if ($("#fecha_fin_r_compras").val() == "") {
                        Toast.fire({
                                icon: 'info',
                                title: 'Seleccione una fecha final'
                        });
                        return;
                }

                        
                mostrar_mensaje("Generando Reporte","Espere un Momento")
                $.ajax({
                    dataType: "json",
                    method: "POST",
                    url:'../Controladores/reporte_compras_controlador.php',
                    data : datos,
                }).done(function(json) {
                        console.log("EL GUARDAR",json);         
                        if (json[0]=="Exito") {

                        }/*else if (json[0]=="Error" && json[1]=="existencias"){
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
                        }*/
        
                });
        });
});

function cargar_proveedores(){
        var datos = {"consultar_info":"si_consultala"}
        $.ajax({
        dataType: "json",
        method: "POST",
        url:'../Controladores/reporte_compras_controlador.php',
        data : datos,
    }).done(function(json) {
        

        $("#proveedor_r_compras").empty().html(json[1][0]);         
    }).fail(function(){

    }).always(function(){
        //Swal.close();
    });
}

function mostrar_mensaje(titulo,mensaje=""){
        Swal.fire({
          title: titulo,
          html: mensaje,
          allowOutsideClick: false,
          icon:'info',
          timerProgressBar: true,
          color:'#0000FE',         
          didOpen: () => {
            Swal.showLoading()
             
          },
          willClose: () => {
             
          }
        }).then((result) => {
          
           
        })
}