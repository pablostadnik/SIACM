<?php
require_once("class/parcela.php");
require_once("class/class.php");

$par=new Parcela();

$parc=$par->delete_zona($_GET["area"]);



?>