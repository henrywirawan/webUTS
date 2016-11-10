<?php
session_start();
require_once "header.php";
if (isset($_SESSION["username"])){
	global $firstName;
	global $keepUsername;
	echo $twig->render("tphp/thome.php", array(
		'keepusername' => $keepUsername,
		'firstname' => $firstName));
}else{

	echo $twig->render("tphp/thome.php", array('keepusername' => null));
}

?>