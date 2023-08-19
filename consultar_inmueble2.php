<?php
require_once("class/class.php");

$tra=new Trabajo();

$reg=$tra->get_cliente($_GET["id_cliente"]);
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
			<h2>Consultar cliente</h2>
			<form name="form" class="form-horizontal" method="post">
				<div class="control-group">
					<label class="control-label">Nombre</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nombre" readonly="readonly" value="<?php echo $reg[0]['nombre']; ?>" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Apellido</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="apellido" readonly="readonly" value="<?php echo $reg[0]['apellido']; ?>" />
					</div>
				</div>

				<div class="control-group">				
				<label class="control-label">CUIT</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="cuit" readonly="readonly" value="<?php echo $reg[0]['cuit']; ?>" />
				</div>
				</div>

				<div class="control-group">				
					<label class="control-label">categoria</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="categoria" readonly="readonly" value="<?php echo $reg[0]['categoria']; ?>" />
					</div>
				</div>


				<div class="control-group">
				<label class="control-label">Direccion</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="direccion" readonly="readonly" value="<?php echo $reg[0]['direccion']; ?>" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Localidad</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="localidad" readonly="readonly" value="<?php echo $reg[0]['localidad']; ?>" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Provincia</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="provincia" readonly="readonly" value="<?php echo $reg[0]['provincia']; ?>" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Telefono</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="telefono" readonly="readonly" value="<?php echo $reg[0]['telefono']; ?>" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="email" readonly="readonly" value="<?php echo $reg[0]['email']; ?>" />
				</div>
				</div>

				<div class="control-group">
					<div class="controls">	
						<input type="button" class="btn btn-large btn-primary" value="Volver" title="Volver" onclick="window.location='consultar_cliente.php'" />
					</div>
				</div>
			</form>
		</div>


</body>
</html>
<?php

?>