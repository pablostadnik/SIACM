<?php
error_reporting(E_ALL ^ E_NOTICE);
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
<script type="text/javascript" src="js/navbar.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/estilos.css" rel="stylesheet" media="screen">
<link href="css/estilos4.css" rel="stylesheet" media="screen">
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>
<style type="text/css">
label{
  font-weight:bold;
}
table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;    
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}

.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}




</style>
<body style= "background-color: #386745;">
				<?php 

				echo $tra->menu1();
		

		?>
		<div class="container contenido">
			<h2 style="color:white;">Buscar parcela</h2>
			<form name="form-inline" class="form-horizontal" method="post" action="buscar_partido.php">
				
					<label class="control-label">CODIGO DE PARTIDO</label>
						<div class="controls">
						<input type="text" class="input-small" name="partido" />
						</div>
				
				
					<label class="control-label">Nº DE PARTIDA</label>
						<div class="controls">
						<input type="text" class="input-small" name="partida" />
						</div>
				

				<div class="control-group">
					<div class="controls">	
						<input type="hidden" name="grabar" value="si" />
						<button type="submit" class="btn btn-default" style= "height: 45px; width: 78px;position: relative;left:150px;bottom: 60px;" name="buscar" >BUSCAR</button>
					</div>
				</div>
			</form>
		</div>
		<?php
		if(isset($_POST["buscar"]) )
		{	
			if ($_POST["partido"]=="")
			{
				$parc=$par->ver_parcelas();
			}else{
			$parc=$par->buscar_parcela2($_POST["partido"],$_POST["partida"]);
				 }
		?>
		<div class="container contenido">
		<?php if (!empty($parc)){ ?>
		<table class="bordered" cellspacing="0">
		
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
				<th>Partido</th>
				<th>Partida</th>
				<th>VER</th>
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
					<td valign="top" align="left"><?php echo $parc[$i]["partido"]; ?></td>
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
		else
		echo("No se encontro ningun registro");
		}
		?>
		
</body>
</html>