{% extends "headerfooterhtml.php" %}


{% block style %}
	<link rel="stylesheet" href="../css/body-form.css">
{% endblock %}

{% block title %}| Account{% endblock %}

{% block body %}

	<div class="body-wrapper">
		<div class="body">
			<div class="page-title">
				<h1>Already Registered?</h1>
				<p>If you have an account with us, please log in.</p>
			</div>

			<form class="form-box" method="post" action="../php/login.php" enctype="multipart/form-data">
				<div class="content">
					<ul class="form-list">

						<li>
							<label class="hidden-label">Username</label>
							<input name="username" id="username" class="input-full" placeholder="Username" autocorrect="off" autocapitalize="off" type="text">
						</li>
						<li>
							<label class="hidden-label">Password</label>
							<input name="password" id="Password" class="input-full" placeholder="Password" type="password">
						</li>
					</ul>


				</div>

				<div class="buttons-set">
					<a><input value="Sign In" class="btn-button uppercase" type="submit"></a>
					<p>New Here? <a href="../php/signupview.php">Create An Account</a></p>
				</div>
			</form>
		</div>
	</div>
{% endblock %}
