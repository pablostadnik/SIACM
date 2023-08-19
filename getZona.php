<?php
require_once("class/class.php");
require_once("class/parcela.php");
$tra=new Trabajo();
$par=new Parcela();
$parc=$par->obtener_zona($_GET["zona"]);
$par ->ver_zona($parc);
echo $par[0]["densidad"];
 ?>