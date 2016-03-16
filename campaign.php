<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   
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
                        	<form role="form" action="" method="post" class="registration-form">
                        		
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
				                        	<input type="text" name="form-first-name" placeholder="Kampanya Adı:" class="form-first-name form-control" id="form-first-name">
				                        </div>
				                         <div class="form-group">
				                        	<label class="sr-only" for="form-about-yourself">Açıklama</label>
				                        	<textarea name="form-about-yourself" placeholder="Kampanyana dair açıklamaların, detayları netleştir!." 
				                        				class="form-about-yourself form-control" id="form-about-yourself"></textarea>
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
    <ul>
        <li>
            <input type="checkbox" id="node-0"/><label><input type="checkbox" /><span></span></label><label class="items" for="node-0">Gıda</label>
            <ul>
                <li>
                    <input type="checkbox" id="node-0-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-0">Bakliyat</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-0-0-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-0-0">Pirinç</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-0-0-0" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-0-1">Bulgur</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-0-0-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-0-2">Nohut</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-0-0-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-0-3">Fasulye</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-0-0-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-0-4">Buğday</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                       <!-- <ul> -->
                    </ul>
                </li> 
                <!-- </ul> -->
                <!-- </li> -->

                <li>
                    <input type="checkbox" id="node-0-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-1">Konserve ve Yemek Malzemeleri</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-0-1-0" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-1-1">Salça</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-1-2">Sıvıyağ</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-1-3">Un</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-1-4">Yumurta</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-1-5">Makarna</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                    <input type="checkbox" id="node-0-2" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-2">Et Ürünleri</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-0-1-0" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-2-0">Et</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-2-1">Tavuk</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-2-2">Balık</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                    <input type="checkbox" id="node-0-3" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-3">İçecekler</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-0-1-0" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-3-0">Su</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-3-1">Süt</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-3-2">Çay</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-0-3-3">Yoğurt</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
        </li>
<li>
            <input type="checkbox" id="node-1"/><label><input type="checkbox" /><span></span></label><label class="items" for="node-1">Giyecekler</label>
            <ul>
                <li>
                    <input type="checkbox" id="node-1-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-0">Tişört</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-1-0-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-0-0">Small</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-0-1" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-0-1">Medium</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-0-2" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-0-2">Large</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-0-3" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-0-3">Xlarge</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                    <input type="checkbox" id="node-1-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-1">Kazak</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-1-1-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-1-0">Small</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-1-1" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-1-1">Medium</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-1-2" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-1-2">Large</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-1-3" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-1-3">Xlarge</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                    <input type="checkbox" id="node-1-2"/><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-2">Pantolon</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-1-2-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-2-0">Small</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-2-1" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-2-1">Medium</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-2-2" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-2-2">Large</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-2-3" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-2-3">Xlarge</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                    <input type="checkbox" id="node-1-3" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-3">İç Çamaşırı</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-1-3-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-3-0">Small</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-3-1" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-3-1">Medium</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-3-2" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-3-2">Large</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-3-3" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-3-3">Xlarge</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                    <input type="checkbox" id="node-1-4" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-4">Kaban-Mont</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-1-4-0" checked="unchecked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-4-0">Small</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-4-1" checked="unchecked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-4-1">Medium</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-4-2" checked="unchecked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-04-2">Large</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-1-4-3" checked="unchecked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-1-4-3">Xlarge</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
               </ul> 
</li> <!--giyecekler-->

<li>
            <input type="checkbox" id="node-2"/><label><input type="checkbox" /><span></span></label><label class="items" for="node-2">Temel Eşyalar</label>
            <ul>
                <li>
                    <input type="checkbox" id="node-2-0" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-0">Elektrikli Cihazlar</label> 
                    <ul>
                        <li>
                            <input type="checkbox" id="node-2-0-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-0-0">Su Isıtıcı</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-2-0-1" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-0-1">Isıtıcı</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-2-0-2" checked="checked" /><label><input type="checkbox" /><span></span></label><label  class="items" for="node-2-0-2">Bilgisayar</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-2-0-3" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-0-3">Projeksiyon</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                    <input type="checkbox" id="node-2-1"  /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-1">Beyaz Eşya</label> 
                    <ul>
                        <li>
                            <input type="checkbox" id="node-2-1-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-1-0">Çamaşır Makinesi</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-2-1-1" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-1-1">Bulaşık Makinesi</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-2-1-2" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-1-2">Ocak</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-2-1-3" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-1-3">Fırın</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                    <input type="checkbox" id="node-2-2"  /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-2">Diğer</label> 
                    <ul>
                        <li>
                            <input type="checkbox" id="node-2-2-0"  /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-2-0">Battaniye</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-2-2-1" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-2-1">Bebek Bezi</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
     <option value="5 ad">5 ad</option>
      <option value="10 ad">10 ad</option>
      <option value="15 ad">15 ad</option>
      <option value="20 ad">20 ad</option>
      <option value="25 ad">25 ad</option>
      <option value="30 ad">30 ad</option>
      <option value="35 ad">35 ad</option>
      <option value="40 ad">40 ad</option>
      <option value="45 ad">45 ad</option>
      </select><select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
     <option value="0">0-3 kg (0)</option>
      <option value="1">2-5 kg(1)</option>
      <option value="2">3-6 kg (2)</option>
      <option value="3">4-9 kg (3)</option>
      <option value="4">7-18 kg(4)</option>
      <option value="5">9-20 kg(4+)</option>
      <option value="6">11-25 kg (5)</option>
      </select>
        </li>
        <li>
                            <input type="checkbox" id="node-2-2-2" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-2-2">Bilgisayar</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
                            <input type="checkbox" id="node-2-0-3" checked="checked" /><label><input type="checkbox" /><span></span></label><label class="items" for="node-2-0-3">Projeksiyon</label> <select id="Field106" name="Field106" class="field select medium" tabindex="11"> 
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
       
</ul>
</li>

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
				                        	<input type="text" name="form-facebook" placeholder="#gıda" class="form-facebook form-control" id="form-facebook">
				                        </div>
				                        <div class="form-group">
				                        	<label for="form-google-plus">Kampanya süresi için bir bitiş belirleyin:</label><br></br>
                                  <input type="text" name="form-twitter" class="form-twitter form-control" id="form-twitter" placeholder="gg/aa/yyyy">
				                        </div>
                                    
                                <div class="form-group">
                                  <label for="searchTextField">Kampanya için lütfen adres belirtin:</label>
<br>
                                  <input onchange="picker()" id="searchTextField" type="text" size="50">
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