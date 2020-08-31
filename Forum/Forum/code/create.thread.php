<?php
include('../sql/loginsql.php');
session_start();
if (isset($_POST['title']) && isset($_POST['text'])){
    if (isset($_SESSION['username']) && isset($_SESSION['id'])){
        $title = $_POST['title'];
        $text = $_POST['text'];
        $uid = $_SESSION['id'];
        $query = $conn->prepare("INSERT INTO threads (title, text, user_id) VALUES (:title, :text, :uid)");
       // $query = $conn->prepare("UPDATE threads SET date_created = now() WHERE user_id = :uid");
        $query->bindParam(':title', $title, PDO::PARAM_STR, 256);
        $query->bindParam(':text', $text, PDO::PARAM_LOB);
        $query->bindParam(':uid', $uid, PDO::PARAM_INT);
        $query->execute();
        header('Location: ../index/index.php');


    }
    else{
        echo("missing login session");
    }    
}
else{
    echo("missing post data");
}

?>