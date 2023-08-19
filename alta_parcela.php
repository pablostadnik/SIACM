<?php
require_once("class/class.php");

$tra=new Trabajo();

if(isset($_POST["grabar"]) and $_POST["grabar"]=="si")
{
	
	$tra->add_dominales($_POST["numero"], $_POST["funcionario"], $_POST["inscripcion"], $_POST["tipo"], $_POST["localidad"], $_POST["anio"]);
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
<script type="text/javascript" src="js/navbar.js"></script>
</head>
<body>
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
			<h2>Ingresar Partida Inmobiliaria</h2>
			<form name="form" class="form-horizontal" method="post" style="" >
			<div id="menu" style="width:900px;">
            <h1>Datos Dominales</h1>
            <div align="">
            	<h5>Designación</h5>
            	
                <div class="control-group">
					<label class="control-label">Fraccion</label>
					<div class="controls">
						<input type="text" class="input-small" name="fraccion" />
					</div>
				</div>
				<div class="control-group" >
					<label class="control-label">Chacra</label>
					<div class="controls">
						<input type="text" class="input-small" name="chacra" />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Quinta</label>
					<div class="controls">
						<input type="text" name="quinta" class="input-small"  />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Manzana</label>
					<div class="controls">
						<input type="text" class="input-small" name="manzana"  />
					</div>
				</div>

				<div class="control-group">
				<label class="control-label">Lote</label>
				<div class="controls">
				<input type="text" class="input-small" name="lote" />
				</div>
				</div>
				<h5>Medidas longitudinales</h5></br>
				<table align="center">
				<tr>
  				<td><strong>Ubicación</strong></td>
  				<td><strong>Rumbo</strong></td>
 			    <td><strong>Longitud</strong></td>
				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>

				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>

				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>

				</tr>

				<tr>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>

				</tr>
				<tr>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>

				</tr>
				</table></br>

				<div class="control-group">
				<label class="control-label">Medida Superficial en m2</label>
				<div class="controls">
				<input type="text" class="input-small" name="med_sup" />
				</div>
				</div>
				<h5>Datos de inscripción</h5>
				<div class="control-group">
				<label class="control-label">Escribano</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="escribano" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Tipo</label>
				<div class="controls">
				<input type="text" class="input-medium" name="tipo" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">N°</label>
				<div class="controls">
				<input type="text" class="input-small" name="num_i" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Serie</label>
				<div class="controls">
				<input type="text" class="input-small" name="serie" />
				</div>

				</div>
				<div class="control-group">
				<label class="control-label">Año</label>
				<div class="controls">
				<input type="text" class="input-small" name="lote" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Apellido/Nombre</label>
				<div class="controls">
				<input type="text" class="input-small" name="lote" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">DNI</label>
				<div class="controls">
				<input type="text" class="input-medium" name="dni" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">CUIT</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="cuit" />
				</div>
				</div>
            </div>
            <h3>Datos Catastrales</h3>
			<div>
				<h5>Partida Inmobiliaria</h5>
                <div class="control-group">
					<label class="control-label">Circ.</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="circ" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Sección</label>
					<div class="controls">
						<input type="text" class="input-small" name="seccion" />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Chacra</label>
					<div class="controls">
						<input type="text" name="chacra" class="input-small"  />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Quinta</label>
					<div class="controls">
						<input type="text" class="input-small" name="quinta"  />
					</div>
				</div>

				<div class="control-group">
				<label class="control-label">Fracción</label>
				<div class="controls">
				<input type="text" class="input-small" name="fraccion" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Manzana</label>
				<div class="controls">
				<input type="text" class="input-small" name="manzana" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Parcela</label>
				<div class="controls">
				<input type="text" class="input-small" name="parcela" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Subparcela</label>
				<div class="controls">
				<input type="text" class="input-small" name="subparcela" />
				</div>
				</div>

				<h5>Medidas Longitudunales y Coordenadas Geográficas</h5></br>
				<table>
				<tr>
  				<td><strong>Ubicación</strong></td>
  				<td><strong>Rumbo</strong></td>
 			    <td><strong>Longitud</strong></td>
 			    <td><strong>Vertice</strong></td>
 			    <td><strong>Latitud</strong></td>
 			    <td><strong>Longitud</strong></td>
				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-small" name="medidas[]" /></td>
  				<td><input type="text" class="input-small" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-small" name="medidas[]" /></td>
  				<td><input type="text" class="input-small" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
				</tr>
 
				<tr>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-small" name="medidas[]" /></td>
  				<td><input type="text" class="input-small" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
				</tr>

				<tr>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-small" name="medidas[]" /></td>
  				<td><input type="text" class="input-small" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
				</tr>
				<tr>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-small" name="medidas[]" /></td>
  				<td><input type="text" class="input-small" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
  				<td><input type="text" class="input-medium" name="medidas[]" /></td>
				</tr>
				</table></br>

					<div class="control-group">
				<label class="control-label">Superficie m2</label>
				<div class="controls">
				<input type="text" class="input-small" name="superficie" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Superficie edificada m2</label>
				<div class="controls">
				<input type="text" class="input-small" name="sup_edif" />
				</div>
				</div>
				
				<h5 style="
    			position: relative;
  				  left: 100px;
				">Planos de mensura</h5>
				<textarea name="textarea" rows="10" cols="50" style="
			    position: relative;
    			left: 100px;
				">Aca van los planos antecedentes</textarea>

				<h5 style="
    				float: right;
    				position: relative;
    				bottom: 40px;
    				right: 200px;
					">Expediente/Plano</h5>
				<textarea name="textarea" rows="10" cols="50" style= "float:right;">Aca va la descripción</textarea>

            </div>
            <h3>Datos de zonificación</h3>
            <div id="pepe" style=" ">
               <div class="control-group">
					<label class="control-label">Seleccione el codigo de zona</label>
					<div class="controls">
						<select name="select">
 						 <option value="value1">Value 1</option> 
  						<option value="value2" selected>Value 2</option>
 						<option value="value3">Value 3</option>
						</select>
					</div>
				</div>
				

            </div>
            <h3>Estado constructivo</h3>
            <div>
               <div class="control-group">
					<label class="control-label">N° de expediente</label>
					<div class="controls">
						<input type="text" class="input-small" name="num_exp" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Letra</label>
					<div class="controls">
						<input type="text" class="input-small" name="num_exp" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Año</label>
					<div class="controls">
						<input type="text" class="input-small" name="anio" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Tipo de obra</label>
					<div class="controls">
						<input type="text" class="input-medium" name="tipo_o" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Existente</label>
					<div class="controls">
						<input type="text" class="input-small" name="existente" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">A demoler</label>
					<div class="controls">
						<input type="text" class="input-small" name="demoler" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">A construir</label>
					<div class="controls">
						<input type="text" class="input-small" name="construir" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">A empadronar</label>
					<div class="controls">
						<input type="text" class="input-small" name="empadronar" />
					</div>
				</div>
				

            </div>



          	</div>
         </div>
</body>
</html>
