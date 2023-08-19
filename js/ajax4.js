
function getXMLHTTPRequest() {
  try {
    req = new XMLHttpRequest();
  } catch(err1) {
    try {
      req = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (err2) {
      try {
        req = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (err3) {
        req = false;
      }
    }
  }
  return req;
}


var http = getXMLHTTPRequest(); // creo una instancia del objeto XMLHTTPRequest.

function enviarvariable(codi,num_e,let_e,anio_e,tipo_e,exis_e,demo_e,cons_e,emp_e) { // funcion encargada de enviar la variable al archivo php llamado index.php.
  




    var codig=codi.value;
  	
    var resul = document.getElementById('resultado');
    //resul.style.display='none';
    var resul2 = document.getElementById('resultado2');
    resul2.style.display='none';
 

    //var url = 'consulta3.php?codi=' + codig; // creación de la URL.
    var ruta='consulta3.php';
	var envio1='codi='+codi.value;
	var envio2='num_e='+num_e.value;
	var envio3='let_e='+let_e.value;
	var envio4='anio_e='+anio_e.value;
	var envio5='tipo_e='+tipo_e.value;
	var envio6='exis_e='+exis_e.value;
	var envio7='demo_e='+demo_e.value;
	var envio8='cons_e='+cons_e.value;
	var envio9='emp_e='+emp_e.value;
	var url=ruta+"?"+envio1+"&"+envio2+"&"+envio3+"&"+envio4+"&"+envio5+"&"+envio6+"&"+envio7+"&"+envio8+"&"+envio9;
	//document.write(url);
    http.open("GET", url, true); // fijando los parametros para el envío de datos.
    http.onreadystatechange = handler; // Qué función utilizar en caso de que el estado de la petición cambie.
    http.send(null); // enviar petición.
}
function enviarvariable2(valfila,codi) { // funcion encargada de enviar la variable al archivo php llamado index.php.
  
   var val=valfila.cells[0].innerText; 
  	
    var resul = document.getElementById('resultado');
    //resul.style.display='none';
    var resul2 = document.getElementById('resultado2');
    resul2.style.display='none';
 	

    
    var ruta='consulta6.php';
	var envio1='val='+val;
	var envio2='codi='+codi.value;
	var url=ruta+"?"+envio1+"&"+envio2;
	
    http.open("GET", url, true); // fijando los parametros para el envío de datos.
    http.onreadystatechange = handler; // Qué función utilizar en caso de que el estado de la petición cambie.
    http.send(null); // enviar petición.
}

function handler() {

  if (http.readyState == 4) {
    if(http.status == 200) {
    	//entro al handler y genero la respuesta en forma de alerta pro no me la muestra en tabla
      //alert(http.responseText); // El texto de respuesta del archivo index.php lo muestra como una alerta.
     document.getElementById("resultado").innerHTML = http.responseText
    }
  }
}
