<?php
   include_once "db_classes/Campaign.class.php";
   include_once "db_classes/Items.class.php";
   include_once "db_classes/User_table.class.php";
   include_once "db_classes/Database.class.php";

    $user = new User_table();

    $user->openDB();
    echo "opendb";
  

  
  if($_POST) 
  {
      $name     = strip_tags($_POST['username']);
      
   $stmt=$user->prepare("SELECT user_name FROM user_table WHERE user_name=:name");
   $stmt->execute(array(':name'=>$name));
   $count=$stmt->rowCount();
      
   if($count>0)
   {
    echo "<span style='color:white;'>Sorry username already taken !!!</span>";
   }
   else
   {
    echo "<span style='color:white;'>available</span>";
   }
  }
  $user->closeDB();

?>