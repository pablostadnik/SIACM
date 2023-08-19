<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("class/class.php");
require_once("class/parcela.php");
$tra=new Trabajo();
$par=new Parcela();
if (isset($_GET['codigo']))
{
  
  $cod=$_GET['codigo'];
  
}


if(isset($_POST["agregar"]) )
		{	 
			 $cod=$_POST['oculto'];
			 header ("Location: nuevo_propietario.php?codigo=$cod"); 
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
 <script src="js/jquery-1.11.1.min"></script>
 <script type="text/javascript" src="js/navbar.js"></script>
<script>

  // $('#tabla1').fadeOut();
 
</script>
</head>
<style type="text/css">
label{
  font-weight:bold;
  text-transform: uppercase;
}
td{
	text-transform: uppercase;
}
</style>
<body style= "background-color: #386745;">
				<?php 

				echo $tra->menu1();
		

		?>
		<div class="container contenido">
			<h2>Buscar propietario</h2>
			<form name="form-inline" class="form-horizontal" method="post" action="agregar_propietario.php">
				 <input type="hidden" name="oculto" value="<?php if(isset($cod) ) {echo $cod;  }?>" /> 
				<div class="control-group">
					<label class="control-label" style="  width: 220px;position: relative;right: 20px;">Ingrese Nombre y Apellido</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nombre" />
					</div>
				</div>
			
				<div class="control-group">
					<div class="controls">	
						<input type="hidden" name="grabar" value="si" />
						<button type="submit" class="btn btn-default" style= "height: 45px; width: 78px;position: relative;left: 350px;bottom: 62px;" name="buscar" id="boton">Buscar</button>
					</div>
				</div>
			
		</div>
		<?php
		
				
		
			
		

	

		if(isset($_POST["buscar"]) )
		{	
			if ($_POST["nombre"]=="")
			{
				$prop=$par->ver_propietarios();
			}else{
			$prop=$par->buscar_propietario($_POST["nombre"]);
				 }
		?>
		<div class="container contenido">
		<?php if (!empty($prop)){ ?>
		<table class="table table-bordered table-hover" cellspacing="0" id = "tabla2"style ="width:800px;">
		
			<tr valign="top" align="center" >
				<th>Id_Codigo</th>
				<th>Nombre</th>
				
			</tr>
			<?php 
			if (isset($_POST['oculto']))
			{
  
  			$cod=$_POST['oculto'];
  
			}
			
			for ($i=0;$i<sizeof($prop);$i++){ ?>
				<tr valign="top" align="center">
					<td valign="top" align="left"><?php if(isset($_POST["id_propietario"]) ) { echo $prop[$i]["id_propietario"]; }?></td>
					<td valign="top" align="left"><?php if(isset($_POST["nombre"]) ) { echo $prop[$i]["nombre"]; }?></td>
					
					<td valign="top" align="center" width="25">
						<a href="cargar_parcela.php?nombre=<?php echo $prop[$i]["nombre"];?>&codigo=<?php if(isset($cod) ) {echo $cod; }?>"><img src="img/aprobar.png"></img></a>
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
		}
		?>
		<button type="submit" class="btn btn-default" style= "height: 35px; width: 78px;position: relative;top:70px;margin-left: 400px;" name="agregar" >Agregar</button>
		</form>
</body>
</html>