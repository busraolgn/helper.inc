<?php
    $yanlis=0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = new User_table();

    $user->openDB();
    $userDetay = $user->getUserByUname($username,$password);
    //$bolucuUye = explode("#",$userDetay);
    $user->closeDB();

    if(empty($userDetay))
    {
      header("location: index.php?page=login&success=0");
    }

    else 
    {
      /*session_start();*/

      $_SESSION["user"] = array(
        "id" => $userDetay["id"], "uname" => $userDetay["uname"], 
        "password" => $userDetay["password"], "e_mail" => $userDetay["e_mail"], 
        "name" => $userDetay["name"], "surname" => $userDetay["surname"], 
        "score" => $userDetay["score"], "favorites" => $userDetay["favorites"], 
        "aid_started_by_user" => $userDetay["aid_started_by_user"], 
        "aid_attended_by_user" => $userDetay["aid_attended_by_user"]
        );
      $_SESSION["user"]["aid_started_by_user"] = explode(",", $userDetay["aid_started_by_user"]);
      //unset($_SESSION["user"]["aid_started_by_user"][count($_SESSION["user"]["aid_started_by_user"])-1]);
     // var_dump($_SESSION["user"]["aid_started_by_user"]);
      
      $_SESSION["user"]["aid_attended_by_user"] = explode(",", $userDetay["aid_attended_by_user"]);
      //unset($_SESSION["user"]["aid_attended_by_user"][count($_SESSION["user"]["aid_attended_by_user"])-1]);
     // var_dump($_SESSION["user"]["aid_attended_by_user"]);

      $_SESSION["user"]["favorites"] = explode(",", $userDetay["favorites"]);
      unset($_SESSION["user"]["favorites"][count($_SESSION["user"]["favorites"])-1]);
      //var_dump($_SESSION["user"]["favorites"]);

      header("Location: index.php?page=home");
    }
  }

    if (isset($_GET["success"])) {
      if($_GET["success"] == 1){
          echo "<div class='alert alert-danger' role='alert'> <strong>Tebrikler Kayıt İşleminiz Gerçekleşti. Aramıza Hoşgeldiniz!</strong> </div>";
      }
      elseif ($_GET["success"] == 0) {
        echo "<div class='alert alert-danger' role='alert'> <strong>Yanlış giriş yaptınız!</strong> Lütfen Tekrar Deneyiniz.. </div>";
      }
    }
?>

<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style.css">

    
  </head>
    <link rel="stylesheet" href="css/normalize.css">

    
        <link rel="stylesheet" href="css/style1.css">

    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#login">Giriş Yap</a></li>
        <li class="tab"><a href="#signup">Kayıt Ol</a></li>
        
      </ul>
      
      <div class="tab-content">
        
        <div id="login">   
          <h1>Tekrar Hoşgeldin!</h1>
          
          <form action="index.php?page=login" method="post">
          
            <div class="field-wrap">
            <label>
              Kullanıcı Adı<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" id="username" name="username" />
          </div>
          
          <div class="field-wrap">
            <label>
              Parola<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password" id="password"/>
          </div>
          
          <p class="forgot"><a href="sifreUnuttu.php">Parolamı Unuttum?</a></p>
          
          <button class="button button-block"/>Giriş</button>
          
          </form>

        </div>

              <div id="signup">   
          <h1>Ucretsiz Kayıt Ol!</h1>
          
          <form action="action.php?action=insertUser_table" method="post" name="form">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Ad<span class="req">*</span>
              </label>
              <input type="text" name="name" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Soyad<span class="req">*</span>
              </label>
              <input type="text" name="surname" required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              E-Posta Adresi<span class="req">*</span>
            </label>
            <input type="email" name="email" required autocomplete="off"/>
          </div>

            <div class="field-wrap">
            <label>
              Kullanici Adi<span class="req">*</span>
            </label>
            <input type="text" name="username" id="username" required autocomplete="off"/>
          </div>

          
          <div class="field-wrap">
            <label>
              Parola Seçin<span class="req">*</span>
            </label>
            <input type="password" name="password" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Başla!</button>
          
          </form>


        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/login.js"></script>
