<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	
class Partida
{
	private $usuario=array();

	public function add_dominales($numero, $funcionario, $inscripcion, $tipo, $localidad, $anio)
	{
		
		$sql="insert into inmueble values ('$numero', '$funcionario', '$inscripcion', '$tipo', '$localidad', '$anio')";
		$res=mysql_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
			alert('El empleado fue ingresado correctamente');
			window.location='alta_inmueble.php';
		</script>";
	}
	
}

?>