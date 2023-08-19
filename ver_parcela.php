*<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('MAX_EXECUTION_TIME', -1);
require_once("class/class.php");
require_once("class/parcela.php");
$tra=new Trabajo();
$par=new Parcela();
if (isset($_GET["codigo"])){
$parc=$par->ver_parcela($_GET["codigo"]);

}

?>
<html>
<head>
<title>Municipalidad Carlos Casares</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/estilos.css" rel="stylesheet" media="screen">
<link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'/>
<script type='text/javascript' src='js/script.js'></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/validacion.js"></script>
<script type="text/javascript" src="js/validacion2.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/ajax4.js"></script>
<script type="text/javascript" src="js/mandar_form.js"></script>
<script type="text/javascript" src="js/calcular.js"></script>
<script type="text/javascript" src="js/navbar.js"></script>
</head>

<script type="text/javascript">




</script>
<style type="text/css">
label{
  font-weight:bold;
}
</style>
<body style= "background-color: #386745;">
<style>
.control-group{
	position: relative;
	left:200px;
}
.ui-accordion .ui-accordion-header

{


height: 25px;

font-size: 17px;

}
.ui-accordion .ui-accordion-header:hover

{
background: grey;

font-style: italic;

}

</style>
				<?php 

		
				echo $tra->menu1();
			

		?>
		<div class="container contenido">
			<h2 style="color:white;">Datos Generales</h2>
			<form name="prueba" class="form-horizontal" method="post" style="" onSubmit="return envia_formulario()" >
			<div id="menu" style="width:900px;">
				
				<h1>DATOS PRINCIPALES</h1>
            	<div  id ="activo" class="" align="">
            	
            	
                <div class="control-group">
					<label class="control-label">Codigo de parcela</label>
					<div class="controls">
						<input type="text" class="input-small" name="codigo" id="codi" value="<?php if(isset($parc[0]["codigo"])) { echo $parc[0]["codigo"];}?>" readonly="readonly"/>
					</div>
				</div>
				<div class="control-group" >
					<label class="control-label">Plano de mensura</label>
					<div class="controls">
						<?php
						if (isset($parc[0]["plano"]))
						{
						$primero=substr($parc[0]["plano"],0,2);
						$segundo=substr($parc[0]["plano"],2,2);
						$tercero=substr($parc[0]["plano"],4,3);
						$cuarto=substr($parc[0]["plano"],7,4);

						?>
						<input type="text" class="input-small" name="plano" value="<?php echo $primero;?>" readonly="readonly" style="width:40px;"/>-
						<input type="text" class="input-small" name="plano" value="<?php echo $segundo;?>" readonly="readonly" style="width:40px;" />-
						<input type="text" class="input-small" name="plano" value="<?php echo $tercero;?>" readonly="readonly"  style="width:60px;" />-
						<input type="text" class="input-small" name="plano" value="<?php echo $cuarto;?>" readonly="readonly"  style="width:60px;"/>

						<?php }?>
					</div>
				</div>
				<div class="control-group" >
					<label class="control-label">Partida Inmobiliaria</label>
					<div class="controls">
						<input type="text" class="input-small" name="partida" value="<?php if(isset($parc[0]["partida"])) { echo $parc[0]["partida"];}?>" readonly="readonly"/>
					</div>
				</div>
				<div class="control-group" >
					<label class="control-label">Propietario</label>
					<div class="controls">
						<input type="text" class="input-large" name="propietario" value="<?php if(isset($parc[0]["propietario"])) { echo $parc[0]["propietario"];}?>" readonly="readonly"/>
					</div>
				</div>
				<div class="control-group" >
					<label class="control-label">Contribuyente</label>
					<div class="controls">
						<input type="text" class="input-large" name="plano" value="<?php if(isset($parc[0]["contribuyente"])) { echo $parc[0]["contribuyente"];}?>" readonly="readonly"/>
					</div>
				</div>
				<div class="control-group" >
					<label class="control-label">Poseedor</label>
					<div class="controls">
						<input type="text" class="input-large" name="plano" value="<?php if(isset($parc[0]["poseedor"])) { echo $parc[0]["poseedor"];}?>" readonly="readonly"/>
					</div>
				</div>

				</div>

            <h1>DATOS DOMINALES</h1>
            <div class="" align="">
            	<h5>Designación</h5>
            	
                <div class="control-group">
					<label class="control-label">Fraccion</label>
					<div class="controls">
						<input type="text" class="input-small" name="fraccion" id ="frac" value="<?php if(isset($parc[0]["fraccion"])) { echo $parc[0]["fraccion"];}?>"/>
					</div>
				</div>
				<div class="control-group" >
					<label class="control-label">Chacra</label>
					<div class="controls">
						<input type="text" class="input-small" name="chacra" value="<?php if(isset($parc[0]["chacra"])) { echo $parc[0]["chacra"];}?>"/>
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Quinta</label>
					<div class="controls">
						<input type="text" name="quinta" class="input-small"  value="<?php if(isset($parc[0]["quinta"])) { echo $parc[0]["quinta"];}?>"/>
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Manzana</label>
					<div class="controls">
						<input type="text" class="input-small" name="manzana" value="<?php if(isset($parc[0]["manzana"])) { echo $parc[0]["manzana"]; }?>" />
					</div>
				</div>

				<div class="control-group">
				<label class="control-label">Lote</label>
				<div class="controls">
				<input type="text" class="input-small" name="lote" value="<?php if(isset($parc[0]["lote"])) { echo $parc[0]["lote"];}?>"/>
				</div>
				</div>
				<h5>Medidas longitudinales</h5></br>
				<table align="center">
				<tr>
  				<td><strong>Ubicación</strong></td>
  				<td><strong>Rumbo</strong></td>
 			    <td><strong>Longitud</strong></td>
				</tr>
 				<?php  $medidas=$par->obtener_med_dom($_GET["codigo"]);  
 						//if(count($medidas)>0){
 				?>
				<tr>
  				<td><input type="text" class="input-medium" name="ubicacion[]" value="<?php if(isset($medidas[0]["ubicacion"])) {echo $medidas[0]["ubicacion"]; } ?>" /></td>
  				<td><input type="text" class="input-medium" name="rumbo[]"     value="<?php if(isset($medidas[0]["rumbo"]))  {echo $medidas[0]["rumbo"] ; } ?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud[]"  value="<?php if(isset($medidas[0]["longitud"])) {echo $medidas[0]["longitud"] ; } ?>"/></td>

				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="ubicacion[]"  value="<?php if(isset($medidas[1]["ubicacion"])) {echo $medidas[1]["ubicacion"] ;} ?>" /></td>
  				<td><input type="text" class="input-medium" name="rumbo[]"      value="<?php if(isset($medidas[1]["rumbo"]))  {echo $medidas[1]["rumbo"] ; }?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud[]"   value="<?php if(isset($medidas[1]["longitud"])) {echo $medidas[1]["longitud"] ; }?>"/></td>

				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="ubicacion[]"  value="<?php if(isset($medidas[2]["ubicacion"])) {echo $medidas[2]["ubicacion"] ;} ?>"/></td>
  				<td><input type="text" class="input-medium" name="rumbo[]"      value="<?php if(isset($medidas[2]["rumbo"])) {echo $medidas[2]["rumbo"] ;} ?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud[]"   value="<?php if(isset($medidas[2]["longitud"]))  {echo $medidas[2]["longitud"] ;} ?>"/></td>

				</tr>

				<tr>
  				<td><input type="text" class="input-medium" name="ubicacion[]"  value="<?php if(isset($medidas[3]["ubicacion"])) {echo $medidas[3]["ubicacion"] ;} ?>"/></td>
  				<td><input type="text" class="input-medium" name="rumbo[]"       value="<?php if(isset($medidas[3]["rumbo"])) {echo $medidas[3]["rumbo"] ;} ?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud[]"    value="<?php if(isset($medidas[3]["longitud"])) {echo $medidas[3]["longitud"] ; }?>"/></td>

				</tr>
				<tr>
  				<td><input type="text" class="input-medium" name="ubicacion[]"   value="<?php if(isset($medidas[4]["ubicacion"])) {echo $medidas[4]["ubicacion"] ;} ?>"/></td>
  				<td><input type="text" class="input-medium" name="rumbo[]"      value="<?php if(isset($medidas[4]["rumbo"])) {echo $medidas[4]["rumbo"] ;} ?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud[]"    value="<?php if(isset($medidas[4]["longitud"])) {echo $medidas[4]["longitud"] ;} ?>"/></td>

				</tr>
				</table></br>
				<?php //}  ?>
				<div class="control-group">
				<label class="control-label">Medida Superficial en m2</label>
				<div class="controls">
				<input type="text" class="input-small" name="med_sup" value="<?php if(isset($parc[0]["med_sup"])) { echo $parc[0]["med_sup"];}?>"/>
				</div>

				</div>




				<h5>DATOS DE INSCRIPCIÓN</h5>
				
				<div class="control-group">
				<label class="control-label">Escribano</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="escribano" value="<?php if(isset($parc[0]["escribano"])) { echo $parc[0]["escribano"];}?>" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Tipo</label>
				<div class="controls">
				<input type="text" class="input-medium" name="tipo" value="<?php if(isset($parc[0]["tipo"])) { echo $parc[0]["tipo"];}?>"/>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">N°</label>
				<div class="controls">
				<input type="text" class="input-small" name="num_i" value="<?php if(isset($parc[0]["num_i"])) { echo $parc[0]["num_i"];}?>"/>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Serie</label>
				<div class="controls">
				<input type="text" class="input-small" name="serie" value="<?php if(isset($parc[0]["serie"])) { echo $parc[0]["serie"];}?>"/>
				</div>

				</div>
				<div class="control-group">
				<label class="control-label">Año</label>
				<div class="controls">
				<input type="text" class="input-small" name="año" value="<?php if(isset($parc[0]["año"])) { echo $parc[0]["año"];}?>"/>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Apellido/Nombre</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="apellido" value="<?php  if(isset($parc[0]["propietario"])) { echo $parc[0]["propietario"];}?>"/>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">DNI</label>
				<div class="controls">
				<input type="text" class="input-medium" name="dni" value="<?php if(isset($parc[0]["dni"])) { echo $parc[0]["dni"]; }?>"/>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">CUIT</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="cuit" value="<?php if(isset($parc[0]["cuit"])) { echo $parc[0]["cuit"]; }?>"/>
				</div>
				</div>
				




				<input type="submit" value="MODIFICAR" name="dom"  class="btn btn-default" style="height:40px;">


          	</div>
            <?php
            if (isset($_POST["dom"])){
            if ($_POST["dom"])
            {
            	$par->cargar_medidas1($_POST['ubicacion'],$_POST['rumbo'],$_POST['longitud'],$_GET["codigo"]);

            	$par->cargar_dominales($_GET["codigo"],$_POST["fraccion"],$_POST["chacra"],$_POST["quinta"],$_POST["manzana"],$_POST["lote"],$_POST["med_sup"],$_POST["escribano"],$_POST["tipo"],$_POST["num_i"],$_POST["serie"],$_POST["año"],$_POST["apellido"],$_POST["dni"],$_POST["cuit"]);
            }
        	}
            ?>
            


             


				
            <h1>DATOS CATASTRALES</h1>
			<div class="peter">
				<h5>Partida Inmobiliaria</h5>
				<div class="control-group">
					<label class="control-label">Partida Inm.</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="partida" value="<?php echo $parc[0]["partida"];?>"/>
					</div>
				</div>
                <div class="control-group">
					<label class="control-label">Circ.</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="circunscripcion" value="<?php echo $parc[0]["circunscripcion"];?>"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Sección</label>
					<div class="controls">
						<input type="text" class="input-small" name="seccion" value="<?php echo $parc[0]["seccion"];?>"/>
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Chacra</label>
					<div class="controls">
						<input type="text" name="chacra_num" class="input-small"  value="<?php echo $parc[0]["chacra_num"];?>"/>
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Quinta</label>
					<div class="controls">
						<input type="text" class="input-small" name="quinta_let"  value="<?php echo $parc[0]["quinta_let"];?>"/>
					</div>
				</div>

				<div class="control-group">
				<label class="control-label">Fracción</label>
				<div class="controls">
				<input type="text" class="input-small" name="fraccion_let" value="<?php echo $parc[0]["fraccion_let"]; ?>"	/>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Manzana</label>
				<div class="controls">
				<input type="text" class="input-small" name="manzana_let" value="<?php echo $parc[0]["manzana_let"];?>" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Parcela</label>
				<div class="controls">
				<input type="text" class="input-small" name="parcela_let" value="<?php echo $parc[0]["parcela_let"];?>"/>
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Subparcela</label>
				<div class="controls">
				<input type="text" class="input-small" name="subparcela" value="<?php echo $parc[0]["subparcela"];?>"/>
				</div>
				</div>

				<h5>Medidas longitudinales</h5></br>
				<table style=" position: relative; left: 75px; ">
				<tr>
  				<td><strong>Ubicación</strong></td>
  				<td><strong>Rumbo</strong></td>
 			    <td><strong>Longitud</strong></td>
 			    <td><strong>Lindero</strong></td>
 			   
				</tr>
 				<?php   $medidas2 = $par->obtener_medidas2($_GET["codigo"]); 
 						$importacion = $par->obtener_importacion($_GET["codigo"]); 
 						//if(count($medidas2)>0){
 				?>
				<tr>
  				<td><input type="text" class="input-medium" name="ubicacion2[]" value="FRENTE 1"/></td>
  				<td><input type="text" class="input-medium" name="rumbo2[]"   value="<?php if(isset($medidas2[0]["rumbo"])) { echo $medidas2[0]["rumbo"]; }?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud2[]" id="long2_1" value="<?php if(isset($medidas2[0]["longitud"])) { echo $medidas2[0]["longitud"]; }?>"/></td>
  				<td><input type="text" class="input-medium" name="lindero[]" value="<?php if(isset($medidas2[0]["lindero"])) { echo $medidas2[0]["lindero"]; }?>"/></td>
  							
				</tr>
 				
				<tr>
  				<td><input type="text" class="input-medium" name="ubicacion2[]" value="FRENTE 2"/></td>
  				<td><input type="text" class="input-medium" name="rumbo2[]" value="<?php if(isset($medidas2[1]["rumbo"])) { echo $medidas2[1]["rumbo"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud2[]" id="long2_2" value="<?php if(isset($medidas2[1]["longitud"])) { echo $medidas2[1]["longitud"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="lindero[]" value="<?php if(isset($medidas2[1]["lindero"])) { echo $medidas2[1]["lindero"];}?>"/></td>
  				
				</tr>
 				
				<tr>
  				<td><input type="text" class="input-medium" name="ubicacion2[]" value="FRENTE 3"/></td>
  				<td><input type="text" class="input-medium" name="rumbo2[]"     value="<?php if(isset($medidas2[2]["rumbo"])) { echo $medidas2[2]["rumbo"];}?>" /></td>
  				<td><input type="text" class="input-medium" name="longitud2[]" id="long2_3" value="<?php if(isset($medidas2[2]["longitud"])) { echo $medidas2[2]["longitud"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="lindero[]"   value="<?php if(isset($medidas2[2]["lindero"])) { echo $medidas2[2]["lindero"];}?>"/></td>
  				
				</tr>

				<tr>
  				<td><input type="text" class="input-medium" name="ubicacion2[]" value="FRENTE 4"/></td>
  				<td><input type="text" class="input-medium" name="rumbo2[]"    value="<?php if(isset($medidas2[3]["rumbo"])) { echo $medidas2[3]["rumbo"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud2[]" id="long2_4" value="<?php if(isset($medidas2[3]["longitud"])) { echo $medidas2[3]["longitud"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="lindero[]"   value="<?php if(isset($medidas2[3]["lindero"])) { echo $medidas2[3]["lindero"];}?>"/></td>
  				
				</tr>
				<tr> <?php  	//por ahora este ultimo no va nada, no deberia traer nada	?>
  				<td><input type="text" class="input-medium" name="ubicacion2[]" disabled  value="<?php //if(isset($medidas2[4]["rumbo"])) { echo $medidas2[4]["rumbo"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="rumbo2[]"      disabled value=""/></td>
  				<td><input type="text" class="input-medium" name="longitud2[]"  disabled id="long2_5"  value=""/></td>
  				<td><input type="text" class="input-medium" name="lindero[]"     disabled value=""/></td>
  				
				</tr>
				<?php  	//}	?>
				</table></br>
				<h5>Coordenadas geográficas</h5><h6 style="position:relative;left:20px; color: gray;">La latitud y la longitud, debe ser expresada de la siguiente forma ej: 54°32'10" </h6></br>
				<table style=" position: relative; left: 75px; ">
				<tr>
  				<td><strong>Vertice</strong></td>
  				<td><strong>Latitud</strong></td>
 			    <td><strong>Longitud</strong></td>
 			   
 			   
				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="vertice[]" value="<?php if(isset($medidas2[0]["vertice"])) { echo $medidas2[0]["vertice"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="latitud[]" id="lat1"  value="<?php if(isset($medidas2[0]["latitud"])) {echo $medidas2[0]["latitud"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud_cat[]" id="longcat1"  value="<?php if(isset($medidas2[0]["longitud2"])) {echo $medidas2[0]["longitud2"];}?>"/></td>
  				<td><button class="lsb" value=""  name="sat1" type="submit" style="font-size: 0.9em;position:relative;left:15px;"/>Ver Imagen</button></td>
  				
				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="vertice[]"  value="<?php if(isset($medidas2[1]["vertice"])) {echo $medidas2[1]["vertice"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="latitud[]" id="lat2"  value="<?php if(isset($medidas2[1]["latitud"])) {echo $medidas2[1]["latitud"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud_cat[]"  id="longcat2"  value="<?php if(isset($medidas2[1]["longitud2"])) {echo $medidas2[1]["longitud2"];}?>"/></td>
  				
  				
				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="vertice[]" value="<?php if(isset($medidas2[2]["vertice"])) {echo $medidas2[2]["vertice"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="latitud[]" id="lat3"  value="<?php if(isset($medidas2[2]["latitud"])) {echo $medidas2[2]["latitud"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud_cat[]" id="longcat3"  value="<?php if(isset($medidas2[2]["longitud2"])) {echo $medidas2[2]["longitud2"];}?>"/></td>
  				
  				
				</tr>

				<tr>
  				<td><input type="text" class="input-medium" name="vertice[]" value="<?php if(isset($medidas2[3]["vertice"])) {echo $medidas2[3]["vertice"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="latitud[]" id="lat4" value="<?php if(isset($medidas2[3]["latitud"])) {echo $medidas2[3]["latitud"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud_cat[]" id="longcat4" value="<?php if(isset($medidas2[3]["longitud2"])) {echo $medidas2[3]["longitud2"];}?>"/></td>
  				
  				
				</tr>
				<tr>
  				<td><input type="text" class="input-medium" name="vertice[]" disabled value="<?php if(isset($medidas2[4]["vertice"])) {echo $medidas2[4]["vertice"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="latitud[]" disabled id="lat5" value="<?php if(isset($medidas2[4]["latitud"])) {echo $medidas2[4]["latitud"];}?>"/></td>
  				<td><input type="text" class="input-medium" name="longitud_cat[]" disabled id="longcat5" value="<?php if(isset($medidas2[4]["longitud2"])) {echo $medidas2[4]["longitud2"];}?>"/></td>
  				
  				
				</tr>
				</table>
				<?php 
				if (isset($_POST["sat1"]))
				{
						ob_start();
						$latitud =$_POST['latitud'];
						$longitud =$_POST['longitud_cat'];
						//header ("Location: https://www.google.com.ar/maps/place/".$latitud[0]."S+".$longitud[0]."W/@-34.9117151,-57.9004084,12021m/data=!3m2!1e3!4b1!4m2!3m1!1s0x0:0x0?hl=en"); esta linea no me funcionaba, por eso me tiraba el error
						echo "<script> location.href=\"https://www.google.com.ar/maps/place/".$latitud[0]."S+".$longitud[0]."W/@-34.9117151,-57.9004084,12021m/data=!3m2!1e3!4b1!4m2!3m1!1s0x0:0x0?hl=en\" </script>";
				}
				?></br>
					<div class="control-group">
				<label class="control-label">Superficie</label>
				<div class="controls">
				<input type="text" class="input-small" name="superficie" value="<?php if(isset($parc[0]["superficie"])) { echo $parc[0]["superficie"]; }?>"/>   m2
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Superficie edificada</label>
				<div class="controls">
				<input type="text" class="input-small" name="sup_edif" value="<?php if(isset($parc[0]["sup_edif"])) { echo $parc[0]["sup_edif"]; }?>"/>   m2
				</div>
				</div>
				
				<h5 style="
    			position: relative;
  				  left: 1px;
				">Planos de mensura</h5>
				<?php 	$planos=$par->ver_planos($_GET["codigo"]);		?> 		
				<div class="controls" style="
    			position: relative;
    			right: 100px;">
				<input type="text" class="input-medium" name="plano1" value="<?php if(isset($planos[0]["numero"])) { echo $planos[0]["numero"];}?>"/> 
				<input type="text" class="input-medium" name="plano2" value="<?php if(isset($planos[1]["numero"])) { echo $planos[1]["numero"];}?>"/> 
				<input type="text" class="input-medium" name="plano3" value="<?php if(isset($planos[2]["numero"])) { echo $planos[2]["numero"];}?>"/> 
				<input type="text" class="input-medium" name="plano4" value="<?php if(isset($planos[3]["numero"])) { echo $planos[3]["numero"];}?>"/> 
				<input type="text" class="input-medium" name="plano5" value="<?php if(isset($planos[4]["numero"])) { echo $planos[4]["numero"];}?>"/> 
				</div>
				</br></br>
				<h5 style=" position: relative;
    
    					bottom: 35px;
    
								">Restricciones y afectaciones</h5>
				<?php  $exp=$par->ver_restricciones($_GET["codigo"]) ;   ?>
				<label class="control-label" style="position: relative; top: bottom; bottom: 37px;right: 32px;">Expediente/Plano</label>
				</br></br>
				<input type="text" class="input-medium" name="exp1" value="<?php if(isset($exp[0]["num_exp"])) {echo $exp[0]["num_exp"];}?>" style="position: relative; bottom: 85px;"/> 
				<textarea name="obs1" rows="10" cols="50" style="/* float:right; */height: 120px;width: 550px;position: relative;left: 30px;bottom: 40px;"><?php if(isset($exp[0]["comentario"])) {echo $exp[0]["comentario"];}?></textarea>
				</br></br>
				
				<input type="text" class="input-medium" name="exp2" value="<?php if(isset($exp[1]["num_exp"])) {echo $exp[1]["num_exp"];}?>" style=" position: relative; bottom: 80px; "/> 
				<textarea name="obs2" rows="10" cols="50" style="/* float:right; */height: 120px;width: 550px;position: relative;left: 32px;bottom: 33px;"><?php if(isset($exp[1]["comentario"])) { echo $exp[1]["comentario"];}?></textarea>
				</br></br>
				
				<input type="text" class="input-medium" name="exp3" value="<?php if(isset($exp[2]["num_exp"])) {echo $exp[2]["num_exp"];}?>" style=" position: relative; bottom: 80px; right: 0px;"/> 
				<textarea name="obs3" rows="10" cols="50" style="/* float:right; */height: 120px;width: 550px;position: relative; left: 32px; bottom: 33px;right: 43px;"><?php if(isset($exp[2]["comentario"])) {echo $exp[2]["comentario"];}?></textarea>
				
				<input type="submit" value="MODIFICAR" name="cat" style="position: relative;top: 120px;float: left;height:40px;" class="btn btn-default"  >

            </div>
            <?php
            if (isset($_POST["cat"])){
            if ($_POST["cat"] )
            {
            	$par->cargar_restricciones($_GET["codigo"],$_POST["exp1"],$_POST["exp2"],$_POST["exp3"],$_POST["obs1"],$_POST["obs2"],$_POST["obs3"]);
            	$par->cargar_planos($_GET["codigo"],$_POST["plano1"],$_POST["plano2"],$_POST["plano3"],$_POST["plano4"],$_POST["plano5"]);
            	$par->cargar_medidas2($_GET["codigo"],$_POST['ubicacion2'],$_POST['rumbo2'],$_POST['longitud2'],$_POST['lindero'],$_POST["vertice"],$_POST["latitud"],$_POST["longitud_cat"]);
            	$par->cargar_catastrales($_GET["codigo"],$_POST["partida"],$_POST["circunscripcion"],$_POST["seccion"],$_POST["chacra_num"],$_POST["quinta_let"],$_POST["fraccion_let"],$_POST["manzana_let"],$_POST["parcela_let"],$_POST["subparcela"],$_POST["superficie"],$_POST["sup_edif"],$_POST["antecedentes"],$_POST["expediente"]);
            }
        	}
            ?>
           
        	
        	</form>

           

            <h1>DATOS DE ZONIFICACIÓN</h1>
            <form name="zona" class="form-horizontal" method="post" style=""  >
          
            <div id="pepe" class="" style=" ">
            	<?php   
            	if(isset($parc[0]["zona"])) {
            		
            		$area=$parc[0]["zona"];?>
								Modificar zona<select name="select2" onchange="" style="position:relative;left:20px;">
 						 		<?php
								$zon= $tra->get_zonas();
								for ($i=0;$i<sizeof($zon);$i++) { 
								?>
								<option value="<?php  echo $zon[$i]['area'];?>"><?php  echo $zon[$i]['area'];  ?></option>
									<?php   }	?>	
								</select>
							
								<input type="submit" value="Modificar" name="modificar" style="position:relative;left:25px;">
								 <?php   
								$zona=$par->obtener_zona($area);	
								$par ->ver_zona($zona);
								}else{		
        		?>
               <div class="control-group">
					<label class="control-label">Seleccione el codigo de zona</label>
					<div class="controls">
						 
						<select name="select" >
 						 <?php
						$zon= $tra->get_zonas(); 
						for ($i=0;$i<sizeof($zon);$i++) { 
						?>		
						<option value=""><?php  if(isset($zon[$i]["area"])) { echo $zon[$i]["area"];  }?></option>	
								<?php					}	?>			
						</select>
								
					</div>
				</div>
				
				<input type="submit" value="CARGAR" name="carzona" class="btn btn-default" style="height:40px;">
				<?php    
										}
						if (isset($_POST["modificar"])){
									$par->modificar_parcela2($_GET["codigo"],$_POST["select2"]);
								}
				?>


						<?php
							if (isset($_POST["carzona"])){
									
									$par->modificar_parcela2($_GET["codigo"],$_POST["select"]);
								}

								

							

						 ?>

				</div>
        	</form>


            <h1>ESTADO CONSTRUCTIVO</h1>
            <div class="" >
            	<form name="formulario" class="form-horizontal" method="post" style="" action="ver_parcela.php?codigo=<?php  echo $parc[0]["codigo"];  ?>&propietario=<?php  echo $parc[0]["propietario"];  ?>" id="form" enctype="multipart/form-data" >
               <div class="control-group">
					<label class="control-label">N° de expediente</label>
					<div class="controls">
						<input type="text" class="input-small" name="num_exp" id="num_e" value=""  />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Letra</label>
					<div class="controls">
						<input type="text" class="input-small" name="letra" id="let_e" value="" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Año</label>
					<div class="controls">
						<input type="text" class="input-small" name="anio" id="anio_e"  value=""/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Tipo de obra</label>
					<div class="controls">
						<input type="text" class="input-medium" name="tipo_o" id="tipo_e" value=""/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Existente</label>
					<div class="controls">
						<input type="text" class="input-small" name="existente" id="exis_e" value=""/> m2
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">A demoler</label>
					<div class="controls">
						<input type="text" class="input-small" name="demoler" id="demo_e" value="" /> m2
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">A construir</label>
					<div class="controls">
						<input type="text" class="input-small" name="construir" id="cons_e" value=""/> m2
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">A empadronar</label>
					

					</label>
					<div class="controls">
						<input type="text" class="input-small" name="empadronar" id="emp_e" value=""/> m2
					</div>
				</div>
				<label class="control-label" style="position:relative;left:200px;">Seleccione un archivo</label><input type="file" name="archivo" id="archivo" style="position:relative; left:215px;" ></br></br>

				<input type="submit" value="Cargar" name="cons"  class="btn btn-default" style="height:40px;">
				<?php
				if (isset($_POST['cons']))
            	{
            	$par->cargar_exp($_GET["codigo"],$_POST['num_exp'],$_POST['letra'],$_POST['anio'],$_POST['tipo_o'],$_POST['existente'],$_POST['demoler'],$_POST['construir'],$_POST['empadronar']);
				if ($_FILES['archivo']["error"] > 0)
  				{	
  				echo "Error de archivo: " . $_FILES['archivo']['error'] . "<br>";
  				}	
				else
			   		{			
  				//echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
			    //echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
			    //echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
			    //echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
				move_uploaded_file($_FILES['archivo']['tmp_name'],
				"archivos/" . $_FILES['archivo']['name']);
				
				$tra->add_archivo($_FILES['archivo']['name'],$_POST["num_exp"],$_GET["codigo"]);
					}

    			}
				//if ($_POST["cons"])
            	//{
            	//	$par->cargar_constructivos($_GET["codigo"],$_POST["num_exp"],$_POST["letra"],$_POST["anio"],$_POST["tipo_o"],$_POST["existente"],$_POST["demoler"],$_POST["construir"],$_POST["empadronar"]);
            	//
                ?>
                
				<div id="resultado" style="">
				</div>
				<div id="resultado2" style="">
				 <?php  
				 	
				 $par->expedientes($_GET["codigo"]); ?>
				 <?php  
				 $calc=$par->obtener_calculo($_GET["codigo"]);

				

				 		 
				 		$par->ver_tablaobra($calc); 
				 
				  
				 if (isset($_POST['actualizar']))
            		{
            			$par->actualizar_tabla();
            		}

				 ?>
				
				<input type="submit" value="Actualizar tabla" name="actualizar" id="actu" class="btn btn-default" style="position:relative;height:40px;top: 40px;">
				 </div>

				</form>

            </div>

    		
          	
          
          	</div>
  
          	</div>
     
   		

</body>
</html>
