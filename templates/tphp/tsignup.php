{% extends "headerfooterhtml.php" %}


{% block style %}
	<link rel="stylesheet" href="../css/body-form.css">
{% endblock %}

{% block title %}| Account{% endblock %}

{% block body %}

	<div class="body-wrapper">
		<div class="body">
			<div class="page-title">
				<h1>Create Account</h1>
				<p>Please enter the following information to create your account.</p>
			</div>

			<form class="form-box" method="post" action="../php/signup.php" enctype="multipart/form-data">
				<div class="content">
					<ul class="form-list">
						<li>
							<label class="hidden-label">First Name</label>
							<input name="firstName" id="FirstName" class="input-full" placeholder="First Name" autocapitalize="words" autofocus="" type="text">
						</li>
						<li>
							<label class="hidden-label">Last Name</label>
							<input name="lastName" id="LastName" class="input-full" placeholder="Last Name" autocapitalize="words" type="text">
						</li>
						<li>
							<label class="hidden-label">Username</label>
							<input name="username" id="Username" class="input-full" placeholder="This will be used for login" autocapitalize="words" type="text">
						</li>
						<li>
							<label class="hidden-label">Password</label>
							<input name="password" id="CreatePassword" class="input-full" placeholder="8-20 characters" type="password">
						</li>
						<li>
							<label class="hidden-label">Email</label>
							<input name="email" id="Email" class="input-full" placeholder="example@email.com" autocorrect="off" autocapitalize="off" type="email">
						</li>
						
					</ul>


				</div>

				<div class="buttons-set">
					
					<input type="submit" value="Create" class="btn-button uppercase">
					
					<p>Already have an account? <a href="../php/login.php">Login here</a></p>
				</div>
			</form>
		</div>
	</div>

{% endblock %}
