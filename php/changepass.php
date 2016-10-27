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

if (! isset($_SESSION["username"])){
	header("Location: ../php/login.php");
}else{
	header("Location: ../html/changepass.html");
	$username = $_SESSION["username"];
}

if (isset($_POST["oldpassword"]) &&
	isset($_POST["newpassword"]) &&
	isset($_POST["confirmpassword"])){

	$oldpassword = $_POST["oldpassword"];
	$newpassword = $_POST["newpassowrd"];
	$confirmpassword = $_POST["confirmpassword"];

	if ($oldpassword <> "" && $newpassword <> "" && $confirmpassword <> ""){
		// jika semua kolom sudah terisi
		if ((strlen($newpassword) >= 8 && strlen($newpassword) <= 20) &&
			(strlen($confirmpassword) >= 8 && strlen($confirmpassword) <= 20)) {
			// jika jlh karakter sudah sesuai yang ditentukan
			if ($newpassword == $confirmpassword){
				// jika password yang dimasukan sudah sesuai
				
				
				// ingat cek old pass nya
			}else{
				echo "<script type='text/javascript'>alert('Wrong confrimation password')</script>";
				echo "<script>window.location.href = '../html/signup.html'</script>";
			}


		}else{
			echo "<script type='text/javascript'>alert('Invalid password lenght!')</script>";
			echo "<script>window.location.href = '../html/signup.html'</script>";
		}

	}else{
		echo "<script type='text/javascript'>alert('All field must be filled!')</script>";
		echo "<script>window.location.href = '../html/signup.html'</script>";
	}


}else{
	header("Location: ../html/changepass.html");
}


?>


</body>
</html>