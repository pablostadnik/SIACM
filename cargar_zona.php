<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once("class/class.php");
require_once("class/parcela.php");

$tra=new Trabajo();
$par=new Parcela();


$zona=$par->obtener_zonas();
$cant=$par->num_filaszona();

ob_start();
?>

<html>
<head>
<title>Municipalidad Carlos Casares</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="js/ajax2.js"></script>
<script type="text/javascript" src="js/ajax3.js"></script>
<link href="css/estilos.css" rel="stylesheet" media="screen"></link>
<link href="css/bootstrap.css" rel="stylesheet" media="screen"></link>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen"></link>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="js/navbar.js"></script>
<link href="css/estilos.css" rel="stylesheet" media="screen">
<link href="css/estilos4.css" rel="stylesheet" media="screen">
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<style type="text/css">
  .servicio td {
   width: 120px;
   
    }

    label{
      text-transform: uppercase;
    }
  </style>
</head>
<script type="text/javascript">

</script>
<style type="text/css">
label{
  font-weight:bold;
}
</style>
<body style= "background-color: #386745;">
				<?php 

		
				echo $tra->menu1();
       $i=1;

if(isset($contador))
{
$i=$_SESSION["contador"];
}

        if(isset($_POST["boton1"]) )
{
  
  if((1<=$i)and($i<=$cant-1))
  {
  $_SESSION["contador"]=$_SESSION["contador"]-1; 


  }
}
if(isset($_POST["boton2"]) )
{
  
  if((0<=$i)and($i<=$cant-2))
  {
  $_SESSION["contador"]=$_SESSION["contador"]+1; 

  }
}


?>
		<div class="container contenido">
      
			<h2 style="color:white;">Zona</h2>
			<form class="form-inline" method="post" action="cargar_zona.php">
     		 <div class="btn-group btn-group-lg">
        	<button type="submit" id="agr"class="btn btn-default" style= "height: 45px; width: 110px; font-size:18px;" name="agregar">AGREGAR</button>
        	<button type="submit" class="btn btn-default" style= "height: 45px; width: 120px;font-size:18px;" name="modificar">MODIFICAR</button>
        	<button type="submit" class="btn btn-default" style= "height: 45px; width: 120px;font-size:18px;" name="eliminar">ELIMINAR</button>
     	 </div>
      <button name="boton1" type="submit" style="width:60px; padding:0px;border:0px;position:relative;left:20px;"  onclick="realizaProceso2();return false;"><img src="img/flecha5-2.png"></button>
       <button name="boton2" type="submit"  style="width:60px; padding:0px;border:0px;position:relative;left:20px;"  onclick="realizaProceso();return false;"><img src="img/flecha4-prueba2.png"></button>
      
       
     	 
     	 	<div id="verz">
     	</br></br></br>
  		<label >AREA</label><input type="text" class="input-small" placeholder="Area" name="area" value="<?php if(isset($zona[$i]["area"])) {echo $zona[$i]["area"];}?>" readonly="readonly"></br></br>
  		
      <h5 style="text-transform: uppercase;">Indicadores urbanisticos</h4></br>
        <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
      <table border="0" style="">
      <tr>
      <td style="color:white;">DEL TERRENO</td>
      </tr>
      <tr>
      <tr>
      <td> &nbsp</td>
      </tr>
      <td><label >F.O.S</label></td><td><input type="text" class="input-small" placeholder="f.o.s" value="<?php if(isset($zona[$i]["fos"])) {echo $zona[$i]["fos"];}?>" readonly="readonly"></td>
      <td><label >F.O.T</label></td><td><input type="text" class="input-small" placeholder="f.o.t" value="<?php if(isset($zona[$i]["fot"])) {echo $zona[$i]["fot"];}?>" readonly="readonly"></td> 
      <td><label >Densidad</label></td><td><input type="text" class="input-small" placeholder="Dens." value="<?php if(isset($zona[$i]["densidad"])) {echo $zona[$i]["densidad"];}?>" readonly="readonly"></td>
      <td><label >Frente minimo</label></td><td><input type="text" class="input-small" placeholder="F min." value="<?php if(isset($zona[$i]["frente_min"])) {echo $zona[$i]["frente_min"];}?>" readonly="readonly"></td>
      <td><label >Sup. minima</label></td><td><input type="text" class="input-small" placeholder="Sup min." value="<?php if(isset($zona[$i]["sup_min"])) {echo $zona[$i]["sup_min"];}?>" readonly="readonly"></td>
      </tr>
      <tr>
      <td> &nbsp </td>
      </tr>
      <tr>
      <td style="color:white;">DEL EDIFICIO</td>
      </tr>
      <tr>
      <td> &nbsp </td>
      </tr>
      <tr>
      <td><label >Retiro Frente</label></td><td><input type="text" class="input-small" placeholder="R. fren" value="<?php if(isset($zona[$i]["ret_frente"])) {echo $zona[$i]["ret_frente"];}?>" readonly="readonly">  </td>
      <td><label >Retiro Laterales</label></td><td><input type="text" class="input-small" placeholder="R. lat" value="<?php if(isset($zona[$i]["ret_lat"])) {echo $zona[$i]["ret_lat"];}?>" readonly="readonly"></td>
      <td><label >Altura Maxima</label></td><td><input type="text" class="input-small" placeholder="Alt. max." value="<?php  if(isset($zona[$i]["alt_max"])) {echo $zona[$i]["alt_max"];} ?>" readonly="readonly"></td>
      </tr>

      </table>
  		
  		<tr>
      <td> &nbsp </td>
      </tr>
    </div >
      <br>
  		<h5 style="text-transform: uppercase;">Servicios existentes</h4></br>
      <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		<table class="servicio">
		<tr>
		<td><label >E. eléctrica</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["e_electrica"])) { if ($zona[$i]["e_electrica"]=='on' ){ ?> checked="1" <?php }}?> ></td>
  		<td><label >Alumbrado</label></td><td><input name="check[]" type="checkbox"<?php if(isset($zona[$i]["alumbrado"])) { if ($zona[$i]["alumbrado"]=='on' ){ ?> checked="1" <?php }}?> ></td>
  		<td><label >Agua Potable</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["agua_pot"])) { if ($zona[$i]["agua_pot"]=='on' ){ ?> checked="1" <?php }}?> ></td>
  		<td><label >Desague cloacal</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["desague_c"])) { if ($zona[$i]["desague_c"]=='on' ){ ?> checked="1" <?php }}?> ></td>
  		<td><label >Desague Pluvial</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["desague_p"])) {if ($zona[$i]["desague_p"]=='on' ){ ?> checked="1" <?php }}?>/></td>
  		<td><label >Gas Natural</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["gas_nat"])) { if ($zona[$i]["gas_nat"]=='on' ){ ?> checked="1" <?php }}?>/></td>
  		</tr>
  		<tr>
  		<td><label >Pavimento</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["gas_nat"])) { if ($zona[$i]["pavimento"]=='on' ){ ?> checked="1" <?php }}?>/></td>
  		<td><label >Cordon Cuneta</label></td><td><input name="check[[]" type="checkbox" <?php if(isset($zona[$i]["cordon_cun"])) { if ($zona[$i]["cordon_cun"]=='on' ){ ?> checked="1" <?php }}?>/></td>
  		<td><label >Estab. de calle</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["estab"])) { if ($zona[$i]["estab"]=='on' ){ ?> checked="1" <?php }}?>/></td>
  		</tr>
  		</table>
        </div>
  		</br>

  		<h5 style="text-transform: uppercase;">Codigo segun ordenanza fiscal año</h4></td>	
  		</br>
      <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		<table>
  		<tr>
  		<td><label >Zona</label></td><td><input type="text" class="input-small" placeholder="Zona" value="<?php if(isset($zona[$i]["zona"])) { echo $zona[$i]["zona"];}?>" readonly="readonly"></td>
  		<td><label >Coeficiente</label></td><td><input type="text" class="input-small" placeholder="Coef" value="<?php if(isset($zona[$i]["coef"])) { echo $zona[$i]["coef"];}?>" readonly="readonly"></td>
  		<td><label >Servicio Prestado</label></td><td><input type="text" class="input-small" placeholder="Serv" value="<?php if(isset($zona[$i]["servicio"])) { echo $zona[$i]["servicio"];}?>" readonly="readonly"></td>
  		<td><label >Estado Constructivo</label></td><td><input type="text" class="input-small" placeholder="Estado" value="<?php if(isset($zona[$i]["estado"])) { echo $zona[$i]["estado"];}?>" readonly="readonly"></td>
  		<td><label >Tipo de Construcción</label></td><td><input type="text" class="input-small" placeholder="Tipo cons." value="<?php if(isset($zona[$i]["estado"])) { echo $zona[$i]["tipo_cons"];}?>" readonly="readonly"></td>
  		</tr>
  	
  		</table>
  		</div>
      <?php 
      if(isset($_POST["agregar"]) )
        { header ("Location: nueva_zona.php"); 
  
        }
        if(isset($_POST["modificar"]) )
        {
         $area=$_POST["area"];

        header ("Location: modificar_zona.php?area=$area"); 
  
          }
          if(isset($_POST["eliminar"]) )
          {
          $area=$_POST["area"];

           header ("Location: eliminar_zona.php?area=$area"); 
  
          }
        
      ?>
     <input type="hidden" name="variablei" value="<?php echo $i;?>" />
         

   </div>
   
   <div id="resultado" style=" position: relative; top: 50px; ">
    
   </div>
		</form>
		</div>
				
		
		


</body>
</html>