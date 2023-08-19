<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
require_once("class/class.php");
require_once("class/parcela.php");
$tra=new Trabajo();
$par=new Parcela();

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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/navbar.js"></script>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
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
		
				$i=0;
		?>
		<div class="container contenido">
			<h2 style="color:white;">Buscar parcela</h2>

			<form name="form" class="form-inline" method="post" action="buscar_nomenclatura.php">
		<div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:800px; padding:10px;position:relative;right:60px; " >
		<table style="">
				<tr>
		<td><label >Codigo de Parcela</label></td><td><input type="text" class="input-small" placeholder="Cod." id="codigo" value="<?php if(isset($parc[$i]["codigo"])) { echo $parc[$i]["codigo"]; }?>" name="codigo"  ></td>
  		<td><label >Plano de mensura</label></td><td><input type="text" class="input-small" placeholder="Plano" value="<?php if(isset($parc[$i]["plano"])) { echo $parc[$i]["plano"]; }?>" name="plano" ></td>
  		<td><label >Partida Inmobiliaria</label></td><td><input type="text" class="input-small" placeholder="Partida" value="<?php if(isset($parc[$i]["partida"])) { echo $parc[$i]["partida"]; }?>" name="partida" ></td>
  				</tr>
  				<tr>
  		<td><label >Circuncripción</label></td><td><input type="text" class="input-small" placeholder="Circ." value="<?php if(isset($parc[$i]["circunscripcion"])) { echo $parc[$i]["circunscripcion"]; }?>"  name="circ" ></td>
  		<td><label >Sección</label></td><td><input type="text" class="input-small" placeholder="Sec." value="<?php if(isset($parc[$i]["seccion"])) { echo $parc[$i]["seccion"]; }?>" name="sec" ></td>
  		<td><label >Chacra</label></td><td><input type="text" class="input-small" placeholder="Chac." value="<?php if(isset($parc[$i]["chacra"])) { echo $parc[$i]["chacra"]; }?>" name="chacra" ></td>
  				</tr>
  				<tr>
  		<td><label >Quinta</label></td><td><input type="text" class="input-small" placeholder="Quint." value="<?php if(isset($parc[$i]["quinta_let"])) { echo $parc[$i]["quinta_let"]; }?>"  name="quinta" ></td>	<td><label >Fracción</label></td><td><input type="text" class="input-small" placeholder="Fracc." value="<?php if(isset($parc[$i]["quinta_let"])) { echo $parc[$i]["fraccion"]; }?>" name="fraccion"  ></td>
  				</tr>
  				<tr>
  		<td><label >Manzana</label></td><td><input type="text" class="input-small" placeholder="Manz." value="<?php if(isset($parc[$i]["manzana"])) { echo $parc[$i]["manzana"]; }?>" name="manzana" ></td>
  		<td><label >Parcela</label></td>

  		<td><input type="text" class="input-small" placeholder="Parc." value="<?php if(isset($parc[$i]["fos"])) { echo $parc[$i]["parcela_let"]; }?>" name="parcela"  >
  		<td><label >Subparcela</label><td><input type="text" class="input-small" placeholder="Subparc." value="<?php if(isset($parc[$i]["fos"])) { echo $parc[$i]["subparcela"]; }?>" name="subparc" ></td>
  				</tr>
  			</table>
  		</div>
  			</br></br>
				<div class="control-group">
					<div class="controls">	
						<input type="hidden" name="grabar" value="si" />
						<button type="submit" class="btn btn-default" style= "height: 45px; width: 78px;position: relative;" name="buscar" >BUSCAR</button>
					</div>
				</div>
			</form>
		</div>
		<?php
		if(isset($_POST["buscar"]) )
		{	
			 $valores=array();
			if ($_POST["codigo"]!="")
			{
				$valores[]="codigo";
				$valores[]= $_POST["codigo"];
			} 
			if ($_POST["plano"]!="")
			{
				$valores[]="plano";
				$valores[]= $_POST["plano"];
			} 
			if ($_POST["partida"]!="")
			{
				$valores[]="partida";
				$valores[]=$_POST["partida"] ;
			} 
			if ($_POST["circ"]!="")
			{
				$valores[]="circunscripcion";
				$valores[]= $_POST["circ"];
			} 
			if ($_POST["sec"]!="")
			{
				$valores[]="seccion";
				$valores[]= $_POST["sec"];
			} 
			if ($_POST["chacra"]!="")
			{
				$valores[]="chacra_num";
				$valores[]=$_POST["chacra"] ;
			} 
			if ($_POST["quinta"]!="")
			{
				$valores[]="quinta_let";
				$valores[]=$_POST["quinta"] ;
			} 
			if ($_POST["manzana"]!="")
			{
				$valores[]="manzana_let";
				$valores[]=$_POST["manzana"] ;
			} 
			if ($_POST["parcela"]!="")
			{
				$valores[]="parcela_let";
				$valores[]=$_POST["parcela"] ;
			} 
			if ($_POST["fraccion"]!="")
			{
				$valores[]="fraccion_let";
				$valores[]=$_POST["fraccion"] ;
			} 
			if ($_POST["subparc"]!="")
			{
				$valores[]="subparcela";
				$valores[]=$_POST["subparc"] ;
			} 
			$parc = $par -> obtener_registros($valores); 
			

		?>
		<div class="container contenido">
		<?php if (!empty($parc)){ ?>
		<table class="table table-bordered table-hover" cellspacing="0">
		
			<tr valign="top" align="center">
				<th>Codigo de Parcela</th>
				<th>Circunscripción</th>
				<th>Sección</th>
				<th>Chacra</th>
				<th>Quinta</th>
				<th>Fracción</th>
				<th>Manzana</th>
				<th>Parcela</th>
				<th>SubParcela</th>
				<th>Partida</th>
			</tr>
			<?php 
			for ($i=0;$i<sizeof($parc);$i++){ ?>
				<tr valign="top" align="center">
					<td valign="top" align="left"><?php echo $parc[$i]["codigo"]; ?></td>
					<td valign="top" align="left"><?php echo $parc[$i]["circunscripcion"]; ?></td>
					<td valign="top" align="left"><?php echo $parc[$i]["seccion"]; ?></td>
					<td valign="top" align="left"><?php echo $parc[$i]["chacra_num"]; ?></td>
					<td valign="top" align="left"><?php echo $parc[$i]["quinta_let"]; ?></td>
					<td valign="top" align="left"><?php echo $parc[$i]["fraccion_let"]; ?></td>
					<td valign="top" align="left"><?php echo $parc[$i]["manzana_let"]; ?></td>
					<td valign="top" align="left"><?php echo $parc[$i]["parcela_let"]; ?></td>
					<td valign="top" align="left"><?php echo $parc[$i]["subparcela"]; ?></td>
					<td valign="top" align="left"><?php echo $parc[$i]["partida"]; ?></td>
					<td valign="top" align="center" width="25">
						<a href="cargar_parcela.php?codigo=<?php echo $parc[$i]["codigo"];?>"><img src="img/lupa.png"></img></a>
					</td>
				</tr>
			<?php 
			} 
			?>
		
		</table>
		<?php 
		}
		else{
		echo("No se encontro ningun registro");
		}
	}
		?>

</body>
</html>
