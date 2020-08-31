<?php

$query = $conn->prepare("SELECT * FROM boards");
$query->execute();
$boardArray = [];
while($result = $query->fetch(PDO::FETCH_BOTH)){
    array_push($boardArray, $result);
}
	    