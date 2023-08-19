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

function ver_adelante() { // funcion encargada de inviar la variable al archivo php llamado index.php.
   	

    
    $('#verz').hide(); 
    document.getElementById("verz").style.display = 'none';

     document.getElementById("agr").style.color = 'red';
    var url = 'consulta5.php'  // creación de la URL.
    http.open("GET", url, true); // fijando los parametros para el envío de datos.
    http.onreadystatechange = handler; // Qué función utilizar en caso de que el estado de la petición cambie.
    http.send(null); // enviar petición.
}

function handler() {
  if (http.readyState == 4) {
    if(http.status == 200) {

      alert(http.responseText); // El texto de respuesta del archivo index.php lo muestra como una alerta.
     document.getElementById("resultado").innerHTML = http.responseText

    }
  }
}