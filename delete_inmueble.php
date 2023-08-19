<?php
require_once("class/class.php");

$tra=new Trabajo();
$tra->delete_cliente($_GET["id_cliente"]);
echo"
		<script>
			alert('El cliente ha sido eliminado');
			window.location='eliminar_cliente.php';
		</script>
";



?>