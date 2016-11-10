<?php
session_start();
require_once("db.php");
$conn = konek_db();

if (! isset($_SESSION["username"])){
	header("Location: ../php/login.php");
}else{
	$username = $_SESSION["username"];
}

if (isset($_POST["newemail"]) &&
	isset($_POST["password"])){

	$newemail = $_POST["newemail"];
	$password = $_POST["password"];
	$shapassword = sha1($password);
	if ($newemail <> "" && $password <> ""){

		//cek email apakah sudah terdaftar
		$query = $conn->prepare("select * from tbuserdata where email=?");
		$query->bind_param("s", $newemail);
		$result = $query->execute();
		if (! $result) //jika query tidak bisa diajlnkan
			echo "<p>Login Fail on Query</p>";

		$rows = $query->get_result();

		if ($rows->num_rows == 0){
			// jika email belum terpakai sebelumnya
			// konfirmasi password
			$query = $conn->prepare("select * from tbuserdata where username=? and password=?");
			$query->bind_param("ss", $username, $shapassword);
			$result = $query->execute();
			if (! $result) //jika query tidak bisa diajlnkan
				echo "<p>Login Fail on Query</p>";

			$rows = $query->get_result();
			if ($rows->num_rows == 1){
				//password benar, lakukan update email
				$query = $conn->prepare("update tbuserdata set email=? where username=?");
				$query->bind_param("ss", $newemail, $username);
				$result = $query->execute();

			    if (! $result){
			        die("<p>Proses query gagal1.</p>");
			    }else{
			    	//SUKSES GANTI EMAIL
			    	echo "<script type='text/javascript'>alert('Your email has been changed.')</script>";
					echo "<script>window.location.href = '../php/myaccount.php'</script>";
			    }

			}else{
				//password salah
				echo "<script type='text/javascript'>alert('Invalid password.')</script>";
				echo "<script>window.location.href = '../php/changeemail.php'</script>";
			}

		}else{
			echo "<script type='text/javascript'>alert('Email has been used.')</script>";
			echo "<script>window.location.href = '../php/changeemail.php'</script>";
		}

	}else{
		echo "<script type='text/javascript'>alert('All field must be filled!')</script>";
		echo "<script>window.location.href = '../php/changeemail.php'</script>";
	}


}else{
	header("Location: ../php/changeemailview.php");

}


?>

