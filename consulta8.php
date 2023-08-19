<?php
			require_once("class/class.php");
			require_once("class/parcela.php");
			$par=new Parcela();
			$parc=$par->ver_parcelas();
			if(($_GET["codi"]!=''))
				{
					$parc=$par->ver_parcela2($_GET["codi"]);
				}	 
		?>
		
		<?php if (!empty($parc)){ ?>
		<table class="bordered" cellspacing="0">
		
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
				<th>VER</th>
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
						<a href="cargar_parcela.php?codigo=<?php echo $parc[$i]["codigo"];?>"><img src="img/lupa.png"></img></a>
					</td>
				</tr>
			<?php 
			} 
			?>
		
		</table>
		<?php 
		}
		else{
		echo("No se encontro ningun registro");
		}
?>