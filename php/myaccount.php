<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
require_once("db.php");
$conn = konek_db();

if (! isset($_SESSION["username"])){
	header("Location: ../php/login.php");
}else{
	header("Location: ../html/myaccount.html");
}

if (isset($_POST["oldemail"]) && 
	isset($_POST["lastName"]) && 
	isset($_POST["username"]) && 
	isset($_POST["password"]) && 
	isset($_POST["email"])) {

	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$username = $_POST["username"];
	$password = sha1($_POST["password"]);
	$email = $_POST["email"];
	$status = "pending";

}


?>

</body>
</html>