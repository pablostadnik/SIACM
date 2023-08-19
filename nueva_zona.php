<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start ();
require_once("class/class.php");
require_once("class/parcela.php");

$tra=new Trabajo();
$par=new Parcela();

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
<script type="text/javascript" src="js/navbar.js"></script>
<link href="css/estilos.css" rel="stylesheet" media="screen">
<style type="text/css">
  .servicio td {
   width: 120px; }
  label{
    text-transform: uppercase;
  }
  </style>
</head>
<script type="text/javascript">
function validar_carga()
{

   var form=document.form;
  
  if (form.area.value=="")
  {
    alert("Debe ingresar el área de zona");
    form.area.value="";
    form.area.focus();
    
    return false;

  }

  

  

 
  
  if(confirm("¿Deseas guardar la zona?")) {

    return true;
  }else{
    return false;
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
}
</style>
<body style= "background-color: #386745;">
				<?php 

		    //estan todos los value vacios, ya que por defecto no deberia tener nada cargado
				echo $tra->menu1();

		?>
		<div class="container contenido">
			<h2 style="color:white;" >Zona</h2>
      <!-- Recordar que para que el codigo js de validación funciones se debe poner un nombre al formulario, en este caso el nombre es form -->
			<form class="form-inline" method="post" action="grabar.php" onsubmit="return validar_carga()" name="form">
     		 <div class="btn-group btn-group-lg">
        
        	<button type="submit" class="btn btn-default" style= "height: 45px; width: 110px;font-family: 'Lobster', cursive;font-size:18px;" name="grabar2">Grabar</button>
        	<button type="button" class="btn btn-default" style= "height: 45px; width: 110px;font-family: 'Lobster', cursive;font-size:18px;" name="cancelar" onclick="irAlIndice2();">Cancelar</button>
     	 </div>
        
      
       
     	 
     	 	
     	</br></br></br>
      <h5 style="text-transform: uppercase;">Indicadores urbanisticos</h4></br>
  		<label >AREA</label><input type="text" class="input-small" placeholder="Area" name="area" value="<?php //if(isset($zona[$i]["area"])) {echo $zona[$i]["area"];}?>" ></br></br>
      <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
      <table border="0" style="">
      <tr>
      <td>DEL TERRENO</td>
      </tr>
      <tr>
      <tr>
      <td> &nbsp</td>
      </tr>
      <td><label >F.O.S</label></td><td><input type="text" class="input-small" placeholder="f.o.s" value="<?php //if(isset($zona[$i]["fos"])) {echo $zona[$i]["fos"];}?>" name="fos"></td>
      <td><label >F.O.T</label></td><td><input type="text" class="input-small" placeholder="f.o.t" value="<?php //if(isset($zona[$i]["fot"])) {echo $zona[$i]["fot"];}?>" name="fot"></td> 
      <td><label >Densidad</label></td><td><input type="text" class="input-small" placeholder="Dens." value="<?php //if(isset($zona[$i]["densidad"])) {echo $zona[$i]["densidad"];}?>" name="densidad"></td>
      <td><label >Frente minimo</label></td><td><input type="text" class="input-small" placeholder="F min." value="<?php //if(isset($zona[$i]["frente_min"])) {echo $zona[$i]["frente_min"];}?>" name="frente_min"></td>
      <td><label >Sup. minima</label></td><td><input type="text" class="input-small" placeholder="Sup min." value="<?php //if(isset($zona[$i]["sup_min"])) {echo $zona[$i]["sup_min"];}?>" name="sup_min"></td>
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
      <td><label >Retiro Frente</label></td><td><input type="text" class="input-small" placeholder="R. fren" value="<?php //if(isset($zona[$i]["ret_frente"])) {echo $zona[$i]["ret_frente"];}?>" name="ret_frente">  </td>
      <td><label >Retiro Laterales</label></td><td><input type="text" class="input-small" placeholder="R. lat" value="<?php //if(isset($zona[$i]["ret_lat"])) { echo $zona[$i]["ret_lat"];}?>" name="ret_lat"></td>
      <td><label >Altura Maxima</label></td><td><input type="text" class="input-small" placeholder="Alt. max." value="<?php //if(isset($zona[$i]["alt_max"])) {echo $zona[$i]["alt_max"];}?>" name="alt_max"></td>
      </tr>

      </table>
      
      <tr>
      <td> &nbsp </td>
      </tr>
       </div>
  		<h4>Servicios existentes</h4></br>
  		
  		<div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		<table class="servicio">
		<tr>
		<td><label >E. eléctrica</label></td><td><input name="e_electrica" type="checkbox" /></td>
  		<td><label >Alumbrado</label></td><td><input name="alumbrado" type="checkbox" /></td>
  		<td><label >Agua Potable</label></td><td><input name="agua_pot" type="checkbox" /></td>
  		<td><label >Desague cloacal</label></td><td><input name="desague_c" type="checkbox" /></td>
  		<td><label >Desague Pluvial</label></td><td><input name="desague_p" type="checkbox" /></td>
  		<td><label >Gas Natural</label></td><td><input name="gas_nat" type="checkbox" /></td>
  		</tr>
  		<tr>
  		<td><label >Pavimento</label></td><td><input name="pavimento" type="checkbox" /></td>
  		<td><label >Cordon Cuneta</label></td><td><input name="cordon_cun" type="checkbox" /></td>
  		<td><label >Estab. de calle</label></td><td><input name="estab" type="checkbox" /></td>
  		</tr>
  		</table>
      </div>
  		</br>
  		<h4>Codigo segun ordenanza fiscal año</h4></td>	
      <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		</br>
  		<table>
  		<tr>
  		<td><label >Zona</label></td><td><input type="text" class="input-small" placeholder="Zona" value="<?php //if(isset($zona[$i]["manzana"])) {echo $parc[$i]["zona"];}?>" name="zona"></td>
  		<td><label >Coeficiente</label></td><td><input type="text" class="input-small" placeholder="Coef." value="<?php //if(isset($zona[$i]["coef"])) {echo $parc[$i]["coef"];}?>"  name="coef"></td>
  		<td><label >Servicio Prestado</label></td><td><input type="text" class="input-small" placeholder="Serv." value="<?php //if(isset($zona[$i]["servicio"])) {echo $parc[$i]["servicio"];}?>" name="servicio"></td>
  		<td><label >Estado Constructivo</label></td><td><input type="text" class="input-small" placeholder="Estado cons." value="<?php //if(isset($parc[$i]["estado"])) {echo $parc[$i]["estado"];}?>" name="estado"></td>
  		<td><label >Tipo de Construcción</label></td><td><input type="text" class="input-small" placeholder="Tipo cons." value="<?php //if(isset($zona[$i]["tipo_cons"])) {echo $parc[$i]["tipo_cons"];}?>" name="tipo_cons"></td>
  		</tr>
  		</div>
  		</table>
  		
      <?php 
      //if (isset($parc[$i]["codigo"])){
      //$cod= $parc[$i]["codigo"];
      
      //}
      ?>
     <input type="hidden" name="variablei" value="<?php if(isset($i)) {echo $i;}?>" />
    


		</form>
		</div>
				
		
		


</body>
</html>