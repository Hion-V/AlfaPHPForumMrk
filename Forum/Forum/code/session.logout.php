<?php
echo("Logged out");
session_destroy();
header('Location: ../index/index.php');
?>
