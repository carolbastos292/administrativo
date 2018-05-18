<?php
session_start(); // sempre na primeira linha do codigo
$rand = rand(0, 99999);
echo $rand;
$teste = $rand;

$_SESSION['teste'] = "$teste";

?>