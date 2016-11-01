<?php
session_start();
if (! isset($_SESSION["username"])){
	header("Location: login.php");
}else{
	$keepUsername = $_SESSION["username"];
}
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="../css/body-table.css">
	<link rel="stylesheet" href="../css/body-title.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/footer.css">
	<head>
		<title>Keep | My Keep</title>
		<style>
			.entypo-trash{
				cursor:pointer;
			}
		</style>
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				<div class="navbar1">
					<div class="logo-container">
						<a href="home.html"><img src="../images/logo.png" alt="logo"></a>
					</div>
					<div class="left-menu">
						<ul>
							<li class=li-home><a href="../php/home.php">Home<span class="underline"></span></a></li>
							<li class=li-shop><a href="../php/mykeep.php">My Keep<span class="underline"></span></a></li>
							<li class=li-about><a href="../html/about.html">About<span class="underline"></span></a></li>
						</ul>
					</div>
					<div class="right-menu">
						<ul>
							<li class="inline li-menu"><span class="entypo-menu span-inline"></span>
								<div class="switcher-content-menu">
									<div class="switcher-content">
										<ul class="links">
											<li>
												<a href="../php/login.php">Sign In</a>
											</li>
											<li>
												<a href="../php/signup.php">Create An Account</a>
											</li>
											<li>
												<a href="../php/myaccounthtml.php">My Keep Account</a>
											</li>
											
											<li>
												<a href="../php/logout.php">Logout</a>
											</li>
										
										</ul>
										
									</div>
								</div>
							</li>
							
						</ul>
					</div>
					
				</div>
			</div>
			<div class="body-title">
				<span class="body-title-text"><h2 class=entypo-home><span>Home / My Keep</span></h2></span>
			</div>
			<div class="body-wrapper">
				<div class="body">
					<div class="button-container">
						<a class="btn-add" href="../php/adddatahtml.php">+</a>
					</div>
					<div class="table-container">
						<?php
						require_once "db.php";
						$conn = konek_db();

						$query = $conn->prepare("select * from tbuserkeepdata where keepUsername=?");
						$query->bind_param("s", $keepUsername);
						$result = $query->execute();

						if (! $result)
							die("Gagal Select");

						$rows = $query->get_result();

						?>
						<table>
							<tr>
								<th>Username</th>
								<th>Password</th>
								<th>Web URL</th>
								<th>Description</th>
							</tr>
						<?php
						while ($row = $rows->fetch_array()){
							$url_edit = "editdatahtml.php?idKeepData=" . $row['idKeepData'];
							$url_delete = "deletedata.php?idKeepData=" . $row['idKeepData'];

							echo "<tr>";
							echo "<td>" . $row['username'] . "</td>";
							echo "<td>" . $row['password'] . "</td>";
							echo "<td>" . $row['url'] . "</td>";
							echo "<td>" . $row['description'] . "</td>";
							echo "
								<td>
									<a class='entypo-pencil btn-mini' href='" . $url_edit . "'></a>";
									?>
									<a class='entypo-trash btn-mini' onclick='deletedata("<?php echo $url_delete; ?>")'></a>
									<?php
							echo "</td>";
							echo "</tr>";

						}

						?>
						</table>	
					</div>		
				</div>
				
			</div>
		
				
			<div class="footer-copyright">
				<span class="text-copyright">Copyright &copy 2016 Henry. All rights reserved.</span>
			</div>
			
		</div>



	</body>
</html>

<script>
function deletedata(urldel) {
    var r = confirm("Are you sure you want to delete this data?");
    if (r == true) {
        window.location.href = urldel;
    } else {
        window.location.href = '../php/readdatahtml.php';
    }
}
</script>