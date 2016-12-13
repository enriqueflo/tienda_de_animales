$(document).ready(function(){
	$(".por_mes").click(function(){
		var mes=$("#mes").val();
		var anyo=$("#anyo").val();
		if(anyo=="Selecciona_anyo"){
			alert(anyo);
		}
		else if(mes=="Selecciona_mes"){
			alert(mes);
		}
		else{
			$.get("facturacion_admin.php", {"parametro": "mes", "mes": mes, "anyo": anyo},function (datos) {
		        $(".admin").html(datos);
		    });
		}
		
	});
	
	$(".por_anyo").click(function(){
		var anyo=$("#anyo").val();
		if(anyo=="Selecciona_un_anyo"){
			alert(anyo);
		}
		else{
			$.get("facturacion_admin.php", {"parametro": "anyo", "anyo": anyo},function (datos) {
		        $(".admin").html(datos);
		    });
		}
		
	});
});