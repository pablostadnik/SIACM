<?php
	/*En php recibimos las variables de nuestro formulario 
	Como lo haríamos normalmente, en este caso solo es una. */
	
	$pic = $_FILES['archivo'];
	$data = array('success' => false);
	
	//Validamos si la copio correctamente 
	if(copy($pic['tmp_name'],'archivos/'.$pic['name'])){
		$data = array('success' => true);
	}
	
	//Codificamos el array a JSON (Esta sera la respuesta AJAX) 
	echo json_encode($data);
?>