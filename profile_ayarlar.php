        <script type="text/javascript">
          function validateForm(){
            var x = document.forms["editForm"]["passwd"].value;
            var y = document.forms["editForm"]["passwd_cntrl"].value;
            if (x != y) {
              alert("Parolaların eşleşmesi gerekiyor!");
              return false;
            }
          }
        </script>
        <div role="tabpanel" class="tab-pane fade" id="samsa" aria-labelledby="samsa-tab">
       <div class="container">
    <h1>Edit Profile</h1>
    <hr>
    <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img alt="100x100" src="images/ade.jpg" class="avatar img-circle" alt="avatar">
          <h6>Profil fotoğrafınızı değiştirin</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <form class="form-horizontal" id="editForm" role="form" action="index.php?page=profile#samsa" method="post" onsubmit="return validateForm()" >
          <div class="form-group">
            <label class="col-lg-3 control-label">Ad:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value=<?php echo $_SESSION["user"]["name"]; ?> >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Soyad:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value=<?php echo $_SESSION["user"]["surname"]; ?> >
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value=<?php echo $_SESSION["user"]["e_mail"]; ?> >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Kullanıcı Adı:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value=<?php echo $_SESSION["user"]["uname"]; ?> >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Parola</label>
            <div class="col-md-8">
              <input class="form-control" type="password" id="passwd" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Parolayı doğrula:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" id="passwd_cntrl" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Değişiklikleri Kaydet">
              <span></span>
              <input type="reset" class="btn btn-default" value="İptal">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

        </div>