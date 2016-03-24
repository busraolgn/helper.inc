
<?php
if(empty($_SESSION["user"])){ ?>

<h3>Üzgünüz, Kampanyaları görüntülemek için giriş yapmalı veya üye olmalısınız..</h3>

<!--else - start embedding campaigns in the page-->

<?php

}
else
{
?>
            <div class="col-sm-9" contenteditable="false" style="">
                <div class="panel panel-default">
                    <div class="panel-heading">Genel Bakış</div>
                    <div class="panel-body"> Su anda islem yapılan <?php echo count($_SESSION["user"]["aid_attended_by_user"]); ?> kampanyası var.
                    </div>
                </div>
                <div class="panel panel-default target">
                    <div class="panel-heading" contenteditable="false">Katıldığım Kampanyalar</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                              <div class="thumbnail">
                                <img alt="300x200" src="http://mebk12.meb.gov.tr/meb_iys_dosyalar/34/09/742287/resimler/2015_04/20103202_img_2246.jpg">
                                <div class="caption">
                                  <h3>
                                    Başkale
                                  </h3>
                                  <p>
                                    Van'ın Başkale İlkokuluna kitap topluyoruz.Katıl!
                                  </p>
                                  <p>
                                  </p>
                                </div>
                              </div>
                            </div>
                            <?php 
for($i=0;$i<count($all_campaigns);$i++){
    if (in_array($all_campaigns[$i]["id"], $_SESSION["user"]["aid_attended_by_user"])) {
?>
                            <div class="col-md-4" style="overflow=hidden; text-overflow:ellipsis;">
                              <div class="thumbnail">
                                <img alt="300x200" src="http://mebk12.meb.gov.tr/meb_iys_dosyalar/34/09/742287/resimler/2015_04/20103202_img_2246.jpg">
                                <div class="caption">
                                  <h3>
                                    <?php echo $all_campaigns[$i]["aid_name"]; ?>
                                  </h3>
                                  <p style="overflow=hidden; text-overflow:ellipsis;">
                                    <?php echo $all_campaigns[$i]["aid_comment"]; ?>
                                  </p>
                                  <p>
                                  </p>
                                </div>
                              </div>
                            </div>
<?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="push"></div>
<?php } ?>