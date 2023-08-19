<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("class/class.php");

$tra=new Trabajo();

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
	

}
?>
<html>
<head>
<title>Municipalidad de Carlos Casares</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/estilos.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/navbar.js"></script>
</head>
<style type="text/css">
label{
  font-weight:bold;
}
</style>
<body style= "background-color: #386745;">
				<?php 

				echo $tra->menu1();
		

		?>
		<div class="container contenido">
			<h2 style="color:white;">Buscar parcela</h2>
			<form name="form" class="form-horizontal" method="post">
				<div class="control-group">
					<label class="control-label">Codigo de Parcela</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="codigo" />
					</div>
				</div>
			
				<div class="control-group">
					<div class="controls">	
						<input type="hidden" name="grabar" value="si" />
						<input type="button" class="btn btn-large btn-primary" value="Buscar" title="Buscar" onclick="" />
					</div>
				</div>
			</form>
		</div>


</body>
</html>
