<?php
ini_set('MAX_EXECUTION_TIME', -1);
if(!isset($_SESSION)) 
    { 
        session_start(); 
		
	$_SESSION["contador"]=1;
    } 
require_once("class/class.php");



$tra=new Trabajo();

?>
<html>
<head>
<title>Municipalidad de Carlos Casares</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/navbar.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" media="screen">
<link href="css/estilos.css" rel="stylesheet" media="screen">
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

</head>

<body >
		<?php 	

				
				echo $tra->menu1();
				//$tra->alertar();
				

		?>
		<div class="container" style=" width: 1900px; ">
		<div id="cont"><img src="img/catastro.jpg" id="logoprincipal" style="position: relative; bottom: 160px; width: 1900px; height: 1000px;left: 0px;" ></img>
		
		</div> 	
								
		</div>


</body>
</html>
