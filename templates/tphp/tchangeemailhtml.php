<?php
session_start();
require_once("db.php");
$conn = konek_db();

if (! isset($_SESSION["username"])){
	header("Location: ../php/login.php");
}else{
	$username = $_SESSION["username"];
}

//cari email berdasarkan username
$query = $conn->prepare("select * from tbuserdata where username=?");
$query->bind_param("s", $username);
$result = $query->execute();
if (! $result) //jika query tidak bisa diajlnkan
	echo "<p>Login Fail on Query</p>";

$rows = $query->get_result();

while ($row = $rows->fetch_array()){
	$oldemail=$row["email"];
}


?>



<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="../css/body-form.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/footer.css">
	<head>
		<title>Keeper | Email</title>

	</head>

	<body>


		<div class="wrapper">
			<div class="header">
				<div class="navbar1">
					<div class="logo-container">
						<a href="home.html"><img src="../images/logo.png" alt="logo"></a>
					</div>
					<div class="left-menu">
						<ul>
							<li class=li-home><a href="../php/home.php">Home<span class="underline"></span></a></li>
							<li class=li-shop><a href="../php/mykeep.php">My Keep<span class="underline"></span></a></li>
							<li class=li-about><a href="../html/about.html">About<span class="underline"></span></a></li>
						</ul>
					</div>
					<div class="right-menu">
						<ul>
							<li class="inline li-menu"><span class="entypo-menu span-inline"></span>
								<div class="switcher-content-menu">
									<div class="switcher-content">
										<ul class="links">
											<li>
												<a href="../php/login.php">Sign In</a>
											</li>
											<li>
												<a href="../php/signup.php">Create An Account</a>
											</li>
											<li>
												<a href="../php/myaccounthtml.php">My Keep Account</a>
											</li>
											
											<li>
												<a href="../php/logout.php">Logout</a>
											</li>
										
										</ul>
										
									</div>
								</div>
							</li>
							
						</ul>
					</div>
					
				</div>
			</div>
			<div class="body-wrapper">
				<div class="body">
					<div class="page-title">
						<h1>Change My Email</h1>
						<p>You can change your email here.</p>
					</div>

					<form class="form-box" method="post" action="../php/changeemail.php" enctype="multipart/form-data">
						<div class="content">
							<ul class="form-list">
								<li>
									<label class="hidden-label">Your old email</label>
									<input name="oldemail" id="Email" class="input-full" value=<?php echo $oldemail ?> autocorrect="off" autocapitalize="off" type="email" readonly style="color: #565656;">
								</li>
								<li>
									<label class="hidden-label">New Email</label>
									<input name="newemail" id="Email" class="input-full" placeholder="New Email" autocorrect="off" autocapitalize="off" type="email">
								</li>
								<li>
									<label class="hidden-label">Your keep account password</label>
									<input name="password" id="password" class="input-full" placeholder="Password" autocorrect="off" autocapitalize="off" type="password">
								</li>
								
								
								
							</ul>


						</div>

						<div class="buttons-set">
							
							<input type="submit" value="Submit" class="btn-button uppercase">

						</div>
					</form>
				</div>
			</div>

		</div>
	</body>
</html>

