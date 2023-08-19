<?php
require_once("class/class.php");
require_once("class/parcela.php");
$tra=new Trabajo();
$par=new Parcela();

if (isset($_GET['codigo']))
{
  
  $cod=$_GET['codigo'];
 
}
if(isset($_POST["cargar"]) )
{
	

	$par->add_propietario($_POST['oculto'],$_POST["nombre"], $_POST["calle"], $_POST["barrio"], $_POST["numero"], $_POST["piso"], $_POST["departamento"], $_POST["cod_postal"], $_POST["documento"],$_POST["cod_titular"],$_POST["correo"],$_POST["fax"],$_POST["cuit"] );
}
?>
<html>
<head>
<title>Corralon Carlos Casares</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="js/navbar.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/estilos.css" rel="stylesheet" media="screen">
</head>
<style type="text/css">
label{
  font-weight:bold;
  text-transform: uppercase;
}
</style>
<body style= "background-color: #386745;">
				<?php 

		
				echo $tra->menu1();
		



		?>
		<div class="container contenido">
			<h2>Ingresar Propietario</h2>
			<form name="form" class="form-horizontal" method="post" action="nuevo_propietario.php">
				<input type="hidden" name="oculto" value="<?php echo $cod;  ?>" />
				<div class="control-group">
					<label class="control-label">Nombre</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nombre" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Calle</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="calle" />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Barrio</label>
					<div class="controls">
						<input type="text" name="barrio" class="input-xlarge"  />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Numero</label>
					<div class="controls">
						<input type="text" class="input-small" name="numero"  />
					</div>
				</div>

				<div class="control-group">
				<label class="control-label">Piso</label>
				<div class="controls">
				<input type="text" class="input-small" name="piso" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Departameno</label>
				<div class="controls">
				<input type="text" class="input-small" name="departamento" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Codigo Postal</label>
				<div class="controls">
				<input type="text" class="input-medium" name="cod_postal" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Numero de documento</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="documento" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Codigo Títular</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="cod_titular" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Correo</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="correo" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Fax</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="fax" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Cuit</label>
				<div class="controls">
				<input type="text" class="input-medium" name="cuit" />
				</div>
				</div>


				<div class="control-group">
					<div class="controls">	
						
						<input type="submit" class="btn btn-large btn-primary" value="Ingresar propietario" title="Ingresar propietario" name="cargar" />
					</div>
				</div>
			</form>
		</div>


</body>
</html>
