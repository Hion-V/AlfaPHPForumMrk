<?php
if(!isUserLoggedIn()){
  header('Location: ../index/index.php');
}

$link = mysqli_connect('localhost', 'root', '', 'forumdatabase');
if(!$link){
die('Could not connect: ' . mysqli_error($link)); 
 }

 $sql = "SELECT * FROM threads";

if($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_row($result)) {
        echo  '<b>TOPIC_ID</b>: '.$row['0'].' USER_ID: '.$row['1'].' <b>TITLE: '.$row['2'].' </b>TEXT: '.$row['3'].' - <i>' .$row['4'].'</i></br>';
    }
    mysqli_free_result($result);
}

mysqli_close($link);