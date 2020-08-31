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
<body>
<nav>
	<?php 
	if(isUserLoggedIn()){

		echo('Logged in as: ');
		echo($_SESSION['username']);
		echo('<a href="index.php?p=newthread"><br>New Thread</a>');
		echo('<a href="index.php?p=logout"><br>Logout</a>');
		echo('<a href="index.php?p=showthreads"><br>Show Threads</a>');
		echo('<br>');
	}
	else{
		echo('<a href="index.php?p=login"><br>Login</a>');
		echo('<a href="index.php?p=reg"><br>Registreren</a>');
	}
	?>

</nav>
</body>
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
</html>