<?php
  include("db_classes/User_table.class.php");
      //$addr = "action.php?action=getUserByUname&username='".$_POST['username']."'";
      //header("Location: ".$addr);
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["e-mail"];
    $user = new User_table();

    $user->openDB();
    $userDetay = $user->checkMail($email);
    //$bolucuUye = explode("#",$userDetay);
    $user->closeDB();
    if(empty($userDetay))
    {
      $message = "Geçersiz mail adresi!";
      echo "<script type='text/javascript'>alert('$message');</script>";
     
      }
    else 
    {
      echo "oldu lan galiba";
      header("location: about.html");
      
    }
  }

?>


<!DOCTYPE html>
<html>
<head>
<title>Helper Giriş - Parola Yenile</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>
<body>
<!---->
<div class="header">
   <div class="container">
     <div class="header-top">
       <div class="logo">
         <a href="index.html"><h1>HELPER <span>Yardım Edebilirsin!</span></h1></a>
       </div>
       <div class="hdr-address">
         <div class="address1">
           <h5> 9560 Sogutozu, Cankaya</h5>
           <p>Ankara, Turkiye</p>
         </div>
         <div class="call">
           <h5>+0312 435 12 66</h5>
           <p>Bize Ulaşın</p>
         </div>
         <div class="clearfix"></div>
       </div>
       <div class="search">
         <div class="search-box">
           <div id="sb-search" class="sb-search">
              <form>
              <input class="sb-search-input" placeholder="search term..." type="search" name="search" id="search">
              <input class="sb-search-submit" type="submit" value="">
              <span class="sb-icon-search"> </span>
             </form>
           </div>
         </div>
       </div>
       <div class="clearfix"> </div>
       <!-- search-scripts -->
      <script src="js/classie.js"></script>
      <script src="js/uisearch.js"></script>
        <script>
          new UISearch( document.getElementById( 'sb-search' ) );
        </script>
      <!-- //search-scripts -->
     </div>
     <!-- script-for-menu -->
     <script>         
          $("span.menu").click(function(){
            $(".top-menu ul").slideToggle("slow" , function(){
            });
          });
     </script>
     <!-- script-for-menu -->
     <div class="clearfix"></div>
   </div>
</div>

<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style1.css">

    <div class="form">
      
        <div id="signup" class="signup">   

          <div class="field-wrap">
            <h1 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Recover Password</h1>
          </div>
          <div class="panel-body">
            <div class="alert alert-info">
              <p class="unuttumNasil">E-mail adresinizi girin ve yeni şifre gönderilsin!</p>
            </div>

            <form action="" method="post">
              <div class="form-group mb-none">
                <div class="input-group">
                  <input name="e-mail" id="e-mail" type="email" placeholder="E-mail" class="form-control input-lg" />
                  <span class="input-group-btn">
                    <button class="btn btn-primary btn-lg" type="submit">Reset!</button>
                  </span>
                </div>
              </div>

              <p class="hatirladinMi">Hatirladin mi? &nbsp<a href="login.php">Giriş Yap!</a></p>
            </form>
          </div>

        </div>
            
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/login.js"></script>
<!---->
<!---->
</body>
</html>

