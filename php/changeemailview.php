<?php
session_start();
require_once "../twig.php";
require_once("db.php");
$conn = konek_db();

if (! isset($_SESSION["username"])){
	header("Location: ../php/login.php");
}else{
	$username = $_SESSION["username"];
}

//cari email berdasarkan username
$query = $conn->prepare("select * from tbuserdata where username=?");
$query->bind_param("s", $username);
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
		'username' => $username,
		'oldemail' => $oldemail
		));
}else{
	die("Fail render");
}

?>