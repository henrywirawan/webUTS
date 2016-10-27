<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if (! isset($_SESSION["username"])){

}
header("Location: ../html/home.html");
?>



	
</body>
</html>