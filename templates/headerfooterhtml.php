<!DOCTYPE html>
<html>

	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/footer.css">
	{% block style %}{% endblock %}

	<head>
		<title>Keeper {% block title %}{% endblock %} </title>
	</head>

	<body>
		<div class="wrapper">
			<div class="header">
				<div class="navbar1">
					<div class="logo-container">
						<a href="home.php"><img src="../images/logo.png" alt="logo"></a>
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
							<li class="inline li-menu">
							<span class="
							{% if username == null %}
								entypo-menu
							{% else %}
								entypo-user
							{% endif %}
								 span-inline"
								  ></span>
								<div class="blured-bg">
								</div>
								<div class="switcher-content-menu">
									<div class="switcher-content">
										<ul class="links">
										{% if username == null %} 
											<li>
												<a href="../php/login.php">Sign In</a>
											</li>
											<li>
												<a href="../php/signup.php">Create An Account</a>
											</li>
										{% else %}
											<li>
												<a href="../php/myaccounthtml.php">My Keep Account</a>
											</li>
											<li>
												<a href="../php/logout.php">Logout</a>
											</li>
										{% endif %}		
										</ul>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			{% block body %}{% endblock %}
			<div class="footer-copyright">
				<span class="text-copyright">Copyright &copy 2016 Henry. All rights reserved.</span>
			</div>
		</div>
	</body>
</html>

{% block script %}{% endblock %}