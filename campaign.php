<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     $main_category_tags="";
     $sub_category_tags="";
     $aid_name = $_POST["aid_name"];
     $aid_comment = $_POST["aid_details"];
     $user_id = $_SESSION["user"]["id"];
     $start_date = date("d/m/Y");
     $end_date = $_POST["end_date"];
     $tags = $_POST["tags"];
     $address = $_POST["address"];
     $items = array();
     $index = 0;
     $sub1_checked = false;
     $main1_checked = false;
     /*gıda*/
     if(isset($_POST["pirinc"])){ $sub1_checked=true; } if(isset($_POST["bulgur"])){ $sub1_checked=true; } 
     if(isset($_POST["nohut"])){ $sub1_checked=true; } if(isset($_POST["fasulye"])){ $sub1_checked=true; } 
     if(isset($_POST["bugday"])){ $sub1_checked=true; }
     if ($sub1_checked) { $sub_category_tags .= "Bakliyat,"; }
     $sub1_checked = false;
     if(isset($_POST["salca"])){ $sub1_checked=true; } if(isset($_POST["siviyag"])){ $sub1_checked=true; }
     if(isset($_POST["un"])){ $sub1_checked=true; } if(isset($_POST["yumurta"])){ $sub1_checked=true; }
     if(isset($_POST["makarna"])){ $sub1_checked=true; }
     if ($sub1_checked) { $sub_category_tags .= "KonserveVeYemekMalzemeleri,"; }
     $sub1_checked = false;
     if(isset($_POST["et"])){ $sub1_checked=true; } if(isset($_POST["tavuk"])){ $sub1_checked=true; }
     if(isset($_POST["balik"])){ $sub1_checked=true; }
     if ($sub1_checked) { $sub_category_tags .= "EtÜrünleri,"; }
     $sub1_checked = false;
     if(isset($_POST["su"])){ $sub1_checked = true; } if(isset($_POST["sut"])){ $sub1_checked = true; } 
     if(isset($_POST["cay"])){ $sub1_checked = true; } if(isset($_POST["yogurt"])){ $sub1_checked = true; }
     if ($sub1_checked) { $sub_category_tags .= "İçecekler,"; }
     $sub1_checked = false;
        
     if (!empty($sub_category_tags)) { $main_category_tags .= "Gıda,"; }
/*giyecekler*/
     if(isset($_POST["tisort_small"])){ $sub1_checked = true; } if(isset($_POST["tisort_medium"])){ $sub1_checked = true; }
     if(isset($_POST["tisort_large"])){ $sub1_checked = true; } if(isset($_POST["tisort_xlarge"])){ $sub1_checked = true; } 
     if ($sub1_checked) { $sub_category_tags .= "Tişört,"; $main1_checked=true; }      
     $sub1_checked = false;       
     if(isset($_POST["kazak_small"])){ $sub1_checked = true; } if(isset($_POST["kazak_medium"])){ $sub1_checked = true; }
     if(isset($_POST["kazak_large"])){ $sub1_checked = true; } if(isset($_POST["kazak_xlarge"])){ $sub1_checked = true; }  
     if ($sub1_checked) { $sub_category_tags .= "Kazak,"; $main1_checked=true; }      
     $sub1_checked = false;       
     if(isset($_POST["pantolon_small"])){ $sub1_checked = true; } if(isset($_POST["pantolon_medium"])){ $sub1_checked = true; }
     if(isset($_POST["pantolon_large"])){ $sub1_checked = true; } if(isset($_POST["pantolon_xlarge"])){ $sub1_checked = true; }  
     if ($sub1_checked) { $sub_category_tags .= "Pantolon,"; $main1_checked=true; }      
     $sub1_checked = false;       
     if(isset($_POST["kaban_mont_small"])){ $sub1_checked = true; } if(isset($_POST["kaban_mont_medium"])){ $sub1_checked = true; } 
     if(isset($_POST["kaban_mont_large"])){ $sub1_checked = true; } if(isset($_POST["kaban_mont_xlarge"])){ $sub1_checked = true; }  
     if ($sub1_checked) { $sub_category_tags .= "Kaban-Mont,"; $main1_checked=true; }      
     $sub1_checked = false;       
     
     if ($main1_checked) { $main_category_tags .= "Giyecekler,"; }   
     $main1_checked=false;
     /*temel eşyalar*/
     if(isset($_POST["su_isitici"])){ $sub1_checked = true; } if(isset($_POST["isitici"])){ $sub1_checked = true; }
     if(isset($_POST["bilgisayar"])){ $sub1_checked = true; } if(isset($_POST["projeksiyon"])){ $sub1_checked = true; }
     if ($sub1_checked) { $sub_category_tags .= "ElektrikliAletler,"; $main1_checked=true; }      
     $sub1_checked = false;       
     if(isset($_POST["camasir_makinesi"])){ $sub1_checked = true; } if(isset($_POST["bulasik_makinesi"])){ $sub1_checked = true; }
     if(isset($_POST["ocak"])){ $sub1_checked = true; } if(isset($_POST["fırın"])){ $sub1_checked = true; }
     if ($sub1_checked) { $sub_category_tags .= "BeyazEşya,"; $main1_checked=true; }      
     $sub1_checked = false;       
     if(isset($_POST["battaniye"])){ $sub1_checked = true; } if(isset($_POST["bebek_bezi"])){ $sub1_checked = true; }
     if ($sub1_checked) { $sub_category_tags .= "Diğer,"; $main1_checked=true; }      
     $sub1_checked = false;       
     if ($main1_checked) { $main_category_tags .= "TemelEşyalar,"; }   
     $main1_checked=false;

     $campaign = new Campaign();
     $campaign->openDB();
     $filtered_camps = $campaign->insertCampaign($_SESSION["user"]["id"], 
      $aid_name, $aid_comment, $start_date, $end_date, 0, "", "", "", $address, 
      $tags, $main_category_tags, $sub_category_tags, "okul.jpg");
     $campaign->closeDB();
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
       <script>
          function picker(){
            var input = document.getElementById('searchTextField');
            var options = {componentRestrictions: {country: 'tr'}};
            new google.maps.places.Autocomplete(input, options);
          }
       </script>
    </head>
    <body>
<div>
        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<form role="form" action="index.php?page=campaign" method="post" class="registration-form">
                        		<fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 1 / 3</h3>
		                            		<p>Kampanya için ilk bilgiler:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-user"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">Kampanya</label>
				                        	<input type="text" name="aid_name" id="aid_name" placeholder="Kampanya Adı:" class="form-first-name form-control" id="form-first-name">
				                        </div>
				                         <div class="form-group">
				                        	<label class="sr-only" for="form-about-yourself">Açıklama</label>
				                        	<textarea name="aid_details" placeholder="Kampanyana dair açıklamaların, detayları netleştir!." 
				                        				class="form-about-yourself form-control" id="aid_details"></textarea>
				                        </div>

				                          <div class="form-group">
				                        	<label for="form-about-yourself">Kampanyan için bir fotoğraf ekle:</label>
 											 <input type='file' onchange="readURL(this);" />
   											 <img id="blah" alt="" />
				                        	</div>
				                    <script>
				                         function readURL(input) {
            								if (input.files && input.files[0]) {
                						var reader = new FileReader();

                						reader.onload = function (e) {
                    					$('#blah')
                       					 .attr('src', e.target.result)
                        				.width(200)
                        				.height(200);
                							};

               								 reader.readAsDataURL(input.files[0]);
            								}
        									}
        						    </script>
				                        <button type="button" class="btn btn-next">Devam</button>
				                    </div>
			                    </fieldset>
			                    

			                    <fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 2 / 3</h3>
		                            		<p>İhtiyaç duyulan malzemeleri seçin:</p>

		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-key"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
    			                        <div class="acidjs-css3-treeview">
                                    <ul class="ul1" id="main_ul">
                                        <li>    <!--gıda-->
                                            <input type="checkbox" id="gida"/>
                                            <label class="items" for="gida" >Gıda</label>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" id="bakliyat" />
                                                    <label class="items" for="bakliyat">Bakliyat</label>
                                                    <ul>
                                                        <li>
                                                            <input type="checkbox" id="pirinc" checked="checked" /><label><input type="checkbox" name="pirinc" id="pirinc" />
                                                            <span></span></label><label class="items" for="pirinc">Pirinç</label> 
                                                            <select id="pirinc_kg" name="pirinc_kg" class="field select medium" tabindex="11"> 
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
                                                    </ul>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="konserve" />
                                                    <label class="items" for="konserve">Konserve ve Yemek Malzemeleri</label>
                                                    <ul>
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
                                                    </ul>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="et_urunleri" />
                                                    <label class="items" for="et_urunleri">Et Ürünleri</label>
                                                    <ul>
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
                                                    </ul>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="icecekler" />
                                                    <label class="items" for="icecekler">İçecekler</label>
                                                    <ul>
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
                                                    </ul>
                                                </li>
                                            </ul> 
                                        </li>   <!--end gıda-->
                                        <li>
                                            <input type="checkbox" id="giyecekler"/>
                                            <label class="items" for="giyecekler">Giyecekler</label>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" id="tisort" checked="checked" />
                                                    <label class="items" for="tisort">Tişört</label>
                                                    <ul>
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
                                                    </ul>
                                                </li> <!--tişört -->
                                                <li>
                                                    <input type="checkbox" id="kazak" />
                                                    <label class="items" for="kazak">Kazak</label>
                                                    <ul>
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
                                                        <li>
                                                            <input type="checkbox" id="kazak_medium" checked="checked" />
                                                            <label><input type="checkbox" name="kazak_medium" id="kazak_medium" /><span></span></label>
                                                            <label class="items" for="kazak_medium">Medium</label> 
                                                            <select id="medium_ad" name="medium_ad" class="field select medium" tabindex="11"> 
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
                                                    </ul>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="pantolon"/>
                                                    <label class="items" for="pantolon">Pantolon</label>
                                                    <ul>
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
                                                    </ul>
                                                </li> 
                                                <li>
                                                    <input type="checkbox" id="kaban_mont" />
                                                    <label class="items" for="kaban_mont">Kaban-Mont</label>
                                                    <ul>
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
                                                    </ul>
                                                </li> 
                                            </ul>   <!--giyecekler--> <!--giyecekler-->  <!--giyeceker-->
                                        </li>   <!--end giyecekler-->
                                        <li>
                                            <input type="checkbox" id="temel_esyalar"/>
                                            <label class="items" for="temel_esyalar">Temel Eşyalar</label>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" id="elektrikli_cihazlar" />
                                                    <label class="items" for="elektrikli_cihazlar">Elektrikli Cihazlar</label> 
                                                    <ul>
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
                                                    </ul>
                                                </li> <!--Elektikli cihaz -->
                                                <li>
                                                    <input type="checkbox" id="beyaz_esya"  />
                                                    <label class="items" for="beyaz_esya">Beyaz Eşya</label> 
                                                    <ul>
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
                                                        <li>
                                                                <input type="checkbox" id="ocak" checked="checked" />
                                                                <label><input type="checkbox" name="ocak" id="ocak" /><span></span></label>
                                                                <label class="items" for="ocak">Ocak</label> 
                                                                <select id="ocak" name="ocak" class="field select medium" tabindex="11"> 
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
                                                        <li>
                                                                <input type="checkbox" id="fırın" checked="checked" />
                                                                <label><input type="checkbox" name="fırın" id="fırın" /><span></span></label>
                                                                <label class="items" for="fırın">Fırın</label> 
                                                                <select id="fırın" name="fırın" class="field select medium" tabindex="11"> 
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
                                                    </ul>
                                                </li> 
                                                <li>
                                                  <input type="checkbox" id="diger"  />
                                                  <label class="items" for="diger">Diğer</label> 
                                                  <ul>
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
                                                            <option value="0">0-3 kg (0)</option>
                                                            <option value="1">2-5 kg(1)</option>
                                                            <option value="2">3-6 kg (2)</option>
                                                            <option value="3">4-9 kg (3)</option>
                                                            <option value="4">7-18 kg(4)</option>
                                                            <option value="5">9-20 kg(4+)</option>
                                                            <option value="6">11-25 kg (5)</option>
                                                          </select>
                                                      </li>
                                                  </ul>
                                                </li> 
                                            </ul> <!--temel esyalar-->
                                        </li>   <!--end temel esyalar-->
                                    </ul>
                                  </div>
    			                        <button type="button" class="btn btn-previous">Geri</button>
    			                        <button type="button" class="btn btn-next">Devam</button>
				                        </div>
			                    </fieldset>
			                    
			                    <fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 3 / 3</h3>
		                            		<p>Kampanyana ait son detaylar:</p>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
				                    	<div class="form-group">
				                    		<label for="form-facebook">Kampanyan için etiketler seç</label><br></br>
				                        	<input type="text" placeholder="#gıda,#yardım" class="form-facebook form-control" name="tags" id="tags">
				                        </div>
				                        <div class="form-group">
				                        	<label for="form-google-plus">Kampanya süresi için bir bitiş belirleyin:</label><br></br>
                                  <input type="text" class="form-twitter form-control" name="end_date" id="end_date" placeholder="gg/aa/yyyy">
				                        </div>
                                    
                                <div class="form-group">
                                  <label for="searchTextField">Kampanya için lütfen adres belirtin:</label>
<br>
                                  <input onchange="picker()" id="address" name="address" type="text" size="50">
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