e<?php
require_once("class/class.php");

$tra=new Trabajo();

?>
<html>
<head>
<title>Corralon Carlos Casares</title>
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
			<h2>Casa Pichetto</h2>
			<form name="form" class="form-horizontal" method="post">
				Buscar por:
				<select name="op">
					<option value="dni">CUIT</option>
					<option value="nombre">Nombre</option>
					<option value="apellido">Apellido</option>
				</select>
				<input type="text" name="valor" />
				<input type="hidden" name="grabar" value="si" />
				<input type="button" value="Buscar" title="Buscar" class="btn btn-large btn-primary" onClick="validar_buscar();" />
			</form>
		</div>
</body>
</html>

<?php
if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
	$emp=$tra->buscar_cliente($_POST["op"], $_POST["valor"]);
	?>
	<div class="container contenido">
	<?php if (!empty($emp)){ ?>
	<table class="table table-bordered table-hover" cellspacing="0">
		
			<tr valign="top" align="center">
				<th>CUIT</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th></th>
			</tr>
			<?php 
			for ($i=0;$i<sizeof($emp);$i++){ ?>
				<tr valign="top" align="center">
					<td valign="top" align="left"><?php echo $emp[$i]["cuit"]; ?></td>
					<td valign="top" align="left"><?php echo $emp[$i]["nombre"]; ?></td>
					<td valign="top" align="left"><?php echo $emp[$i]["apellido"]; ?></td>
					<td valign="top" align="center" width="25">
						<a href="modificar_cliente2.php?id_cliente=<?php echo $emp[$i]["id_cliente"];?>"><img src="img/editar.png"></img></a>
					</td>
				</tr>
			<?php 
			} 
			?>
		
	</table>
	<?php 
	}
	else
		echo("No se encontro ningun registro");
	?>
	</div>
<?php
}

?>