<?php
session_start();
require_once "header.php";
if (isset($_SESSION["username"])){
	global $firstName;
	global $keepUsername;
	echo $twig->render("tphp/tabout.php", array(
		'keepusername' => $keepUsername,
		'firstname' => $firstName));
}else{

	echo $twig->render("tphp/tabout.php", array('keepusername' => null));
}

	

?>