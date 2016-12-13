$(document).ready(function(){
	$(".lista_edad").click(function(){
		var marca=$(this).attr("marca");
		var animal=$(this).attr("animal");
		$.get("animal_edad_client.php", {"animal": animal, "marca": marca},function (datos) {
            $(".menu_edad").html(datos);
        });
	});
	
	$(".buscador a").click(function(){
		var cadena=$("#cadena").val();
		$("#cadena").val("");
		$.get("listado_productos_client.php", {"carga": "buscador", "cadena": cadena},function (datos) {
            $(".datos").html(datos);
        });
	});
	
	$(".normas_cliente").click(function(){
		$.get("normas_client.php", {},function (datos) {
            $(".datos").html(datos);
        });
	});
	
	$("#contacta").click(function(){
        $.get("contacta_client.php", {},function (datos) {
            $(".datos").html(datos);
        });
    });
	
	$(".home").click(function(){
		$(".edad").hide();
		$.get("home_client.php", {"home": "home"},function (datos) {
            $(".datos").html(datos);
        });
	});
	
	$("#ir_carrito").click(function(){                                         
        $.get("carrito_compra_client.php", {},function (datos) {
            
            $(".datos").html(datos);
        });
    });
	
	$(".logear input").click(function(){
		var user=$("input[name=user]").val();
        var pass=$("input[name=pass]").val();
        if(user==""){
        	$("h6[name=error_user]").show();
            $("input[name=user]").focus();
            $("h6:not(h6[name=error_user])").hide();
        }
        else if(pass==""){
        	$("h6[name=error_pass]").show();
            $("input[name=pass]").focus();
            $("h6:not(h6[name=error_pass])").hide();
        }
        else{
        	$(".ocultar").hide();
        	pass=calcMD5(pass);
			$.post("../class/insertar_client.php", {
				"user": user, "pass": pass, "parametro": "login"
			},function (datos) {
	            if(datos==0){
	                $("h6[name=error_login]").show();
	                $("input[name=user]").focus();
	                $("h6:not(h6[name=error_login])").hide();
	            }
	            else{
	                $("h6[name=error_user]").hide();
	                window.location="../index.php";
            	}
	        });
		}
	});

	$(".nueva_pass input").click(function(){
		var new_user=$("input[name=new_user]").val();
        var new_pass=$("input[name=new_pass]").val();
        var rep_new_pass=$("input[name=rep_new_pass]").val();
        alert(new_user);
        if(new_user==""){
        	$("h6[name=error_new_user]").show();
            $("input[name=new_user]").focus();
            $("h6:not(h6[name=error_new_user])").hide();
        }
        else if(new_pass==""){
        	$("h6[name=error_new_pass]").show();
            $("input[name=new_pass]").focus();
            $("h6:not(h6[name=error_new_pass])").hide();
        }
        else if(rep_new_pass==""){
        	$("h6[name=error_rep_new_pass]").show();
            $("input[name=rep_new_pass]").focus();
            $("h6:not(h6[name=error_rep_new_pass])").hide();
        }
        else if(rep_new_pass!=new_pass){
        	$("h6[name=error_igual_pass]").show();
            $("input[name=new_pass]").focus();
            $("h6:not(h6[name=error_igual_pass])").hide();
        }
        else{
        	$(".ocultar").hide();
        	new_pass=calcMD5(new_pass);
			$.post("../class/insertar_client.php", {
				"new_user": new_user, "new_pass": new_pass, "parametro": "nueva_pass"
			},function (datos) {
				alert(datos);
	            if(datos==0){
	                $("h6[name=error_login]").show();
	                $("input[name=user]").focus();
	                $("h6:not(h6[name=error_login])").hide();
	            }
	            else{
	                $("h6[name=error_user]").hide();
	                window.location="../index.php";
            	}
	        });
		}
	});

	$(".salir").click(function(){
        $.post("../class/insertar_client.php", {"parametro": "salir"},function (datos) {
            window.location="../index.php";
        });
	});
	
//Administración
    
    $(".registro").click(function(){
		$.get("registro.php", {},function (datos) {
            $(".admin").html(datos);
        });
	});
    
    $(".user").click(function(){
		$.get("users.php", {},function (datos) {
            $(".admin").html(datos);
        });
	});
    
    $(".product").click(function(){
		$.get("search_producto.php", {},function (datos) {
            $(".admin").html(datos);
        });
	});
    
    $(".compras").click(function(){
		$.get("search_compras.php", {},function (datos) {
            $(".admin").html(datos);
        });
	});
    
    $(".facturacion").click(function(){
		$.get("search_facturacion_admin.php", {},function (datos) {
            $(".admin").html(datos);
        });
	});
});