<?php
if(!isUserLoggedIn()){
  header('Location: ../index/index.php');
}


?>
<form method="post" action="../code/create.thread.php">
		Topic:<br>
  <input type="text" name="title"><br>
  		Text :<br>
  <input type="text" name="text"><br>
  <input type="submit" value="Opslaan" name="Submit">
</form>
