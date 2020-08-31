<?php
//Initialiseer variabelen
$email = "undefined";
$name = "undefined";
$pass = "undefined";
$ip = "undefined";
 
 
if(isPostValid()){
    //Check of email aanwezig is in de database
    if(!isEmailInUse() && !isUsernameInUse()){
        registerUser();
    }
}else{
    echo "POST UNSUCCESFUL: POST DATA INCOMPLETE OR NOT FOUND";
}
 
 
function isPostValid(){
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])){
        return true;
    }else{
        return false;
    }
}
 
function isEmailInUse(){
    //Verbind met de database
    include("../sql/loginsql.php");
    //Vul variabelen
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $name = $_POST['username'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $query = $conn->prepare("SELECT * FROM users where email = :email");
    $query->bindParam(':email', $email, PDO::PARAM_STR, 256);
    $query->execute();
    if($query->rowCount() == 0){
        echo('email not in use');
        return false;
    }
    else{
        echo('email in use');
        return true;
    }
}
function isUsernameInUse(){
    //Verbind met de database
    include("../sql/loginsql.php");
    //Vul variabelen
    $username = $_POST['username'];
    $query = $conn->prepare("SELECT * FROM users where username = :username");
    $query->bindParam(':username', $username, PDO::PARAM_STR, 256);
    $query->execute();
    if($query->rowCount() == 0){
        echo('un not in use');
        return false;
    }
    else{
        echo('un in use');
        return true;
    }
}
 
function registerUser(){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $name = $_POST['username'];
    $ip = $_SERVER['REMOTE_ADDR'];
    //Verbind met de database
    include("../sql/loginsql.php");
    $query = $conn->prepare("INSERT INTO users (username, email, password, reg_ip) VALUES (:name, :email, :pass, :ip)");
    $query->bindParam(':name', $name, PDO::PARAM_STR, 256);
    $query->bindParam(':email', $email, PDO::PARAM_STR, 256);
    $query->bindParam(':pass', $pass, PDO::PARAM_STR, 256);
    $query->bindParam(':ip', $ip, PDO::PARAM_STR, 256);
    $query->execute();
    header('Location: ../index/index.php');

}
?>