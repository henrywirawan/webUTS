<?php
session_start();
if (! isset($_SESSION["username"])){
	header("Location: login.php");
}else{
	$keepUsername = $_SESSION["username"];
}

require_once("db.php");
$conn = konek_db();


if (isset($_POST["idKeepData"]) &&
	isset($_POST["username"]) && 
	isset($_POST["password"]) && 
	isset($_POST["url"]) && 
	isset($_POST["description"])) {

	$idKeepData = $_POST["idKeepData"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$url = $_POST["url"];
	$description = $_POST["description"];

	if ($idKeepData <> "" && $username <> "" && $password <> "" && $url <> ""){
		$query = $conn->prepare("select * from tbuserkeepdata where idKeepData=?");
		$query->bind_param("s", $idKeepData);
		$result = $query->execute();
		if (! $result) //jika query tidak bisa diajlnkan
			echo "<p>fail select idKeepData</p>";

		$rows = $query->get_result();

		//mengecek apakah id sudah pernah digunakan
		if ($rows->num_rows == 0){
			$query = $conn->prepare("select * from tbuserkeepdata where username=? or url=?");
			$query->bind_param("ss", $username, $email);
			$result = $query->execute();
			if (! $result) //jika query tidak bisa diajlnkan
				echo "<p>fail select username and url</p>";

			$rows = $query->get_result();

			//cek apakah username dan url pernah terdaftar atau tidask
			if ($rows->num_rows == 0){
				$query = $conn->prepare("insert into tbuserkeepdata values(?, ?, ?, ?, ?, ?)");
				$query->bind_param("isssss", $idKeepData, $keepUsername ,$username, $password, $url, $description);
				$result = $query->execute();
			    if (! $result){
			        die("<p>fail insert datat</p>");
				}else{
?>
					<script type='text/javascript'>
						var r = confirm("Success added data. Do you want to add another data?");
					    if (r == true) {
					    	window.location.href = '../php/adddatahtml.php';
					    } else {
					        window.location.href = '../php/readdatahtml.php';
					    }

					</script>;
					
<?php
				}
			}else{
?>
<!-- 				<script type='text/javascript'> //kenapa bagian ini tidak tereksekusi dengan baik: Error
					var r = confirm("You have ever registered the same both username and url before. Do you want to continue?");
				    if (r == true) {
<?php
				        $query = $conn->prepare("insert into tbuserkeepdata values(?, ?, ?, ?, ?, ?)");
						$query->bind_param("isssss", $idKeepData, $keepUsername ,$username, $password, $url, $description);
						$result = $query->execute();
					    if (! $result){
					        die("<p>fail insert datat</p>");
						}else{
?>
							var r = confirm("Success added data. Do you want to add another data?");
						    if (r == true) {
						    	window.location.href = '../php/adddatahtml.php';
						    }else{
						        window.location.href = '../php/readdatahtml.php';
						    }
		
<?php
						}
?>
					}else{
						echo "<script>window.location.href = '../php/adddatahtml.php'</script>";
					}

				</script> -->
				
<?php
			}


		}else{
			echo "<script type='text/javascript'>alert('Keep Data ID has been used!')</script>";
			echo "<script>window.location.href = '../php/adddatahtml.php'</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('Username, Password and URL Field must be filled!')</script>";
		echo "<script>window.location.href = '../php/adddatahtml.php'</script>";
	}

}else{
	header("Location: adddatahtml.php");

}

?>