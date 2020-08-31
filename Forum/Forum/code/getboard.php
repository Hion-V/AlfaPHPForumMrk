<?php

$query = $conn->prepare("SELECT * FROM boards WHERE ID=:id");
$query->bindParam(':id', $_GET['board'], PDO::PARAM_INT);
$query->execute();
$result = $query->fetch(PDO::FETCH_BOTH);
$board = $result;