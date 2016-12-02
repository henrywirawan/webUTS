{% extends "headerfooterhtml.php" %}


{% block style %}
	<link rel="stylesheet" href="../css/body-table.css">
	<link rel="stylesheet" href="../css/body-title.css">
	<link rel="stylesheet" href="../css/page-url.css">
{% endblock %}

{% block title %}| My Keep{% endblock %}

{% block body %}
	<div class="body-title">
		<span class="body-title-text"><h2 class=entypo-home><span>Home / My Keep</span></h2></span>
	</div>
	<div class="body-wrapper">
		<div class="body">
			<div class="button-container">
				<a class="btn-add" href="../php/adddata.php">+</a>
			</div>
			<div class="table-container">
				<table>
					<tr class=tr-th>
						<th class='th-data'><span>Username</span></th>
						<th class='th-data'><span>Password</span></th>
						<th class='th-data'><span>Web URL</span></th>
						<th class='th-data'><span>Description</span></th>
						<th class='th-action'><span>Action</span></th>
					</tr>
				
					{% for item in items %}

					<tr>
					<td class='td-data'><span>{{item['username']}}</span></td>
					
					<td class='td-data spnpass' onmouseover="this.style.filter='blur(0px)'" onmouseout="this.style.filter='blur(2px)'">
						<span>{{item['password']}}</span>
					</td>
					<td class='td-data'><span>{{item['url']}}</span></td>
					<td class='td-data'><span>{{item['description']}}</span></td>
					<td class='td-action'>
						<a class='entypo-pencil btn-mini' href="{{item['url_edit']}}"></a>
						<a class='entypo-trash btn-mini' href="{{item['url_delete']}}" style="cursor:pointer;" onclick="return deletedata()"></a>
					</td>
					</tr>

					{% endfor %}

				</table>	
			</div>

			<div class="pagination-container">
				<ul class="pages">
				<li class="previous">
					<a
					{% if previous_page == 0 %}
						style="cursor: not-allowed;" 
						href="#"
					{% else %}
						href="readdata.php?&p={{previous_page}}"
					{% endif %}
					>Previous</a>
				</li>
				
				{% for url in page_urls %}
					{% if p == loop.index %}
					<li class="current-page"><a href="#">{{loop.index}}</a></li>
					{% else %}
					<li class="not-current-page"><a href="{{url}}">{{loop.index}}</a></li>
					{% endif %}
				{% endfor %}
					<li class="next">
					<a
					{% if next_page == 0 %}
						style="cursor: not-allowed;" 
						href="#"
					{% else %}
						href="readdata.php?&p={{next_page}}"
					{% endif %}
					>Next</a>
					</li>
				</ul>
			</div>
			
				
		</div>	
	</div>
		
{% endblock %}


{% block script %}
	<script>
	function deletedata() {
	    var r = confirm("Are you sure you want to delete this data?");
	    if (r == true) {
	        return true;
	    } else {
	        return false;
	    }
	}
	</script>
{% endblock %}