<?php ob_start(); 
  $tooMuch=0;
 if (empty($_SESSION["user"])) {
  echo "<div class='alert alert-danger' role='alert'> <strong>Üzgünüz, Bu Kampanyaya Bağış Yapamazsınız,</strong> Üye Olmanız veya Giriş Yapmanız Gerekmektedir.. </div>"; } 
 else
 {
  if (isset($_GET["success"]) && $_GET["success"] == 1) { 
    echo "<div class='alert alert-danger' role='alert'> <strong>Tebrikler, Bağışınız Başarıyla Gerçekleştiridi</strong> Teşekkür Ederiz.. </div>"; }
  else if (isset($_GET["success"]) && $_GET["success"] == 0) { 
    echo "<div class='alert alert-danger' role='alert'> <strong>Üzgünüz,kampanyayı açan kişi kendi kampanyasına bağış yapamaz.</strong> Bağışınız gerçekleştirilemedi.. </div>"; }
   else {
    if (isset($_GET["aid_id"])) {
      $aid_id = $_GET["aid_id"]; 
      if(in_array($aid_id, $_SESSION["user"]["aid_started_by_user"]))
      {
          header("Location: index.php?page=joinCampaign&success=0"); exit;
      } 
     /* else{ */
        //$_SESSION["aid_attended"] = $aid_id;
        $campaign = new Campaign();
        $campaign->openDB();
        $aid = $campaign->getCampaignByID($aid_id);
        $campaign->closeDB();
        $item = new Items();     
        $item->openDB();
        $items = $item->getItemsByAidID($aid_id);
        $item->closeDB();
        $item_arr=array();
        for ($i=0; $i < count($items); $i++) {  
          $item_arr[$i] = $items[$i]["item_name"]; 
          $itemsKeyName[$items[$i]["item_name"]][] = $items[$i];
        }
        $main_categories = $aid["main_category_tags"];
        $sub_categories = $aid["sub_category_tags"];
     /* } */
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
       $user_id = $_SESSION["user"]["id"];
       $address = $_POST["location"];
       $items = array();
       $index = 0;
       $sub1_checked = false;
       $main1_checked = false;
       $donations="";     
       /*gıda*/
       if(isset($_POST["pirinc"])){ $donations .= "Pirinç=".$_POST["pirinc_kg"].","; } if(isset($_POST["bulgur"])){ $donations .= "Bulgur=".$_POST["bulgur_kg"].","; } 
       if(isset($_POST["nohut"])){ $donations .= "Nohut=".$_POST["nohut_kg"].","; } if(isset($_POST["fasulye"])){ $donations .= "Fasulye=".$_POST["fasulye_kg"].","; } 
       if(isset($_POST["bugday"])){ $donations .= "Buğday=".$_POST["bugday_kg"].","; }
       if(isset($_POST["salca"])){ $donations .= "Salça=".$_POST["salca_kg"].","; } if(isset($_POST["siviyag"])){ $donations .= "Sıvıyağ=".$_POST["siviyag_lt"].","; }
       if(isset($_POST["un"])){ $donations .= "Un=".$_POST["un_kg"].","; } if(isset($_POST["yumurta"])){ $donations .= "Yumurta=".$_POST["yumurta_ad"].","; }
       if(isset($_POST["makarna"])){ $donations .= "Makarna=".$_POST["makarna_kg"].","; }
       if(isset($_POST["et"])){ $donations .= "Et=".$_POST["et_kg"].","; } if(isset($_POST["tavuk"])){ $donations .= "Tavuk=".$_POST["tavuk_kg"].","; }
       if(isset($_POST["balik"])){ $donations .= "Balık=".$_POST["balik_kg"].","; }
       if(isset($_POST["su"])){ $donations .= "Su=".$_POST["su_lt"].","; } if(isset($_POST["sut"])){ $donations .= "Süt=".$_POST["sut_lt"].","; } 
       if(isset($_POST["cay"])){ $donations .= "Çay=".$_POST["cay_lt"].","; } if(isset($_POST["yogurt"])){ $donations .= "Yoğurt=".$_POST["yogurt_kg"].","; }    
       /*giyecekler*/
       if(isset($_POST["tisort_small"])){ $donations .= "TişörtSmall=".$_POST["tisort_small_ad"].","; } if(isset($_POST["tisort_medium"])){ $donations .= "TişörtMedium=".$_POST["tisort_medium_ad"].","; }
       if(isset($_POST["tisort_large"])){ $donations .= "TişörtLarge=".$_POST["tisort_large_ad"].","; } if(isset($_POST["tisort_xlarge"])){ $donations .= "TişörtXlarge=".$_POST["tisort_xlarge_ad"].","; } 
       if(isset($_POST["kazak_small"])){ $donations .= "KazakSmall=".$_POST["kazak_small_ad"].","; } if(isset($_POST["kazak_medium"])){ $donations .= "KazakMedium=".$_POST["kazak_medium_ad"].","; }
       if(isset($_POST["kazak_large"])){ $donations .= "KazakLarge=".$_POST["kazak_large_ad"].","; } if(isset($_POST["kazak_xlarge"])){ $donations .= "KazakXlarge=".$_POST["kazak_xlarge_ad"].","; }  
       if(isset($_POST["pantolon_small"])){ $donations .= "PantolonSmall=".$_POST["pantolon_small_ad"].","; } if(isset($_POST["pantolon_medium"])){ $donations .= "PantolonMedium=".$_POST["pantolon_medium_ad"].","; }
       if(isset($_POST["pantolon_large"])){ $donations .= "PantolonLarge=".$_POST["pantolon_large_ad"].","; } if(isset($_POST["pantolon_xlarge"])){ $donations .= "PantolonXlarge=".$_POST["pantolon_xlarge_ad"].","; }  
       if(isset($_POST["kaban_mont_small"])){ $donations .= "Kaban-MontSmall=".$_POST["kaban_mont_small_ad"].","; } if(isset($_POST["kaban_mont_medium"])){ $donations .= "Kaban-MontMedium=".$_POST["kaban_mont_medium_ad"].","; } 
       if(isset($_POST["kaban_mont_large"])){ $donations .= "Kaban-MontLarge=".$_POST["kaban_mont_large_ad"].","; } if(isset($_POST["kaban_mont_xlarge"])){ $donations .= "Kaban-MontXlarge=".$_POST["kaban_mont_xlarge_ad"].","; }        
       /*temel eşyalar*/ echo "<script> alert(1); <script>";
       if(isset($_POST["su_isitici"])){ $donations .= "SuIsıtıcı=".$_POST["su_isitici_ad"].","; } if(isset($_POST["isitici"])){ $donations .= "Isıtıcı=".$_POST["isitici_ad"].","; }
       if(isset($_POST["bilgisayar"])){ $donations .= "Bilgisayar=".$_POST["bilgisayar_ad"].","; } if(isset($_POST["projeksiyon"])){ $donations .= "Projeksiyon=".$_POST["projeksiyon_ad"].","; }
       if(isset($_POST["camasir_makinesi"])){ $donations .= "ÇamaşırMakinesi=".$_POST["camasir_makinesi_ad"].","; } if(isset($_POST["bulasik_makinesi"])){ $donations .= "BulaşıkMakinesi=".$_POST["bulasik_makinesi_ad"].","; }
       if(isset($_POST["ocak"])){ $donations .= "Ocak=".$_POST["ocak_ad"].","; } if(isset($_POST["fırın"])){ $donations .= "Fırın=".$_POST["fırın_ad"].","; }
       if(isset($_POST["battaniye"])){ $donations .= "Battaniye=".$_POST["battaniye_ad"].","; } if(isset($_POST["bebek_bezi"])){ $donations .= "BebekBezi=".$_POST["bebek_bezi_ad"].","; }    
       /* update items table */   
       $donations_arr = explode(",",$donations);  
       unset($donations_arr[count($donations_arr)-1]); echo "<script> alert(1); <script>";
       for ($j=0; $j < count($donations_arr); $j++) { 
        $item1=explode("=",$donations_arr[$j]);  
        $amount=explode(" " , $item1[1])[0];     
        $new_donations_arr[$item1[0]] = $amount; /*$new_donations_arr["battaniye"] = 5*/ echo "<script> alert('$item1[0]'); <script>"; echo "<script> alert('$item1[1]'); <script>";
       }
        echo "<script> alert('1'); <script>";
       for ($i=0; $i < count($items); $i++) {  echo "<script> alert('$items[$i]['needed']'); <script>";
         //unset($donations_arr[count($donations_arr) - 1]); 
                          /*$item_arr[0] = "battaniye"*/
         if (array_key_exists($items[$i]["item_name"], $new_donations_arr)) {    /*$itemsKeyName["battaniye"] = array()*/ echo 1; 
           if ($items[$i]["needed"] < $new_donations_arr[$items[$i]["item_name"]]) {   
               /* header("Location: index.php?page=joinCampaign&aid_id=$aid_id&success=-1");*/ $tooMuch=1;
               echo "<script type='text/javascript'>window.top.location='index.php?page=joinCampaign&aid_id=$aid_id&success=-1';</script>"; 
            }
            else
              $items[$i]["needed"] -= $new_donations_arr[$items[$i]["item_name"]];
              $items[$i]["needed"] += $new_donations_arr[$items[$i]["item_name"]];
          }
        } 
        if(!$tooMuch){
           /* add entry to donations table.. */ 
           $donation = new Donations();
           $donation->openDB();
           $donation->insertDonations($user_id, 
            $aid_id, $donations, false, $address);
           $donation->closeDB();
          array_push($_SESSION["user"]["aid_attended_by_user"], $aid_id); 
          $aid_attended_by_user = implode (",", $_SESSION["user"]["aid_attended_by_user"]);
          $aid_started_by_user = implode (",", $_SESSION["user"]["aid_started_by_user"]);
          /* update user table-> aid_attended_by_user */ 
           $user = new User_table();
           $user->openDB();
           $user->updateUser_tableCampaigns($_SESSION["user"]["id"], $aid_started_by_user , $aid_attended_by_user);
           $user->closeDB();

           /* update items table.. needed provided and percentage attributes */
           $item = new Items();
           $item->openDB();
           for ($i=0; $i < count($items); $i++) { 
            $id=$aid_id; $type=0; $item_name=$items[$i]["item_name"]; $needed=$items[$i]["needed"]; 
            $provided=$items[$i]["provided"]; $fill_rate=($provided*100)/($needed+$provided); 
             $item->updateItems($items[$i]["id"] ,$id ,$type ,$item_name ,$fill_rate ,$needed ,$provided);
           }
           $item->closeDB();

           header("Location: index.php?page=joinCampaign&success=1"); exit();
        } 
    }
    ob_end_flush();
?>
   <script type="text/javascript">
   $(document).ready(function () {
      $(“ul li”).find(“ul”).hide();
      $(“input[type=’checkbox’]”).each(function () {
      $(this).bind(“click”, function () {
      //Determine if the checkbox was checked 
      var isChecked = $(this).is(“:checked”);
      //Set all the Child Checkboxes to the same state 
      $(this).parent().find(“input[type=’checkbox’]”).each(function () {
      $(this)[0].checked = isChecked;
      });
      if (isChecked) {
      $(this).parent().parents(“ul li”).children(“input[type=’checkbox’]”).each(function () {
      $(this)[0].checked = isChecked;
      });
      }
      else {
      //If the Checkbox is being unchecked and the parent and its parent have only this checkbox checked then they also need to be unchecked 
      $(this).parent().parents(“ul li”).each(function () {
      var anyChecked = $(this).children(“ul”).find(“input[type=’checkbox’]:checked”).length;
      $(this).children(“input[type=’checkbox’]”).each(function () {
      $(this)[0].checked = anyChecked > 0;
      });
      });
      }
      //Only if sub nodes exist expand them 
      if ($(this).parent().find(“ul”).length > 0) {
      $(this).parent().find(“ul”).show(1500);
      }
      //Update the selected Div box
      UpdateDiv();
      });
//Set a different class for the nodes that have children 
$(“ul li label”).each(function () {
if ($(this).parent().children(“ul”).length > 0) {
$(this).addClass(“header”);
$(this).bind(“click”, function () {
$(this).parent().find(“ul”).toggle(1500);
});
}
});
});
//Updates the Selected Items 
function UpdateDiv()
{
$(“#main_ul”).empty();
$(“ul li input[type=’checkbox’]:checked”).each(function () {
if ($(this).parent().find(“ul”).length == 0) {
$(“#main_ul”).append(“<li>” + $(this).parent().children(“label”).html() + “</li>”).hide().show(1000);
}
});
}
    /*    $('.ul1 input:checked').each(function(){
          $(this).child().show(); // show all parent elements
        }); */
   </script>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=true"></script>
      <script>
      $(document).ready(function () {
        $location_input = $("#location");
        var options = { componentRestrictions: { country: 'tr' }};
        autocomplete = new google.maps.places.Autocomplete($location_input.get(0), options);    
      });
    </script>
    </head>
    <body>
      <?php 
        if (isset($_GET["success"]) && $_GET["success"] == -1) { 
        echo "<div class='alert alert-danger' role='alert'> <strong>Gerekenden fazla bağış yaptınız. Lütfen miktarlarınızı kontrol ediniz.</strong> </div>"; }
      ?>
<div>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        <form role="form" action=<?php echo "?page=joinCampaign&aid_id=".$aid_id; ?> method="post" class="registration-form">
			                    <fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Adım 1 / 2</h3>
		                            		<p>Bağışlayacağınız materyalleri ve miktarları belirtin</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-key"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
    			                        <div class="acidjs-css3-treeview">
                                    <ul class="ul1" id="main_ul">
                                      <?php if(strpos($main_categories, "Gıda") !== false) { ?>
                                        <li>    <!--gıda-->
                                            <input type="checkbox" id="gida"/>
                                            <label class="items" for="gida" >Gıda</label>
                                            <ul>
                                              <?php if(strpos($sub_categories, "Bakliyat") !== false) { ?>
                                                <li>
                                                    <input type="checkbox" id="bakliyat" />
                                                    <label class="items" for="bakliyat">Bakliyat</label>
                                                    <ul>
                                                      <?php if(in_array("Pirinç", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="pirinc" checked="checked" /><label><input type="checkbox" name="pirinc" id="pirinc" />
                                                            <span></span></label><label class="items" for="pirinc">Pirinç</label> 
                                                            <select id="pirinc_kg" name="pirinc_kg" class="field select medium" onchange="changeTest(this.id)" tabindex="11"> 
                                                                  <option value="5 kg">5 kg</option>
                                                                  <option value="10 kg">10 kg</option>
                                                                  <option value="15 kg">15 kg</option>
                                                                  <option value="20 kg">20 kg</option>
                                                                  <option value="25 kg">25 kg</option>
                                                                  <option value="30 kg">30 kg</option>
                                                                  <option value="40 kg">40 kg</option>
                                                                  <option value="50 kg">50 kg</option>
                                                                  <option value="60 kg">60 kg</option>
                                                                  <option value="70 kg">70 kg</option>
                                                                  <option value="80 kg">80 kg</option>
                                                                  <option value="90 kg">90 kg</option>
                                                                  <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Bulgur", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="bulgur" /><label><input type="checkbox" id="bulgur" name="bulgur" />
                                                            <span></span></label><label class="items" for="bulgur">Bulgur</label> 
                                                            <select id="bulgur_kg" name="bulgur_kg" class="field select medium" tabindex="11"> 
                                                              <option value="5 kg">5 kg</option>
                                                              <option value="10 kg">10 kg</option>
                                                              <option value="15 kg">15 kg</option>
                                                              <option value="20 kg">20 kg</option>
                                                              <option value="25 kg">25 kg</option>
                                                              <option value="30 kg">30 kg</option>
                                                              <option value="40 kg">40 kg</option>
                                                              <option value="50 kg">50 kg</option>
                                                              <option value="60 kg">60 kg</option>
                                                              <option value="70 kg">70 kg</option>
                                                              <option value="80 kg">80 kg</option>
                                                              <option value="90 kg">90 kg</option>
                                                              <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Nohut", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="nohut" /><label><input type="checkbox" id="nohut" name="nohut" />
                                                            <span></span></label><label class="items" for="nohut">Nohut</label> 
                                                            <select id="nohut_kg" name="nohut_kg" class="field select medium" tabindex="11"> 
                                                              <option value="5 kg">5 kg</option>
                                                              <option value="10 kg">10 kg</option>
                                                              <option value="15 kg">15 kg</option>
                                                              <option value="20 kg">20 kg</option>
                                                              <option value="25 kg">25 kg</option>
                                                              <option value="30 kg">30 kg</option>
                                                              <option value="40 kg">40 kg</option>
                                                              <option value="50 kg">50 kg</option>
                                                              <option value="60 kg">60 kg</option>
                                                              <option value="70 kg">70 kg</option>
                                                              <option value="80 kg">80 kg</option>
                                                              <option value="90 kg">90 kg</option>
                                                              <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Fasulye", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="fasulye" /><label><input type="checkbox" name="fasulye" id="fasulye" />
                                                            <span></span></label><label class="items" for="fasulye">Fasulye</label> 
                                                            <select id="fasulye_kg" name="fasulye_kg" class="field select medium" tabindex="11"> 
                                                              <option value="5 kg">5 kg</option>
                                                              <option value="10 kg">10 kg</option>
                                                              <option value="15 kg">15 kg</option>
                                                              <option value="20 kg">20 kg</option>
                                                              <option value="25 kg">25 kg</option>
                                                              <option value="30 kg">30 kg</option>
                                                              <option value="40 kg">40 kg</option>
                                                              <option value="50 kg">50 kg</option>
                                                              <option value="60 kg">60 kg</option>
                                                              <option value="70 kg">70 kg</option>
                                                              <option value="80 kg">80 kg</option>
                                                              <option value="90 kg">90 kg</option>
                                                              <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Buğday", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="bugday" /><label><input type="checkbox" name="bugday" id="bugday" />
                                                            <span></span></label><label class="items" for="bugday">Buğday</label> 
                                                            <select id="bugday_kg" name="bugday_kg" class="field select medium" tabindex="11"> 
                                                              <option value="5 kg">5 kg</option>
                                                              <option value="10 kg">10 kg</option>
                                                              <option value="15 kg">15 kg</option>
                                                              <option value="20 kg">20 kg</option>
                                                              <option value="25 kg">25 kg</option>
                                                              <option value="30 kg">30 kg</option>
                                                              <option value="40 kg">40 kg</option>
                                                              <option value="50 kg">50 kg</option>
                                                              <option value="60 kg">60 kg</option>
                                                              <option value="70 kg">70 kg</option>
                                                              <option value="80 kg">80 kg</option>
                                                              <option value="90 kg">90 kg</option>
                                                              <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } ?>
                                                    </ul>
                                                </li>
                                              <?php } if(strpos($sub_categories, "KonserveVeYemekMalzemeleri") !== false) { ?> 
                                                <li>
                                                    <input type="checkbox" id="konserve" />
                                                    <label class="items" for="konserve">Konserve ve Yemek Malzemeleri</label>
                                                    <ul>
                                                      <?php if(in_array("Salça", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="salca" /><label><input type="checkbox" name="salca" id="salca" />
                                                            <span></span></label><label class="items" for="salca">Salça</label> 
                                                            <select id="salca_kg" name="salca_kg" class="field select medium" tabindex="11"> 
                                                              <option value="5 kg">5 kg</option>
                                                              <option value="10 kg">10 kg</option>
                                                              <option value="15 kg">15 kg</option>
                                                              <option value="20 kg">20 kg</option>
                                                              <option value="25 kg">25 kg</option>
                                                              <option value="30 kg">30 kg</option>
                                                              <option value="40 kg">40 kg</option>
                                                              <option value="50 kg">50 kg</option>
                                                              <option value="60 kg">60 kg</option>
                                                              <option value="70 kg">70 kg</option>
                                                              <option value="80 kg">80 kg</option>
                                                              <option value="90 kg">90 kg</option>
                                                              <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Sıvıyağ", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="siviyag" /><label><input type="checkbox" name="siviyag" id="siviyag" />
                                                            <span></span></label><label class="items" for="siviyag">Sıvıyağ</label> 
                                                            <select id="siviyag_lt" name="siviyag_lt" class="field select medium" tabindex="11"> 
                                                              <option value="5 lt">5 lt</option>
                                                              <option value="10 lt">10 lt</option>
                                                              <option value="15 lt">15 lt</option>
                                                              <option value="20 lt">20 lt</option>
                                                              <option value="25 lt">25 lt</option>
                                                              <option value="30 lt">30 lt</option>
                                                              <option value="40 lt">40 lt</option>
                                                              <option value="50 lt">50 lt</option>
                                                              <option value="60 lt">60 lt</option>
                                                              <option value="70 lt">70 lt</option>
                                                              <option value="80 lt">80 lt</option>
                                                              <option value="90 lt">90 lt</option>
                                                              <option value="100 lt">100 lt</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Un", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="un" /><label><input type="checkbox" name"un" id="un" />
                                                            <span></span></label><label class="items" for="un">Un</label> 
                                                            <select id="un_kg" name="un_kg" class="field select medium" tabindex="11"> 
                                                              <option value="5 kg">5 kg</option>
                                                              <option value="10 kg">10 kg</option>
                                                              <option value="15 kg">15 kg</option>
                                                              <option value="20 kg">20 kg</option>
                                                              <option value="25 kg">25 kg</option>
                                                              <option value="30 kg">30 kg</option>
                                                              <option value="40 kg">40 kg</option>
                                                              <option value="50 kg">50 kg</option>
                                                              <option value="60 kg">60 kg</option>
                                                              <option value="70 kg">70 kg</option>
                                                              <option value="80 kg">80 kg</option>
                                                              <option value="90 kg">90 kg</option>
                                                              <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Yumurta", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="yumurta" /><label><input type="checkbox" name="yumurta" id="yumurta" />
                                                            <span></span></label><label class="items" for="yumurta">Yumurta</label> 
                                                            <select id="yumurta_ad" name="yumurta_ad" class="field select medium" tabindex="11"> 
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="60 ad">60 ad</option>
                                                              <option value="80 ad">80 ad</option>
                                                              <option value="100 ad">100 ad</option>
                                                              <option value="120 ad">120 ad</option>
                                                              <option value="140 ad">140 ad</option>
                                                              <option value="150 ad">150 ad</option>
                                                              <option value="160 ad">160 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Makarna", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="makarna" /><label><input type="checkbox" name="makarna" id="makarna" />
                                                            <span></span></label><label class="items" for="makarna">Makarna</label> 
                                                            <select id="makarna_kg" name="makarna_kg" class="field select medium" tabindex="11"> 
                                                              <option value="5 kg">5 kg</option>
                                                              <option value="10 kg">10 kg</option>
                                                              <option value="15 kg">15 kg</option>
                                                              <option value="20 kg">20 kg</option>
                                                              <option value="25 kg">25 kg</option>
                                                              <option value="30 kg">30 kg</option>
                                                              <option value="40 kg">40 kg</option>
                                                              <option value="50 kg">50 kg</option>
                                                              <option value="60 kg">60 kg</option>
                                                              <option value="70 kg">70 kg</option>
                                                              <option value="80 kg">80 kg</option>
                                                              <option value="90 kg">90 kg</option>
                                                              <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } ?>
                                                    </ul>
                                                </li>
                                              <?php } if(strpos($sub_categories, "EtÜrünleri") !== false) { ?>
                                                <li>
                                                    <input type="checkbox" id="et_urunleri" />
                                                    <label class="items" for="et_urunleri">Et Ürünleri</label>
                                                    <ul>
                                                      <?php if(in_array("Et", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="et" /><label><input type="checkbox" name="et" id="et" />
                                                            <span></span></label><label class="items" for="et">Et</label> 
                                                            <select id="et_kg" name="et_kg" class="field select medium" tabindex="11"> 
                                                                <option value="5 kg">5 kg</option>
                                                                <option value="10 kg">10 kg</option>
                                                                <option value="15 kg">15 kg</option>
                                                                <option value="20 kg">20 kg</option>
                                                                <option value="25 kg">25 kg</option>
                                                                <option value="30 kg">30 kg</option>
                                                                <option value="40 kg">40 kg</option>
                                                                <option value="50 kg">50 kg</option>
                                                                <option value="60 kg">60 kg</option>
                                                                <option value="70 kg">70 kg</option>
                                                                <option value="80 kg">80 kg</option>
                                                                <option value="90 kg">90 kg</option>
                                                                <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Tavuk", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="tavuk" /><label><input type="checkbox" name="tavuk" id="tavuk" />
                                                            <span></span></label><label class="items" for="tavuk">Tavuk</label> 
                                                            <select id="tavuk_kg" name="tavuk_kg" class="field select medium" tabindex="11"> 
                                                                <option value="5 kg">5 kg</option>
                                                                <option value="10 kg">10 kg</option>
                                                                <option value="15 kg">15 kg</option>
                                                                <option value="20 kg">20 kg</option>
                                                                <option value="25 kg">25 kg</option>
                                                                <option value="30 kg">30 kg</option>
                                                                <option value="40 kg">40 kg</option>
                                                                <option value="50 kg">50 kg</option>
                                                                <option value="60 kg">60 kg</option>
                                                                <option value="70 kg">70 kg</option>
                                                                <option value="80 kg">80 kg</option>
                                                                <option value="90 kg">90 kg</option>
                                                                <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Balık", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="balik" /><label><input type="checkbox" name="balik" id="balik" />
                                                            <span></span></label><label class="items" for="balik">Balık</label> 
                                                            <select id="balik_kg" name="balik_kg" class="field select medium" tabindex="11"> 
                                                              <option value="5 kg">5 kg</option>
                                                              <option value="10 kg">10 kg</option>
                                                              <option value="15 kg">15 kg</option>
                                                              <option value="20 kg">20 kg</option>
                                                              <option value="25 kg">25 kg</option>
                                                              <option value="30 kg">30 kg</option>
                                                              <option value="40 kg">40 kg</option>
                                                              <option value="50 kg">50 kg</option>
                                                              <option value="60 kg">60 kg</option>
                                                              <option value="70 kg">70 kg</option>
                                                              <option value="80 kg">80 kg</option>
                                                              <option value="90 kg">90 kg</option>
                                                              <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } ?>
                                                    </ul>
                                                </li>
                                              <?php } if(strpos($sub_categories, "İçecekler") !== false) { ?>
                                                <li>
                                                    <input type="checkbox" id="icecekler" />
                                                    <label class="items" for="icecekler">İçecekler</label>
                                                    <ul>
                                                      <?php if(in_array("Su", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="su" /><label><input type="checkbox" name="su" id="su" />
                                                            <span></span></label><label class="items" for="su">Su</label> 
                                                            <select id="su_lt" name="su_lt" class="field select medium" tabindex="11"> 
                                                              <option value="5 lt">5 lt</option>
                                                              <option value="10 lt">10 lt</option>
                                                              <option value="15 lt">15 lt</option>
                                                              <option value="20 lt">20 lt</option>
                                                              <option value="25 lt">25 lt</option>
                                                              <option value="30 lt">30 lt</option>
                                                              <option value="40 lt">40 lt</option>
                                                              <option value="50 lt">50 lt</option>
                                                              <option value="60 lt">60 lt</option>
                                                              <option value="70 lt">70 lt</option>
                                                              <option value="80 lt">80 lt</option>
                                                              <option value="90 lt">90 lt</option>
                                                              <option value="100 lt">100 lt</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Süt", $item_arr)){ ?>
                                                        <li>
                                                          <input type="checkbox" id="sut" /><label><input type="checkbox" name="sut" id="sut" />
                                                          <span></span></label><label class="items" for="sut">Süt</label> 
                                                          <select id="sut_lt" name="sut_lt" class="field select medium" tabindex="11"> 
                                                            <option value="5 lt">5 lt</option>
                                                            <option value="10 lt">10 lt</option>
                                                            <option value="15 lt">15 lt</option>
                                                            <option value="20 lt">20 lt</option>
                                                            <option value="25 lt">25 lt</option>
                                                            <option value="30 lt">30 lt</option>
                                                            <option value="40 lt">40 lt</option>
                                                            <option value="50 lt">50 lt</option>
                                                            <option value="60 lt">60 lt</option>
                                                            <option value="70 lt">70 lt</option>
                                                            <option value="80 lt">80 lt</option>
                                                            <option value="90 lt">90 lt</option>
                                                            <option value="100 lt">100 lt</option>
                                                          </select>
                                                        </li>
                                                      <?php } if(in_array("Çay", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="cay" /><label><input type="checkbox" name="cay" id="cay" />
                                                            <span></span></label><label class="items" for="cay">Çay</label> 
                                                            <select id="cay_lt" name="cay_lt" class="field select medium" tabindex="11"> 
                                                              <option value="5 kg">5 kg</option>
                                                              <option value="10 kg">10 kg</option>
                                                              <option value="15 kg">15 kg</option>
                                                              <option value="20 kg">20 kg</option>
                                                              <option value="25 kg">25 kg</option>
                                                              <option value="30 kg">30 kg</option>
                                                              <option value="40 kg">40 kg</option>
                                                              <option value="50 kg">50 kg</option>
                                                              <option value="60 kg">60 kg</option>
                                                              <option value="70 kg">70 kg</option>
                                                              <option value="80 kg">80 kg</option>
                                                              <option value="90 kg">90 kg</option>
                                                              <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Yoğurt", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="yogurt" /><label><input type="checkbox" name="yogurt" id="yogurt" />
                                                            <span></span></label><label class="items" for="yogurt">Yoğurt</label> 
                                                            <select id="yogurt_kg" name="yogurt_kg" class="field select medium" tabindex="11"> 
                                                              <option value="5 kg">5 kg</option>
                                                              <option value="10 kg">10 kg</option>
                                                              <option value="15 kg">15 kg</option>
                                                              <option value="20 kg">20 kg</option>
                                                              <option value="25 kg">25 kg</option>
                                                              <option value="30 kg">30 kg</option>
                                                              <option value="40 kg">40 kg</option>
                                                              <option value="50 kg">50 kg</option>
                                                              <option value="60 kg">60 kg</option>
                                                              <option value="70 kg">70 kg</option>
                                                              <option value="80 kg">80 kg</option>
                                                              <option value="90 kg">90 kg</option>
                                                              <option value="100 kg">100 kg</option>
                                                            </select>
                                                        </li>
                                                      <?php } ?>
                                                    </ul>
                                                </li>
                                              <?php } ?>
                                            </ul> 
                                        </li>   <!--end gıda-->
                                              <?php } if(strpos($main_categories, "Giyecekler") !== false) { ?>
                                        <li>
                                            <input type="checkbox" id="giyecekler"/>
                                            <label class="items" for="giyecekler">Giyecekler</label>
                                            <ul>
                                              <?php } if(strpos($sub_categories, "Tişört") !== false) { ?>
                                                <li>
                                                    <input type="checkbox" id="tisort" checked="checked" />
                                                    <label class="items" for="tisort">Tişört</label>
                                                    <ul>
                                                      <?php if(in_array("TişörtSmall", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="tisort_small" checked="checked" />
                                                            <label><input type="checkbox" name="tisort_small" id="tisort_small" /><span></span></label>
                                                            <label class="items" for="tisort_small">Small</label> 
                                                            <select id="tisort_small_ad" name="tisort_small_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("TişörtMedium", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="tisort_medium" checked="checked" />
                                                            <label><input type="checkbox" name="tisort_medium" id="tisort_medium" /><span></span></label>
                                                            <label class="items" for="tisort_medium">Medium</label> 
                                                            <select id="tisort_medium_ad" name="tisort_medium_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("TişörtLarge", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="tisort_large" checked="checked" />
                                                            <label><input type="checkbox" name="tisort_large" id="tisort_large" /><span></span></label>
                                                            <label class="items" for="tisort_large">Large</label> 
                                                            <select id="tisort_large_ad" name="tisort_large_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("TişörtXlarge", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="tisort_xlarge" checked="checked" />
                                                            <label><input type="checkbox" name="tisort_xlarge" id="tisort_xlarge" /><span></span></label>
                                                            <label class="items" for="tisort_xlarge">Xlarge</label> 
                                                            <select id="tisort_xlarge_ad" name="tisort_xlarge_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } ?>
                                                    </ul>
                                                </li> <!--tişört -->
                                              <?php } if(strpos($sub_categories, "Kazak") !== false) { ?>
                                                <li>
                                                    <input type="checkbox" id="kazak" />
                                                    <label class="items" for="kazak">Kazak</label>
                                                    <ul>
                                                      <?php if(in_array("KazakSmall", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="kazak_small" checked="checked" />
                                                            <label><input type="checkbox" name="kazak_small" id="kazak_small" /><span></span></label>
                                                            <label class="items" for="kazak_small">Small</label> 
                                                            <select id="kazak_small_ad" name="kazak_small_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("KazakMedium", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="kazak_medium" checked="checked" />
                                                            <label><input type="checkbox" name="kazak_medium" id="kazak_medium" /><span></span></label>
                                                            <label class="items" for="kazak_medium">Medium</label> 
                                                            <select id="kazak_medium_ad" name="kazak_medium_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("KazakLarge", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="kazak_large" checked="checked" />
                                                            <label><input type="checkbox" name="kazak_large" id="kazak_large" /><span></span></label>
                                                            <label class="items" for="kazak_large">Large</label> 
                                                            <select id="kazak_large_ad" name="kazak_large_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("KazakXlarge", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="kazak_xlarge" checked="checked" />
                                                            <label><input type="checkbox" name="kazak_xlarge" id="kazak_xlarge" /><span></span></label>
                                                            <label class="items" for="kazak_xlarge">Xlarge</label> 
                                                            <select id="kazak_xlarge_ad" name="kazak_xlarge_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } ?>
                                                    </ul>
                                                </li> 
                                              <?php } if(strpos($sub_categories, "Pantolon") !== false) { ?>
                                                <li>
                                                    <input type="checkbox" id="pantolon"/>
                                                    <label class="items" for="pantolon">Pantolon</label>
                                                    <ul>
                                                      <?php if(in_array("PantolonSmall", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="pantolon_small" checked="checked" />
                                                            <label><input type="checkbox" name="pantolon_small" id="pantolon_small" /><span></span></label>
                                                            <label class="items" for="pantolon_small">Small</label> 
                                                            <select id="pantolon_small_ad" name="pantolon_small_ad" class="field select medium" tabindex="11"> 
                                                                <option value="5 ad">5 ad</option>
                                                                <option value="10 ad">10 ad</option>
                                                                <option value="15 ad">15 ad</option>
                                                                <option value="20 ad">20 ad</option>
                                                                <option value="25 ad">25 ad</option>
                                                                <option value="30 ad">30 ad</option>
                                                                <option value="35 ad">35 ad</option>
                                                                <option value="40 ad">40 ad</option>
                                                                <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("PantolonMedium", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="pantolon_medium" checked="checked" />
                                                            <label><input type="checkbox" name="pantolon_medium" id="pantolon_medium" /><span></span></label>
                                                            <label class="items" for="pantolon_medium">Medium</label> 
                                                            <select id="pantolon_medium_ad" name="pantolon_medium_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("PantolonLarge", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="pantolon_large" checked="checked" />
                                                            <label><input type="checkbox" name="pantolon_large" id="pantolon_large" /><span></span></label>
                                                            <label class="items" for="pantolon_large">Large</label> 
                                                            <select id="pantolon_large_ad" name="pantolon_large_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("PantolonXlarge", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="pantolon_xlarge" checked="checked" />
                                                            <label><input type="checkbox" name="pantolon_xlarge" id="pantolon_xlarge" /><span></span></label>
                                                            <label class="items" for="pantolon_xlarge">Xlarge</label> 
                                                            <select id="pantolon_xlarge_ad" name="pantolon_xlarge_ad" class="field select medium" tabindex="11"> 
                                                                <option value="5 ad">5 ad</option>
                                                                <option value="10 ad">10 ad</option>
                                                                <option value="15 ad">15 ad</option>
                                                                <option value="20 ad">20 ad</option>
                                                                <option value="25 ad">25 ad</option>
                                                                <option value="30 ad">30 ad</option>
                                                                <option value="35 ad">35 ad</option>
                                                                <option value="40 ad">40 ad</option>
                                                                <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } ?>
                                                    </ul>
                                                </li> 
                                              <?php } if(strpos($sub_categories, "Kaban-Mont") !== false) { ?>
                                                <li>
                                                    <input type="checkbox" id="kaban_mont" />
                                                    <label class="items" for="kaban_mont">Kaban-Mont</label>
                                                    <ul>
                                                      <?php if(in_array("Kaban-MontSmall", $item_arr)){ ?>
                                                        <li>
                                                          <input type="checkbox" id="kaban_mont_small" checked="unchecked" />
                                                          <label><input type="checkbox" name="kaban_mont_small" id="kaban_mont_small" /><span></span>
                                                          </label><label class="items" for="kaban_mont_small">Small</label> 
                                                          <select id="kaban_mont_small_ad" name="kaban_mont_small_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Kaban-MontMedium", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="kaban_mont_medium" checked="unchecked" />
                                                            <label><input type="checkbox" name="kaban_mont_medium" id="kaban_mont_medium" /><span></span></label>
                                                            <label class="items" for="kaban_mont_medium">Medium</label> 
                                                            <select id="kaban_mont_medium_ad" name="kaban_mont_medium_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Kaban-MontLarge", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="kaban_mont_large" checked="unchecked" />
                                                            <label><input type="checkbox" name="kaban_mont_large" id="kaban_mont_large" /><span></span></label><label class="items" for="kaban_mont_large">Large</label> 
                                                            <select id="kaban_mont_large_ad" name="kaban_mont_large_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Kaban-MontXlarge", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="kaban_mont_xlarge" checked="unchecked" />
                                                            <label><input type="checkbox" name="kaban_mont_xlarge" id="kaban_mont_xlarge" /><span></span></label>
                                                            <label class="items" for="kaban_mont_xlarge">Xlarge</label> 
                                                            <select id="kaban_mont_xlarge_ad" name="kaban_mont_xlarge_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } ?>
                                                    </ul>
                                                </li> 
                                              <?php } ?>
                                            </ul>   <!--giyecekler--> <!--giyecekler-->  <!--giyeceker-->
                                        </li>   <!--end giyecekler-->
                                      <?php if(strpos($main_categories, "TemelEşyalar") !== false) { ?>
                                        <li>
                                            <input type="checkbox" id="temel_esyalar"/>
                                            <label class="items" for="temel_esyalar">Temel Eşyalar</label>
                                            <ul>
                                              <?php if(strpos($sub_categories, "ElektrikliAletler") !== false) { ?>
                                                <li>
                                                    <input type="checkbox" id="elektrikli_cihazlar" />
                                                    <label class="items" for="elektrikli_cihazlar">Elektrikli Aletler</label> 
                                                    <ul>
                                                      <?php if(in_array("SuIsıtıcı", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="su_isitici" checked="checked" />
                                                            <label><input type="checkbox" name="su_isitici" id="su_isitici" /><span></span></label>
                                                            <label class="items" for="su_isitici">Su Isıtıcı</label> 
                                                            <select id="su_isitici_ad" name="su_isitici_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("Isıtıcı", $item_arr)){ ?>
                                                        <li>
                                                                    <input type="checkbox" id="isitici" checked="checked" />
                                                                    <label><input type="checkbox" name="isitici" id="isitici" /><span></span></label>
                                                                    <label class="items" for="isitici">Isıtıcı</label> 
                                                                    <select id="isitici_ad" name="isitici_ad" class="field select medium" tabindex="11"> 
                                                                        <option value="5 ad">5 ad</option>
                                                                        <option value="10 ad">10 ad</option>
                                                                        <option value="15 ad">15 ad</option>
                                                                        <option value="20 ad">20 ad</option>
                                                                        <option value="25 ad">25 ad</option>
                                                                        <option value="30 ad">30 ad</option>
                                                                        <option value="35 ad">35 ad</option>
                                                                        <option value="40 ad">40 ad</option>
                                                                        <option value="45 ad">45 ad</option>
                                                                    </select>
                                                        </li>
                                                      <?php } if(in_array("Bilgisayar", $item_arr)){ ?>
                                                        <li>
                                                                    <input type="checkbox" id="bilgisayar" checked="checked" />
                                                                    <label><input type="checkbox" name="bilgisayar" id="bilgisayar" /><span></span></label>
                                                                    <label  class="items" for="bilgisayar">Bilgisayar</label> 
                                                                    <select id="bilgisayar_ad" name="bilgisayar_ad" class="field select medium" tabindex="11"> 
                                                                        <option value="5 ad">5 ad</option>
                                                                        <option value="10 ad">10 ad</option>
                                                                        <option value="15 ad">15 ad</option>
                                                                        <option value="20 ad">20 ad</option>
                                                                        <option value="25 ad">25 ad</option>
                                                                        <option value="30 ad">30 ad</option>
                                                                        <option value="35 ad">35 ad</option>
                                                                        <option value="40 ad">40 ad</option>
                                                                        <option value="45 ad">45 ad</option>
                                                                    </select>
                                                        </li>
                                                      <?php } if(in_array("Projeksiyon", $item_arr)){ ?>
                                                        <li>
                                                                  <input type="checkbox" id="projeksiyon" checked="checked" />
                                                                  <label><input type="checkbox" name="projeksiyon" id="projeksiyon" /><span></span></label>
                                                                  <label class="items" for="projeksiyon">Projeksiyon</label> 
                                                                  <select id="projeksiyon_ad" name="projeksiyon_ad" class="field select medium" tabindex="11"> 
                                                                    <option value="5 ad">5 ad</option>
                                                                    <option value="10 ad">10 ad</option>
                                                                    <option value="15 ad">15 ad</option>
                                                                    <option value="20 ad">20 ad</option>
                                                                    <option value="25 ad">25 ad</option>
                                                                    <option value="30 ad">30 ad</option>
                                                                    <option value="35 ad">35 ad</option>
                                                                    <option value="40 ad">40 ad</option>
                                                                    <option value="45 ad">45 ad</option>
                                                                  </select>
                                                        </li>
                                                      <?php } ?>
                                                    </ul>
                                                </li> <!--Elektikli cihaz -->
                                              <?php } if(strpos($sub_categories, "BeyazEşya") !== false) { ?>
                                                <li>
                                                    <input type="checkbox" id="beyaz_esya"  />
                                                    <label class="items" for="beyaz_esya">Beyaz Eşya</label> 
                                                    <ul>
                                                      <?php if(in_array("ÇamaşırMakinesi", $item_arr)){ ?>
                                                        <li>
                                                            <input type="checkbox" id="camasir_makinesi" checked="checked" />
                                                            <label><input type="checkbox" name="camasir_makinesi" id="camasir_makinesi" /><span></span></label>
                                                            <label class="items" for="camasir_makinesi">Çamaşır Makinesi</label> 
                                                            <select id="camasir_makinesi_ad" name="camasir_makinesi_ad" class="field select medium" tabindex="11"> 
                                                              <option value="5 ad">5 ad</option>
                                                              <option value="10 ad">10 ad</option>
                                                              <option value="15 ad">15 ad</option>
                                                              <option value="20 ad">20 ad</option>
                                                              <option value="25 ad">25 ad</option>
                                                              <option value="30 ad">30 ad</option>
                                                              <option value="35 ad">35 ad</option>
                                                              <option value="40 ad">40 ad</option>
                                                              <option value="45 ad">45 ad</option>
                                                            </select>
                                                        </li>
                                                      <?php } if(in_array("BulaşıkMakinesi", $item_arr)){ ?>
                                                        <li>
                                                                  <input type="checkbox" id="bulasik_makinesi" checked="checked" />
                                                                  <label><input type="checkbox" name="bulasik_makinesi" id="bulasik_makinesi" /><span></span></label>
                                                                  <label class="items" for="bulasik_makinesi">Bulaşık Makinesi</label> 
                                                                  <select id="bulasik_makinesi_ad" name="bulasik_makinesi_ad" class="field select medium" tabindex="11"> 
                                                                     <option value="5 ad">5 ad</option>
                                                                      <option value="10 ad">10 ad</option>
                                                                      <option value="15 ad">15 ad</option>
                                                                      <option value="20 ad">20 ad</option>
                                                                      <option value="25 ad">25 ad</option>
                                                                      <option value="30 ad">30 ad</option>
                                                                      <option value="35 ad">35 ad</option>
                                                                      <option value="40 ad">40 ad</option>
                                                                      <option value="45 ad">45 ad</option>
                                                                      </select>
                                                        </li>
                                                      <?php } if(in_array("Ocak", $item_arr)){ ?>
                                                        <li>
                                                                <input type="checkbox" id="ocak" checked="checked" />
                                                                <label><input type="checkbox" name="ocak" id="ocak" /><span></span></label>
                                                                <label class="items" for="ocak">Ocak</label> 
                                                                <select id="ocak_ad" name="ocak_ad" class="field select medium" tabindex="11"> 
                                                                    <option value="5 ad">5 ad</option>
                                                                    <option value="10 ad">10 ad</option>
                                                                    <option value="15 ad">15 ad</option>
                                                                    <option value="20 ad">20 ad</option>
                                                                    <option value="25 ad">25 ad</option>
                                                                    <option value="30 ad">30 ad</option>
                                                                    <option value="35 ad">35 ad</option>
                                                                    <option value="40 ad">40 ad</option>
                                                                    <option value="45 ad">45 ad</option>
                                                                </select>
                                                        </li>
                                                      <?php } if(in_array("Fırın", $item_arr)){ ?>
                                                        <li>
                                                                <input type="checkbox" id="fırın" checked="checked" />
                                                                <label><input type="checkbox" name="fırın" id="fırın" /><span></span></label>
                                                                <label class="items" for="fırın">Fırın</label> 
                                                                <select id="fırın_ad" name="fırın_ad" class="field select medium" tabindex="11"> 
                                                                  <option value="5 ad">5 ad</option>
                                                                  <option value="10 ad">10 ad</option>
                                                                  <option value="15 ad">15 ad</option>
                                                                  <option value="20 ad">20 ad</option>
                                                                  <option value="25 ad">25 ad</option>
                                                                  <option value="30 ad">30 ad</option>
                                                                  <option value="35 ad">35 ad</option>
                                                                  <option value="40 ad">40 ad</option>
                                                                  <option value="45 ad">45 ad</option>
                                                                </select>
                                                        </li>
                                                      <?php } ?>
                                                    </ul>
                                                </li> 
                                              <?php } if(strpos($sub_categories, "Diğer") !== false) { ?>
                                                <li>
                                                  <input type="checkbox" id="diger"  />
                                                  <label class="items" for="diger">Diğer</label> 
                                                  <ul>
                                                    <?php if(in_array("Battaniye", $item_arr)){ ?>
                                                      <li>
                                                          <input type="checkbox" id="battaniye"  />
                                                          <label><input type="checkbox" name="battaniye" id="battaniye" /><span></span></label>
                                                          <label class="items" for="battaniye">Battaniye</label> 
                                                          <select id="battaniye_ad" name="battaniye_ad" class="field select medium" tabindex="11"> 
                                                            <option value="5 ad">5 ad</option>
                                                            <option value="10 ad">10 ad</option>
                                                            <option value="15 ad">15 ad</option>
                                                            <option value="20 ad">20 ad</option>
                                                            <option value="25 ad">25 ad</option>
                                                            <option value="30 ad">30 ad</option>
                                                            <option value="35 ad">35 ad</option>
                                                            <option value="40 ad">40 ad</option>
                                                            <option value="45 ad">45 ad</option>
                                                          </select>
                                                      </li>
                                                    <?php } if(in_array("BebekBezi", $item_arr)){ ?>
                                                      <li>
                                                          <input type="checkbox" id="bebek_bezi" />
                                                          <label><input type="checkbox" name="bebek_bezi" id="bebek_bezi" /><span></span></label>
                                                          <label class="items" for="bebek_bezi">Bebek Bezi</label> 
                                                          <select id="bebek_bezi_ad" name="bebek_bezi_ad" class="field select medium" tabindex="11"> 
                                                            <option value="5 ad">5 ad</option>
                                                            <option value="10 ad">10 ad</option>
                                                            <option value="15 ad">15 ad</option>
                                                            <option value="20 ad">20 ad</option>
                                                            <option value="25 ad">25 ad</option>
                                                            <option value="30 ad">30 ad</option>
                                                            <option value="35 ad">35 ad</option>
                                                            <option value="40 ad">40 ad</option>
                                                            <option value="45 ad">45 ad</option>
                                                          </select>
                                                          <select id="bebek_bezi_yas" name="bebek_bezi_yas" class="field select medium" tabindex="11"> 
                                                            <option value="0-3 kg">0-3 kg (0)</option>
                                                            <option value="2-5 kg">2-5 kg(1)</option>
                                                            <option value="3-6 kg">3-6 kg (2)</option>
                                                            <option value="4-9 kg">4-9 kg (3)</option>
                                                            <option value="7-18 kg">7-18 kg(4)</option>
                                                            <option value="9-20 kg">9-20 kg(4+)</option>
                                                            <option value="11-25 kg">11-25 kg (5)</option>
                                                          </select>
                                                      </li>
                                                    <?php } ?>
                                                  </ul>
                                                </li> 
                                              <?php } ?>
                                            </ul> <!--temel esyalar-->
                                        </li>   <!--end temel esyalar-->
                                      <?php } ?>
                                    </ul>
                                  </div>
    			                        <button type="button" class="btn btn-previous">Geri</button>
    			                        <button type="button" class="btn btn-next">Devam</button>
				                        </div>
			                    </fieldset>
			                    
			                    <fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Adım 2 / 2</h3>
		                            		<p>Yardımınızı ulaştırma seçenekleri</p>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
                                    
                                <div class="form-group">
                                  <label for="searchTextField">Yardımlarınız için başlangıç adresi:</label>
<br>
                                  <input id="location" name="location" class="form-twitter form-control" type="text">
                       
                                </div>
                                 <div class="form-group">
                                  <input id="Option" type="checkbox"><label for="Option">Kargo ücretleri tarafımdan karşılanacaktır </label>
                                </div>
				                        <button type="button" class="btn btn-previous">Geri</button>
				                        <button type="submit" class="btn">Kampanyayı Başlat!</button>
				                    </div>
			                    </fieldset>
		                    
		                    </form>
		                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>  
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>
</html>
<?php } } ?>