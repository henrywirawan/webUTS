{% extends "headerfooterhtml.php" %}


{% block style %}
<link rel="stylesheet" href="../css/home.css">
{% endblock %}
{% block title %} | Home{% endblock %}

{% block body %}
<div class="news-bar">
	<div class="overlay-background">
		
		<div class="news-image">
			<a><img src="../images/intro-bg copy.jpg" alt="berita"></a>
		</div>

		<div class="news-overlay">
			

			<div class="news-text">
				<span class="news-title">Keep password safely. Get Keep!</span><br>
				<span class="news-content">
					{% if keepusername == null %}
						<a href='../php/signup.php'>Sign Up Free</a>
					{% endif %}
				</span>

			</div>
			<!-- <div class="subimage">
				<img src="../images/cyborg.png">
			</div> -->
		</div>
	</div>
</div>

<div class="body-wrapper">
	<div class="body">
		
		<div class="home-banner">
			<div class="all-banner-container">
				<div class="banner-container">
					<div class="banner-image">
						<img src="../images/banner 1.png" alt="banner1">
						<span>My Keep</span>

					</div>
					<div class="overlay">
						<span class="widget widget-category-link">
							<a href="../php/mykeep.php" class="entypo-right-thin"></a>
						</span>
					</div>
				</div>

				<div class="banner-container">
					<div class="banner-image">
						<img src="../images/banner 2.png" alt="banner1">
						<span>About Us</span>

					</div>
					<div class="overlay">
						<span class="widget widget-category-link">
							<a href="../php/about.php" class="entypo-right-thin"></a>
						</span>
					</div>
				</div>
				

			</div>
		</div>
	</div>
</div>
{% endblock %}				
