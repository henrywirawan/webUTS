{% extends "headerfooterhtml.php" %}


{% block style %}
	<link rel="stylesheet" href="../css/body-form.css">
{% endblock %}

{% block title %}| Account{% endblock %}

{% block body %}


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
							<input name="oldemail" id="Email" class="input-full" value={{oldemail}} autocorrect="off" autocapitalize="off" type="email" readonly style="color: #565656;">
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
					<p>Don't want to change email? <a href="../php/myaccount.php">Back to My Account</a></p>

				</div>
			</form>
		</div>
	</div>
{% endblock %}

