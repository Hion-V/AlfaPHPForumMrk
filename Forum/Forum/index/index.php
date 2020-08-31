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
if ($pag_gekozen=="reg") {
	
	include("../index/register.php");
}

else if($pag_gekozen=="newthread"){
	include("../code/newthread.php");
}

else if($pag_gekozen=="login"){
	include("../index/login.php");
}

else if($pag_gekozen=="logout"){
	include("../code/session.logout.php");
}

else if($pag_gekozen=="showthreads"){
	include("../code/showthreads.php");
}
?>


		</main>
	</body>
</html>