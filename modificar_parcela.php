<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("class/class.php");
require_once("class/parcela.php");
$tra=new Trabajo();
$par=new Parcela();
$parc=$par->ver_parcelas();
$parc=$par->ver_parcela($_GET["codigo"]);

if(isset($_POST["boton3"]) )
{
  $cod=$_POST["codigo"];
  header ("Location: ver_parcela.php?codigo=$cod"); 
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
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="js/validacion.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<link href="css/estilos.css" rel="stylesheet" media="screen">
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/navbar.js"></script>
</head>
<script type="text/javascript">
function irAlIndice() {

if(confirm("¿Deseas guardar la parcela?")) {

document.location.href= 'grabar.php';

}

} 

</script>
<script type="text/javascript">
function irAlIndice2() {

if(confirm("¿Deseas cancelar la operación?")) {

document.location.href= 'cargar_parcela.php';

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
			<h2>Parcela</h2>
			<form class="form-inline" method="post" action="grabar.php">
     		 <div class="btn-group btn-group-lg">
        	<button type="submit" class="btn btn-default" style= "height: 45px; width: 110px;font-family: 'Lobster', cursive;font-size:18px;" name="grabar4" onclick="validar_carga();irAlIndice();">Grabar</button>
        	<button type="button" class="btn btn-default" style= "height: 45px; width: 110px;font-family: 'Lobster', cursive;font-size:18px;" name="cancelar" onclick="irAlIndice2();">Cancelar</button>
        	
     	 </div>
      
      
       <input type="hidden" name="cod1" value="<?php echo $_GET["codigo"];?>">
     	 
     	 	
     	</br></br></br>
      <div style="  border-radius: 22px 22px 22px 22px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  #C0C0C0;height: 160px;margin: 0 auto; text-align: left;width:1090px;padding:5px;position: relative;top: 0px;" >
      <table style="width:1100px;position:relative;bottom:35px;">
      <tr>
  		<td><label >Codigo de Parcela</label></td><td><input type="text" class="input-small" placeholder="Cod." name="codigo" value="<?php if (isset($parc[0]["codigo"])) {echo $parc[0]["codigo"];}?>" ></td>
      
      <td><label >Plano de mensura</label></td><?php
                                       $primero=substr($parc[0]["plano"],0,2);
                                       $segundo=substr($parc[0]["plano"],2,2);
                                       $tercero=substr($parc[0]["plano"],4,3);
                                       $cuarto=substr($parc[0]["plano"],7,4);
                                        ?>
                                      <td style="width:280px;"><input type="text" class="input-small" name="plano1" value="<?php echo $primero;?>"  style="width:40px;" placeholder="Num"/>-
                                      <input type="text" class="input-small" name="plano2" value="<?php if (isset($segundo)) {echo $segundo;}?>"  style="width:40px;"  placeholder="Num"/>-
                                      <input type="text" class="input-small" name="plano3" value="<?php if (isset($tercero)) {echo $tercero;}?>"   style="width:60px;" placeholder="Num"/>-
                                      <input type="text" class="input-small" name="plano4" value="<?php if (isset($cuarto)) {echo $cuarto;}?>"   style="width:60px;" placeholder="Num"/>
                                      </td>
      <td><label style="position:relative;" >Partida Inmobiliaria</label></td><td><input type="text" class="input-small" placeholder="Partida" value="<?php if (isset($parc[0]["partida"])) {echo $parc[0]["partida"];}?>"  style="position:relative;" name="partida"></td>
      </tr>
      <tr>
      <td><label >Circuncripción</label></td><td><input type="text" class="input-small" placeholder="Circ." value="<?php if (isset($parc[0]["circunscripcion"])) {echo $parc[0]["circunscripcion"];}?>" name="circ"></td>
      <td><label >Sección</label></td><td><input type="text" class="input-small" placeholder="Sec." value="<?php if (isset($parc[0]["seccion"])) {echo $parc[0]["seccion"];}?>" name="sec"></td>
      <td><label >Chacra</label></td><td><input type="text" class="input-small" placeholder="Chac." value="<?php if (isset($parc[0]["chacra_num"])) {echo $parc[0]["chacra_num"];}?>" name="chacra"></td>
      </tr>
      <tr>
      <td><label >Quinta</label></td><td><input type="text" class="input-small" placeholder="Quint." value="<?php if (isset($parc[0]["quinta_let"])) {echo $parc[0]["quinta_let"];}?>" name="quinta"></td> <td><label >Fracción</label></td><td><input type="text" class="input-small" placeholder="Fracc." value="<?php if (isset($parc[0]["fraccion"])) {echo $parc[0]["fraccion"];}?>" name="fraccion"></td>
      <td><label >Manzana</label></td><td><input type="text" class="input-small" placeholder="Manz." value="<?php if (isset($parc[0]["manzana_let"])) {echo $parc[0]["manzana_let"];}?>" name="manzana"></td>
      </tr>
      <tr>
      <td><label >Parcela</label></td><td><input type="text" class="input-small" placeholder="Parc." value="<?php if (isset($parc[0]["parcela_let"])) {echo $parc[0]["parcela_let"];}?>" name="parcela"></td>
      <td><label >Subparcela</label></td><td><input type="text" class="input-small" placeholder="Subparc." value="<?php if (isset($parc[0]["subparcela"])) {echo $parc[0]["subparcela"];}?>" name="subparc"></td>
      <td><label >Cod. de Partido</label></td><td><input type="text" class="input-small" placeholder="Partido" value="<?php if (isset($parc[0]["subparcela"])) {echo $parc[0]["partido"];}?>" name="partido"></td></br></br>
  		</tr>
      </table>
    </div>
      <h4>Ubicación del inmueble</h4>
      <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		<table>
		<tr>
  		<td><label >Calle</label></td><td><input type="text" class="input-large" placeholder="Calle" value="<?php if (isset($parc[0]["calle"])) {echo $parc[0]["calle"];}?>" name="calle" ></td>
  		<td><label >N°</label></td><td><input type="text" class="input-small" placeholder="Num." value="<?php if (isset($parc[0]["codigo"])) {echo $parc[0]["num"];}?>" name="num"  ></td>
  		<td><label style="width:50px;">Piso</label></td><td><input type="text" class="input-small" placeholder="piso" value="<?php if (isset($parc[0]["codigo"])) {$parc[0]["piso"];}?>" name="piso" ></td>
  		
  		<td><label style="width:50px;">DTO.</label></td><td><input type="text" class="input-small" placeholder="Dto." value="<?php if (isset($parc[0]["dto"])) {echo $parc[0]["dto"];}?>" name="dto" ></td>
  		</tr>
  		<tr>
  		<td><label >Entre calle</label></td><td><input type="text" class="input-large" placeholder="calle" value="<?php if (isset($parc[0]["entre1"])) {echo $parc[0]["entre1"];}?>" name="entre1" ></td>
  		</tr>
  		<tr>
  		<td><label >Entre calle</label></td><td><input type="text" class="input-large" placeholder="calle" value="<?php if (isset($parc[0]["entre2"])) {echo $parc[0]["entre2"];}?>" name="entre2" ></td>
  		</tr>
  		<tr>
  		<td><label >Localidad</label></td><td><input type="text" class="input-large" placeholder="localidad" value="<?php if (isset($parc[0]["localidad"])) {echo $parc[0]["localidad"];}?>" name="localidad" ></td>
  		<td><label >Cod. Postal</label></td><td><input type="text" class="input-small" placeholder="Cod." value="<?php if (isset($parc[0]["cod_postal"])) {echo $parc[0]["cod_postal"];}?>" name="cod_postal" ></td>
  		</tr>
  		<tr>
  		<td>&nbsp&nbsp</td>
  		</tr>	
  		<tr>
  		<td><label >Propietario</label></td><td><input type="text" class="input-xlarge" placeholder="Prop." readonly="readonly" value="<?php if (isset($parc[0]["propietario"])) {echo $parc[0]["propietario"];}?>" name="propietario" ></br></td>
  		</tr>
  		<tr>
  		<td><label >Contribuyente</label></td><td><input type="text" class="input-xlarge" placeholder="Contr." readonly="readonly" value="<?php if (isset($parc[0]["contribuyente"])) {echo $parc[0]["contribuyente"];}?>" name="contribuyente"  ></br></td>
  		</tr>
  		<tr>
  		<td><label >Poseedor</label></td><td><input type="text" class="input-xlarge" placeholder="Poseedor" readonly="readonly" value="<?php if (isset($parc[0]["codigo"])) {echo $parc[0]["poseedor"];}?>" name="poseedor" ></br></td>
  		</tr>
  		</table>
  		</div>
      <?php $cod= $parc[0]["codigo"];?>
    
     

		</form>
		</div>
				
		
		


</body>
</html>
