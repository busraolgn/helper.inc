<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
   

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">


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


				                       
				                        <button type="button" class="btn btn-next">Next</button>
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
            <input type="checkbox" id="node-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label for="node-0">Gıda</label>
            <ul>
                <li>
                    <input type="checkbox" id="node-0-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label for="node-0-0">Bakliyat</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-0-0-0" checked="checked" /><label><input type="checkbox" /><span></span></label><label for="node-0-0-0">Pirinç</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-0-0-0" /><label><input type="checkbox" /><span></span></label><label for="node-0-0-1">Bulgur</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-0-0-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-0-0-1">Nohut</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-0-0-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-0-0-1">Fasulye</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-0-0-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-0-0-1">Buğday</label>
                        </li>
                       <!-- <ul> -->
                    </ul>
                </li> 
                <!-- </ul> -->
                <!-- </li> -->

                <li>
                    <input type="checkbox" id="node-0-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-1">Konserve ve Yemek Malzemeleri</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-0-1-0" /><label><input type="checkbox" /><span></span></label><label for="node-0-1-0">Salça</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-1-1">Sıvıyağ</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-1-1">Un</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-1-1">Yumurta</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-1-1">Makarna</label>
                        </li>
                    </ul>
                </li>
                <li>
                    <input type="checkbox" id="node-0-2" /><label><input type="checkbox" /><span></span></label><label for="node-0-2">Et Ürünleri</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-0-1-0" /><label><input type="checkbox" /><span></span></label><label for="node-0-2-0">Et</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-2-1">Tavuk</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-2-2">Balık</label>
                        </li>
                    </ul>
                </li>
                <li>
                    <input type="checkbox" id="node-0-3" /><label><input type="checkbox" /><span></span></label><label for="node-0-3">İçecekler</label>
                    <ul>
                        <li>
                            <input type="checkbox" id="node-0-1-0" /><label><input type="checkbox" /><span></span></label><label for="node-0-3-0">Su</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-3-1">Süt</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-3-2">Çay</label>
                        </li>
                        <li>
                            <input type="checkbox" id="node-0-1-1" /><label><input type="checkbox" /><span></span></label><label for="node-0-3-3">Yoğurt</label>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</div>
				                        <button type="button" class="btn btn-previous">Previous</button>
				                        <button type="button" class="btn btn-next">Next</button>
				                    </div>
			                    </fieldset>
			                    
			                    <fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Step 3 / 3</h3>
		                            		<p>Social media profiles:</p>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-twitter"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-facebook">Facebook</label>
				                        	<input type="text" name="form-facebook" placeholder="Facebook..." class="form-facebook form-control" id="form-facebook">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-twitter">Twitter</label>
				                        	<input type="text" name="form-twitter" placeholder="Twitter..." class="form-twitter form-control" id="form-twitter">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-google-plus">Google plus</label>
				                        	<input type="text" name="form-google-plus" placeholder="Google plus..." class="form-google-plus form-control" id="form-google-plus">
				                        </div>
				                        <button type="button" class="btn btn-previous">Previous</button>
				                        <button type="submit" class="btn">Sign me up!</button>
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