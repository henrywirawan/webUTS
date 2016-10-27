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
						<a href="home.html"><img src="images/logo.png" alt="logo"></a>
					</div>
					<div class="left-menu">
						<ul>
							<li class=li-home><a href="../php/home.php">Home<span class="underline"></span></a></li>
							<li class=li-shop><a href="../html/shop.html">Shop<span class="underline"></span></a></li>
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
						<h1>My Account Setting</h1>
						<p>Setting your account to get better experience!</p>
					</div>

					<form class="form-box" method="post" enctype="multipart/form-data">
						<div class="content">
							<p>What are you going to do?</p>
							<a href="../php/changepass.php">
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