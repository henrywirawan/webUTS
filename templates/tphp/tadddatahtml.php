<?php
session_start();
if (! isset($_SESSION["username"])){
	header("Location: login.php");
}else{
	$keepUsername = $_SESSION["username"];
	$idKeepData = time();
}
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="../css/body-form.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/footer.css">
	<head>
		<title>Keep | My Keep</title>

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
						<h1>Add New Data</h1>
						<p>Please enter your data on the field below.</p>
					</div>

					<form class="form-box" method="post" action="../php/adddata.php" enctype="multipart/form-data">
						<div class="content">
							<ul class="form-list">
								<li>
									<label class="hidden-label">Keep Data ID</label>
									<input name="idKeepData" id="idKeepData" class="input-full" value=<?php echo $idKeepData ?> autocapitalize="words" type="text" readonly style="color: #565656;">
								</li>
								<li>
									<label class="hidden-label">Username/Email</label>
									<input name="username" id="username" class="input-full" placeholder="Username" autocapitalize="words" type="text">
								</li>
								<li>
									<label class="hidden-label">Password</label>
									<input name="password" id="password" class="input-full" placeholder="Password" autocapitalize="words" type="text">
								</li>
								<li>
									<label class="hidden-label">Web URL</label>
									<input name="url" id="url" class="input-full" placeholder="www.example.com" type="text">
								</li>
								<li>
									<label class="hidden-label">Description</label>
									<input name="description" id="description" class="input-full" placeholder="My  Description" autocorrect="off" autocapitalize="off" type="text">
								</li>
								
							</ul>


						</div>

						<div class="buttons-set">
							
							<input type="submit" value="Add" class="btn-button uppercase">
							
							<p>Don't want to add data? <a href="../php/mykeep.php">Back to My Keep</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>

