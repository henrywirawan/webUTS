<?php
require_once "../twig.php";
require_once "db.php";
$conn = konek_db();
if (isset($_SESSION['username'])){
	$keepUsername = $_SESSION['username'];
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

	$firstName = $data->firstName;

	
}



?>