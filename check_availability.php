<?php
include_once "Database.class.php";
include("db_classes/User_table.class.php");
$user = new User_table();
$user->openDB();



if(!empty($_POST["username"])) {
  $result = mysql_query("SELECT count(*) FROM user_table WHERE uname='" . $_POST["username"] . "'");
  $row = mysql_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}
?>