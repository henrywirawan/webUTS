<?php
session_start();
require_once "../twig.php";
if (isset($_SESSION['username']))
	echo $twig->render("tphp/thome.php", array('username' => $_SESSION['username']));
else
	echo $twig->render("tphp/thome.php", array('username' => null));


?>