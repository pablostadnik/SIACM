<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start ();
require_once("class/class.php");
require_once("class/parcela.php");

$tra=new Trabajo();
$par=new Parcela();
$area=$_GET["area"];
$i=0;
$zona=$par->obtener_zona($area);


?>

<html>
<head>
<title>Municipalidad Carlos Casares</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/funciones.js"></script>
<link href="css/estilos.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/navbar.js"></script>
<style type="text/css">
  .servicio td {
   width: 120px; }
  </style>
</head>
<script type="text/javascript">
function irAlIndice() {

if(confirm("¿Deseas guardar la zona?")) {

document.location.href= 'grabar.php';

}

} 

</script>
<script type="text/javascript">
function irAlIndice2() {

if(confirm("¿Deseas cancelar la operación?")) {

document.location.href= 'cargar_zona.php';

}

} 

</script>
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
			<h2>Zona</h2>
			<form class="form-inline" method="post" action="grabar.php">
     		 <div class="btn-group btn-group-lg">
        	<button type="submit" class="btn btn-default" style= "height: 45px; width: 110px;font-family: 'Lobster', cursive;font-size:18px;" name="grabar3" >Grabar</button>
          <button type="button" class="btn btn-default" style= "height: 45px; width: 110px;font-family: 'Lobster', cursive;font-size:18px;" name="cancelar" onclick="irAlIndice2();">Cancelar</button>
     	 </div>
   
      
       
     	 
     	 	
     	</br></br></br>
  		<label >AREA</label><input type="text" class="input-small" placeholder="Area"  value="<?php echo $zona[$i]["area"];?>" name="area"></br></br>
  		<h4>Indicadores urbanisticos</h4></br>
      <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		<table border="0" style="">
      <tr>
      <td>DEL TERRENO</td>
      </tr>
      <tr>
      <tr>
      <td> &nbsp</td>
      </tr>
      <td><label >F.O.S</label></td><td><input type="text" class="input-small" placeholder="f.o.s" value="<?php echo $zona[$i]["fos"];?>" name="fos"></td>
      <td><label >F.O.T</label></td><td><input type="text" class="input-small" placeholder="f.o.t" value="<?php echo $zona[$i]["fot"];?>" name="fot"></td> 
      <td><label >Densidad</label></td><td><input type="text" class="input-small" placeholder="Dens." value="<?php echo $zona[$i]["densidad"];?>" name="densidad"></td>
      <td><label >Frente minimo</label></td><td><input type="text" class="input-small" placeholder="F min." value="<?php echo $zona[$i]["frente_min"];?>" name="frente_min"></td>
      <td><label >Sup. minima</label></td><td><input type="text" class="input-small" placeholder="Sup min." value="<?php echo $zona[$i]["sup_min"];?>" name="sup_min"></td>
      </tr>
      <tr>
      <td> &nbsp </td>
      </tr>
      <tr>
      <td>DEL EDIFICIO</td>
      </tr>
      <tr>
      <td> &nbsp </td>
      </tr>
      <tr>
      <td><label >Retiro Frente</label></td><td><input type="text" class="input-small" placeholder="R. fren" value="<?php echo $zona[$i]["ret_frente"];?>"  name="ret_frente">  </td>
      <td><label >Retiro Laterales</label></td><td><input type="text" class="input-small" placeholder="R. lat" value="<?php echo $zona[$i]["ret_lat"];?>" name="ret_lat"></td>
      <td><label >Altura Maxima</label></td><td><input type="text" class="input-small" placeholder="Alt. max." value="<?php echo $zona[$i]["alt_max"];?>" name="alt_max"></td>
      </tr>

      </table>
      </div>
      <tr>
      <td> &nbsp </td>
      </tr>
  		<h4>Servicios existentes</h4></br>
  		
  		<div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		<table class="servicio">
		<tr>
		<td><label >E. eléctrica</label></td><td><input  type="checkbox" <?php if ($zona[$i]["e_electrica"]=='on' ){ ?> checked="1" <?php }?> name="e_electrica"></td>
  		<td><label >Alumbrado</label></td><td><input type="checkbox"<?php if ($zona[$i]["alumbrado"]=='on' ){ ?> checked="1" <?php }?>  name="alumbrado"></td>
  		<td><label >Agua Potable</label></td><td><input  type="checkbox" <?php if ($zona[$i]["agua_pot"]=='on' ){ ?> checked="1" <?php }?> name="agua_pot"></td>
  		<td><label >Desague cloacal</label></td><td><input  type="checkbox" <?php if ($zona[$i]["desague_c"]=='on' ){ ?> checked="1" <?php }?> name="desague_c"></td>
  		<td><label >Desague Pluvial</label></td><td><input  type="checkbox" <?php if ($zona[$i]["desague_p"]=='on' ){ ?> checked="1" <?php }?> name="desague_p"/></td>
  		<td><label >Gas Natural</label></td><td><input  type="checkbox" <?php if ($zona[$i]["gas_nat"]=='on' ){ ?> checked="1" <?php }?> name="gas_nat"/></td>
  		</tr>
  		<tr>
  		<td><label >Pavimento</label></td><td><input  type="checkbox" <?php if ($zona[$i]["pavimento"]=='on' ){ ?> checked="1" <?php }?> name="pavimento"/></td>
  		<td><label >Cordon Cuneta</label></td><td><input  type="checkbox" <?php if ($zona[$i]["cordon_cun"]=='on' ){ ?> checked="1" <?php }?> name="cordon_cun"/></td>
  		<td><label >Estab. de calle</label></td><td><input  type="checkbox" <?php if ($zona[$i]["estab"]=='on' ){ ?> checked="1" <?php }?> name="estab"/></td>
  		</tr>
  		</table>
    </div>
  		</br>
  		<h4>Codigo segun ordenanza fiscal año</h4></td>	
  		</br>
       <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		<table>
  		<tr>
  		<td><label >Zona</label></td><td><input type="text" class="input-small" placeholder="zona" value="<?php echo $zona[$i]["zona"];?>"  name="zona" ></td>
  		<td><label >Coeficiente</label></td><td><input type="text" class="input-small" placeholder="Coef." value="<?php echo $zona[$i]["coef"];?>" name="coef" ></td>
  		<td><label >Servicio Prestado</label></td><td><input type="text" class="input-small" placeholder="Serv" value="<?php echo $zona[$i]["servicio"];?>" name="servicio" ></td>
  		<td><label >Estado Constructivo</label></td><td><input type="text" class="input-small" placeholder="Estado" value="<?php echo $zona[$i]["estado"];?>" name="estado"></td>
  		<td><label >Tipo de Construcción</label></td><td><input type="text" class="input-small" placeholder="T. constr" value="<?php echo $zona[$i]["tipo_cons"];?>" name="tipo_cons" ></td>
  		</tr>
  		
  		</table>
  		</div>
      <?php 
      if (isset($parc[$i]["codigo"]))
      {
      $cod= $parc[$i]["codigo"];
      
      }
      ?>
     <input type="hidden" name="variablei" value="<?php echo $i;?>" />
     


		</form>
		</div>
				
		
		


</body>
</html>