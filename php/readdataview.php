<?php
session_start();
require_once "../twig.php";
if (isset($_SESSION['username']))
	echo $twig->render("tphp/treaddata.php", array('keepusername' => $_SESSION['username']));
else
	echo $twig->render("tphp/treaddata.php", array('keepusername' => null));


?>
