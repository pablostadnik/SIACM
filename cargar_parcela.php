<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('MAX_EXECUTION_TIME', -1);
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
require_once("class/class.php");
require_once("class/parcela.php");

$tra=new Trabajo();
$par=new Parcela();
$parc=$par->ver_parcelas();
$cant=$par->num_filas();


if(isset($_SESSION["contador"]))
{
$i=$_SESSION["contador"];
}



if(isset($_POST["boton1"]) )
{
  
	if((1<=$i)and($i<=$cant))
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
if(isset($_POST["boton3"]) )
{
  $cod=$_POST["codigo"];
  $propietario=$parc[$i+1]["propietario"];
  header('Location: ver_parcela.php?codigo='.$cod.'&propietario='.$propietario); 
  
}
if(isset($_POST["agregar"]) )
{
   header ("Location: nueva_parcela.php"); 
  
}
if(isset($_POST["modificar"]) )
{
  $cod=$_POST["codigo"];
   header ("Location: modificar_parcela.php?codigo=$cod"); 
  
}
if(isset($_POST["eliminar"]) )
{
  $cod=$_POST["codigo"];
   header ("Location: eliminar_parcela.php?codigo=$cod"); 
  
}
if(isset($_POST["prop"]) )
{
   $cod=$_POST["codigo"];
   header ("Location: agregar_propietario.php?codigo=$cod"); 
  
}
if(isset($_POST["posee"]) )
{
  
   header ("Location: agregar_poseedor.php"); 
  
}
if(isset($_POST["cont"]) )
{
   $cod=$_POST["codigo"];
   header ("Location: agregar_contribuyente.php?codigo=$cod"); 
  
}

if (isset($parc[$i]["codigo"])) 
{
  if ($parc[$i]["codigo"]=='')
    {
    $i=$_SESSION["contador"]-1;
    }
}
if (isset($_GET['codigo']))
{
  
  $parc=$par->ver_parcela2($_GET['codigo']);
  $i=0;

}
?>

<html>
<head>
<title>Municipalidad Carlos Casares</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/navbar.js"></script>
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

<link href="css/estilos.css" rel="stylesheet" media="screen">
<link href="css/estilos4.css" rel="stylesheet" media="screen">

</head>
<style type="text/css">
label{
  font-weight: bold;
  text-transform: uppercase;
}
/* Ocultamos el input file por defecto */ 
input[type="file"]{ 
font-size: 19px; 
position: relative; 
opacity: 1; 
filter: alpha(opacity = 1); 


} 

/* Boton para superponer el input file ( personalizado) */ 

.cargar{ 
text-align: center; 


display: block; 
border-radius: 3px 0 0 3px; 
width: 30px; 
height: 30px; 
font-size: 12px; 
float: left; 
position:relative; 
line-height: 1.3em; 
}
</style>
<body style= "background-color: #386745;">
				<?php 

		    
				echo $tra->menu1();
        
		?>
		<div class="container contenido">
			<h2 style="color:white;">Parcela</h2>

      <form class="form-inline" method="post" action="cargar_parcela.php">
       
			
     		 <div class="btn-group btn-group-lg">
        	<button type="submit" class="btn btn-default" style= " height:40px;width:120px;font-size:18px;" name="agregar">AGREGAR</button>
        	<button type="submit" class="btn btn-default" style= " height:40px;width:120px;font-size:18px;" name="modificar">MODIFICAR</button>
        	<button type="submit" class="btn btn-default" style= " height:40px;width:120px;font-size:18px;" name="eliminar">ELIMINAR</button>
     	 </div>
      
       
       <button name="boton1" type="submit" style="width:60px; padding:0px;border:0px; position:relative;left:20px;"><img src="img/flecha5-2.png"></button>
       <button name="boton2" type="submit" style="width:60px; padding:0px;border:0px; position:relative;left:20px;"><img src="img/flecha4-prueba2.png"></button>
      
      <div style="  border-radius: 22px 22px 22px 22px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  #C0C0C0;height: 160px;margin: 0 auto; text-align: left;width:1090px;padding:5px;position: relative;top: 30px;" >
      <table style="width:1100px;position:relative;bottom:35px;">
      <tr>
  		<td><label >Codigo de Parcela</label></td><td><input type="text" class="input-small" placeholder="Cod." name="codigo" value="<?php if(isset($parc[$i]["codigo"])) {echo $parc[$i]["codigo"];}?>" readonly="readonly"></td>
  		
  		<td><label >Plano de mensura</label></td><?php
                                        if(isset($parc[$i]["plano"])) {
                                       $primero=substr($parc[$i]["plano"],0,2);
                                       $segundo=substr($parc[$i]["plano"],2,2);
                                       $tercero=substr($parc[$i]["plano"],4,3);
                                       $cuarto=substr($parc[$i]["plano"],7,4);
                                           
                                      }
                                        ?>

                                      <td style="width:280px;"><input type="text"   class="input-small" name="plano" value="<?php if(isset($primero)) { echo $primero;}?>" readonly="readonly" style="width:40px;" placeholder="Num"/>-
                                      <input type="text" class="input-small" name="plano" value="<?php if(isset($segundo)) { echo $segundo;}?>" readonly="readonly" style="width:40px;"  placeholder="Num"/>-
                                      <input type="text" class="input-small" name="plano" value="<?php if(isset($tercero)) { echo $tercero;}?>" readonly="readonly"  style="width:60px;" placeholder="Num"/>-
                                      <input type="text" class="input-small" name="plano" value="<?php if(isset($cuarto)) { echo $cuarto;}?>" readonly="readonly"  style="width:60px;" placeholder="Num"/>
                                      </td>                           
  		<td><label style="position:relative;" >Partida Inmobiliaria</label></td> <td><input type="text" class="input-small" placeholder="Partida" value="<?php if(isset($parc[$i]["partida"])) { echo $parc[$i]["partida"];}?>" readonly="readonly" style="position:relative;"/></td>
  		</tr>
      <tr>

      <td><label >Circuncripción</label></td><td><input type="text" class="input-small" placeholder="Circ." value="<?php if(isset($parc[$i]["circunscripcion"])) { echo $parc[$i]["circunscripcion"];}?>" readonly="readonly"></td>
  		<td><label >Sección</label></td><td><input type="text" class="input-small" placeholder="Sec." value="<?php if(isset($parc[$i]["seccion"])) { echo $parc[$i]["seccion"];}?>" readonly="readonly"></td>
  		<td><label >Chacra</label></td><td><input type="text" class="input-small" placeholder="Chac." value="<?php if(isset($parc[$i]["chacra_num"])) {echo $parc[$i]["chacra_num"];}?>" readonly="readonly"></td>
      </tr>
      <tr>
  		<td><label >Quinta</label></td><td><input type="text" class="input-small" placeholder="Quint." value="<?php if(isset($parc[$i]["quinta_let"])) {echo $parc[$i]["quinta_let"];}?>" readonly="readonly"></td>	
      <td><label >Fracción</label></td><td><input type="text" class="input-small" placeholder="Fracc." value="<?php if(isset($parc[$i]["fraccion_let"])) {echo $parc[$i]["fraccion_let"];}?>" readonly="readonly"></td>
      <td><label >Manzana</label></td><td><input type="text" class="input-small" placeholder="Manz." value="<?php if(isset($parc[$i]["manzana_let"])) {echo $parc[$i]["manzana_let"];}?>" readonly="readonly"></td>
      </tr>
  		<td><label >Parcela</label></td><td><input type="text" class="input-small" placeholder="Parc." value="<?php if(isset($parc[$i]["parcela_let"])) {echo $parc[$i]["parcela_let"];}?>" readonly="readonly"></td>
  		<td><label >Subparcela</label></td><td><input type="text" class="input-small" placeholder="Subparc." value="<?php  if(isset($parc[$i]["subparcela"])) {echo $parc[$i]["subparcela"];}?>" readonly="readonly"></td>
      <td><label >Cod. de Partido</label></td><td><input type="text" class="input-small" placeholder="Partido" value="<?php  if(isset($parc[$i]["partido"])) {echo $parc[$i]["partido"];}?>" readonly="readonly"></td></br></br>
      </tr>
      </table>
    </div>
    <br><br>
  		<h4>Ubicación del inmueble</h4>
      <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		<table>
		<tr>
  		<td><label >Calle</label></td><td><input type="text" class="input-large" placeholder="Plano" value="<?php if(isset($parc[$i]["calle"])) {echo $parc[$i]["calle"];}?>" readonly="readonly"></td>
  		<td><label >N°</label></td><td><input type="text" class="input-small" placeholder="Num." value="<?php if(isset($parc[$i]["num"])) {echo $parc[$i]["num"];}?>" readonly="readonly" readonly="readonly"></td>
  		<td><label style="width:50px;">Piso</label></td><td><input type="text" class="input-small" placeholder="piso" value="<?php if(isset($parc[$i]["piso"])) {echo $parc[$i]["piso"];}?>" readonly="readonly"></td>
  		
  		<td><label style="width:50px;">DTO.</label></td><td><input type="text" class="input-small" placeholder="Dto." value="<?php if(isset($parc[$i]["dto"])) {echo $parc[$i]["dto"];}?>" readonly="readonly"></td>
  		</tr>
  		<tr>
  		<td><label >Entre calle</label></td><td><input type="text" class="input-large" placeholder="calle" value="<?php if(isset($parc[$i]["entre1"])) {echo $parc[$i]["entre1"];}?>" readonly="readonly"></td>
  		</tr>
  		<tr>
  		<td><label >Entre calle</label></td><td><input type="text" class="input-large" placeholder="calle" value="<?php if(isset($parc[$i]["entre2"])) {echo $parc[$i]["entre2"];}?>" readonly="readonly"></td>
  		</tr>
  		<tr>
  		<td><label >Localidad</label></td><td><input type="text" class="input-large" placeholder="localidad" value="<?php if(isset($parc[$i]["localidad"])) {echo $parc[$i]["localidad"];}?>" readonly="readonly"></td>
  		<td><label >Cod. Postal</label></td><td><input type="text" class="input-small" placeholder="Cod." value="<?php  if(isset($parc[$i]["cod_postal"])) {echo $parc[$i]["cod_postal"];}?>" readonly="readonly"></td>
  		</tr>
  		<tr>
  		<td>&nbsp&nbsp</td>
  		</tr>	
      <?php 
      if(isset($parc[$i]["propietario"])) {//lo agregue solo para que no me tire el error de undefined array

      $prop= $parc[$i]["propietario"];
      $contr= $parc[$i]["contribuyente"];
     if(isset($_GET['nombre']))
          {
            

            $prop=$_GET["nombre"];
            $par->cargar_prop($prop,$parc[$i]["codigo"]);
          }
      if(isset($_GET['nombre1']))
          {
            $contr=$_GET["nombre1"];
            $par->cargar_contr($contr,$parc[$i]["codigo"]);
          }

        }
        
      ?>
  		<tr>
  		<td><button type="submit"   class="btn btn-default" style= " font-size:12px;width:125px;" name="prop">PROPIETARIO</button></td><td><input type="text" class="input-xlarge" placeholder="Prop." value="<?php if(isset($prop)) {echo $prop;}?>" readonly="readonly"></br></td>
  		</tr>
  		<tr>
  		<td><button type="submit"  class="btn btn-default" style= " font-size:12px;width:125px;" name="cont">CONTRIBUYENTE</button></td><td><input type="text" class="input-xlarge" placeholder="Contr." value="<?php if(isset($contr)) {echo $contr; }?>" readonly="readonly"></br></td>
  		</tr>
  		<tr>
  		<td><button type="submit"   class="btn btn-default" style= " font-size:12px;width:125px;" name="posee">POSEEDOR</button></td><td><input type="text" class="input-xlarge" placeholder="Poseedor" value="" readonly="readonly"></br></td>
  		</tr>
  		</table>
  		</div>
     
     <input type="hidden" name="variablei" value="<?php echo $i;?>" />
      <input type='submit' value='' name="boton3" style='background:url("img/botonpar2.jpg") left center no-repeat;padding-left:20px; width:200px; height:45px; position: relative; top: 20px;left: 350px;' /> 

		</form>
		</div>
				
		
		


</body>
</html>
