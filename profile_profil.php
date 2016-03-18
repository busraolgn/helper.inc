
<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
    <hr class="">
    <div class="container target">
        <div class="row">
            <div class="col-sm-10">
              <h1 class=""><?php echo strtoupper($_SESSION["user"]["name"])." ".strtoupper($_SESSION["user"]["surname"]); ?></h1>
              <br><br>
              <button type="button" class="btn btn-info">Mesaj Gonder!</button>
            </div>
            <div class="col-sm-2">
              <a href="/users" class="pull-right">
              <img title="profile image" class="img-circle img-responsive" src="http://gcube.milliyet.com.tr/Detail/2014/01/16/-evimin-yeri-belli-olmasin--ata-demirer-cihangir-1409731.jpg"></a>
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
                    <div class="panel-heading">Diger Baglantilar</div>
                    <div class="span3">
                        <p> 
                            <a href="http://twitter.com" rel="nofollow" title="BusraOlgun on Twitter" target="ext">Twitter</a><br>
                            <a href="https://plus.google.com/" rel="publisher">Google+</a><br>
                            <a href="http://facebook.com/" rel="nofollow" title="Bootply on Facebook" target="ext">Facebook</a><br>
                        </p>
                    </div>
                    <div class="panel-body">  
                        <i class="fa fa-facebook fa-2x"></i>  <i class="fa fa-github fa-2x"></i> 
                        <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i>  
                        <i class="fa fa-google-plus fa-2x"></i>
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
    if ($all_campaigns[$i]["user_id"] == $_SESSION["user"]["id"]) {
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
        </div>
        <footer id="footer">
            <div class="row-fluid">
            </div>
        </footer>

        <!-- End Quantcast tag -->
        <div id="completeLoginModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                 <h3>Do you want to proceed?</h3>
            </div>
            <div class="modal-body">
                <p>This page must be refreshed to complete your login.</p>
                <p>You will lose any unsaved work once the page is refreshed.</p>
                <br><br>
                <p>Click "No" to cancel the login process.</p>
                <p>Click "Yes" to continue...</p>
            </div>
            <div class="modal-footer">
              <a href="#" id="btnYes" class="btn danger">Yes, complete login</a>
              <a href="#" data-dismiss="modal" aria-hidden="true" class="btn secondary">No</a>
            </div>
        </div>
        <div id="forgotPasswordModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                 <h3>Password Lookup</h3>
            </div>
            <div class="modal-body">
                  <form class="form form-horizontal" id="formForgotPassword">    
                  <div class="control-group">
                      <label class="control-label" for="inputEmail">Email</label>
                      <div class="controls">
                          <input name="_csrf" id="token" type="hidden" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=">
                          <input type="email" name="email" id="inputEmail" placeholder="you@youremail.com" required="">
                          <span class="help-block"><small>Enter the email address you used to sign-up.</small></span>
                      </div>
                  </div>
                  </form>
            </div>
            <div class="modal-footer pull-center">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>  
              <a href="#" data-dismiss="modal" id="btnForgotPassword" class="btn btn-success">Reset Password</a>
            </div>
        </div>
        <div id="upgradeModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                 <h4>Would you like to upgrade?</h4>
            </div>
            <div class="modal-body">
                  <p class="text-center"><strong></strong></p>
                  <h1 class="text-center">$4<small>/mo</small></h1>
                  <p class="text-center"><small>Unlimited plys. Unlimited downloads. No Ads.</small></p>
                  <p class="text-center"><img src="/assets/i_visa.png" width="50" alt="visa"> <img src="/assets/i_mc.png" width="50" alt="mastercard"> <img src="/assets/i_amex.png" width="50" alt="amex"> <img src="/assets/i_discover.png" width="50" alt="discover"> <img src="/assets/i_paypal.png" width="50" alt="paypal"></p>
            </div>
            <div class="modal-footer pull-center">
              <a href="/upgrade" class="btn btn-block btn-huge btn-success"><strong>Upgrade Now</strong></a>
              <a href="#" data-dismiss="modal" class="btn btn-block btn-huge">No Thanks, Maybe Later</a>
            </div>
        </div>
        <div id="contactModal" class="modal hide">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="close">×</a>
                <h3>Contact Us</h3>
                <p>suggestions, questions or feedback</p>
            </div>
            <div class="modal-body">
              <form class="form form-horizontal" id="formContact">
                  <input name="_csrf" id="token" type="hidden" value="CkMEALL0JBMf5KSrOvu9izzMXCXtFQ/Hs6QUY=">
                  <div class="control-group">
                      <label class="control-label" for="inputSender">Name</label>
                      <div class="controls">
                          <input type="text" name="sender" id="inputSender" class="input-large" placeholder="Your name">
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label" for="inputMessage">Message</label>
                      <div class="controls">
                          <textarea name="notes" rows="5" id="inputMessage" class="input-large" placeholder="Type your message here"></textarea>
                      </div>
                  </div>
                  <div class="control-group">
                      <label class="control-label" for="inputEmail">Email</label>
                      <div class="controls">
                          <input type="text" name="email" id="inputEmail" class="input-large" placeholder="you@youremail.com (for reply)" required="">
                      </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer pull-center">
                <a href="#" data-dismiss="modal" aria-hidden="true" class="btn">Cancel</a>     
                <a href="#" data-dismiss="modal" aria-hidden="true" id="btnContact" role="button" class="btn btn-success">Send</a>
            </div>
        </div>
    </div>
</div>