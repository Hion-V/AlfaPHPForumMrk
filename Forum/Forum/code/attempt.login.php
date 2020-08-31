<?php
include("../sql/loginsql.php");
if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $conn->prepare("SELECT * FROM users where username = :username AND password = :password");
    $query->bindParam(':username', $username, PDO::PARAM_STR, 256);
    $query->bindParam(':password', $password, PDO::PARAM_STR, 256);
    $query->execute();



    if($query->rowCount() == 1){
        echo('username and password found');
        $result = $query->fetch(PDO::FETCH_BOTH);
        session_start();
        $_SESSION['id'] = $result['id'];
        $_SESSION['username'] = $result['username'];
        echo("session id: ".$_SESSION['id']." user: ".$_SESSION['username']);  

        
        $id = $_SESSION['id'];
        $query = $conn->prepare("UPDATE users SET login_date = now() WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();


        header('Location: ../index/index.php');
    }
    else{
        echo('Login has failed!');
    }

}

?>
