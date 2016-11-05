{% extends "headerfooterhtml.php" %}


{% block style %}
	<link rel="stylesheet" href="../css/body-form.css">
{% endblock %}

{% block title %}| Account{% endblock %}

{% block body %}


			<div class="body-wrapper">
				<div class="body">
					<div class="page-title">
						<h1>Change My Password</h1>
						<p>You can change your password here.</p>
					</div>

					<form class="form-box" method="post" action="../php/changepass.php" enctype="multipart/form-data">
						<div class="content">
							<ul class="form-list">
								
								<li>
									<label class="hidden-label">Old Password</label>
									<input name="oldpassword" id="oldpassword" class="input-full" placeholder="Old Password" type="password">
								</li>
								<li>
									<label class="hidden-label">New Password</label>
									<input name="newpassword" id="newpassword" class="input-full" placeholder="New Password" type="password">
								</li>
								<li>
									<label class="hidden-label">Confirm Password</label>
									<input name="confirmpassword" id="confirmpassword" class="input-full" placeholder="Confirm New Password" type="password">
								</li>
								
								
							</ul>


						</div>

						<div class="buttons-set">		
							<input type="submit" value="Submit" class="btn-button uppercase">
						</div>
					</form>
				</div>
			</div>

{% endblock %}

