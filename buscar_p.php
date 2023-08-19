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
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/estilos.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/navbar.js"></script>
<script src="js/jquery-1.11.1.min"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>
<script >
function getXMLHTTPRequest() {
  try {
    req = new XMLHttpRequest();
  } catch(err1) {
    try {
      req = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (err2) {
      try {
        req = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (err3) {
        req = false;
      }
    }
  }
  return req;
}


var http = getXMLHTTPRequest(); // creo una instancia del objeto XMLHTTPRequest.

function enviarvariable(variable) { // funcion encargada de inviar la variable al archivo php llamado index.php.
   	
    var fil=variable.cells[1].innerText; 	
    
    var url = 'consulta.php?fil=' + fil; // creación de la URL.
    http.open("GET", url, true); // fijando los parametros para el envío de datos.
    http.onreadystatechange = handler; // Qué función utilizar en caso de que el estado de la petición cambie.
    http.send(null); // enviar petición.
}

function handler() {
  if (http.readyState == 4) {
    if(http.status == 200) {
      //alert(http.responseText); // El texto de respuesta del archivo index.php lo muestra como una alerta.
     document.getElementById("resultado").innerHTML = http.responseText
    }
  }
}


</script>
<style>
.table-hover tbody tr:hover > td,
.table-hover tbody tr:hover > th {
  background-color: white;
}
</style>
<style type="text/css">
label{
  font-weight:bold;
  text-transform: uppercase;
}
td{
	text-transform: uppercase;
}
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
			
			<form name="form-inline" class="form-horizontal" method="post" action="buscar_p.php">
				<div class="control-group" style="position:relative; top:40px;">
					<label class="control-label" style="  width: 220px;position: relative;right: 20px;">INGRESE NOMBRE Y APELLIDO</label>
					<div class="controls">
						<input type="text" class="input-xlarge" name="nombre" />
					</div>
				</div>
			
				<div class="control-group" style="position:relative; top:40px;">
					<div class="controls">	
						<input type="hidden" name="grabar" value="si" />
						<button type="submit" class="btn btn-default" style= "height: 45px; width: 78px;position: relative;left: 350px;bottom: 62px;" name="buscar" id="boton">BUSCAR</button>
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
			for ($i=0;$i<sizeof($prop);$i++){ ?>
				<tr valign="top" align="center" onclick='enviarvariable(this)'>
					<td valign="top" align="left"><?php if(isset($prop[$i]["id_propietario"])) {echo $prop[$i]["id_propietario"];} ?></td>
					<td valign="top" align="left"><?php if(isset($prop[$i]["nombre"])) {echo $prop[$i]["nombre"];} ?></td>
					
				
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

		


		if(isset($_POST["ver"]) )
		{
			$pro = $_POST["nombre"];
			for ($i=0;$i<sizeof($pro);$i++){
				if ($pro[$i]!='')
				{
							echo "<script type='text/javascript'>
					alert('los puntos fueron cargados corectamente".$pro[$i]."');

					</script>";
					$propietario=$pro[$i];
				}
			}
	

			$parc=$par->ver_parcelas2($pro[0]);
			if (!empty($parc)){ ?>
		</br></br></br></br></br></br>
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
		else
		echo("No se encontro ningun registro");
		
		}

		


		?>
		
		</form>
		<div id="resultado" style="">
			
		</div>
</body>
</html>