<?php
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	
class Parcela
{
	private $usuario=array();
	private $parcela=array();
	private $parcelas=array();
	private $parcelas2=array();
	private $parcelasprop=array();
	private $parcelascontr=array();
	private $expedientes=array();
	private $zonas=array();
	private $zona=array();
	private $vari=array();
	private $medidas_dom=array();
	private $medidas_cat=array();
	private $planos=array();
	private $restricciones=array();
	private $calculo=array();
	private $importacion=array();


	public function add_dominales($numero, $funcionario, $inscripcion, $tipo, $localidad, $anio)
	{
		
		$sql="insert into inmueble values ('$numero', '$funcionario', '$inscripcion', '$tipo', '$localidad', '$anio')";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
			alert('El empleado fue ingresado correctamente');
			window.location='alta_inmueble.php';
		</script>";
	}

	public function add_propietario($cod, $nombre, $calle, $barrio, $numero, $piso, $departamento,$cod_postal,$num_doc,$cod_titular,$correo,$fax,$cuit)
	{

		$sql="INSERT INTO `propietario`( `nombre`, `calle`, `barrio`, `numero`, `piso`, `departamento`, `cod_postal`, `num_doc`, `cod_titular`, `correo`, `fax`,`cuit`) VALUES ('$nombre','$calle','$barrio','$numero','$piso','$departamento','$cod_postal','$num_doc','$cod_titular','$correo','$fax','$cuit')";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
			alert('El propietario fue ingresado correctamente');
			window.location='agregar_propietario.php?codigo=$cod';
		</script>";
	}
	public function add_contribuyente($cod,$nombre, $calle, $barrio, $numero, $piso, $departamento,$cod_postal,$num_doc,$cod_titular,$correo,$fax,$cuit)
	{
		
		$sql="INSERT INTO `contribuyente`( `nombre`, `calle`, `barrio`, `numero`, `piso`, `departamento`, `cod_postal`, `num_doc`, `cod_titular`, `correo`, `fax`,`cuit`) VALUES ('$nombre','$calle','$barrio','$numero','$piso','$departamento','$cod_postal','$num_doc','$cod_titular','$correo','$fax','$cuit')";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
			alert('El contribuyente fue ingresado correctamente');
			window.location='agregar_contribuyente.php?codigo=$cod';
		</script>";
	}
	public function ver_parcelas()
	{
		$sql="SELECT * FROM `parcela` WHERE 1";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcelas[]=$reg;
				}
				return $this->parcelas;
	}

	public function ver_parcelas2($propietario)
	{
		$sql="SELECT * FROM `parcela` WHERE propietario='$propietario'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcelasprop[]=$reg;
				}
				return $this->parcelasprop;
	}
		public function ver_parcelas3($contribuyente)
	{
		$sql="SELECT * FROM `parcela` WHERE contribuyente='$contribuyente'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcelascontr[]=$reg;
				}
				return $this->parcelascontr;
	}

	public function ver_parcela($cod)
	{
		 
		$sql="SELECT * FROM `parcela` WHERE `codigo`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcela[]=$reg;
				}
				return $this->parcela;
	}
	public function ver_restricciones($cod)
	{
		 
		$sql="SELECT * FROM `restricciones` WHERE `cod_parcela`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->restricciones[]=$reg;
				}
				return $this->restricciones;
	}
	public function ver_parcela2($cod)
	{
		 
		$sql="SELECT * FROM `parcela` WHERE `codigo`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcelas2[]=$reg;
				}
				return $this->parcelas2;
	}

	

	public function cargar_parcela($codigo,$partida,$plano,$circ,$sec,$chacra,$quinta,$fraccion,$manzana,$parcela,$subparc,$partido,$calle,$num
					,$piso,$dto,$entre1,$entre2,$localidad,$cod_postal,$propietario,$contribuyente,$poseedor)
	{
					

					$sql="INSERT INTO `parcela`(`codigo`, `plano`, `partida`, `propietario`, `contribuyente`, `poseedor`,  `circunscripcion`, `seccion`, `chacra_num`, `quinta_let`, `fraccion_let`, `manzana_let`, `parcela_let`, `subparcela`, `partido`, `calle`, `entre1`, `entre2`, `localidad`, `num`, `piso`, `dto`, `cod_postal` ) 
					VALUES ('$codigo',  '$plano', '$partida',  '$propietario',  '$contribuyente',  '$poseedor', '$circ',  '$sec', '$chacra',  '$quinta', '$fraccion',  '$manzana',  '$parcela',  '$subparc', '$partido', '$calle',  '$entre1',  '$entre2',  '$localidad', '$num', '$piso',  '$dto', '$cod_postal' )";
					$res=mysqli_query(Conectar::con(),$sql);
					echo "<script type='text/javascript'>
					alert('La parcela se ha generado exitosamente');
					window.location='cargar_parcela.php?codigo=$codigo';
					</script>";
	
		
	}
	


	public function delete_parcela($cod)
	{
		$sql="DELETE FROM `parcela` WHERE `codigo`=$cod";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "	<script type='text/javascript'>
				alert('La parcela se ha eliminado exitosamente');
				window.location='cargar_parcela.php';
				</script>";
	}
	public function delete_zona($area)
	{
		$sql="DELETE FROM `zona` WHERE `area`='$area'";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "	<script type='text/javascript'>
				alert('La zona se ha eliminado exitosamente');
				window.location='cargar_zona.php?codigo=$codigo';
				</script>";
				
	}
	public function num_filas()
	{
		$sql="SELECT * FROM `parcela` WHERE 1";
		$res=mysqli_query(Conectar::con(),$sql);
		$numero = mysqli_num_rows($res);
		return $numero;
	}
	public function num_filaszona()
	{
		$sql="SELECT * FROM `zona` WHERE 1";
		$res=mysqli_query(Conectar::con(),$sql);
		$numero = mysqli_num_rows($res);
		return $numero;
	}
	public function cargar_dominales($codigo,$fraccion,$chacra,$quinta,$manzana,$lote,$med_sup,$escribano,$tipo,$num_i,$serie,$año,$apellido,$dni,$cuit)
	{
		
		
		var_dump($codigo,$fraccion,$chacra,$quinta,$manzana,$lote,$med_sup,$escribano,$tipo,$num_i,$serie,$año,$apellido,$dni,$cuit);
		$sql="UPDATE `parcela` SET `fraccion`='$fraccion',`chacra`='$chacra',`quinta`='$quinta',`manzana`='$manzana',`lote`='$lote',`med_sup`='$med_sup',`escribano`='$escribano',`tipo`='$tipo',`num_i`='$num_i',`serie`='$serie',`año`='$año',`apellido`='$apellido',`dni`='$dni',`cuit`='$cuit' WHERE `codigo`='$codigo'";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "	<script type='text/javascript'>
				alert('Los datos dominales se han cargado correctamente');
				window.location='ver_parcela.php?codigo=$codigo';
				</script>";
		
	}
	public function cargar_catastrales($codigo,$partida,$circunscripcion,$seccion,$chacra_num,$quinta_let,$fraccion_let,$manzana_let,$parcela_let,$subparcela,$superficie,$sup_edif,$antecedentes,$expediente)
	{
		
		$sql="UPDATE `parcela` SET `partida`='$partida' , `circunscripcion`='$circunscripcion',`seccion`='$seccion',`chacra_num`='$chacra_num',`quinta_let`='$quinta_let',`fraccion_let`='$fraccion_let',`manzana_let`='$manzana_let',`parcela_let`='$parcela_let',`subparcela`='$subparcela',`superficie`='$superficie',`sup_edif`='$sup_edif',`antecedentes`='$antecedentes',`expediente`='$expediente' WHERE `codigo`='$codigo'";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "	<script type='text/javascript'>
				alert('Los datos catastrales se han cargado correctamente');
				window.location='ver_parcela.php?codigo=$codigo';
				</script>";
		
	}
	public function cargar_constructivos($codigo,$num_exp,$letra,$anio,$tipo_o,$existente,$demoler,$construir,$empadronar)
	{
		
		$sql="UPDATE `parcela` SET `num_exp`='$num_exp',`letra`='$letra',`anio`='$anio',`tipo_o`='$tipo_o',`existente`='$existente',`demoler`='$demoler',`construir`='$construir',`empadronar`='$empadronar' WHERE `codigo`='$codigo'";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "	<script type='text/javascript'>
				alert('Los datos constructivos se han cargado correctamente');
				window.location='ver_parcela.php?codigo=$codigo';
				</script>";
	
	}
	public function cargar_restricciones($cod,$exp1,$exp2,$exp3,$obs1,$obs2,$obs3)  
	{


		
		$sql1="DELETE FROM `restricciones` WHERE `cod_parcela`='$cod'";
		$sql2="INSERT INTO `restricciones`(`num_exp`, `comentario`, `cod_parcela`) VALUES ('$exp3','$obs3','$cod') ";  
		  
		$sql3="INSERT INTO `restricciones`(`num_exp`, `comentario`, `cod_parcela`) VALUES ('$exp2','$obs2','$cod')"; 
		$sql4="INSERT INTO `restricciones`(`num_exp`, `comentario`, `cod_parcela`) VALUES ('$exp1','$obs1','$cod') "; 
		$res=mysqli_query(Conectar::con(),$sql1);
		$res=mysqli_query(Conectar::con(),$sql2);
		$res=mysqli_query(Conectar::con(),$sql3);
		$res=mysqli_query(Conectar::con(),$sql4);
		

	
	
	}

	public function cargar_prop($prop,$cod)  
	{
		$sql1="UPDATE `parcela` SET `propietario`='$prop' WHERE `codigo`='$cod'";
		
		$res=mysqli_query(Conectar::con(),$sql1);
	
	}
	public function cargar_contr($contr,$cod)  
	{
		$sql1="UPDATE `parcela` SET `contribuyente`='$contr' WHERE `codigo`='$cod'";
		
		$res=mysqli_query(Conectar::con(),$sql1);
	
	}
	public function buscar_parcela($codigo)
	{	
		
		$sql="SELECT * FROM `parcela` WHERE `codigo`='$codigo'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcelas[]=$reg;
				}
				return $this->parcelas;
	
	}
	public function buscar_parcela2($partido,$partida)
	{	
		
		$sql="SELECT * FROM `parcela` WHERE (`partido`='$partido') AND (`partida`='$partida')";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcelas[]=$reg;
				}
				return $this->parcelas;
	
	}

	public function obtener_registros($valores)
	{	
		$cant= (count($valores))/2;
		

		if ($cant==1)
		{
		
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]'";
		//echo "<script type='text/javascript'>
		//alert('la cantidad es 2 veces".$cant."y el valor es".$valores[1]."');
		
		//</script>";
		//echo "el valor de la consulta sql es";
		//print_r($sql);
		}
		if ($cant==2)
		{
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]' and `$valores[2]`='$valores[3]'";
		}
		if ($cant==3)
		{
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]' and `$valores[2]`='$valores[3]' and `$valores[4]`='$valores[5]'";
		//echo "el valor de la consulta sql es";
		//print_r($sql);
		}
		if ($cant==4)
		{
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]' and `$valores[2]`='$valores[3]' and `$valores[4]`='$valores[5]' and `$valores[6]`='$valores[7]'";
		}
		if ($cant==5)
		{
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]' and `$valores[2]`='$valores[3]' and `$valores[4]`='$valores[5]' and `$valores[6]`='$valores[7]' and `$valores[8]`='$valores[9]'";
		}
		if ($cant==6)
		{
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]' and `$valores[2]`='$valores[3]' and `$valores[4]`='$valores[5]' and `$valores[6]`='$valores[7]' and `$valores[8]`='$valores[9]' and `$valores[10]`='$valores[11]'";
		}
		if ($cant==7)
		{
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]' and `$valores[2]`='$valores[3]' and `$valores[4]`='$valores[5]' and `$valores[6]`='$valores[7]' and `$valores[8]`='$valores[9]' and `$valores[10]`='$valores[11]' and `$valores[12]`='$valores[13]'";
		}
		if ($cant==8)
		{
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]' and `$valores[2]`='$valores[3]' and `$valores[4]`='$valores[5]' and `$valores[6]`='$valores[7]' and `$valores[8]`='$valores[9]' and `$valores[10]`='$valores[11]' and `$valores[12]`='$valores[13]' and `$valores[14]`='$valores[15]'";
		}
		if ($cant==9)
		{
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]' and `$valores[2]`='$valores[3]' and `$valores[4]`='$valores[5]' and `$valores[6]`='$valores[7]' and `$valores[8]`='$valores[9]' and `$valores[10]`='$valores[11]' and `$valores[12]`='$valores[13]' and `$valores[14]`='$valores[15]' and `$valores[16]`='$valores[17]'";
		}
		if ($cant==10)
		{
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]' and `$valores[2]`='$valores[3]' and `$valores[4]`='$valores[5]' and `$valores[6]`='$valores[7]' and `$valores[8]`='$valores[9]' and `$valores[10]`='$valores[11]' and `$valores[12]`='$valores[13]' and `$valores[14]`='$valores[15]' and `$valores[16]`='$valores[17]' and`$valores[18]`='$valores[19]'";
		}
		if ($cant==11)
		{
		$sql="SELECT * FROM `parcela` WHERE `$valores[0]`='$valores[1]' and `$valores[2]`='$valores[3]' and `$valores[4]`='$valores[5]' and `$valores[6]`='$valores[7]' and `$valores[8]`='$valores[9]' and `$valores[10]`='$valores[11]' and `$valores[12]`='$valores[13]' and `$valores[14]`='$valores[15]' and `$valores[16]`='$valores[17]' and`$valores[18]`='$valores[19]' and `$valores[20]`='$valores[21]'";
		}

		
		if ($cant>0){
		
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
			{
					$this->parcelas[]=$reg;
				}

			}
			return $this->parcelas;
	
	}
	public function ver_propietarios()
	{	
		
		$sql="SELECT * FROM `propietario` WHERE 1";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcelas[]=$reg;
				}
				return $this->parcelas;
	
	}
		public function ver_contribuyentes()
	{	
		
		$sql="SELECT * FROM `contribuyente` WHERE 1";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcelas[]=$reg;
				}
				return $this->parcelas;
	
	}
		public function ver_planos($cod)
	{	
		
		$sql="SELECT * FROM `planos_men` WHERE `cod_parcela`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->planos[]=$reg;
				}
				return $this->planos;
	
	}
		public function ver_zona($zona)
	{	$i	= 0;	?>
		<style type="text/css">
		.achica label {
			display: inline;
		}
		</style>
		<label >AREA</label ><input type="text" class="input-medium" placeholder="area" name="codigo" value="<?php if (isset($zona[$i]["area"])){ echo $zona[$i]["area"];}?>" readonly="readonly"><A href="zonas/<?php if (isset($zona[$i]["area"])){ echo $zona[$i]["area"]; }?>.doc" style="color:blue;position: relative;left:5px;"><u>PLANILLA DE ZONA</u></A> </br></br>
  		<h5>Indicadores urbanisticos</h5></br>
  		Del terreno
  		<div class="achica">
  		<label >F.O.S</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="f.o.s" value="<?php if (isset($zona[$i]["fos"])){ echo $zona[$i]["fos"];}?>" readonly="readonly" style="
    			position: relative;
    			right: 2px;
				">
  		<label >F.O.T</label>&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="f.o.t" value="<?php if (isset($zona[$i]["fot"])){  echo $zona[$i]["fot"];}?>" readonly="readonly">
  		<label >Densidad</label>&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="Dens." value="<?php if (isset($zona[$i]["densidad"])){ echo $zona[$i]["densidad"];}?>" readonly="readonly">
  		<label >Frente minimo</label>&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="F min." value="<?php if (isset($zona[$i]["frente_min"])){ echo $zona[$i]["frente_min"];}?>" readonly="readonly"></br></br>
  		<label >Sup. minima</label>&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="Sup min." value="<?php if (isset($zona[$i]["sup_min"])){ echo $zona[$i]["sup_min"];}?>" readonly="readonly"></br></br>
  		DEL EDIFICIO </br>
  		<label >Retiro Frente</label>&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="R. fren" value="<?php if (isset($zona[$i]["ret_frente"])){ echo $zona[$i]["ret_frente"];}?>" readonly="readonly">	
  		<label >Retiro Laterales</label>&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="R. lat" value="<?php if (isset($zona[$i]["ret_lat"])){ echo $zona[$i]["ret_lat"];}?>" readonly="readonly">
  		<label >Altura Maxima</label>&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="Alt. max." value="<?php if (isset($zona[$i]["alt_max"])){ echo $zona[$i]["alt_max"];}?>" readonly="readonly"></br></br>
  		</div>
  		<h5>Servicios existentes</h5></br>
  		
  		<?php 
  		if (isset($zona[$i]["e_electrica"],$zona[$i]["alumbrado"],$zona[$i]["agua_pot"],$zona[$i]["desague_c"],$zona[$i]["desague_p"],$zona[$i]["gas_nat"],$zona[$i]["pavimento"],$zona[$i]["cordon_cun"],$zona[$i]["estab"]))
  		{
  		?>
  		<table class="servicio">
		<tr>
		<td><label >E. eléctrica</label></td><td><input name="check[]" type="checkbox" <?php if ($zona[$i]["e_electrica"]=='on' ){ ?> checked="1" <?php }?> ></td>
  		<td><label >Alumbrado</label></td><td><input name="check[]" type="checkbox"<?php if ($zona[$i]["alumbrado"]=='on' ){ ?> checked="1" <?php }?> ></td>
  		<td><label >Agua Potable</label></td><td><input name="check[]" type="checkbox" <?php if ($zona[$i]["agua_pot"]=='on' ){ ?> checked="1" <?php }?> ></td>
  		<td><label >Desague cloacal</label></td><td><input name="check[]" type="checkbox" <?php if ($zona[$i]["desague_c"]=='on' ){ ?> checked="1" <?php }?> ></td>
  		<td><label >Desague Pluvial</label></td><td><input name="check[]" type="checkbox" <?php if ($zona[$i]["desague_p"]=='on' ){ ?> checked="1" <?php }?>/></td>
  		<td><label >Gas Natural</label></td><td><input name="check[]" type="checkbox" <?php if ($zona[$i]["gas_nat"]=='on' ){ ?> checked="1" <?php }?>/></td>
  		</tr>
  			<tr>
  			<td>
  				<label ></label>
  			</td>
  			</tr>
  		<tr>
  		<td><label >Pavimento</label></td><td><input name="check[]" type="checkbox" <?php if ($zona[$i]["pavimento"]=='on' ){ ?> checked="1" <?php }?>/></td>
  		<td><label >Cordon Cuneta</label></td><td><input name="check[[]" type="checkbox" <?php if ($zona[$i]["cordon_cun"]=='on' ){ ?> checked="1" <?php }?>/></td>
  		<td><label >Estab. de calle</label></td><td><input name="check[]" type="checkbox" <?php if ($zona[$i]["estab"]=='on' ){ ?> checked="1" <?php }?>/></td>
  		</tr>
  		</table>
  		<?php }?>
  		</br>
  		<h5>Codigo segun ordenanza fiscal año</h5></td>	
  		</br>
  		<table>
  		<tr>
  		<td><label >Zona</label></td><td><input type="text" class="input-small" placeholder="Zona" value="<?php if (isset($zona[$i]["zona"])){ echo $zona[$i]["zona"];}?>" readonly="readonly"></td>
  		<td><label >Coeficiente</label></td><td><input type="text" class="input-small" placeholder="Coef" value="<?php if (isset($zona[$i]["coef"])){echo $zona[$i]["coef"];}?>" readonly="readonly"></td>
  		<td><label >Servicio Prestado</label></td><td><input type="text" class="input-small" placeholder="Serv" value="<?php if (isset($zona[$i]["servicio"])){echo $zona[$i]["servicio"];}?>" readonly="readonly"></td>
  		<td><label >Estado Constructivo</label></td><td><input type="text" class="input-small" placeholder="Estado" value="<?php if (isset($zona[$i]["estado"])){echo $zona[$i]["estado"];}?>" readonly="readonly"></td>
  		<td><label >Tipo de Construcción</label></td><td><input type="text" class="input-small" placeholder="Tipo cons." value="<?php if (isset($zona[$i]["tipo_cons"])){echo $zona[$i]["tipo_cons"];}?>" readonly="readonly"></td>
  		</tr>
  		
  		</table>
		<?php
	
	}

	public function obtener_calculo($cod)
	{
		$sql="SELECT * FROM `calculo` WHERE `cod_parcela`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->calculo[]=$reg;
				}
				return $this->calculo;
	}





	public function ver_tablaobra($calc)
		{
		
		//fecha de inicio
		if (isset($calc[1]['ini_obra'])){$diaini=substr($calc[1]['ini_obra'],6,2);}
		if (isset($calc[1]['ini_obra'])){$mesini=substr($calc[1]['ini_obra'],4,2);}
		if (isset($calc[1]['ini_obra'])){$añoini=substr($calc[1]['ini_obra'],0,4);}
		//fecha de final
		if (isset($calc[1]['final_obra'])){$diafin1=substr($calc[1]['final_obra'],6,2);}
		if (isset($calc[1]['final_obra'])){$mesfin1=substr($calc[1]['final_obra'],4,2);}
		if (isset($calc[1]['final_obra'])){$añofin1=substr($calc[1]['final_obra'],0,4);}
		if (isset($calc[2]['final_obra'])){$diafin2=substr($calc[2]['final_obra'],6,2);}
		if (isset($calc[2]['final_obra'])){$mesfin2=substr($calc[2]['final_obra'],4,2);}
		if (isset($calc[2]['final_obra'])){$añofin2=substr($calc[2]['final_obra'],0,4);}
		if (isset($calc[3]['final_obra'])){$diafin3=substr($calc[3]['final_obra'],6,2);}
		if (isset($calc[3]['final_obra'])){$mesfin3=substr($calc[3]['final_obra'],4,2);}
		if (isset($calc[3]['final_obra'])){$añofin3=substr($calc[3]['final_obra'],0,4);}
		//fecha de presentacion
		if (isset($calc[1]['fecha_pre'])){$diapres1=substr($calc[1]['fecha_pre'],6,2);}
		if (isset($calc[1]['fecha_pre'])){$mespres1=substr($calc[1]['fecha_pre'],4,2);}
		if (isset($calc[1]['fecha_pre'])){$añopres1=substr($calc[1]['fecha_pre'],0,4);}
		if (isset($calc[2]['fecha_pre'])){$diapres2=substr($calc[2]['fecha_pre'],6,2);}
		if (isset($calc[2]['fecha_pre'])){$mespres2=substr($calc[2]['fecha_pre'],4,2);}
		if (isset($calc[2]['fecha_pre'])){$añopres2=substr($calc[2]['fecha_pre'],0,4);}
		if (isset($calc[3]['fecha_pre'])){$diapres3=substr($calc[3]['fecha_pre'],6,2);}
		if (isset($calc[3]['fecha_pre'])){$mespres3=substr($calc[3]['fecha_pre'],4,2);}
		if (isset($calc[3]['fecha_pre'])){$añopres3=substr($calc[3]['fecha_pre'],0,4);}

		
		
		?>
		
		<form name="formcalc" action="ver_parcela.php" method="post">
	    </br></br></br></br>
	    <form>
		<table border="1" style="width:2200px;">
		<thead>
		<tr>
  		<td rowspan="2" style="text-align:center;"><strong>Inicio de obra</strong></td>
  		<td rowspan="2" style="text-align:center;"><strong>Final de obra</strong></td>
  		<td rowspan="2" style="text-align:center;"><strong>Fecha de presentación</strong></td>
 	    <td rowspan="2" style="text-align:center;"><strong>Plazo transcurrido</strong></td>
	    <td rowspan="2" style="text-align:center;"><strong>Tipo de obra</strong></td>
  		<td  colspan="2" style="text-align:center;"><strong>Base Imponible</strong></td>
 	    <td  colspan="2" style="text-align:center;"><strong>Alícuota</strong></td>
 	    <td rowspan="2" style="text-align:center;"><strong>Interes</strong></td>
  		<td rowspan="2" style="text-align:center;"><strong>T.D.C</strong></td>			
		</tr>
		<tr>
		<td scope="col" style="text-align:center;"><strong>Unidad</strong></td>
		<td scope="col" style="text-align:center;"><strong>Valor considerado</strong></td>
		<td scope="col" style="text-align:center;"><strong>Reg.</strong></td>
		<td scope="col" style="text-align:center;"><strong>Antireg</strong></td>

		</tr>
 		</thead>
		<tr >
   		<td><input type="text" class="input-small"  name="" style="width:40px;" readonly="readonly"><input type="text" class="input-small"  name="inicio" style="width:40px;" readonly="readonly"><input type="text" class="input-small"  name="obra[]" readonly="readonly"></td>
  	    <td><input type="text" class="input-small"  name="" style="width:40px;" readonly="readonly" onchange="calcular()"><input type="text" class="input-small"  name="final" id="final" style="width:40px;"  readonly="readonly" onchange="calcular()"><input type="text" class="input-small"  readonly="readonly" onchange="calcular()"></td>
   		<td><input type="text" class="input-small"  name="" onchange="calcular()" style="width:40px;" readonly="readonly"><input type="text" class="input-small"  name="fecha" id="fecha" style="width:40px;" onchange="calcular()"  readonly="readonly"><input type="text" class="input-small"  readonly="readonly" onchange="calcular()"></td>
   		<?php    
   		//$mes_final=substr($_POST["obra"][1],3,2);	  ?>
		<?php //$mes_fecha=substr($_POST["obra"][2],3,2);   ?>
   		<td><input type="text" class="input-medium" name="resultado"  id="resul_4"  readonly="readonly" value="">  </td>
  	    <td style="text-align:center;"><label >Demolición</label></td>
   		<td><label style="width:150px;text-align:center;">m2</label></td>
        <td><input type="text" class="input-medium" onchange="calcularprim()" name="valor1"  value="<?php if (isset($calc[0]['valor'])){ echo $calc[0]['valor'];	}?>"></td>
        <td><input type="text" class="input-medium" onchange="calcularprim()" name="reg1"		value="<?php if (isset($calc[0]['reg'])){echo $calc[0]['reg'];	}?>"></td>
        <td><input type="text" class="input-medium" name="obra1" readonly="readonly"   value=""></td>
        <td><input type="text" class="input-medium" name="obra2" readonly="readonly"></td>
        <td><input type="text" class="input-medium" name="tdc1"   value="<?php if (isset($calc[0]['tdc'])) {echo $calc[0]['tdc'];	}?>"></td>
        <input type="hidden" name="oculto1" value="<?php if (isset($calc[0]['id'])) {echo $calc[0]['id'];}	?>">
        </tr>
 
		<tr>
  		<td><input type="text" class="input-small"  name="obra3" style="width:40px;" value="<?php if (isset($diaini)){echo $diaini; }	?>"><input type="text" class="input-small"  name="inicio2" style="width:40px;"  value="<?php if (isset($mesini)){echo $mesini;}	?>"><input type="text" class="input-small"  name="anio1"	value="<?php if (isset($añoini)){echo $añoini;  }	?>"></td>
  	    <td><input type="text" class="input-small"  name="obra4" style="width:40px;" onchange="calcular2()" value="<?php if (isset($diafin1)) {echo $diafin1;} ?>"><input type="text" class="input-small"  name="final2" style="width:40px;" onchange="calcular2()" value="<?php if (isset($mesfin1)){echo $mesfin1;} ?>"><input type="text" class="input-small"  name="anio1_1" onchange="calcular2()" value="<?php if (isset($añofin1)){echo $añofin1; }?>"></td>
   		<td><input type="text" class="input-small"  name="obra5" style="width:40px;" onchange="calcular2()" value="<?php if (isset($diapres1)){ echo $diapres1;} ?>"><input type="text" class="input-small"  name="fecha2" style="width:40px;"  onchange="calcular2()" value="<?php if (isset($mespres1)){echo $mespres1;} ?>"><input type="text" class="input-small"  name="anio2_2" onchange="calcular2()" value="<?php if (isset($añopres1)){ echo $añopres1;} ?>"></td>
  		<td><input type="text" class="input-medium" id="resul_5" onchange="calcularsegu()" name="resultado2"  value="<?php if (isset($calc[1]['plazo'])){ echo $calc[1]['plazo'];}	?>"></td>
  		<td style="text-align:center;"><label >A contruir</label></td>
  		<td><label style="text-align:center;">Valuacion </label></td>
  		<td><input type="text" class="input-medium" name="valor2" onchange="calcularsegu()"	value="<?php if (isset($calc[1]['valor'])){echo $calc[1]['valor'];}	?>"></td>
  		<td><input type="text" class="input-medium"  onchange="calcularsegu()" name="reg2"	value="<?php if (isset($calc[1]['reg'])){ echo $calc[1]['reg'];	}?>"></td>
 	    <td><input type="text" class="input-medium" name="obra6" readonly="readonly" value=""></td>
 	    <td><input type="text" class="input-medium" name="obra7" readonly="readonly"></td>
 	    <td><input type="text" class="input-medium" name="tdc2"		value="<?php if (isset($calc[1]['tdc'])){ echo $calc[1]['tdc'];}	?>"></td>
 	    <input type="hidden" name="oculto2" value="<?php if (isset($calc[1]['id'])){ echo $calc[1]['id'];	}?>">
		</tr>
 
		<tr>
  		<td><input type="text" class="input-small"  name="obra8" style="width:40px;" readonly="readonly"><input type="text" class="input-small"  name="inicio3" style="width:40px;" readonly="readonly"><input type="text" class="input-small"  name="anio4" readonly="readonly"></td>
  	    <td><input type="text" class="input-small"  name="obra9" style="width:40px;" onchange="calcular3()" value="<?php if (isset($diafin2)){ echo $diafin2;} ?>"><input type="text" class="input-small"  name="final3" style="width:40px;" onchange="calcular3()" value="<?php if (isset($mesfin2)){ echo $mesfin2;} ?>"><input type="text" class="input-small"  name="anio3" onchange="calcular3()" value="<?php if (isset($añofin2)){ echo $añofin2 ;}?>"></td>
   		<td><input type="text" class="input-small"  name="obra10" style="width:40px;" onchange="calcular3()" value="<?php if (isset($diapres2)){ echo $diapres2 ;}?>"><input type="text" class="input-small"  name="fecha3" style="width:40px;" onchange="calcular3()" value="<?php if (isset($mespres2)){echo $mespres2;} ?>"><input type="text" class="input-small"  name="anio4_4"  onchange="calcular3()" value="<?php if (isset($añopres2)){ echo $añopres2;} ?>"></td>
        <td><input type="text" class="input-medium" id="resul_6" onchange="calcularter()" name="resultado3" value="<?php if (isset($calc[2]['plazo'])){ echo $calc[2]['plazo'];	}?>"></td>
        <td style="text-align:center;"><label for="User">A empadronar (Reg)</label></td>
        <td><label for="User" style="text-align:center;">Valuacion </label></td>
        <td><input type="text" class="input-medium" name="valor3" onchange="calcularter()" value="<?php if (isset($calc[2]['valor'])){ echo $calc[2]['valor']; }?>"></td>
        <td><input type="text" class="input-medium" name="reg3" onchange="calcularter()" value="<?php if (isset($calc[2]['reg'])){ echo $calc[2]['reg'];}	?>"></td>
        <td><input type="text" class="input-medium" name="obra11" readonly="readonly"  value=""	></td>
        <td><input type="text" class="input-medium" name="interes3" onchange="calcularter()"  value="<?php if (isset($calc[2]['interes'])) {echo $calc[2]['interes'];	}?>"></td>
        <td><input type="text" class="input-medium" name="tdc3"	value="<?php if (isset($calc[2]['tdc'])){ echo $calc[2]['tdc'];}	?>"></td>
        <input type="hidden" name="oculto3" value="<?php if (isset($calc[2]['id'])){ echo $calc[2]['id'];}	?>">	
        </tr>

        
        <tr>
  		<td><input type="text" class="input-small"  name="obra12" style="width:40px;" readonly="readonly"><input type="text" class="input-small"  name="inicio4" style="width:40px;" readonly="readonly"><input type="text" class="input-small"  name="anio7" readonly="readonly"></td>
  	    <td><input type="text" class="input-small"  name="obra13" style="width:40px;" onchange="calcular4()" value="<?php if (isset($diafin3)) { echo $diafin3; }?>"><input type="text" class="input-small"  name="final4" style="width:40px;" onchange="calcular4()" value="<?php if (isset($mesfin3)){echo $mesfin3;} ?>"><input type="text" class="input-small"  name="anio5" onchange="calcular4()" value="<?php if (isset($añofin3)) {echo $añofin3;} ?>"></td>
   		<td><input type="text" class="input-small"  name="obra14" style="width:40px;" onchange="calcular4()" value="<?php if (isset($diafin3)) {echo $diafin3 ;}?>"><input type="text" class="input-small"  name="fecha4" style="width:40px;" onchange="calcular4()" value="<?php if (isset($mespres3)) {echo $mespres3; }?>"><input type="text" class="input-small"  name="anio6" onchange="calcular4()" value="<?php if (isset($añopres3)) {echo $añopres3 ;}?>"></td>
        <td><input type="text" class="input-medium" id="resul_7" onchange="calcularcuar()" name="resultado4" 	value="<?php if (isset($calc[3]['plazo'])) {echo $calc[3]['plazo'];	}?>"></td>
        <td style="text-align:center;"><label for="User">A empadronar (Antireg)</label></td>
        <td><label for="User" style="text-align:center;">Valuacion</label></td>
        <td><input type="text" class="input-medium" name="valor4" onchange="calcularcuar()"	value="<?php if (isset($calc[3]['valor'])) { echo $calc[3]['valor'];}	?>"></td>
        <td><input type="text" class="input-medium"  name="reg4"   readonly="readonly"	value=""></td>
        <td><input type="text" class="input-medium" name="antireg4" onchange="calcularcuar()"	value="<?php if (isset($calc[3]['antireg'])) {echo $calc[3]['antireg'];}	?>"></td>
        <td><input type="text" class="input-medium" name="interes4" onchange="calcularcuar()"	value="<?php if (isset($calc[3]['interes'])) { echo $calc[3]['interes'];}?>"></td>
        <td><input type="text" class="input-medium" name="tdc4"		value="<?php if (isset($calc[3]['tdc'])) {echo $calc[3]['tdc'];	}?>"></td>
        <input type="hidden" name="oculto4" value="<?php if (isset($calc[3]['id'])) {echo $calc[3]['id'];}	?>">
        </tr>
		</table>
		</form>
		<?php
		
			}



		public function actualizar_tabla()
			{


            		$iniobra2=$_POST['anio1'].$_POST['inicio2'].$_POST['obra3'];
            		$finalobra2=$_POST['anio1_1'].$_POST['final2'].$_POST['obra4'];
            		$finalobra3=$_POST['anio3'].$_POST['final3'].$_POST['obra9'];
            		$finalobra4=$_POST['anio5'].$_POST['final4'].$_POST['obra13'];
            		$fechapres2=$_POST['anio2_2'].$_POST['fecha2'].$_POST['obra5'];
            		$fechapres3=$_POST['anio4_4'].$_POST['fecha3'].$_POST['obra10'];
            		$fechapres4=$_POST['anio6'].$_POST['fecha4'].$_POST['obra14'];
            		
            			
            		$plazo1=$_POST['resultado'];$plazo2=$_POST['resultado2'];$plazo3=$_POST['resultado3'];$plazo4=$_POST['resultado4'];
            		$valor1=$_POST['valor1'];$valor2=$_POST['valor2'];$valor3=$_POST['valor3'];$valor4=$_POST['valor4'];
            		$reg1=$_POST['reg1'];$reg2=$_POST['reg2'];$reg3=$_POST['reg3'];
            		$antireg4=$_POST['antireg4'];
            		$interes3=$_POST['interes3'];$interes4=$_POST['interes4'];
            		$tdc1=$_POST['tdc1'];$tdc2=$_POST['tdc2'];$tdc3=$_POST['tdc3'];$tdc4=$_POST['tdc4'];
            		$id1=$_POST['oculto1'];$id2=$_POST['oculto2'];$id3=$_POST['oculto3'];$id4=$_POST['oculto4'];
            						//echo "<script type='text/javascript'>
									//alert('los puntos fueron cargados corectamente obra3".$_POST["obra3"]."inicio2".$_POST["inicio2"]."anio1".$_POST["anio1"]."obra4".$_POST["obra4"]."final2".$_POST["final2"]."anio1_1".$_POST["anio1_1"]."obra5".$_POST["obra5"]."fecha2".$_POST["fecha2"]."anio2_2".$_POST["anio2_2"]."resul_5".$_POST["resul_5"]."valor2".$_POST["valor2"]."reg2".$_POST["reg2"]."tdc2".$_POST["tdc2"]."');
									//</script>";
									
									
									
						
					//echo $valor2; echo $tdc2; echo $id2; echo $valor2;
									
            		$ok=false;
            		$this->validar($_GET['codigo'],$ok);
            		if($ok==true)
            		{
            			if (isset($iniobra2,$finalobra2,$finalobra3,$finalobra4,$fechapres2,$fechapres3,$fechapres4,$plazo1,$plazo2,$plazo3,$plazo4,$valor1,$valor2,$valor3,$valor4,$reg1,$reg2,$reg3,$antireg4,$interes3,$interes4,$tdc1,$tdc2,$tdc3,$tdc4)){
            		$this->cargar_calculos($_GET['codigo'],$iniobra2,$finalobra2,$finalobra3,$finalobra4,$fechapres2,$fechapres3,$fechapres4,$plazo1,$plazo2,$plazo3,$plazo4,$valor1,$valor2,$valor3,$valor4,$reg1,$reg2,$reg3,$antireg4,$interes3,$interes4,$tdc1,$tdc2,$tdc3,$tdc4);
            							}
            		}else{
            					
            					$this->update_calculos($_GET['codigo'],$iniobra2,$finalobra2,$finalobra3,$finalobra4,$fechapres2,$fechapres3,$fechapres4,$plazo1,$plazo2,$plazo3,$plazo4,$valor1,$valor2,$valor3,$valor4,$reg1,$reg2,$reg3,$antireg4,$interes3,$interes4,$tdc1,$tdc2,$tdc3,$tdc4,$id1,$id2,$id3,$id4);
            			 }
            			 $codi=$_GET['codigo'];
            			 echo "	<script type='text/javascript'>
						alert('La tabla ha sido actualizada exitosamente');
						window.location='ver_parcela.php?codigo=$codi';
						</script>";
            	}
        
		



	
    public function obtener_importacion($cod)
	{
		
		$sql1="SELECT * FROM `importacion` WHERE `cod_parcela`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql1);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->importacion[]=$reg;
				}
				return $this->importacion;


   				 				 
   				   				   					
	}

	public function validar($cod,&$ok)
	{
		
		$sql1="SELECT * FROM `calculo` WHERE `cod_parcela`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql1);
		
		$totalFilas =  mysqli_num_rows($res); 
		if ($totalFilas==0) {
   				 		
   				 		$ok=true;
   				 			}

   				 				 
   				   				   					
	}





	public function cargar_calculos($cod,$iniobra2,$finalobra2,$finalobra3,$finalobra4,$fechapres2,$fechapres3,$fechapres4,$plazo1,$plazo2,$plazo3,$plazo4,$valor1,$valor2,$valor3,$valor4,$reg1,$reg2,$reg3,$antireg4,$interes3,$interes4,$tdc1,$tdc2,$tdc3,$tdc4)
		{
			
			//echo "<script type='text/javascript'>
			//alert('los puntos fueron cargados corectamente obra3".$cod."inicio2".$iniobra2."anio1".$finalobra2."obra4".$finalobra3."final2".$finalobra4."anio1_1".$fechapres2."obra5".$fechapres3."fecha2".$fechapres4."anio2_2".$plazo1."resul_5".$plazo2."valor2".$plazo3."reg2".$plazo4."tdc2".$valor1."tdc3".$valor2."final2".$valor3."anio1_1".$valor4."obra5".$reg1."fecha2".$reg2."anio2_2".$reg3."antireg".$antireg4."valor2".$interes3."reg2".$interes4."tdc2".$tdc1."antireg".$tdc2."valor2".$tdc3."reg2".$tdc4."');
			//</script>";
			$sql1="INSERT INTO `calculo`(`cod_parcela`,`ini_obra`, `final_obra`, `fecha_pre`, `plazo`, `valor`, `reg`, `antireg`, `interes`, `tdc`) VALUES ('$cod','','','','','$valor1','$reg1','','','$tdc1')";
			$sql2="INSERT INTO `calculo`(`cod_parcela`,`ini_obra`, `final_obra`, `fecha_pre`, `plazo`, `valor`, `reg`, `antireg`, `interes`, `tdc`) VALUES ('$cod','$iniobra2','$finalobra2','$fechapres2','$plazo2','$valor2','$reg2','','','$tdc2')";
			$sql3="INSERT INTO `calculo`(`cod_parcela`,`ini_obra`, `final_obra`, `fecha_pre`, `plazo`, `valor`, `reg`, `antireg`, `interes`, `tdc`) VALUES ('$cod','','$finalobra3','$fechapres3','$plazo3','$valor3','$reg3','','$interes3','$tdc3')";
			$sql4="INSERT INTO `calculo`(`cod_parcela`,`ini_obra`, `final_obra`, `fecha_pre`, `plazo`, `valor`, `reg`, `antireg`, `interes`, `tdc`) VALUES ('$cod','','$finalobra4','$fechapres4','$plazo4','$valor4','','$antireg4','$interes4','$tdc4')";
			
			$res=mysqli_query(Conectar::con(),$sql1);
			$res=mysqli_query(Conectar::con(),$sql2);
			$res=mysqli_query(Conectar::con(),$sql3);
			$res=mysqli_query(Conectar::con(),$sql4);
		}
	public function update_calculos($cod,$iniobra2,$finalobra2,$finalobra3,$finalobra4,$fechapres2,$fechapres3,$fechapres4,$plazo1,$plazo2,$plazo3,$plazo4,$valor1,$valor2,$valor3,$valor4,$reg1,$reg2,$reg3,$antireg4,$interes3,$interes4,$tdc1,$tdc2,$tdc3,$tdc4,$id1,$id2,$id3,$id4)
		{
			
			//echo "<script type='text/javascript'>
			//alert('los puntos fueron cargados corectamente cod".$cod."iniobra2".$iniobra2."finalobra2".$finalobra2."finalobra3".$finalobra3."finalobra4".$finalobra4."fechapres2".$fechapres2."fechapres3".$fechapres3."fechapres4".$fechapres4."plazo1".$plazo1."plazo2".$plazo2."plazo3".$plazo3."plazo4".$plazo4."valor1".$valor1."valor2".$valor2."');
			//</script>";


			//echo "<script type='text/javascript'>
			//alert('los puntos fueron cargados corectamente valor3".$valor3."valor4".$valor4."reg1".$reg1."reg2".$reg2."reg3".$reg3."antireg4".$antireg4."interes3".$interes3."interes4".$interes4."tdc1".$tdc1."tdc2".$tdc2."tdc3".$tdc3."tdc4".$tdc4."');
			//</script>";
			//echo "<script type='text/javascript'>
			//alert('los puntos fueron cargados id1".$id1."id2".$id2."id3".$id3."id4".$id4."');
			//</script>";
			
			
			$sql1="UPDATE `calculo` SET `cod_parcela`='$cod',`ini_obra`='',`final_obra`='',`fecha_pre`='',`plazo`='',`valor`='$valor1',`reg`='$reg1',`antireg`='',`interes`='',`tdc`='$tdc1' WHERE `id`=$id1	";
			$sql2="UPDATE `calculo` SET `cod_parcela`='$cod',`ini_obra`='$iniobra2',`final_obra`='$finalobra2',`fecha_pre`='$fechapres2',`plazo`='$plazo2',`valor`='$valor2',`reg`='$reg2',`antireg`='',`interes`='',`tdc`='$td2' WHERE `id`=$id2	";
			$sql3="UPDATE `calculo` SET `cod_parcela`='$cod',`ini_obra`='$iniobra3',`final_obra`='$finalobra3',`fecha_pre`='$fechapres3',`plazo`='$plazo3',`valor`='$valor3',`reg`='$reg3',`interes`='$intereses3',`tdc`='$td3' WHERE `id`=$id3
					";

			$sql4="UPDATE `calculo` SET `cod_parcela`='$cod',`final_obra`='$finalobra4',`fecha_pre`='$fechapres4',`plazo`='$plazo4',`valor`='$valor4',`antireg`='$antireg4',`interes`='$interes4',`tdc`='$td4' WHERE `id`=$id4
					";
			$res=mysqli_query(Conectar::con(),$sql1);
			$res=mysqli_query(Conectar::con(),$sql2);
			$res=mysqli_query(Conectar::con(),$sql3);
			$res=mysqli_query(Conectar::con(),$sql4);
		}			





	public function buscar_propietario($nombre)
	{	
		
		$sql="SELECT * FROM `propietario` WHERE `nombre`='$nombre'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcelas[]=$reg;
				}
				return $this->parcelas;
	
	}

	public function buscar_contribuyente($nombre)
	{	
		
		$sql="SELECT * FROM `contribuyente` WHERE `nombre`='$nombre'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->parcelas[]=$reg;
				}
				return $this->parcelas;
	
	}
	function array_envia($array) { 

     $tmp = serialize($array); 
     $tmp = urlencode($tmp); 

     return $tmp; 
	} 
	function array_recibe($url_array) { 
     $tmp = stripslashes($url_array); 
     $tmp = urldecode($tmp); 
     $tmp = unserialize($tmp); 

    return $tmp; 
	} 

	public function eliminar_exp($valor)
	{	
		$sql="DELETE FROM `expediente` WHERE `num_exp`='$valor'";
		$res=mysql_query($sql, Conectar::con());
		echo "<script type='text/javascript'>
		alert('el expediente se ha eliminado correctamente');

		</script>";
	}

	public function expedientes($cod)
	{	
					
    			
		$sql="SELECT * FROM `expediente` WHERE `cod_par`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->expedientes[]=$reg;
				}
			$exp=$this->expedientes;	

		if (!empty($exp)){ ?>
		</br></br></br></br></br></br>
		<table class="table table-bordered table-hover" cellspacing="0" style="width: 1100px;">
		
			<tr valign="top" align="center">
				<th>Numero de exp.</th>
				<th>Letra</th>
				<th>Año</th>
				<th>Tipo de obra</th>
				<th>Existente</th>
				<th>A demoler</th>
				<th>A construir(m2)</th>
				<th>A empadronar(m2)</th>
				<th>Archivo digital</th>
				<th></th>
				
			</tr>
			<?php 
			for ($i=0;$i<sizeof($exp);$i++){ ?>
				<tr valign="top" align="center" id="">
					<td valign="top" align="left"><?php echo $exp[$i]["num_exp"]; ?></td>
					<td valign="top" align="left"><?php echo $exp[$i]["letra"]; ?></td>
					<td valign="top" align="left"><?php echo $exp[$i]["anio"]; ?></td>
					<td valign="top" align="left"><?php echo $exp[$i]["tipo_obra"]; ?></td>
					<td valign="top" align="left"><?php echo $exp[$i]["existente"]; ?></td>
					<td valign="top" align="left"><?php echo $exp[$i]["demoler"]; ?></td>
					<td valign="top" align="left"><?php echo $exp[$i]["construir"]; ?></td>
					<td valign="top" align="left"><?php echo $exp[$i]["empadronar"]; ?></td>
					<td valign="top" align="left"><a href="archivos/<?php echo $exp[$i]["nom_archivo"]; ?>" ><?php echo $exp[$i]["nom_archivo"]; ?></a></td>
					<td valign="top" align="left"><input type="button" value="Eliminar" name="eliminar" onclick="enviarvariable2(this.parentNode.parentNode,document.getElementById('codi'))"/></td>
					
				</tr>
			<?php 
			} 
			?>
		
		</table>
		<?php 
		}
		else{
		?></br></br></br><?php
		echo("No se encontro ningun expediente para esta parcela, 'PARCELA BALDIA'");
			}
		
	}
	public function cargar_exp($cod,$num_e,$let_e,$anio_e,$tipo_e,$exis_e,$demo_e,$cons_e,$emp_e)
	{
		
		$sql="INSERT INTO `expediente`(`num_exp`, `letra`, `anio`, `tipo_obra`, `existente`, `demoler`, `construir`, `empadronar`, `cod_par`) VALUES ('$num_e','$let_e','$anio_e','$tipo_e','$exis_e','$demo_e','$cons_e','$emp_e',$cod)";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "	<script type='text/javascript'>
				alert('el exp se ha generado exitosamente');
				window.location='ver_parcela.php?codigo=$cod';
				</script>";
		
	}
	public function cargar_zona($area,$fos,$fot,$densidad,$frente_min,$sup_min,$retiro_fren,$retiro_lat,$alt_max,$e_electrica,$alumbrado,$agua_pot,$desague_c,$desague_p,$gas_nat,$pavimento,$cordon_cun,$estab,$zona,$coeficiente,$servicio,$estado,$tipo_cons)
	{
	
		$sql="INSERT INTO `zona`(`area`, `fos`, `fot`, `densidad`, `frente_min`, `sup_min`, `ret_frente`, `ret_lat`, `alt_max`, `e_electrica`, `alumbrado`, `agua_pot`, `desague_c`, `desague_p`, `gas_nat`, `pavimento`, `cordon_cun`, `estab`, `zona`, `coef`, `servicio`, `estado`, `tipo_cons`) VALUES ('$area','$fos','$fot','$densidad','$frente_min','$sup_min','$retiro_fren','$retiro_lat','$alt_max','$e_electrica','$alumbrado','$agua_pot','$desague_c','$desague_p','$gas_nat','$pavimento','$cordon_cun','$estab','$zona','$coeficiente','$servicio','$estado','$tipo_cons')";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "	<script type='text/javascript'>
				alert('La zona se ha generado exitosamente');
				window.location='cargar_zona.php';
				</script>";
	}
	public function cargar_planos($cod,$plano1,$plano2,$plano3,$plano4,$plano5)
	{
		

		$sql1="DELETE FROM `planos_men` WHERE `cod_parcela`='$cod'";
		$sql2="INSERT INTO `planos_men`(`numero`, `cod_parcela`) VALUES ('$plano5','$cod')";
		$sql3="INSERT INTO `planos_men`(`numero`, `cod_parcela`) VALUES ('$plano4','$cod')";
		$sql4="INSERT INTO `planos_men`(`numero`, `cod_parcela`) VALUES ('$plano3','$cod')";
		$sql5="INSERT INTO `planos_men`(`numero`, `cod_parcela`) VALUES ('$plano2','$cod')";
		$sql6="INSERT INTO `planos_men`(`numero`, `cod_parcela`) VALUES ('$plano1','$cod')";
		$res=mysqli_query(Conectar::con(),$sql1);
		$res2=mysqli_query(Conectar::con(),$sql2);
		$res3=mysqli_query(Conectar::con(),$sql3);
		$res4=mysqli_query(Conectar::con(),$sql4);
		$res5=mysqli_query(Conectar::con(),$sql5);
		$res6=mysqli_query(Conectar::con(),$sql6);
		
	}
	public function modificar_zona($area,$fos,$fot,$densidad,$frente_min,$sup_min,$retiro_fren,$retiro_lat,$alt_max,$e_electrica,$alumbrado,$agua_pot,$desague_c,$desague_p,$gas_nat,$pavimento,$cordon_cun,$estab,$zona,$coeficiente,$servicio,$estado,$tipo_cons)
	{


		$sql="UPDATE `zona` SET `area`='$area',`fos`='$fos',`fot`='$fot',`densidad`='$densidad',`frente_min`='$frente_min',`sup_min`='$sup_min',`ret_frente`='$retiro_fren',`ret_lat`='$retiro_lat',`alt_max`='$alt_max',`e_electrica`='$e_electrica',
		`alumbrado`='$alumbrado',`agua_pot`='$agua_pot',`desague_c`='$desague_c',`desague_p`='$desague_p',`gas_nat`='$gas_nat',`pavimento`='$pavimento',`cordon_cun`='$cordon_cun',`estab`='$estab',`zona`='$zona',`coef`='$coeficiente',`servicio`='$servicio',`estado`='$estado',`tipo_cons`='$tipo_cons' WHERE `area`='$area'";
		
		$res=mysqli_query(Conectar::con(),$sql);
		
		echo "	<script type='text/javascript'>
				alert('La zona se ha modificado exitosamente');
				window.location='cargar_zona.php';
				</script>";
	}
	public function modificar_parcela($cod1,$codigo,$partida,$plano,$circ,$sec,$chacra,$quinta,$fraccion,$manzana,$parcela,$subparc,$partido,$calle,$num
					,$piso,$dto,$entre1,$entre2,$localidad,$cod_postal,$propietario,$contribuyente,$poseedor)
	{
	
		$sql="UPDATE `parcela` SET `codigo`='$codigo',`plano`='$plano',`partida`='$partida',`propietario`='$propietario',`contribuyente`='$contribuyente',`poseedor`='$poseedor',`circunscripcion`='$circ',`seccion`='$sec',`chacra_num`='$chacra',`quinta_let`='$quinta',`fraccion_let`='$fraccion',`manzana_let`='$manzana',`parcela_let`='$parcela',`subparcela`='$subparc',`partido`='$partido',`calle`='$calle',`entre1`='$entre1',`entre2`='$entre2',`localidad`='$localidad',`num`='$num',`piso`='$piso',`dto`='$dto',`cod_postal`='$cod_postal' WHERE `codigo`='$cod1'";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "	<script type='text/javascript'>
				alert('La parcela se ha modificado exitosamente');
				window.location='cargar_parcela.php?codigo=$codigo';
				</script>";
	}

	public function modificar_parcela2($cod,$zona)
	{

		$sql="UPDATE `parcela` SET `zona`='$zona' WHERE `codigo`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql);
		echo "	<script type='text/javascript'>
				alert('La parcela ha modificado la zona exitosamente');
				window.location='ver_parcela.php?codigo=$cod';
				</script>";
	}

	public function obtener_zona($area)
	{
		 	
		$sql="SELECT * FROM `zona` WHERE `area`='$area'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->zona[]=$reg;
				}
				return $this->zona;
	}
	public function obtener_zonas()
	{
		 	
		$sql="SELECT * FROM `zona` WHERE 1";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->zonas[]=$reg;
				}
				return $this->zonas;
	}
	public function obtener_med_dom($cod)
	{
		 	
		$sql="SELECT * FROM `medidas_dom` WHERE `cod_par`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->medidas_dom[]=$reg;
				}
				return $this->medidas_dom;
	}
	public function obtener_medidas2($cod)
	{
		 	
		$sql="SELECT * FROM `medidas_cat` WHERE `cod_parcela`='$cod'";
		$res=mysqli_query(Conectar::con(),$sql);
		while($reg=mysqli_fetch_assoc($res))
				{
					$this->medidas_cat[]=$reg;
				}
				return $this->medidas_cat;
	}
	public function cargar_medidas1($ubicacion,$rumbo,$longitud,$cod)
	{	
		$sql6="DELETE FROM `medidas_dom` WHERE `cod_par`='$cod'";
		
		$sql1="INSERT INTO `medidas_dom`(`cod_par`,`ubicacion`, `rumbo`, `longitud`) VALUES ('$cod','$ubicacion[4]','$rumbo[4]','$longitud[4]')";
		$sql2="INSERT INTO `medidas_dom`(`cod_par`,`ubicacion`, `rumbo`, `longitud`) VALUES ('$cod','$ubicacion[3]','$rumbo[3]','$longitud[3]')";
		$sql3="INSERT INTO `medidas_dom`(`cod_par`,`ubicacion`, `rumbo`, `longitud`) VALUES ('$cod','$ubicacion[2]','$rumbo[2]','$longitud[2]')";
		$sql4="INSERT INTO `medidas_dom`(`cod_par`,`ubicacion`, `rumbo`, `longitud`) VALUES ('$cod','$ubicacion[1]','$rumbo[1]','$longitud[1]')";
		$sql5="INSERT INTO `medidas_dom`(`cod_par`,`ubicacion`, `rumbo`, `longitud`) VALUES ('$cod','$ubicacion[0]','$rumbo[0]','$longitud[0]')";
		
		$res6=mysqli_query(Conectar::con(),$sql6);//esta va primero porque debe eliminar todo antes
		
		$res1=mysqli_query(Conectar::con(),$sql1);
		$res2=mysqli_query(Conectar::con(),$sql2);
		$res3=mysqli_query(Conectar::con(),$sql3);
		$res4=mysqli_query(Conectar::con(),$sql4);
		$res5=mysqli_query(Conectar::con(),$sql5);
		
	
	}

	public function cargar_medidas2($cod,$ubicacion,$rumbo,$longitud,$lindero,$vertice,$latitud,$longitud2)
	{	
		
		$long = substr($longitud[0],0,6);
		$long1 = substr($longitud[0],-4);
		$longitud1=$long."''".$long1;
		$lat = substr($latitud[0],0,6);
        $lat1 = substr($latitud[0],-4); 
        $latitud1=$lat."''".$lat1;
        $long2 = substr($longitud2[0],0,6);
        $long2_1 = substr($longitud2[0],-4);
        $longitud11=$long2."''".$long2_1;


        $long = substr($longitud[1],0,6);
		$long1 = substr($longitud[1],-4);
		$longitud1_1=$long."''".$long1;
		$lat = substr($latitud[1],0,6);
        $lat1 = substr($latitud[1],-4); 
        $latitud1_1=$lat."''".$lat1;
        $long2 = substr($longitud2[1],0,6);
        $long2_1 = substr($longitud2[1],-4);
        $longitud11_1=$long2."''".$long2_1;


        $long = substr($longitud[2],0,6);
		$long1 = substr($longitud[2],-4);
		$longitud1_2=$long."''".$long1;
		$lat = substr($latitud[2],0,6);
        $lat1 = substr($latitud[2],-4); 
        $latitud1_2=$lat."''".$lat1;
        $long2 = substr($longitud2[2],0,6);
        $long2_1 = substr($longitud2[2],-4);
        $longitud11_2=$long2."''".$long2_1;


        $long = substr($longitud[3],0,6);
		$long1 = substr($longitud[3],-4);
		$longitud1_3=$long."''".$long1;
		$lat = substr($latitud[3],0,6);
        $lat1 = substr($latitud[3],-4); 
        $latitud1_3=$lat."''".$lat1;
        $long2 = substr($longitud2[3],0,6);
        $long2_1 = substr($longitud2[3],-4);
        $longitud11_3=$long2."''".$long2_1;


        $long = substr($longitud[4],0,6);
	    $long1 = substr($longitud[4],-4);
	    $longitud1_4=$long."''".$long1;
	    $lat = substr($latitud[4],0,6);
        $lat1 = substr($latitud[4],-4); 
        $latitud1_4=$lat."''".$lat1;
        $long2 = substr($longitud2[4],0,6);
        $long2_1 = substr($longitud2[4],-4);
        $longitud11_4=$long2."''".$long2_1;


        



		$sql6="DELETE FROM `medidas_cat` WHERE `cod_parcela`=$cod";
		
		$sql2="INSERT INTO `medidas_cat`(`ubicacion`, `rumbo`, `longitud`, `lindero`, `vertice`, `latitud`, `longitud2`, `cod_parcela`) VALUES ('$ubicacion[3]','$rumbo[3]','$longitud1_3''','$lindero[3]','$vertice[3]','$latitud1_3''','$longitud11_3''',$cod)";
		$sql3="INSERT INTO `medidas_cat`(`ubicacion`, `rumbo`, `longitud`, `lindero`, `vertice`, `latitud`, `longitud2`, `cod_parcela`) VALUES ('$ubicacion[2]','$rumbo[2]','$longitud1_2''','$lindero[2]','$vertice[2]','$latitud1_2''','$longitud11_2''',$cod)";
		$sql4="INSERT INTO `medidas_cat`(`ubicacion`, `rumbo`, `longitud`, `lindero`, `vertice`, `latitud`, `longitud2`, `cod_parcela`) VALUES ('$ubicacion[1]','$rumbo[1]','$longitud1_1''','$lindero[1]','$vertice[1]','$latitud1_1''','$longitud11_1''',$cod)";
		$sql5="INSERT INTO `medidas_cat`(`ubicacion`, `rumbo`, `longitud`, `lindero`, `vertice`, `latitud`, `longitud2`, `cod_parcela`) VALUES ('$ubicacion[0]','$rumbo[0]','$longitud1''','$lindero[0]','$vertice[0]','$latitud1''','$longitud11''',$cod)";
		
		$res=mysqli_query(Conectar::con(),$sql6);
		
		$res=mysqli_query(Conectar::con(),$sql2);
		$res=mysqli_query(Conectar::con(),$sql3);
		$res=mysqli_query(Conectar::con(),$sql4);
		$res=mysqli_query(Conectar::con(),$sql5);
		
		
	}

		public function incrementar()
	{
		$sql1="UPDATE `incrementar` SET `i`=i+1 WHERE 1";
		$res=mysqli_query(Conectar::con(),$sql1);
		$sql2="SELECT * FROM `incrementar` WHERE 1";
		$res2=mysqli_query(Conectar::con(),$sql2);
		while($reg=mysqli_fetch_assoc($res2))
				{
					$this->vari[]=$reg;
				}
				return $this->vari;
	}
	public function decrementar()
	{
		$sql1="UPDATE `incrementar` SET `i`=i-1 WHERE 1";
		$res=mysqli_query(Conectar::con(),$sql1);
		$sql2="SELECT * FROM `incrementar` WHERE 1";
		$res2=mysqli_query(Conectar::con(),$sql2);
		while($reg=mysqli_fetch_assoc($res2))
				{
					$this->vari[]=$reg;
				}
				return $this->vari;
	}


	public function cuadro($i,$parc)
	{	

		if(isset($_POST["boton1"]) )
		{
	
			$i=$i-1;
 	 	
		$corroborar = true;
		}
		if(isset($_POST["boton2"]) )
		{
 	 	$i=$i+1;
 	 	$corroborar = true;
  	 	
		
		}
		if(isset($_POST["boton3"]) )
		{
  		$cod=$_POST["codigo"];
  		header ("Location: ver_parcela.php?codigo=$cod"); 
  
		}
		if(isset($_POST["agregar"]) )
		{
   			header ("Location: nueva_parcela.php"); 
  
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

		<script type="text/javascript" src="js/funciones.js"></script>
		<link href="css/estilos.css" rel="stylesheet" media="screen">

		</head>
		<body>
		
		<div class="container contenido">
			<h2>Parcela</h2>
			<form class="form-inline" method="post" action="">
     		 <div class="btn-group btn-group-lg">
        	<button type="submit" class="btn btn-default" style= "height: 45px; width: 78px;" name="agregar">Agregar</button>
        	<button type="submit" class="btn btn-default" style= "height: 45px; width: 78px;" name="modificar">Modificar</button>
        	<button type="submit" class="btn btn-default" style= "height: 45px; width: 78px;" name="eliminar">Eliminar</button>
     	 </div>
      
       <button name="boton1" type="submit" style="width:60px; padding:0px;border:0px;"><img src="img/flecha5.jpg"></button>
       <button name="boton2" type="submit" style="width:60px; padding:0px;border:0px;"><img src="img/flecha4.jpg"></button>
      
       
     	 
     	 	
     	</br></br></br>
  		<label >Codigo de Parcela</label><input type="text" class="input-small" placeholder="Cod." name="codigo" value="<?php echo $parc[$i]["codigo"];?>" readonly="readonly">
  		
  		<label >Plano de mensura</label><input type="text" class="input-small" placeholder="Plano" value="<?php echo $parc[$i]["plano"];?>" readonly="readonly">
  		<label >Partida Inmobiliaria</label><input type="text" class="input-small" placeholder="Partida" value="<?php echo $parc[$i]["partida"];?>" readonly="readonly"></br></br>
  		<label >Circuncripcion</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="Circ." value="<?php echo $parc[$i]["circunscripcion"];?>" readonly="readonly">
  		<label >Seccion</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="Sec." value="<?php echo $parc[$i]["seccion"];?>" readonly="readonly">
  		<label >Chacra</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="Chac." value="<?php echo $parc[$i]["chacra"];?>" readonly="readonly">
  		<label >Quinta</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="Quint." value="<?php echo $parc[$i]["quinta"];?>" readonly="readonly">	<label >Fraccion&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label><input type="text" class="input-small" placeholder="Fracc." value="<?php echo $parc[$i]["fraccion"];?>" readonly="readonly">
  		<label >Manzana</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="Manz." value="<?php echo $parc[$i]["manzana"];?>" readonly="readonly">
  		<label >Parcela</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="Parc." value="<?php echo $parc[$i]["parcela_let"];?>" readonly="readonly">
  		<label >Subparcela</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" class="input-small" placeholder="calle" value="<?php echo $parc[$i]["subparcela"];?>" readonly="readonly"></br></br>
  		<h4>Ubicacion del inmueble</h4>
  		<table>
		<tr>
  		<td><label >Calle</label></td><td><input type="text" class="input-large" placeholder="Plano" value="<?php echo $parc[$i]["calle"];?>" readonly="readonly"></td>
  		<td><label >Num</label></td><td><input type="text" class="input-small" placeholder="Num." value="<?php echo $parc[$i]["num"];?>" readonly="readonly" readonly="readonly"></td>
  		<td><label style="width:50px;">Piso</label></td><td><input type="text" class="input-small" placeholder="piso" value="<?php echo $parc[$i]["piso"];?>" readonly="readonly"></td>
  		
  		<td><label style="width:50px;">DTO.</label></td><td><input type="text" class="input-small" placeholder="Dto." value="<?php echo $parc[$i]["dto"];?>" readonly="readonly"></td>
  		</tr>
  		<tr>
  		<td><label >Entre calle</label></td><td><input type="text" class="input-large" placeholder="calle" value="<?php echo $parc[$i]["entre1"];?>" readonly="readonly"></td>
  		</tr>
  		<tr>
  		<td><label >Entre calle</label></td><td><input type="text" class="input-large" placeholder="calle" value="<?php echo $parc[$i]["entre2"];?>" readonly="readonly"></td>
  		</tr>
  		<tr>
  		<td><label >Localidad</label></td><td><input type="text" class="input-large" placeholder="localidad" value="<?php echo $parc[$i]["localidad"];?>" readonly="readonly"></td>
  		<td><label >Cod. Postal</label></td><td><input type="text" class="input-small" placeholder="Cod." value="<?php echo $parc[$i]["cod_postal"];?>" readonly="readonly"></td>
  		</tr>
  		<tr>
  		<td>&nbsp&nbsp</td>
  		</tr>	
  		<tr>
  		<td><label >Propietario</label></td><td><input type="text" class="input-xlarge" placeholder="Prop." value="<?php echo $parc[$i]["propietario"];?>" readonly="readonly"></br></td>
  		</tr>
  		<tr>
  		<td><label >Contribuyente</label></td><td><input type="text" class="input-xlarge" placeholder="Contr." value="<?php echo $parc[$i]["contribuyente"];?>" readonly="readonly"></br></td>
  		</tr>
  		<tr>
  		<td><label >Poseedor</label></td><td><input type="text" class="input-xlarge" placeholder="Poseedor" value="<?php echo $parc[$i]["poseedor"];?>" readonly="readonly"></br></td>
  		</tr>
  		</table>
  		
      	<?php $cod= $parc[$i]["codigo"];?>
    	 <input type="hidden" name="variablei" value="<?php echo $i;?>" />
     	 <input type="submit" value="" name="boton3" style='background:url("img/botonpar.jpg") left center no-repeat;padding-left:20px; width:200px; height:45px; position: relative; top: 20px;left: 350px;' /> 


		</form>
		</div>
				
		
		


		</body>
		</html>
		<?php
		}
	}

?>