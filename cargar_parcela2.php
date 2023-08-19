<?php
session_start();
require_once("class/class.php");
//require_once("class/parcela.php");
$tra=new Trabajo();
//$par=new Parcela();
//$parc=$par->ver_parcelas();
$i=0;
echo $tra->menu1();
//$par->cuadro($i,$parc);

?>


