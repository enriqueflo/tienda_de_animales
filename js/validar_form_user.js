function valida_correo(correo) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
        return (true)
    } 
    else {
        return (false);
    }
}

function valida_telefono(telefono) {
    if (/[0-9]{9}/.test(telefono)){
        return (true)
    } 
    else {
        return (false);
    }
}

function valida_cp(cp) {
    if (/[0-9]{5}/.test(cp)){
        return (true)
    } 
    else {
        return (false);
    }
}

function valida_nombre(nombre) {
    if (/[a-z][a-z][a-z]+/.test(nombre)){
        return (true)
    } 
    else {
        return (false);
    }
}

$(document).ready(function(){
    $(".insertar input").click(function(){
            var name=$("input[name=name]").val();
            var ape_uno=$("input[name=ape_uno]").val();
            var ape_dos=$("input[name=ape_dos]").val();
            var tipo_calle=$("input[name=tipo_calle]").val();
            var nom_calle=$("input[name=nom_calle]").val();
            var numero=$("input[name=numero]").val();
            var escalera=$("input[name=escalera]").val();
            var piso=$("input[name=piso]").val();
            var puerta=$("input[name=puerta]").val();
            var cp=$("input[name=cp]").val();
            var ciudad=$("select[name=ciudad]").val();
            var mail=$("input[name=mail]").val();
            var phone=$("input[name=phone]").val();
            var movil=$("input[name=movil]").val();
            var new_pass=$("#new_pass").val();
            var rep_pass=$("input[name=rep_pass]").val();
            var role=$("input[name=role]").val();
            if(name==""){
                $("h6[name=nombre]").show();
                $("input[name=name]").focus();
                $("h6:not(h6[name=nombre])").hide();
            }
            else if(valida_nombre(name)==false){
                $("h6[name=correct_nombre]").show();
                $("input[name=name]").focus();
                $("h6:not(h6[name=correct_nombre])").hide();
            }
            else if(ape_uno==""){
                $("h6[name=ape_uno]").show();
                $("input[name=ape_uno]").focus();
                $("h6:not(h6[name=ape_uno])").hide();
            }
            else if(valida_nombre(ape_uno)==false){
                $("h6[name=correct_ape_uno]").show();
                $("input[name=ape_uno]").focus();
                $("h6:not(h6[name=correct_ape_uno])").hide();
            }
            else if(ape_dos==""){
                $("h6[name=ape_dos]").show();
                $("input[name=ape_dos]").focus();
                $("h6:not(h6[name=ape_dos])").hide();
            }
            else if(valida_nombre(ape_dos)==false){
                $("h6[name=correct_ape_dos]").show();
                $("input[name=ape_dos]").focus();
                $("h6:not(h6[name=correct_ape_dos])").hide();
            }
            else if(tipo_calle==""){
                $("h6[name=tipo_calle]").show();
                $("input[name=tipo_calle]").focus();
                $("h6:not(h6[name=tipo_calle])").hide();
            }
            else if(nom_calle==""){
                $("h6[name=nom_calle]").show();
                $("input[name=nom_calle]").focus();
                $("h6:not(h6[name=nom_calle])").hide();
            }
            else if(numero==""){
                $("h6[name=numero]").show();
                $("input[name=numero]").focus();
                $("h6:not(h6[name=numero])").hide();
            }
            else if(cp==""){
                $("h6[name=cp]").show();
                $("input[name=cp]").focus();
                $("h6:not(h6[name=cp])").hide();
            }
            else if(valida_cp(cp)==false){
                $("h6[name=correct_cp]").show();
                $("input[name=cp]").focus();
                $("h6:not(h6[name=correct_cp])").hide();
            }
            else if(ciudad=="0"){
                $("h6[name=ciudad]").show();
                $("input[name=ciudad]").focus();
                $("h6:not(h6[name=ciudad])").hide();
            }
            else if(mail==""){
                $("h6[name=mail]").show();
                $("input[name=mail]").focus();
                $("h6:not(h6[name=mail])").hide();
            }
            else if (valida_correo(mail)==false) {
                $("h6[name=correct_mail]").show();
                $("input[name=mail]").focus();
                $("input[name=mail]").val("");
                $("h6:not(h6[name=correct_mail])").hide();
            }
            else if(movil=="" && phone==""){
                $("h6[name=telefono]").show();
                $("input[name=phone]").focus();
                $("h6:not(h6[name=telefono)").hide();
            }
            else if (valida_telefono(phone)==false && phone!="") {
                $("h6[name=correct_phone]").show();
                $("input[name=phone]").focus();
                $("input[name=phone]").val("");
                $("h6:not(h6[name=correct_phone])").hide();
            }
            else if (valida_telefono(movil)==false && movil!="" && phone=="") {
                $("h6[name=correct_movil]").show();
                $("input[name=movil]").focus();
                $("input[name=movil]").val("");
                $("h6:not(h6[name=correct_movil])").hide();
            }
            else if(new_pass==""){
                $("h6[name=new_pass]").show();
                $("#new_pass").focus();
                $("h6:not(h6[name=new_pass])").hide();
            }
            else if(rep_pass==""){
                $("h6[name=rep_pass]").show();
                $("input[name=rep_pass]").focus();
                $("h6:not(h6[name=rep_pass])").hide();
            }

            else if(rep_pass!=new_pass){
                $("h6[name=dif_pass]").show();
                $("input[name=rep_pass]").focus();
                $("h6:not(h6[name=dif_pass])").hide();
            }
            
            else{
                $.get("../class/comprobar_mail.php",{"mail": mail}, function(datos){
                    if(datos=="1"){    
                        $("h6[name=rep_mail]").show();
                        $("input[name=mail]").focus();
                        $("input[name=mail]").val("");
                        $("h6:not(h6[name=rep_mail])").hide();
                    }
                    else{
                        $(".ocultar").hide();
                        new_pass=calcMD5(new_pass);
                        $.post("../class/insertar_client.php",{
                            "name":name,
                            "ape_uno":ape_uno,
                            "ape_dos":ape_dos,
                            "tipo_calle":tipo_calle,
                            "nom_calle": nom_calle,
                            "numero": numero,
                            "escalera": escalera,
                            "piso": piso,
                            "puerta": puerta,
                            "cp": cp,
                            "ciudad": ciudad,
                            "phone": phone,
                            "movil": movil,
                            "mail": mail,
                            "new_pass": new_pass,
                            "role": role,
                            "parametro": "insert"
                        }, function(datos){
                            alert(datos);
                        });
                    }
                });
            }
    });
});