<?php 
include("../sql/loginsql.php");
session_start();
$pag_gekozen = "";
if (isset($_GET['p'])) {
	$pag_gekozen = $_GET['p'];
}
if (isset($_POST['title'])) {
	echo $_POST['title'];
}
if (isset($_POST['text'])) {
	echo $_POST['text'];
}
function isUserLoggedIn(){
	if (isset($_SESSION['username']) && isset($_SESSION['id'])){
		return true;
	}
	else{
		return false;
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Forum</title>
	</head>


<?php 
if(isUserLoggedIn()){
	include_once('./content/header_loggedin.php');
}
else{
	include_once('./content/header_loggedout.php');
}
?>


	<body>
		<main>


<?php
switch($pag_gekozen) {
	case 'reg':
		include("../index/register.php");
		break;
	case 'newthread':
		include("../code/newthread.php");
		break;
	case 'login':
		include("../index/login.php");
		break;
	case 'logout':
		include("../code/session.logout.php");
		break;
	case 'showthreads':
		include("./content/overview_threads.php");
		break;
	case 'showboards':
		include("./content/overview_boards.php");
		break;
}
?>
		</main>
	</body>
</html>