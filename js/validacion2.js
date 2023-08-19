function envia_formulario() {
    var mi_formulario=document.prueba
    var Enviar=new Boolean()
    
    Enviar = true
    var latitud1 = document.getElementById('lat1');
    var latitud2 = document.getElementById('lat2');
    var latitud3 = document.getElementById('lat3');
    var latitud4 = document.getElementById('lat4');
    var latitud5 = document.getElementById('lat5');
    //var long2_1 = document.getElementById('long2_1');
    //var long2_2 = document.getElementById('long2_2');
    //var long2_3 = document.getElementById('long2_3');
    //var long2_4 = document.getElementById('long2_4');
    //var long2_5 = document.getElementById('long2_5');
    var longcat1 = document.getElementById('longcat1');
    var longcat2 = document.getElementById('longcat2');
    var longcat3 = document.getElementById('longcat3');
    var longcat4 = document.getElementById('longcat4');
    var longcat5 = document.getElementById('longcat5');
  
if (latitud1.value!='')
{   
if (Enviar && latitud1.value.length!=10) {
        alert("El campo latitud no tiene la cantidad de caracteres requerido, deben ser 10");
        Enviar=false;
        latitud1.focus();
    }
}
//var pene = "peporope8"
//var n = pene.indexOf("p,2");
//alert(n);
//if(n=3)
//{
//    alert("Hay una aparicion de la doble comilla");
//}
if (latitud2.value!='')
{ 
if (Enviar && latitud2.value.length!=10) {
        alert("El campo latitud no tiene la cantidad de caracteres requerido, deben ser 10");
        Enviar=false;
        latitud2.focus();
    }
}
if (latitud3.value!='')
{ 
if (Enviar && latitud3.value.length!=10) {
        alert("El campo latitud no tiene la cantidad de caracteres requerido, deben ser 10");
        Enviar=false;
        latitud3.focus();
    }
}
if (latitud4.value!='')
{ 
if (Enviar && latitud4.value.length!=10) {
        alert("El campo latitud no tiene la cantidad de caracteres requerido, deben ser 10");
        Enviar=false;
        latitud4.focus();
    }
}
if (latitud5.value!='')
{ 
if (Enviar && latitud5.value.length!=10) {
        alert("El campo latitud no tiene la cantidad de caracteres requerido, deben ser 10");
        Enviar=false;
        latitud5.focus();
    }
}


if (longcat1.value!='')
{ 
if (Enviar && longcat1.value.length!=10) {
        alert("El campo longitud no tiene la cantidad de caracteres requerido, deben ser 10");
        Enviar=false;
        longcat1.focus();
    }
}
if (longcat2.value!='')
{ 
if (Enviar && longcat2.value.length!=10) {
        alert("El campo longitud no tiene la cantidad de caracteres requerido, deben ser 10");
        Enviar=false;
        longcat2.focus();
    }
}
if (longcat3.value!='')
{ 
if (Enviar && longcat3.value.length!=10) {
        alert("El campo longitud no tiene la cantidad de caracteres requerido, deben ser 10");
        Enviar=false;
        longcat3.focus();
    }
}
if (longcat4.value!='')
{ 
if (Enviar && longcat4.value.length!=10) {
        alert("El campo longitud no tiene la cantidad de caracteres requerido, deben ser 10");
        Enviar=false;
        longcat4.focus();
    }
}
if (longcat5.value!='')
{ 
if (Enviar && longcat5.value.length!=10) {
        alert("El campo longitud no tiene la cantidad de caracteres requerido, deben ser 10");
        Enviar=false;
        longcat5.focus();
    }
}



if (Enviar) {
        mi_formulario.submit();
    }else{
	return false;
	}
}
