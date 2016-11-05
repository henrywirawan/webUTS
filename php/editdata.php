<?php
session_start();
require_once "../twig.php";
require_once "db.php";
$conn = konek_db();

if (! isset($_SESSION["username"])){
	header("Location: login.php");
}else{
	$keepUsername = $_SESSION["username"];
	$idKeepData = time();
}



if (! isset($_GET['idKeepData']))
	die("<p>Informasi produk tidak ditemukan</p>");



//cari produk yang akan diupdate
$idKeepData = $_GET["idKeepData"];
$query = $conn->prepare("select * from tbuserkeepdata where idKeepData=?");
$query->bind_param("i", $idKeepData); //i menandakan idnya integer, jika string maka menggunkan "s" jika tanda tanya pertama angka dan kedua huruf maka "is" (integer string)
$result = $query->execute();

$error=false;
if (! $result){
	die("Fail Select");
	$error=true;
}


$rows = $query->get_result();
if ($rows->num_rows == 0)
	echo "<p>ID Tidak Ditemukan</p>";

$data = $rows->fetch_object();

$username = $data->username;
$password = $data->password;
$url = $data->url;
$description = $data->description;


if (! $error){
	echo $twig->render("tphp/teditdata.php", array(
		'idkeepdata' => $idKeepData, 
		'username' => $username, 
		'password' => $password, 
		'url' => $url, 
		'description' => $description, 
		'keepusername' => $_SESSION['username']));
}else{
	die("Fail Render");
}

?>


