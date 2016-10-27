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


if (isset($_POST["firstName"]) && 
	isset($_POST["lastName"]) && 
	isset($_POST["username"]) && 
	isset($_POST["password"]) && 
	isset($_POST["email"])) {

	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$shapassword = sha1($password);
	$email = $_POST["email"];
	$status = "pending";

	if ($firstName<>"" && $lastName<>"" && $username<>"" && $password<>"" && $email<>"" ){
		if (strlen($password) <= 20 && strlen($password) >=8){


			$query = $conn->prepare("select * from tbuserdata where username=? or email=?");
			$query->bind_param("ss", $username, $email);
			$result = $query->execute();
			if (! $result) //jika query tidak bisa diajlnkan
				echo "<p>Login Fail on Query</p>";

			$rows = $query->get_result();

			//mengecek username dan password sdh terpakai atau belum
			if ($rows->num_rows > 0){ 
				$query = $conn->prepare("select * from tbuserdata where username=? and email=?");
				echo "<script>window.location.href = '../html/signup.html';</script>";
				$query->bind_param("ss", $username, $email);
				$result = $query->execute();

				$rows = $query->get_result();
				if ($rows->num_rows > 0){
					echo "<script type='text/javascript'>alert('Username and email has been used')</script>";
				}else{
					$query = $conn->prepare("select * from tbuserdata where username=?");
					$query->bind_param("s", $username);
					$result = $query->execute();

					$rows = $query->get_result();
					if ($rows->num_rows > 0){
						$used="username";
						echo "<script type='text/javascript'>alert('Username has been used')</script>";  
						echo "<script>window.location.href = '../html/signup.html';</script>";  
					}

					$query = $conn->prepare("select * from tbuserdata where email=?");
					$query->bind_param("s", $email);
					$result = $query->execute();

					if (! $result) //jika query tidak bisa diajlnkan
						echo "<p>Login Fail on Query</p>";

					$rows = $query->get_result();
					if ($rows->num_rows > 0){
						$used="email";
						echo "<script type='text/javascript'>alert('Email has been used')</script>";
						echo "<script>window.location.href = '../html/signup.html';</script>";
					}
				}
				//header("Location: signup.html");
				//EROR: kenapa saat header diaktifkan scriptnya tidak muncul, cara menanganinya gimana
			}else{

				//echo "<p>$username, $firstName, $lastName, $password, $email, $status</p>";

				//--------------------------------------//
			    //--------------SEMENTARA---------------//
			    //--------------------------------------//
			    $query = $conn->prepare("insert into tblogin(username, password) values(?, ?)");
				$query->bind_param("ss", $username, $shapassword);
				$result = $query->execute();

			    if (! $result){
			        die("<p>Proses query gagal1.</p>");
			    }

			    $status = "approved";
			    //--------------------------------------//
			    //--------------------------------------//

				$query = $conn->prepare("insert into tbuserdata(username, firstName, lastName, password, email, status) values(?, ?, ?, ?, ?, ?)");
				$query->bind_param("ssssss", $username, $firstName, $lastName, $shapassword, $email, $status);
				$result = $query->execute();

			    if (! $result){
			        die("<p>Proses query gagal2.</p>");
			    }else{
			    	//SUKSES SIGNUP
			    	?>
			    	<script type='text/javascript'>;
		        		alert('Signup Success. Please wait for admin confirmation!');
		        		window.location.href = '../php/login.php';
		        	</script>";
		        	<?php
			    }
			}
		}else{
			echo "<script type='text/javascript'>alert('Invalid password lenght!')</script>";
			echo "<script>window.location.href = '../php/signup.php'</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('All field must be filled!')</script>";
		echo "<script>window.location.href = '../php/signup.php'</script>";
	}

}else{
	if (isset($_SESSION["username"])){
		header("Location: ../php/logouttosignup.php");
	}else{
		header("Location: ../html/signup.html");
	}
	

	
}




?>

</body>
</html>