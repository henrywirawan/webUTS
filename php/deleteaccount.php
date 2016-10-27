<?php
session_start();
require_once("db.php");
$conn = konek_db();

if (! isset($_SESSION["username"])){
	header("Location: ../php/login.php");
}else{
	$username = $_SESSION["username"];
	session_destroy();
	$query = $conn->prepare("delete from tblogin where username=?");
	$query->bind_param("s", $username);
	$result = $query->execute();
	if (! $result)
        die("<p>Proses query gagal delete.</p>");


	$query = $conn->prepare("update tbuserdata set status='deactivated' where username=?");
	$query->bind_param("s", $username);
	$result = $query->execute();
	if (! $result)
        die("<p>Proses query gagal update.</p>");

    echo "<script>window.location.href = '../php/home.php'</script>";
}



?>