<?php

require_once("class/class.php");
require_once("class/parcela.php");
$par=new Parcela();
$prop=$_GET['fil'];

$parc=$par->ver_parcelas2($prop);
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
						<a href="ver_parcela.php?codigo=<?php echo $parc[$i]["codigo"];?>"><img src="img/lupa.png"></img></a>
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

?>
