<?php
require_once("class/class.php");

$tra=new Trabajo();

$reg=$tra->get_cliente($_GET["id_cliente"]);
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
	$tra->edit_cliente($_POST["id_cliente"], $_POST["nombre"], $_POST["apellido"], $_POST["cuit"], $_POST["categoria"],  $_POST["direccion"], $_POST["localidad"], $_POST["provincia"], $_POST["telefono"],$_POST["email"]);
}
?>
<html>
<head>
<title>Casa Pichetto</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/estilos.css" rel="stylesheet" media="screen">
</head>
<body>
				<?php 

		
				echo $tra->menu1();
			


		?>
		<div class="container contenido">
			<h2>Modificar cliente</h2>
			<form name="form" class="form-horizontal" method="post">
				<div class="control-group">
					<label class="control-label">Nombre</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nombre" value="<?php echo $reg[0]['nombre']; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Apellido</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="apellido" value="<?php echo $reg[0]['apellido']; ?>" />
					</div>
				</div>
				<div class="control-group">				
					<label class="control-label">CUIT</label>
					<div class="controls">
						<input type="text" name="cuit" class="input-xlarge" value="<?php echo $reg[0]['cuit']; ?>" />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">categoria</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="categoria" value="<?php echo $reg[0]['categoria']; ?>"  />
					</div>
				</div>


				<div class="control-group">
				<label class="control-label">Direccion</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="direccion" value="<?php echo $reg[0]['direccion']; ?>" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Localidad</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="localidad" value="<?php echo $reg[0]['localidad']; ?>" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Provincia</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="provincia" value="<?php echo $reg[0]['provincia']; ?>" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Telefono</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="telefono" value="<?php echo $reg[0]['telefono']; ?>" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="email" value="<?php echo $reg[0]['email']; ?>" />
				</div>
				</div>

				<div class="control-group">
					<div class="controls">	
						<input type="hidden" name="grabar" value="si" />
						<input type="hidden" name="id_cliente" value="<?php echo $reg[0]['id_cliente']; ?>" />
						<input type="button" class="btn btn-large btn-primary" value="Modificar cliente" title="Modificar cliente" onclick="validar_cliente();" />
					</div>
				</div>
			</form>
		</div>


</body>
</html>
<?php

?>