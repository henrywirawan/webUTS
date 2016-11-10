<?php
session_start();
require_once "header.php";
if (isset($_SESSION["username"])){
	global $firstName;
	global $keepUsername;
	$username = $_SESSION["username"];
}else{
	
}

//cari email berdasarkan username
$query = $conn->prepare("select * from tbuserdata where username=?");
$query->bind_param("s", $keepUsername);
$result = $query->execute();

$error=false;
if (! $result){
	die("Fail Select");
	$error=true;
}

$rows = $query->get_result();
if ($rows->num_rows == 0)
	echo "<p>username Tidak Ditemukan</p>";

$data = $rows->fetch_object();

$oldemail = $data->email;

if (! $error){
	
	echo $twig->render("tphp/tchangeemail.php", array(
		'oldemail' => $oldemail,
		'firstname' => $firstName,
		'keepusername' => $keepUsername
		));
}else{
	die("Fail render");
}

?>