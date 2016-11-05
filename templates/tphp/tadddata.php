{% extends "headerfooterhtml.php" %}


{% block style %}
	<link rel="stylesheet" href="../css/body-form.css">
{% endblock %}

{% block title %}| My Keep{% endblock %}

{% block body %}


	<div class="body-wrapper">
		<div class="body">
			<div class="page-title">
				<h1>Add New Data</h1>
				<p>Please enter your data on the field below.</p>
			</div>

			<form class="form-box" method="post" action="../php/adddata.php" enctype="multipart/form-data">
				<div class="content">
					<ul class="form-list">
						<li>
							<label class="hidden-label">Keep Data ID</label>
							<input name="idKeepData" id="idKeepData" class="input-full" value="{{idkeepdata}}" autocapitalize="words" type="text" readonly style="color: #565656;">
						</li>
						<li>
							<label class="hidden-label">Username/Email</label>
							<input name="username" id="username" class="input-full" placeholder="Username" autocapitalize="words" type="text">
						</li>
						<li>
							<label class="hidden-label">Password</label>
							<input name="password" id="password" class="input-full" placeholder="Password" autocapitalize="words" type="text">
						</li>
						<li>
							<label class="hidden-label">Web URL</label>
							<input name="url" id="url" class="input-full" placeholder="www.example.com" type="text">
						</li>
						<li>
							<label class="hidden-label">Description</label>
							<input name="description" id="description" class="input-full" placeholder="My  Description" autocorrect="off" autocapitalize="off" type="text">
						</li>
						
					</ul>


				</div>

				<div class="buttons-set">
					
					<input type="submit" value="Add" class="btn-button uppercase">
					
					<p>Don't want to add data? <a href="../php/mykeep.php">Back to My Keep</a></p>
				</div>
			</form>
		</div>
	</div>

{% endblock %}
