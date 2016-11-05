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
        die("<p>Proses query gagal delete1.</p>");

    $query = $conn->prepare("delete from tbuserkeepdata where keepUsername=?");
	$query->bind_param("s", $username);
	$result = $query->execute();
	if (! $result)
        die("<p>Proses query gagal delete2.</p>");


	$query = $conn->prepare("update tbuserdata set status='deactivated' where username=?");
	$query->bind_param("s", $username);
	$result = $query->execute();
	if (! $result)
        die("<p>Proses query gagal update.</p>");
    
	echo "<script type='text/javascript'>alert('You have successfully delete your account! BYE!!!')</script>";
    echo "<script>window.location.href = '../php/home.php'</script>";
}



?>