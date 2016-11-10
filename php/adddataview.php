<?php
session_start();
require_once "header.php";
if (isset($_SESSION["username"])){
	global $firstName;
	global $keepUsername;
	$idKeepData = time();
	echo $twig->render("tphp/tadddata.php", array(
		'keepusername' => $keepUsername,
		'firstname' => $firstName,
		'idkeepdata' => $idKeepData));
	
}else{
	echo $twig->render("tphp/tlogin.php", array('keepusername' => null));
}


?>
