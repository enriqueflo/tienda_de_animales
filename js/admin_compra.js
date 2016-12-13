$(document).ready(function(){
	$(".fecha").click(function(){
		var dia=$("#dia").val();
		if(dia=="Selecciona fecha"){
			alert(dia);
		}
		else{
			$.get("compras.php", {"parametro": "fecha", "valor": dia},function (datos) {
		        $(".admin").html(datos);
		    });
		}
		
	});
	
	$(".usuario").click(function(){
		var user=$("#user").val();
		if(user=="Selecciona un usuario"){
			alert(user);
		}
		else{
			$.get("compras.php", {"parametro": "usuario", "valor": user},function (datos) {
		        $(".admin").html(datos);
		    });
		}
		
	});
	
	$(".facture").click(function(){
		var factura=$("#factura").val();
		if(factura=="Selecciona una factura"){
			alert(factura);
		}
		else{
			$.get("compras.php", {"parametro": "factura", "valor": factura},function (datos) {
		        $(".admin").html(datos);
		    });
		}
		
	});
	
	$(".range").click(function(){
		var fecha=$("#rango").val();
		var fecha2=$("#rango2").val();
		if(fecha=="Selecciona fecha de inicio"){
			alert(fecha);
		}
		else if(fecha2=="Selecciona fecha de fin"){
			alert(fecha2);
		}
		else if(fecha2<fecha){
			alert("La fecha de inicio no puede ser mayor que la de fin");
		}
		else{
			$.get("compras.php", {"parametro": "rango", "valor": fecha, "valor2": fecha2},function (datos) {
		        $(".admin").html(datos);
		    });
		}
		
	});
	
	$(".pago").click(function(){
		var id=$(this).attr("name-id");
		$.post("../class/administrador.php", {"parametro": "pago", "id": id},function (datos) {
			$.get("compras.php", {},function (datos) {
		        $(".admin").html(datos);
		    });
		});
	});
	
	$(".estado").click(function(){
		var id=$(this).attr("name-id");
		$.post("../class/administrador.php", {"parametro": "estado", "id": id},function (datos) {
			$.get("compras.php", {},function (datos) {
		        $(".admin").html(datos);
		    });
		});
	});
	$(".pdf_admin").click(function(){
		var id=$(this).attr("name-id");
		window.open("../pdf/admin_pdf.php?id="+id, "Datos PDF", "width=700, height=500");
	    return false;
	});
});