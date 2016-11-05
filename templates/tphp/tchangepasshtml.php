<?php
session_start();
require_once("db.php");
$conn = konek_db();

if (! isset($_SESSION["username"])){
	header("Location: ../php/login.php");
}else{
	$username = $_SESSION["username"];
}


?>


<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="../css/body-form.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/footer.css">
	<head>
		<title>Change Account Password</title>

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
						<h1>Change My Password</h1>
						<p>You can change your password here.</p>
					</div>

					<form class="form-box" method="post" action="../php/changepass.php" enctype="multipart/form-data">
						<div class="content">
							<ul class="form-list">
								
								<li>
									<label class="hidden-label">Old Password</label>
									<input name="oldpassword" id="oldpassword" class="input-full" placeholder="Old Password" type="password">
								</li>
								<li>
									<label class="hidden-label">New Password</label>
									<input name="newpassword" id="newpassword" class="input-full" placeholder="New Password" type="password">
								</li>
								<li>
									<label class="hidden-label">Confirm Password</label>
									<input name="confirmpassword" id="confirmpassword" class="input-full" placeholder="Confirm New Password" type="password">
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

