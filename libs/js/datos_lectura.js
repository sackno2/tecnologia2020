                var ajax = new sack();
	
		function mostrarInfo(){

		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
		else
		{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function()
		{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("datos").innerHTML=xmlhttp.responseText;
		}else{ 
		document.getElementById("datos").innerHTML='No se ve lo que carga Cargando...';
		}
		}
		xmlhttp.open("POST","tabla_lectura.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("cod_anio="+coda);

		}
