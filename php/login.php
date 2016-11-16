<?php
session_start();

require_once("db.php");
require_once "../twig.php";
$conn = konek_db();


//jika sudah login dan belum logout redirect ke content
if (isset($_SESSION["username"])){
	header("Location: home.php");
}else if (!isset($_POST["username"]) && !isset($_POST["password"])){
	header("Location: ../php/loginview.php");
}

// jika belum login dan sudah kirim username dan pass
//cek apakah username dan pass valid
if (isset($_POST["username"]) && isset($_POST["password"])){
	$username = $_POST["username"];
	$password = sha1($_POST["password"]);
	//cek username dan pasword valid, jika valid maka login
	$query = $conn->prepare("select * from tblogin where username=? and password=?");
	$query->bind_param("ss", $username, $password);
	$result = $query->execute();

	if (! $result)
		echo "<p>Login Fail on Query</p>";

	$rows = $query->get_result();
	if ($rows->num_rows == 1){
		// login user
		$_SESSION["username"]=$username;
		//ridirect ke homepage
		header("Location: ../php/home.php");


	}else{
]

	}

}

?>

