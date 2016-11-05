{% extends "headerfooterhtml.php" %}


{% block style %}
	<link rel="stylesheet" href="../css/myaccount.css">
{% endblock %}

{% block title %}| Account{% endblock %}

{% block body %}
	

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
							<a href="../php/changeemail.php">
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

{% endblock %}

{% block script %}
<script>
function deleteaccount() {
    var r = confirm("Deleted account cannot be restored. Are you sure you want to delete this account?");
    if (r == true) {
        window.location.href = '../php/deleteaccount.php';
    } 
}
</script>
{% endblock %}