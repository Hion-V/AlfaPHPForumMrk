<?php

$query = $conn->prepare("SELECT threads.ID, threads.board_ID, threads.user_id, threads.title, threads.date_created, users.username FROM threads INNER JOIN users ON threads.user_id=users.id");
$query->execute();
$threadArray = [];

while($result = $query->fetch(PDO::FETCH_BOTH)){
    array_push($threadArray, $result);
}
	    