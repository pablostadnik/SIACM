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
				<?php 

		
				echo $tra->menu1();
			

		?>
		<div class="container contenido">
			<h2>Ingresar Partida Inmobiliaria</h2>
			<form name="form" class="form-horizontal" method="post">
			<div id="menu" style="width:500px;">
            <h3>Datos Dominales</h3>
            <div>
                <div class="control-group">
					<label class="control-label">Numero de Inmueble</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="numero" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Funcionario Autorizantes</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="funcionario" />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Numero Inscripcion</label>
					<div class="controls">
						<input type="text" name="inscripcion" class="input-medium"  />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Tipo</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="tipo"  />
					</div>
				</div>

				<div class="control-group">
				<label class="control-label">Año dominio</label>
				<div class="controls">
				<input type="text" class="input-medium" name="anio" />
				</div>
				</div>
            </div>
            <h3>Ubicación segun título</h3>
			<div>
                <div class="control-group">
					<label class="control-label">Ciudad</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="ciudad" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Cuartel</label>
					<div class="controls">
						<input type="text" class="input-small" name="cuartel" />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Sección</label>
					<div class="controls">
						<input type="text" name="sección" class="input-small"  />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Fracción</label>
					<div class="controls">
						<input type="text" class="input-small" name="fraccion"  />
					</div>
				</div>

				<div class="control-group">
				<label class="control-label">Chacra</label>
				<div class="controls">
				<input type="text" class="input-small" name="chacra" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Manzana</label>
				<div class="controls">
				<input type="text" class="input-small" name="manzana" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Lote</label>
				<div class="controls">
				<input type="text" class="input-small" name="lote" />
				</div>
				</div>




            </div>
            <h3>Medidas segun título</h3>
            <div>
               <div class="control-group">
					<label class="control-label">Frente</label>
					<div class="controls">
						<input type="text" class="input-small" name="frente_t" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Ochava</label>
					<div class="controls">
						<input type="text" class="input-small" name="ochava_t" />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Frente</label>
					<div class="controls">
						<input type="text" name="frente2_t" class="input-small"  />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Contribuyente</label>
					<div class="controls">
						<input type="text" class="input-small" name="contribuyente_t"  />
					</div>
				</div>

				<div class="control-group">
				<label class="control-label">Fondo</label>
				<div class="controls">
				<input type="text" class="input-small" name="fondo_t" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Costado</label>
				<div class="controls">
				<input type="text" class="input-small" name="costado_t" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Costado</label>
				<div class="controls">
				<input type="text" class="input-small" name="costado2_t" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Superficie</label>
				<div class="controls">
				<input type="text" class="input-medium" name="superficie_t" />
				</div>
				</div>

            </div>

            <h3>Nomenclatura Catastral</h3>
            <div>
               <div class="control-group">
					<label class="control-label">Partido</label>
					<div class="controls">
						<input type="text" class="input-small" name="partido" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Partida</label>
					<div class="controls">
						<input type="text" class="input-large" name="partida" />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Partida de origen</label>
					<div class="controls">
						<input type="text" name="partida_ori" class="input-large"  />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Circunscripción</label>
					<div class="controls">
						<input type="text" class="input-small" name="circunscripcion"  />
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
				<input type="text" class="input-small" name="chacra" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Quinta numero</label>
				<div class="controls">
				<input type="text" class="input-small" name="quinta_num" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Fracción numero</label>
				<div class="controls">
				<input type="text" class="input-small" name="fraccion_num" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Fracción letra</label>
				<div class="controls">
				<input type="text" class="input-small" name="fraccion_let" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Manzana numero</label>
				<div class="controls">
				<input type="text" class="input-small" name="manzana_num" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Manzana letra</label>
				<div class="controls">
				<input type="text" class="input-small" name="manzana_let" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Parcela numero</label>
				<div class="controls">
				<input type="text" class="input-small" name="parcela_num" />
				</div>
				</div>
					<div class="control-group">
				<label class="control-label">Parcela letra</label>
				<div class="controls">
				<input type="text" class="input-small" name="parcela_let" />
				</div>
				</div>
					<div class="control-group">
				<label class="control-label">Subparcela</label>
				<div class="controls">
				<input type="text" class="input-small" name="subparcela" />
				</div>
				</div>
            </div>
            <h3>Zona segun ordenanza fiscal</h3>
            <div>
               <div class="control-group">             
					<label class="control-label">Numero</label>
					<div class="controls">
						<input type="text" class="input-small" name="numero" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Coeficiente</label>
					<div class="controls">
						<input type="text" class="input-small" name="coeficiente" />
					</div>
				</div>
				</div>
				<h3>Ubicación del inmueble</h3>
			<div>
                <div class="control-group">
					<label class="control-label">Dirección</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="direccion_u" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Numero</label>
					<div class="controls">
						<input type="text" class="input-small" name="numero_u" />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Entre</label>
					<div class="controls">
						<input type="text" name="entre_u" class="input-xlarge"  />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Frente1</label>
					<div class="controls">
						<input type="text" class="input-small" name="frente1_u"  />
					</div>
				</div>

				<div class="control-group">
				<label class="control-label">Frente2</label>
				<div class="controls">
				<input type="text" class="input-small" name="frente2_u" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Frente3</label>
				<div class="controls">
				<input type="text" class="input-small" name="frente3_u" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Frente4</label>
				<div class="controls">
				<input type="text" class="input-small" name="frente4_u" />
				</div>
				</div>

            </div>
            <h3>Datos del Inmueble, Medidas segun catastro</h3>
			<div>
                <div class="control-group">
					<label class="control-label">Frente</label>
					<div class="controls">
						<input type="text" class="input-small" name="frente" />
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Ochava</label>
					<div class="controls">
						<input type="text" class="input-small" name="ochava" />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Frente</label>
					<div class="controls">
						<input type="text" name="frente2" class="input-xlarge"  />
					</div>
				</div>

				<div class="control-group">				
					<label class="control-label">Contrafrente</label>
					<div class="controls">
						<input type="text" class="input-small" name="contrafrente"  />
					</div>
				</div>

				<div class="control-group">
				<label class="control-label">Fondo</label>
				<div class="controls">
				<input type="text" class="input-small" name="fondo" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Costado</label>
				<div class="controls">
				<input type="text" class="input-small" name="costado" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Costado</label>
				<div class="controls">
				<input type="text" class="input-small" name="costado2" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Costado</label>
				<div class="controls">
				<input type="text" class="input-small" name="costado3" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Superficie del terreno</label>
				<div class="controls">
				<input type="text" class="input-small" name="sup_terreno" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Superficie edificada</label>
				<div class="controls">
				<input type="text" class="input-small" name="sup_edificada" />
				</div>
				</div>

            </div>     
             <h3>Contribuyente</h3>
			<div>
                <div class="control-group">
					<label class="control-label">Apellido y nombres</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="ape_nom" />
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
				<label class="control-label">Departamento</label>
				<div class="controls">
				<input type="text" class="input-small" name="departamento" />
				</div>
				</div>

				<div class="control-group">
				<label class="control-label">Codigo Postal</label>
				<div class="controls">
				<input type="text" class="input-small" name="codigo postal" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Numero de documento</label>
				<div class="controls">
				<input type="text" class="input-small" name="num_doc" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Codigo del titular o CUIT/CUIL</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="cod_titular" />
				</div>
				</div>
				aca empiezan los datos del destinatario
				<div class="control-group">
				<label class="control-label">Calle</label>
				<div class="controls">
				<input type="text" class="input-small" name="calle" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Barrio</label>
				<div class="controls">
				<input type="text" class="input-small" name="barrio" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Numero</label>
				<div class="controls">
				<input type="text" class="input-small" name="numero" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Piso</label>
				<div class="controls">
				<input type="text" class="input-small" name="sup_edificada" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Departamento</label>
				<div class="controls">
				<input type="text" class="input-small" name="" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Codigo Postal</label>
				<div class="controls">
				<input type="text" class="input-small" name="cod_postal" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Numero de documento</label>
				<div class="controls">
				<input type="text" class="input-small" name="num_doc" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Codigo del titular o CUIT/CUIL</label>
				<div class="controls">
				<input type="text" class="input-small" name="cod_titular" />
				</div>
				</div>
				Datos del POSEEDOR
				<div class="control-group">
				<label class="control-label">Numero de documento</label>
				<div class="controls">
				<input type="text" class="input-small" name="num_doc" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Codigo del TITULAR O CUIT/CUIL</label>
				<div class="controls">
				<input type="text" class="input-small" name="num_doc" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Codigo del TITULAR O CUIT/CUIL</label>
				<div class="controls">
				<input type="text" class="input-xlarge" name="cod_titular" />
				</div>
				</div>
			</div>	
				<h3>Planos</h3>
			<div>
				<div class="control-group">
				<label class="control-label">Origen</label>
				<div class="controls">
				<input type="text" class="input-medium" name="origen" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Edificación</label>
				<div class="controls">
				<input type="text" class="input-small" name="edificacion" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Estudio Catastral</label>
				<div class="controls">
				<input type="text" class="input-small" name="estudio_cat" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Fraccionamiento</label>
				<div class="controls">
				<input type="text" class="input-small" name="fraccionamiento" />
				</div>
				</div>
			</div>	
			<h3>Certificados</h3>
			<div>

				<div class="control-group">
				<label class="control-label">Numero</label>
				<div class="controls">
				<input type="text" class="input-small" name="origen" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Motivo</label>
				<div class="controls">
				<input type="text" class="input-small" name="edificacion" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Fecha</label>
				<div class="controls">
				<input type="text" class="input-small" name="estudio_cat" />
				</div>
				</div>
			</div>
			<h3>Expedientes</h3>
				<div>
				<div class="control-group">
				<label class="control-label">Letra</label>
				<div class="controls">
				<input type="text" class="input-small" name="letra" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Numero</label>
				<div class="controls">
				<input type="text" class="input-small" name="numero" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Año</label>
				<div class="controls">
				<input type="text" class="input-small" name="año" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Existente</label>
				<div class="controls">
				<input type="text" class="input-small" name="año" />
				</div>
				</div>
				<div>
				<label class="control-label">CONSTRUCCIÓN/AMPLIACIÓN</label>
				<div class="controls">
				<input type="text" class="input-small" name="año" />
				</div>
				</div>
				</div>

            </div>
        </div>
   </div>
   			</form>
				<div class="control-group">
					<div class="controls">	
						<input type="hidden" name="grabar" value="si" />
						<input type="button" class="btn btn-large btn-primary" value="Ingresar partida" title="Ingresar partida" onclick="validar_cliente();" />
					</div>
				</div>
			</form>
		</div>


</body>
</html>
