function mandarForm(form){
	/* Creamos un objeto FormData que es un formulario con 	enctype=multipart/form-data 
	y le pasamos como parametro el formulario HTML */
 	
	var Data = new FormData(form);
	
	/* Creamos el objeto que hara la petición AJAX al servidor, debemos de validar si existe el 	objeto “ XMLHttpRequest” ya que en internet explorer viejito no esta, y si no esta usamos 
	“ActiveXObject” */
	
	if(window.XMLHttpRequest) {
		var Req = new XMLHttpRequest();
	}else if(window.ActiveXObject) {
		var Req = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	//Pasándole la url a la que haremos la petición
	Req.open("POST", "carga_archivo.php", true);
	
	/* Le damos un evento al request, esto quiere decir que cuando
	termine de hacer la petición, se ejecutara este fragmento de
	código */
	
	Req.onload = function(Event) {
		//Validamos que el status http sea  ok
		if (Req.status == 200) {
			/*Como la info de respuesta vendrá en JSON 
			la parseamos */
			var st = JSON.parse(Req.responseText);
			
			if(st.success){
				/* Código si el return fue true */
			}else{
				/* Código si el return fue false */
			}
		} else {
		    	console.log(Req.status); //Vemos que paso.
		}
	};	  
	
	//Enviamos la petición
	Req.send(Data);
}