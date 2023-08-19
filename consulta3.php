<?php

require_once("class/class.php");
require_once("class/parcela.php");
$par=new Parcela();
$cod=$_GET['codi'];

$par->cargar_exp($cod,$_GET['num_e'],$_GET['let_e'],$_GET['anio_e'],$_GET['tipo_e'],$_GET['exis_e'],$_GET['demo_e'],$_GET['cons_e'],$_GET['emp_e']);
$par->expedientes($cod);



?>