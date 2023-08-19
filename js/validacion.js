function validar_carga()
{
	 var form=document.form;
  
  if (form.codigo.value=="")
  {
    alert("Debe ingresar como minimo el codigo de parcela");
    form.codigo.value="";
    form.codigo.focus();
    
    return false;

  }

  

  valor = form.codigo.value;
  if( isNaN(valor) ) {
  alert("El codigo debe ser un numero entero");
  form.codigo.value="";
  form.codigo.focus();

    return false;
  }

  valor = form.num.value;
  if( isNaN(valor) ) {
  alert("El numero debe ser un numero entero");
  form.num.value="";
  form.num.focus();
 
    return false;
  }

  valor = form.piso.value;
  if( isNaN(valor) ) {
  alert("El piso debe ser un numero entero");
  form.piso.value="";
  form.piso.focus();
    
    return false;
  }

  
  if(confirm("¿Deseas guardar la parcela?")) {

    return true;
  }else{
    return false;
  }
	
}

function validar_catastro()
{
	var form=document.form;
	
	valor = form.existente.value;
  	if( isNaN(valor) ) {
  	alert("La seccion existente debe ser de valor numerico");
  	form.existente.value="";
  	form.existente.focus();

   	 return false;
	}
	
	valor = form.demoler.value;
  	if( isNaN(valor) ) {
  	alert("La seccion demoler debe ser de valor numerico");
  	form.demoler.value="";
  	form.demoler.focus();

   	 return false;
	}


 }
