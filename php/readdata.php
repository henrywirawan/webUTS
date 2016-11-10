<?php
session_start();
require_once "header.php";
if (isset($_SESSION["username"])){
	global $firstName;
	global $keepUsername;
}else{
	header("Location: login.php");
}

$query = $conn->prepare("select * from tbuserkeepdata where keepUsername=?");
$query->bind_param("s", $keepUsername);
$result = $query->execute();

$error=false;
if (! $result){
	die("Fail Select");
	$error=true;
}


$rows = $query->get_result();

$data = array();
while ($row = $rows->fetch_object()) {
	$url_edit = "editdata.php?idKeepData=$row->idKeepData";
	$url_delete = "deletedata.php?idKeepData=$row->idKeepData";

    $item = array(
		"username"		=>$row->username,
		"password"		=>$row->password,
		"url"			=>$row->url,
		"description"	=>$row->description,
		"url_edit" 		=>$url_edit,
		"url_delete"	=>$url_delete,
		'keepusername' => $_SESSION['username']
		);

    array_push($data, $item);
}

if (! $error){
	echo $twig->render("tphp/treaddata.php", array(
		'items'=>$data, 
		'keepusername' => $keepUsername,
		'firstname' => $firstName));
}else{
	die("Fail Render");
}

?>
