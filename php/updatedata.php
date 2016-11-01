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
	die("ID not found from editdatahtml");

$idKeepData = $_GET["idKeepData"];
$query = $conn->prepare("select * from tbuserkeepdata where idKeepData=?");
$query->bind_param("i", $idKeepData);
$result = $query->execute();

if (! $result)
	die("Query select idKeepData failed");

$rows = $query->get_result();
if ($rows->num_rows == 0)
	die("Selected idKeepData not found");

if (isset($_POST["username"]) && 
	isset($_POST["password"]) && 
	isset($_POST["url"]) && 
	isset($_POST["description"])){

	$username = $_POST["username"];
	$password = $_POST["password"];
	$url = $_POST["url"];
	$description = $_POST["description"];

	if ($idKeepData <> "" && $username <> "" && $password <> "" && $url <> ""){
		$query = $conn->prepare("select * from tbuserkeepdata where idKeepData=? and keepUsername=?");
		$query->bind_param("is", $idKeepData, $keepUsername);
		$result = $query->execute();
		if (! $result) //jika query tidak bisa diajlnkan
			echo "<p>fail select idKeepData and keepUsername</p>";

		$rows = $query->get_result();

		//mengecek apakah id sudah pernah digunakan
		if ($rows->num_rows == 1){
			//lakukan update data
			$query = $conn->prepare(
				"update tbuserkeepdata set keepUsername=?, username=?, password=?, url=?, description=? where idKeepData=?"
				);
			$query->bind_param("sssssi", $keepUsername, $username, $password, $url, $description, $idKeepData);
			$result = $query->execute();
		    if (! $result)
		        die("<p>fail on query update data</p>");
		    else{
		    	echo "<script type='text/javascript'>alert('Your data has been updated.')</script>";
				echo "<script>window.location.href = '../php/readdatahtml.php'</script>";
		    }

		}else{
			echo "<script type='text/javascript'>alert('Invalid ID Keep Data and Keep Username. Please contact web developer!')</script>";
			echo "<script>window.location.href = '../php/readdatahtml.php'</script>";
		}

	}else{
		echo "<script type='text/javascript'>alert('Username, Password and URL Field must be filled!')</script>";
		echo "<script>window.location.href = '../php/editdatahtml.php'</script>";
	}

}else{
	header("Location: editdatahtml.php");
}

?>