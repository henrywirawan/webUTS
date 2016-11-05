<?php
session_start();
$idKeepData = time();
require_once "../twig.php";
if (isset($_SESSION['username'])){
	echo $twig->render("tphp/tadddata.php", array('idkeepdata' => $idKeepData));
	echo $twig->render("tphp/tadddata.php", array('keepusername' => $_SESSION['username']));
	
}else{
	header("Location: login.php");
}


?>
