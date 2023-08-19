<?php

require_once("class/class.php");
require_once("class/parcela.php");
$par=new Parcela();

$vari=$par->incrementar();
$i=$vari[0]["i"];

$zona=$par->obtener_zonas();

if (isset($zona[$i]["area"])){


?>


<label >AREA</label><input type="text" class="input-small" placeholder="area" name="area" value="<?php if(isset($zona[$i]["area"])) {echo $zona[$i]["area"];}?>" readonly="readonly"></br></br>
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
      <td><label >F.O.S</label></td><td><input type="text" class="input-small" placeholder="f.o.s" value="<?php if(isset($zona[$i]["fos"])) { echo $zona[$i]["fos"];}?>" readonly="readonly"></td>
      <td><label >F.O.T</label></td><td><input type="text" class="input-small" placeholder="f.o.t" value="<?php if(isset($zona[$i]["fot"])) { echo $zona[$i]["fot"];}?>" readonly="readonly"></td> 
      <td><label >Densidad</label></td><td><input type="text" class="input-small" placeholder="Dens." value="<?php if(isset($zona[$i]["densidad"])) {echo $zona[$i]["densidad"];}?>" readonly="readonly"></td>
      <td><label >Frente minimo</label></td><td><input type="text" class="input-small" placeholder="F min." value="<?php if(isset($zona[$i]["frente_min"])) {echo $zona[$i]["frente_min"];}?>" readonly="readonly"></td>
      <td><label >Sup. minima</label></td><td><input type="text" class="input-small" placeholder="Sup min." value="<?php if(isset($zona[$i]["sup_min"])) {echo $zona[$i]["sup_min"];}?>" readonly="readonly"></td>
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
      <td><label >Retiro Frente</label></td><td><input type="text" class="input-small" placeholder="R. fren" value="<?php if(isset($zona[$i]["ret_frente"])) { echo $zona[$i]["ret_frente"];}?>" readonly="readonly">  </td>
      <td><label >Retiro Laterales</label></td><td><input type="text" class="input-small" placeholder="R. lat" value="<?php if(isset($zona[$i]["ret_lat"])) { echo $zona[$i]["ret_lat"];}?>" readonly="readonly"></td>
      <td><label >Altura Maxima</label></td><td><input type="text" class="input-small" placeholder="Alt. max." value="<?php if(isset($zona[$i]["alt_max"])) { echo $zona[$i]["alt_max"];}?>" readonly="readonly"></td>
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
		<td><label >E. eléctrica</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["e_electrica"])) { if ($zona[$i]["e_electrica"]=='on' ){ ?> checked="1" <?php }}?> ></td>
  		<td><label >Alumbrado</label></td><td><input name="check[]" type="checkbox"<?php if(isset($zona[$i]["alumbrado"])) { if ($zona[$i]["alumbrado"]=='on' ){ ?> checked="1" <?php }}?> ></td>
  		<td><label >Agua Potable</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["agua_pot"])) {if ($zona[$i]["agua_pot"]=='on' ){ ?> checked="1" <?php }}?> ></td>
  		<td><label >Desague cloacal</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["desague_c"])) { if ($zona[$i]["desague_c"]=='on' ){ ?> checked="1" <?php }}?> ></td>
  		<td><label >Desague Pluvial</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["desague_p"])) { if ($zona[$i]["desague_p"]=='on' ){ ?> checked="1" <?php }}?>/></td>
  		<td><label >Gas Natural</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["gas_nat"])) {if ($zona[$i]["gas_nat"]=='on' ){ ?> checked="1" <?php }}?>/></td>
  		</tr>
  		<tr>
  		<td><label >Pavimento</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["pavimento"])) { if ($zona[$i]["pavimento"]=='on' ){ ?> checked="1" <?php }}?>/></td>
  		<td><label >Cordon Cuneta</label></td><td><input name="check[[]" type="checkbox" <?php if(isset($zona[$i]["cordon_cun"])) { if ($zona[$i]["cordon_cun"]=='on' ){ ?> checked="1" <?php }}?>/></td>
  		<td><label >Estab. de calle</label></td><td><input name="check[]" type="checkbox" <?php if(isset($zona[$i]["estab"])) {if ($zona[$i]["estab"]=='on' ){ ?> checked="1" <?php }}?>/></td>
  		</tr>
  		</table>
    </div>
  		</br>
  		<h4>Codigo segun ordenanza fiscal año</h4></td>	
  		</br>
      <div style=" border-radius: 5px 5px 5px 5px; -moz-border-radius: 22px 22px 22px 22px; -webkit-border-radius: 22px 22px 22px 22px;border: 2px solid #C0C0C0;  color:#C0C0C0;  color:#FFF;height:auto;margin: 0 auto; text-align: left;width:1080px; padding:10px; " >
  		<table>
  		<tr>
  		<td><label >Zona</label></td><td><input type="text" class="input-small" placeholder="Zona" value="<?php if(isset($zona[$i]["zona"])) {echo $zona[$i]["zona"];}?>" readonly="readonly"></td>
  		<td><label >Coeficiente</label></td><td><input type="text" class="input-small" placeholder="Coef" value="<?php if(isset($zona[$i]["coef"])) {echo $zona[$i]["coef"];}?>" readonly="readonly"></td>
  		<td><label >Servicio Prestado</label></td><td><input type="text" class="input-small" placeholder="Serv" value="<?php if(isset($zona[$i]["servicio"])) {echo $zona[$i]["servicio"];}?>" readonly="readonly"></td>
  		<td><label >Estado Constructivo</label></td><td><input type="text" class="input-small" placeholder="Estado" value="<?php if(isset($zona[$i]["estado"])) {echo $zona[$i]["estado"];}?>" readonly="readonly"></td>
  		<td><label >Tipo de Construcción</label></td><td><input type="text" class="input-small" placeholder="Tipo cons." value="<?php if(isset($zona[$i]["tipo_cons"])) {echo $zona[$i]["tipo_cons"];}?>" readonly="readonly"></td>
  		</tr>
  		
  		</table>
      </div>
      <?php
      }else{
        ?>
      <h4>No hay registros para mostrar, por favor retroceda</h4>

<?php     }     ?>