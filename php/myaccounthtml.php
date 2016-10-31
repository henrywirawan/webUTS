<?php
session_start();
if (! isset($_SESSION["username"])){
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="../css/myaccount.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/footer.css">
	<head>
		<title>Keeper | Account</title>
		<style>
			
		</style>
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
						<h1>My Account Setting</h1>
						<p>Setting your account to get better experience!</p>
					</div>

					<form class="form-box" method="post" enctype="multipart/form-data">
						<div class="content">
							<p>What are you going to do?</p>
							<a href="../php/changepasshtml.php">
								<button type="button" value="" class="btn-button uppercase">Change My Password</button>
							</a>
							<a href="../php/changeemailhtml.php">
								<button type="button" value="" class="btn-button uppercase">Change My Email</button>
							</a>


						</div>

						<div class="buttons-set">
							
							<p>Don't use this account anymore?</p>
							<a>
								<button type="button" value="" class="btn-button uppercase" onclick="deleteaccount()">Delete My Account</button>
							</a>
						</div>
					</form>
				</div>
			</div>
			<div class="footer-copyright">
				<span class="text-copyright">Copyright &copy 2016 Henry. All rights reserved.</span>
			</div>
		</div>
	</body>
</html>

<script>
function deleteaccount() {
    var r = confirm("Deleted account cannot be restored. Are you sure you want to delete this account?");
    if (r == true) {
        window.location.href = '../php/deleteaccount.php';
    } else {
        window.location.href = '../php/myaccounthtml.php';
    }
}
</script>