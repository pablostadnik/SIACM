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

function enviarvariable(variable) { // funcion encargada de inviar la variable al archivo php llamado index.php.
   	
    var fil=variable.value; 	
    
    var url = 'consulta3.php?fil=' + fil; // creaci�n de la URL.
    http.open("GET", url, true); // fijando los parametros para el env�o de datos.
    http.onreadystatechange = handler; // Qu� funci�n utilizar en caso de que el estado de la petici�n cambie.
    http.send(null); // enviar petici�n.
}


function handler() {
  if (http.readyState == 4) {
    if(http.status == 200) {
      //alert(http.responseText); // El texto de respuesta del archivo index.php lo muestra como una alerta.
     document.getElementById("resultado").innerHTML = http.responseText
    }
  }
}
