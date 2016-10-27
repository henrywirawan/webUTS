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
						<a href="home.html"><img src="images/logo.png" alt="logo"></a>
					</div>
					<div class="left-menu">
						<ul>
							<li class=li-home><a href="home.html">Home<span class="underline"></span></a></li>
							<li class=li-shop><a href="shop.html">Shop<span class="underline"></span></a></li>
							<li class=li-about><a href="about.html">About<span class="underline"></span></a></li>
						</ul>
					</div>
					<div class="right-menu">
						<ul>
							<li class="inline li-menu"><span class="entypo-menu span-inline"></span>
								<div class="switcher-content-menu">
									<div class="switcher-content">
										<ul class="links">
											<li>
												<a href="login.html">Sign In</a>
											</li>
											<li>
												<a href="create account.html">Create an Account</a>
											</li>
										
										</ul>
										<div class="block-currency">
											<div class="title-selector">
												<span>Currency</span>
											</div>
											<div class="block-content">
												<ul class="setting-currency">
													<li class=""><a href="#">IDR</a></li>
													<li class="selected"><a href="#">USD</a></li>
												</ul> 
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="inline li-basket"><span class="entypo-basket span-inline"></a>
								<div class="switcher-content-basket">
									<div class="switcher-content">
										<div class="cart-checkout">
											<a href="shopping cart.html" class="btn-button view-cart">
												<span>View Cart</span>
											</a>
											<a href="checkout.html" class="btn-button checkout-cart">
												<span>Checkout</span>
											</a>
										</div>
									</div>
								</div>
							</li>

							<li class="inline li-search"><span class="entypo-search span-inline"></span>
								<div class="switcher-content-search">
									<div class="switcher-content">


											<div class="input-group form-search"> 
												<input value="" placeholder="Search our store" class="input-group-field" type="search">
												<button type="submit" class="btn-button"> 
													<span><span><i class="entypo-search"></i></span></span> 
												</button>
											</div>
										
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

