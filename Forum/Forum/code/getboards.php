<?php

$query = $conn->prepare("SELECT * FROM boards");
$query->execute();
$boardArray = [];
while($result = $query->fetch(PDO::FETCH_BOTH)){
    $board = [$result['ID'], $result['title'], $result['description']];
    array_push($boardArray, $board);
}
	    