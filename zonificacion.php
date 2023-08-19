 <h1>DATOS DE ZONIFICACIÓN</h1>
            <div id="pepe" class="" style=" ">
            	<?php   
            	if(isset($parc[0]["zona"])) {
            		
            		$area=$parc[0]["zona"];?>
								Modificar zona<select name="select2" onchange="getZona(this)" style="position:relative;left:20px;">
 						 		<?php
								$zon= $tra->get_zonas();
								for ($i=0;$i<sizeof($zon);$i++) { 
								?>
								<option value="<?php  echo $zon[$i]['area'];?>"><?php  echo $zon[$i]['area'];  ?></option>	
								</select><input type="submit" value="Modificar" name="modificar" style="position:relative;left:25px;">
								<?php
								$zona=$par->obtener_zona($area);	
								$par ->ver_zona($zona);
							}	}else{		
        		?>
               <div class="control-group">
					<label class="control-label">Seleccione el codigo de zona</label>
					<div class="controls">
						 
						<select name="select" >
 						 <?php
						$zon= $tra->get_zonas(); 
						for ($i=0;$i<sizeof($zon);$i++) { 
						?>		
						<option value="<?php  if(isset($zon[$i]["area"])) { echo $zon[$i]["area"];}?>"><?php  if(isset($zon[$i]["area"])) { echo $zon[$i]["area"];  }?></option>	
						</select>
														}
					</div>
				</div>
				
				<input type="submit" value="CARGAR" name="carzona" class="btn btn-default" style="height:40px;">
				<?php    
										}
						if (isset($_POST["modificar"])){
									$tra->modificar_zona($_GET["codigo"],$_POST["select2"]);
								}
				?>


						<?php
							if (isset($_POST["carzona"])){
									$tra->modificar_zona($_GET["codigo"],$_POST["select"]);
								}

								

							

						 ?>

				</div>