<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("class/parcela.php");
require_once("class/class.php");

$par=new Parcela();
	

if (isset($_POST["grabar"])){


				
                    
                    if ($_POST["plano2"]==''){
                               $segundo="--";
                                             }else{
                               $segundo=$_POST["plano2"];             	
                                             }


					 $plano = $_POST["plano1"].$segundo.$_POST["plano3"].$_POST["plano4"];


                     
                     echo "<script>alert('". $_POST["partido"] ."');</script>";
$par->cargar_parcela($_POST["codigo"],$_POST["partida"],$plano,$_POST["circ"],$_POST["sec"],$_POST["chacra"],$_POST["quinta"],$_POST["fraccion"],
					$_POST["manzana"],$_POST["parcela"],$_POST["subparc"],$_POST["partido"],$_POST["calle"],$_POST["num"]
					,$_POST["piso"],$_POST["dto"],$_POST["entre1"],$_POST["entre2"],$_POST["localidad"],$_POST["cod_postal"],
					$_POST["propietario"],$_POST["contribuyente"],$_POST["poseedor"]);

}
if (isset($_POST["grabar2"])){
	
	

	$par->cargar_zona($_POST["area"],$_POST["fos"],$_POST["fot"],$_POST["densidad"],$_POST["frente_min"],$_POST["sup_min"],$_POST["ret_frente"],$_POST["ret_lat"],
					$_POST["alt_max"],$_POST["e_electrica"],$_POST["alumbrado"],$_POST["agua_pot"],$_POST["desague_c"]
					,$_POST["desague_p"],$_POST["gas_nat"],$_POST["pavimento"],$_POST["cordon_cun"],$_POST["estab"],$_POST["zona"],
					$_POST["coef"],$_POST["servicio"],$_POST["estado"],$_POST["tipo_cons"]);
			
		}
if (isset($_POST["grabar3"])){
	

	
					$par->modificar_zona($_POST["area"],$_POST["fos"],$_POST["fot"],$_POST["densidad"],$_POST["frente_min"],$_POST["sup_min"],$_POST["ret_frente"],$_POST["ret_lat"],
					$_POST["alt_max"],$_POST["e_electrica"],$_POST["alumbrado"],$_POST["agua_pot"],$_POST["desague_c"]
					,$_POST["desague_p"],$_POST["gas_nat"],$_POST["pavimento"],$_POST["cordon_cun"],$_POST["estab"],$_POST["zona"],
					$_POST["coef"],$_POST["servicio"],$_POST["estado"],$_POST["tipo_cons"]);
}
if (isset($_POST["grabar4"])){
					$plano = $_POST["plano1"].$_POST["plano2"].$_POST["plano3"].$_POST["plano4"];
	
	
	$par->modificar_parcela($_POST["cod1"],$_POST["codigo"],$_POST["partida"],$plano,$_POST["circ"],$_POST["sec"],$_POST["chacra"],$_POST["quinta"],$_POST["fraccion"],
					$_POST["manzana"],$_POST["parcela"],$_POST["subparc"],$_POST["partido"],$_POST["calle"],$_POST["num"]
					,$_POST["piso"],$_POST["dto"],$_POST["entre1"],$_POST["entre2"],$_POST["localidad"],$_POST["cod_postal"],
					$_POST["propietario"],$_POST["contribuyente"],$_POST["poseedor"]);
}



?>