<?php
require_once("class/class.php");
require_once("class/parcela.php");
error_reporting(E_ALL ^ E_NOTICE);
$tra=new Trabajo();
$par=new Parcela();
$parc=$par->ver_parcelas();


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
<script type="text/javascript" src="js/form-field-tooltip/js/form-field-tooltip.js"></script>
<script type="text/javascript" src="js/form-field-tooltip/js/rounded-corners.js"></script>
<script type="text/javascript" src="js/form-field-tooltip/js/css/form-field-tooltip.css"></script>

<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/funciones.js"></script>
<script type="text/javascript" src="js/navbar.js"></script>
<link href="css/estilos.css" rel="stylesheet" media="screen">
<script type="text/javascript">
var tooltipObj = new DHTMLgoodies_formTooltip(); //lo crea
tooltipObj.setTooltipPosition('right'); // Indica en que posición se mostrar el globo, puede ser right(derecha) o below(debajo)
tooltipObj.setPageBgColor('#EEE'); //Debes indicar el color de fondo de tu sitio
tooltipObj.setCloseMessage('Cerrar'); // Indica el texto que aparecerá para que el usuario pueda cerrar el globo
tooltipObj.setDisableTooltipMessage('No mostrar más');
//Mensaje que aparecerá para que el usuario pueda tener la opción de que no aparezcan más textos de ayuda
tooltipObj.initFormFieldTooltip(); //inicializa
</script>
</head>
<script type="text/javascript">
function validar_carga()
{

   var form=document.form;
  
  if (form.codigo.value=="")
  {
    alert("Debe ingresar como minimo el codigo de parcela");
    form.codigo.value="";
    form.codigo.focus();
    
    return false;

  }

  

  valor = form.codigo.value;
  if( isNaN(valor) ) {
  alert("El codigo debe ser un numero entero");
  form.codigo.value="";
  form.codigo.focus();

    return false;
  }

  valor = form.num.value;
  if( isNaN(valor) ) {
  alert("El numero debe ser un numero entero");
  form.num.value="";
  form.num.focus();
 
    return false;
  }

  valor = form.piso.value;
  if( isNaN(valor) ) {
  alert("El piso debe ser un numero entero");
  form.piso.value="";
  form.piso.focus();
    
    return false;
  }

  
  if(confirm("¿Deseas guardar la parcela?")) {

    return true;
  }else{
    return false;
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

		    //puse todos los value en vacios, ya que se deberia cargar una parcela nueva
				echo $tra->menu1();
			$i=0;

		?>
		<div class="container contenido">
			<h2>Parcela</h2>
			<form class="form-inline" method="post" action="grabar.php" name="form" onsubmit="return validar_carga()">
     		 <div class="btn-group btn-group-lg">
         
         
        	<button type="submit" class="btn btn-default" style= "height: 45px; width: 110px;font-family: 'Lobster', cursive;font-size:18px;" name="grabar" onclick="">Grabar</button>
        	<button type="button" class="btn btn-default" style= "height: 45px; width: 110px;font-family: 'Lobster', cursive;font-size:18px;" name="cancelar" onclick="irAlIndice2();">Cancelar</button>
        	 
     	 </div>
      
      
       
     	 
     	 	
     	</br></br></br>
      <div style="  border-radius: 22px 22px 22px 22px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  #C0C0C0;height: 160px;margin: 0 auto; text-align: left;width:1090px;padding:5px;position: relative;top: 0px;" >
      <table style="width:1100px;">         
      <tr>
  		<td><label >Codigo de Parcela</label></td><td><input type="text" class="input-small" placeholder="Cod." name="codigo" value="<?php //if (isset($parc[$i]["codigo"])) {echo $parc[$i]["codigo"];}?>" ></td>
      
      <td><label >Plano de mensura</label></td><?php
                                       $primero=substr($parc[$i]["plano"],0,2);
                                       $segundo=substr($parc[$i]["plano"],2,2);
                                       $tercero=substr($parc[$i]["plano"],4,3);
                                       $cuarto=substr($parc[$i]["plano"],7,4);
                                       
                                        ?>
                                      <td style="width:280px;"><input type="text" tooltipText="Debe contener 2 digitos obligatorios" class="input-small" name="plano1" value="<?php //if (isset($primero)) {echo $primero;}?>"  style="width:40px;" placeholder="Num"/>-
                                      <input type="text" class="input-small" name="plano2" value="<?php //if (isset($segundo)) {echo $segundo;}?>" style="width:40px;"  placeholder="Num"/>-
                                      <input type="text" class="input-small" name="plano3" value="<?php //if (isset($tercero)) {echo $tercero;}?>"   style="width:60px;" placeholder="Num"/>-
                                      <input type="text" class="input-small" name="plano4" value="<?php //if (isset($cuarto)) {echo $cuarto;}?>"   style="width:60px;" placeholder="Num"/>
                                     </td>
      <td><label style="position:relative;" >Partida Inmobiliaria</label><td><input type="text" class="input-small" placeholder="Partida" value="<?php //if (isset($parc[$i]["partida"])) {echo $parc[$i]["partida"];}?>"  style="position:relative;" name="partida"></td>
    </tr>
    <tr>
      <td><label >Circuncripción</label></td><td><input type="text" class="input-small" placeholder="Circ." value="<?php //if (isset($parc[$i]["circunscripcion"])) { echo $parc[$i]["circunscripcion"];}?>" name="circ"></td>
      <td><label >Sección</label></td><td><input type="text" class="input-small" placeholder="Sec." value="<?php //if (isset($parc[$i]["seccion"])) {echo $parc[$i]["seccion"];}?>" name="sec"></td>
      <td><label >Chacra</label></td><td><input type="text" class="input-small" placeholder="Chac." value="<?php //if (isset($parc[$i]["chacra"])) {echo $parc[$i]["chacra"];}?>" name="chacra"></td>
      </tr>
      <tr>
      <td><label >Quinta</label></td><td><input type="text" class="input-small" placeholder="Quint." value="<?php //if (isset($parc[$i]["quinta"])) {echo $parc[$i]["quinta"];}?>" name="quinta"></td> 
      <td><label >Fracción</label></td><td><input type="text" class="input-small" placeholder="Fracc." value="<?php //if (isset($parc[$i]["fraccion"])) {echo $parc[$i]["fraccion"];}?>" name="fraccion"></td>
      <td><label >Manzana</label></td><td><input type="text" class="input-small" placeholder="Manz." value="<?php //if (isset($parc[$i]["manzana"])) {echo $parc[$i]["manzana"];}?>" name="manzana"></td>
      </tr>
      <td><label >Parcela</label></td><td><input type="text" class="input-small" placeholder="Parc." value="<?php //if (isset($parc[$i]["parcela_let"])) {echo $parc[$i]["parcela_let"];}?>" name="parcela"></td>
      <td><label >Subparcela</label></td><td><input type="text" class="input-small" placeholder="Subparc." value="<?php //if (isset($parc[$i]["subparcela"])) {echo $parc[$i]["subparcela"];}?>" name="subparc"></td>
      <td><label >Cod. de Partido</label></td><td><input type="text" class="input-small" placeholder="Partido" value="<?php //if (isset($parc[$i]["subparcela"])) {echo $parc[$i]["subparcela"];}?>" name="partido"></td>
  		</table>
        </div>
      <h4>Ubicación del inmueble</h4>
      <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		<table>
		<tr>
  		<td><label >Calle</label></td><td><input type="text" class="input-large" placeholder="Calle" value="<?php //if (isset($parc[$i]["calle"])) {echo $parc[$i]["calle"];}?>" name="calle" ></td>
  		<td><label >N°</label></td><td><input type="text" class="input-small" placeholder="Num." value="<?php //if (isset($parc[$i]["num"])) {echo $parc[$i]["num"];}?>" name="num"  ></td>
  		<td><label style="width:50px;">Piso</label></td><td><input type="text" class="input-small" placeholder="piso" value="<?php //if (isset($parc[$i]["piso"])) {echo $parc[$i]["piso"];}?>" name="piso" ></td>
  		
  		<td><label style="width:50px;">DTO.</label></td><td><input type="text" class="input-small" placeholder="Dto." value="<?php //if (isset($parc[$i]["dto"])) {echo $parc[$i]["dto"];}?>" name="dto" ></td>
  		</tr>
  		<tr>
  		<td><label >Entre calle</label></td><td><input type="text" class="input-large" placeholder="calle" value="<?php //if (isset($parc[$i]["entre1"])) {echo $parc[$i]["entre1"];}?>" name="entre1" ></td>
  		</tr>
  		<tr>
  		<td><label >Entre calle</label></td><td><input type="text" class="input-large" placeholder="calle" value="<?php //if (isset($parc[$i]["entre2"])) {echo $parc[$i]["entre2"];}?>" name="entre2" ></td>
  		</tr>
  		<tr>
  		<td><label >Localidad</label></td><td><input type="text" class="input-large" placeholder="localidad" value="<?php //if (isset($parc[$i]["localidad"])) {echo $parc[$i]["localidad"];}?>" name="localidad" ></td>
  		<td><label >Cod. Postal</label></td><td><input type="text" class="input-small" placeholder="Cod." value="<?php //if (isset($parc[$i]["cod_postal"])) {echo $parc[$i]["cod_postal"];}?>" name="cod_postal" ></td>
  		</tr>
  		<tr>
  		<td>&nbsp&nbsp</td>
  		</tr>	
  		<tr>
  		<td><label >Propietario</label></td><td><input type="text" class="input-xlarge" placeholder="No hay propietarios cargados" value="<?php //if (isset($parc[$i]["propietario"])) {echo $parc[$i]["propietario"];}?>" name="propietario" readonly="readonly"></br></td>
  		</tr>
  		<tr>
  		<td><label >Contribuyente</label></td><td><input type="text" class="input-xlarge" placeholder="No hay contribuyentes cargados" value="<?php //if (isset($parc[$i]["contribuyente"])) {echo $parc[$i]["contribuyente"];}?>" name="contribuyente"  readonly="readonly"></br></td>
  		</tr>
  		<tr>
  		<td><label >Poseedor</label></td><td><input type="text" class="input-xlarge" placeholder="No hay poseedor cargado" value="<?php //if (isset($parc[$i]["poseedor"])) {echo $parc[$i]["poseedor"];}?>" name="poseedor" readonly="readonly"></br></td>
  		</tr>
  		</table>
  		
      <?php $cod= $parc[$i]["codigo"];?>
    
        </div>
        </div>
		</form>
		
				
		
		


</body>
</html>
