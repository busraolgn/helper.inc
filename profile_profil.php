
<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
    <hr class="">
    <div class="container target">
        <div class="row">
            <div class="col-sm-10">
              <h1><?php echo strtoupper($_SESSION["user"]["name"])." ".strtoupper($_SESSION["user"]["surname"]); ?></h1>
              <br><br>
            </div>
            <div class="col-sm-2">
              <a href="/users" class="pull-right">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
                <ul class="list-group">
                    <li class="list-group-item text-muted" contenteditable="false">Profil</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Katılım:</strong></span> 2.13.2014</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Son işlem:</strong></span> Yesterday</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Seviye</strong></span><span class="badge badge-danger">30</span></li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item text-muted">Aktiviteler <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Açılan Kampanya</strong></span> 
                        <?php echo count($_SESSION["user"]["aid_started_by_user"]); ?></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">Favoriler</strong></span>
                        <?php echo count($_SESSION["user"]["favorites"]); ?></li>
                </ul>
                <div class="panel panel-default">
                    
                    <div class="span3">
                        <p> 
                            <a rel="nofollow" title="BusraOlgun on Twitter" target="ext">Twitter</a><br>
                            <a rel="publisher">Google+</a><br>
                            <a rel="nofollow" title="Bootply on Facebook" target="ext">Facebook</a><br>
                        </p>
                    </div>
                  
                </div>
            </div>
            <!--/col-3-->
            <div class="col-sm-9" contenteditable="false" style="">
                <div class="panel panel-default">
                    <div class="panel-heading">Genel Bakış</div>
                    <div class="panel-body"> Su anda islem yapılan <?php echo count($_SESSION["user"]["aid_started_by_user"]); ?> kampanyası var.
                    </div>
                </div>
                <div class="panel panel-default target">
                    <div class="panel-heading" contenteditable="false">Yürüttüğüm Kampanyalar</div>
                    <div class="panel-body">
                        <div class="row">
                            <?php 
for($i=0;$i<count($all_campaigns);$i++){
    if ($all_campaigns[$i]["user_id"] == $_SESSION["user"]["id"]) {
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
                    </div>
                </div>
            </div>
            <div id="push"></div>
        </div>
        <footer id="footer">
            <div class="row-fluid">
            </div>
        </footer>

      


  
     
    </div>
</div>