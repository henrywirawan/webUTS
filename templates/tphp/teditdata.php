{% extends "headerfooterhtml.php" %}


{% block style %}
	<link rel="stylesheet" href="../css/body-form.css">
{% endblock %}

{% block title %}| My Keep{% endblock %}

{% block body %}

	<div class="body-wrapper">
		<div class="body">
			<div class="page-title">
				<h1>Edit Account Data</h1>
				<p>Change data as you like.</p>
			</div>

			<form class="form-box" method="post" enctype="multipart/form-data"
			action="../php/updatedata.php?idKeepData={{idkeepdata}} ?>">
				<div class="content">
					<ul class="form-list">
						<li>
							<label class="hidden-label">Keep Data ID</label>
							<input name="idKeepData" class="input-full" value="{{idkeepdata}}" type="text" readonly style="color: #565656;">
						</li>
						<li>
							<label class="hidden-label">Username/Email</label>
							<input name="username" id="username" class="input-full" placeholder="Username" type="text" value="{{username}}">
						</li>
						<li>
							<label class="hidden-label">Password</label>
							<input name="password" id="password" class="input-full" placeholder="Password" type="text" value="{{password}}">
						</li>
						<li>
							<label class="hidden-label">Web URL</label>
							<input name="url" id="url" class="input-full" placeholder="www.example.com" type="text" value="{{url}}">
						</li>
						<li>
							<label class="hidden-label">Description</label>
							<input name="description" id="description" class="input-full" placeholder="My  Description" autocapitalize="words" type="text" value="{{description}}">
						</li>
						
					</ul>


				</div>

				<div class="buttons-set">
					
					<input type="submit" value="Submit" class="btn-button uppercase">
					
					<p>Don't want to edit data? <a href="../php/readdata.php">Back to My Keep</a></p>
				</div>
			</form>
		</div>
	</div>
{% endblock %}