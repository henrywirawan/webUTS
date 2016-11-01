<?php
session_start();
if (! isset($_SESSION["username"])){
	header("Location: login.php");
}else{
	$keepUsername = $_SESSION["username"];
}
require_once "db.php";

$conn = konek_db();
if (! isset($_GET["idKeepData"]))
	die("ID from readdatahtml not found");

$idKeepData = $_GET["idKeepData"];
$query = $conn->prepare("select * from tbuserkeepdata where idKeepData=?");
$query->bind_param("i", $idKeepData);
$result = $query->execute();

if (! $result)
	die("Query select idKeepData failed");

$rows = $query->get_result();
if ($rows->num_rows == 0)
	die("Selected idKeepData not found");

$query = $conn->prepare("delete from tbuserkeepdata where idKeepData=?");
$query->bind_param("i", $idKeepData);
$result = $query->execute(); //true jika eksekusi $querynya berhasil, false jika gagal
if (! $result)
	die("Delete data Failed");
else
	header("Location: readdatahtml.php");

?>