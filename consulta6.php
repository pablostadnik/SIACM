<?php

require_once("class/class.php");
require_once("class/parcela.php");
$par=new Parcela();
$valor=$_GET['val'];
$cod=$_GET['codi'];
$par->eliminar_exp($valor);
$par->expedientes($cod);

?>
