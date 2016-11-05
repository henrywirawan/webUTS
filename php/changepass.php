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
	$username = $_SESSION["username"];
}

if (isset($_POST["oldpassword"]) &&
	isset($_POST["newpassword"]) &&
	isset($_POST["confirmpassword"])){

	$oldpassword = sha1($_POST["oldpassword"]);
	$newpassword = $_POST["newpassword"];
	$confirmpassword = $_POST["confirmpassword"];

	if ($oldpassword <> "" && $newpassword <> "" && $confirmpassword <> ""){
		// jika semua kolom sudah terisi
		if ((strlen($newpassword) >= 8 && strlen($newpassword) <= 20) &&
			(strlen($confirmpassword) >= 8 && strlen($confirmpassword) <= 20)) {
			// jika jlh karakter sudah sesuai yang ditentukan
			if ($newpassword == $confirmpassword){
				// jika password yang dimasukan sudah sesuai
				$query = $conn->prepare("select * from tbuserdata where username=? and password=?");
				$query->bind_param("ss", $username, $oldpassword);
				$result = $query->execute();
				if (! $result) //jika query tidak bisa diajlnkan
					echo "<p>Login Fail on Query</p>";

				$rows = $query->get_result();
				if ($rows->num_rows == 1){
					//password benar, lakukan update
					$shanewpassword = sha1($newpassword);
					$query = $conn->prepare("update tblogin set password=? where username=?");
					$query->bind_param("ss", $shanewpassword, $username);
					$result1 = $query->execute();

					$query = $conn->prepare("update tbuserdata set password=? where username=?");
					$query->bind_param("ss", $shanewpassword, $username);
					$result2 = $query->execute();

				    if (! $result1 || ! $result2){
				        die("<p>Proses query gagal1.</p>");
				    }else{
				    	//SUKSES GANTI PASSWORD
				    	echo "<script type='text/javascript'>alert('Your password has been changed.')</script>";
						echo "<script>window.location.href = '../php/myaccount.php'</script>";
				    }


				}else{
					//password salah
					echo "<script type='text/javascript'>alert('Wrong old password')</script>";
					echo "<script>window.location.href = '../php/changepass.php'</script>";
				}
				
				// ingat cek old pass nya
			}else{
				echo "<script type='text/javascript'>alert('Wrong confrimation password')</script>";
				echo "<script>window.location.href = '../php/changepass.php'</script>";
			}


		}else{
			echo "<script type='text/javascript'>alert('Invalid password lenght!')</script>";
			echo "<script>window.location.href = '../php/changepass.php'</script>";
		}

	}else{
		echo "<script type='text/javascript'>alert('All field must be filled!')</script>";
		echo "<script>window.location.href = '../php/changepass.php'</script>";
	}


}else{
	header("Location: ../php/changepassview.php");

}


?>


</body>
</html>