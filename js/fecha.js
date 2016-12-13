function dia(){
	setInterval(day, 1000);
    function day(){
        var date=new Date();
        var dia=date.getDate();
        var horas=date.getHours();
        if(horas<10){
            horas="0"+horas;
        }
        var minutos=date.getMinutes();
        if(minutos<10){
            minutos="0"+minutos;
        }
        var segundos=date.getSeconds();
        if(segundos<10){
            segundos="0"+segundos;
        }
        if(dia<10){
            dia="0"+dia;
        }
        var mes=date.getMonth();
        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var anyo=date.getFullYear();
        document.getElementById("m").innerHTML=meses[mes]+" "+dia;
        document.getElementById("h").innerHTML=horas+":"+minutos+":"+segundos;
        document.getElementById("a").innerHTML=anyo;
    }
}