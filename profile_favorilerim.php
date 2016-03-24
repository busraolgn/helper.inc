        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
           <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">Son Favoriler</div>
                <div class="panel-body">
                  <div class="row">
  
        <?php 
for($i=0;$i<count($all_campaigns);$i++){
    if (in_array($all_campaigns[$i]["id"], $_SESSION["user"]["favorites"])) {
?>
                <div class="col-md-4" style="overflow=hidden; text-overflow:ellipsis;">
                  <div class="thumbnail">
                    <a data-js="open" data-rel="popup" href=<?php echo "popup.php?aid_details_id=".$all_campaigns[$i]["id"]."&back=profile"; ?> >
                    <img alt="300x200" src="http://mebk12.meb.gov.tr/meb_iys_dosyalar/34/09/742287/resimler/2015_04/20103202_img_2246.jpg">
                    </a>
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
                    <a data-js="open" data-rel="popup" href=<?php echo "popup.php?aid_details_id=".$all_campaigns[$i]["id"]."&back=profile"; ?> class="btn">Detayları Görüntüle >></a>
                  </div>
                </div>
<?php } } ?>
            </div>
               
               <?php //include("favorites.php"); ?>


        </div>
              
    </div>
      </div>