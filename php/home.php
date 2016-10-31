<?php
session_start();
if (! isset($_SESSION["username"])){
	$newscontent="Don't have an account? <a href='../php/signup.php'>Sign Up Free</a>";
}else{
	$newscontent="";
}
?>



<!DOCTYPE html>
<html>

	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/footer.css">
	<link rel="stylesheet" href="../css/home.css">

	<head>

		<title>Keeper | Home</title>

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
			<div class="news-bar">
				<div class="overlay-background">
					
				<div class="news-image">
					<a><img src="../images/intro-bg copy.jpg" alt="berita"></a>
				</div>

				<div class="news-overlay">
					

					<div class="news-text">
						<span class="news-title">Don't Get Hacked. Get Keeper.</span><br>
						<span class="news-content">
							<?php echo $newscontent ?>
						</span>
					</div>
				</div>
				</div>
			</div>
			<div class="body-wrapper">
				<div class="body">
					
					<div class="home-banner">
						<div class="all-banner-container">
							<div class="banner-container">
								<div class="banner-image">
									<img src="../images/banner 1.png" alt="banner1">
									<span>Banner Title 1</span>

								</div>
								<div class="overlay">
									<span class="widget widget-category-link">
										<a href="shop.html" class="entypo-right-thin"></a>
									</span>
								</div>
							</div>

							<div class="banner-container">
								<div class="banner-image">
									<img src="../images/banner 1.png" alt="banner1">
									<span>Banner Title 2</span>

								</div>
								<div class="overlay">
									<span class="widget widget-category-link">
										<a href="" class="entypo-right-thin"></a>
									</span>
								</div>
							</div>
							<div class="banner-container">
								<div class="banner-image">
									<img src="../images/banner 1.png" alt="banner1">
									<span>Banner Title 3</span>

								</div>
								<div class="overlay">
									<span class="widget widget-category-link">
										<a href="" class="entypo-right-thin"></a>
									</span>
								</div>
							</div>
							<div class="banner-container">
								<div class="banner-image">
									<img src="../images/banner 1.png" alt="banner1">
									<span>Banner Title 4</span>

								</div>
								<div class="overlay">
									<span class="widget widget-category-link">
										<a href="" class="entypo-right-thin"></a>
									</span>
								</div>
							</div>

						</div>
					</div>
				</div>
				
			</div>
		
				
			<div class="footer-copyright">
				<span class="text-copyright">Copyright &copy 2016 Henry. All rights reserved.</span>
			</div>
			
		</div>


	</body>
</html>