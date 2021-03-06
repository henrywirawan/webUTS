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
							<li class=li-shop><a href="../php/readdata.php">My Keep<span class="underline"></span></a></li>
							<li class=li-about><a href="../php/about.php">About<span class="underline"></span></a></li>
						</ul>
					</div>
					<div class="right-menu">
						<ul>
							<li class="inline li-menu">
							{% if keepusername == null %}
								<span class="entypo-menu span-inline"></span>
							{% else %}
								<span class="entypo-user span-inline"><span class="firstname">{{firstname}}</span></span>
							{% endif %}
								 
								<div class="blured-bg">
								</div>
								<div class="switcher-content-menu">
									<div class="switcher-content">
										<ul class="links">
										{% if keepusername == null %} 
											<li>
												<a href="../php/login.php">Sign In</a>
											</li>
											<li>
												<a href="../php/signup.php">Create An Account</a>
											</li>
										{% else %}
											<li>
												<a href="../php/myaccount.php">My Keep Account</a>
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