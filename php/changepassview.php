<?php
session_start();
require_once "../twig.php";
require_once("db.php");
$conn = konek_db();

if (isset($_SESSION['username'])){
	echo $twig->render("tphp/tchangepass.php", array('keepusername' => $_SESSION['username']));
}else{
	header("Location: ../php/login.php");
}


?>


