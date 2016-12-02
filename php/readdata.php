<?php
session_start();
require_once "header.php";
if (isset($_SESSION["username"])){
	global $firstName;
	global $keepUsername;
}else{
	header("Location: login.php");
}

$limit = 4;

//$q = "%" . (isset($_GET["q"]) ? $_GET["q"] : "") . "%";
$p = isset($_GET["p"]) ? intval($_GET["p"]) : 1;

$offset = ($p * $limit) - $limit;	// ($p-1) * $limit


//-------------------------------------------------------

$query = $conn->prepare("select * from tbuserkeepdata where keepUsername=? limit ? offset ?");
$query->bind_param("sii", $keepUsername, $limit, $offset);
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

//=============================================================================

$stmt = "select count(*) as halaman from tbuserkeepdata where keepUsername=?";
$query = $conn->prepare($stmt);
$query->bind_param("s", $keepUsername);
$result = $query->execute();
$rows = $query->get_result();
$row = $rows->fetch_object();
$pages = ceil($row->halaman / $limit);

// bangun url baru untuk pages filter
$q_s = $_SERVER["QUERY_STRING"];
$page_urls = array();
for ($page = 1; $page <= $pages; $page++) {
	if (strpos($q_s, "p=$p")) {
		$url = "?" . str_replace("p=$p", "p=" . $page, $q_s);
	} else {
		$url = "?" . $q_s . "&p=$page";
	}
	array_push($page_urls, $url);
}

$previousPage = 0;
$nextPage = 0;
if ($p > 1){
	$previousPage = $p - 1;
}
if ($p < $pages){
	$nextPage = $p + 1;
}

if ($p < 1 || $p > $pages) {
	die($twig->render("tphp/terror.php", array("pesan"=>"Page not found")));
}

if (! $error){
	echo $twig->render("tphp/treaddata.php", array(
		'items'=>$data, 
		'keepusername' => $keepUsername,
		'firstname' =>$firstName,
		"pages"=>$pages, 
		"p"=>$p, 
		"page_urls"=> $page_urls,
		"next_page"=> $nextPage,
		"previous_page"=> $previousPage
		));
}else{
	die("Fail Render");
}

?>
