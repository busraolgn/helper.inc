
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

<div class="welcome">
	 <div class="container">
		 <div class="welcome-top">
			 <h3>Yardımlaşmaya Var Mısın?</h3>
			 <h4>Şu an 500 kişiyiz!</h4>
			 <p>Kimse tam değil, eksiklerimiz var. Bize katılın, paylaşıma çağırın ve paylaşıma katılın.
				Sizinle daha güçlü ve daha tamız!.</p>
		 </div>
		  <div class="charitys">
			  <div class="col-md-4 chrt_grid" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				   <div class="chrty">
					<a href="index.php?page=favorites">	<figure class="icon">
							 <span class="glyphicon-icon glyphicon-heart" aria-hidden="true"></span>
							</figure>
					</a>
						<h3>Favori Listem</h3>
						<p>Hatırlamak istediğin ve işaretlediğin kampanyalara buradan ulaş.</p>
				  </div>
			  </div>
			  <div class="col-md-4 chrt_grid" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				   <div class="chrty"> 
						<figure class="icon"> <a href="index.php?page=about">
							<span class="glyphicon-icon glyphicon-asterisk" aria-hidden="true"></span>
						</figure> </a>						
						<h3>Hakkımızda </h3>
						<p>HELPER hakkında merak edilenler ve arkasındaki ekip burada!</p>
						</a>
				  </div>
			  </div>
			  <div class="col-md-4 chrt_grid" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				   <div class="chrty"> 
						 <figure class="icon"> <a href="index.php?page=campaign">
							<span class="glyphicon-icon glyphicon-flag" aria-hidden="true"></span>
						</figure> </a>						
						<h3>Bir kampanya başlat!</h3>
						<p>Gereken bilgi formunu doldurarak insanlara ulaş ve paylaşıma çağır!</p>
				  </div>
			  </div>
			  <div class="clearfix"></div>
		 </div>		 
	 </div>
</div>

<!--start embedding campaigns in the page-->
<?php

$campaign = new Campaign();

$campaign->openDB();

$campaigns = $campaign->getCampaign();
for($i=0;$i<count($campaigns);$i++){
$aid1 = $campaigns[$i];

?>
<div class="container">
		<div id="timeline">
			<div class="timeline-item">
				<div class="timeline-icon">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="21px" height="20px" viewBox="0 0 21 20" enable-background="new 0 0 21 20" xml:space="preserve">
<path fill="#FFFFFF" d="M19.998,6.766l-5.759-0.544c-0.362-0.032-0.676-0.264-0.822-0.61l-2.064-4.999
	c-0.329-0.825-1.5-0.825-1.83,0L7.476,5.611c-0.132,0.346-0.462,0.578-0.824,0.61L0.894,6.766C0.035,6.848-0.312,7.921,0.333,8.499
	l4.338,3.811c0.279,0.246,0.395,0.609,0.314,0.975l-1.304,5.345c-0.199,0.842,0.708,1.534,1.468,1.089l4.801-2.822
	c0.313-0.181,0.695-0.181,1.006,0l4.803,2.822c0.759,0.445,1.666-0.23,1.468-1.089l-1.288-5.345
	c-0.081-0.365,0.035-0.729,0.313-0.975l4.34-3.811C21.219,7.921,20.855,6.848,19.998,6.766z"/>
</svg>

				</div>
				<div class="timeline-content">
					<h2>LOREM IPSUM DOLOR</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
						Atque, facilis quo maiores magnam modi ab libero praesentium blanditiis.
					</p>
					<a href="#" class="btn">button</a>
				</div>
			</div>

			<div class="timeline-item">
				<div class="timeline-icon">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="21px" height="20px" viewBox="0 0 21 20" enable-background="new 0 0 21 20" xml:space="preserve">
<g>
	<path fill="#FFFFFF" d="M17.92,3.065l-1.669-2.302c-0.336-0.464-0.87-0.75-1.479-0.755C14.732,0.008,7.653,0,7.653,0v5.6
		c0,0.096-0.047,0.185-0.127,0.237c-0.081,0.052-0.181,0.06-0.268,0.02l-1.413-0.64C5.773,5.183,5.69,5.183,5.617,5.215l-1.489,0.65
		c-0.087,0.038-0.19,0.029-0.271-0.023c-0.079-0.052-0.13-0.141-0.13-0.235V0H2.191C1.655,0,1.233,0.434,1.233,0.97
		c0,0,0.025,15.952,0.031,15.993c0.084,0.509,0.379,0.962,0.811,1.242l2.334,1.528C4.671,19.905,4.974,20,5.286,20h10.307
		c1.452,0,2.634-1.189,2.634-2.64V4.007C18.227,3.666,18.12,3.339,17.92,3.065z M16.42,17.36c0,0.464-0.361,0.833-0.827,0.833H5.341
		l-1.675-1.089h10.341c0.537,0,0.953-0.44,0.953-0.979V2.039l1.459,2.027V17.36L16.42,17.36z"/>
</g>
</svg>

				</div>
				<div class="timeline-content right">
					<h2>LOREM IPSUM DOLOR</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, facilis quo. Maiores magnam modi ab libero praesentium blanditiis consequatur aspernatur accusantium maxime molestiae sunt ipsa.
					</p>
					<a href="#" class="btn">button</a>
				</div>
			</div>

			<div class="timeline-item">
				<div class="timeline-icon">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="21px" height="20px" viewBox="0 0 21 20" enable-background="new 0 0 21 20" xml:space="preserve">
<path fill="#FFFFFF" d="M19.998,6.766l-5.759-0.544c-0.362-0.032-0.676-0.264-0.822-0.61l-2.064-4.999
	c-0.329-0.825-1.5-0.825-1.83,0L7.476,5.611c-0.132,0.346-0.462,0.578-0.824,0.61L0.894,6.766C0.035,6.848-0.312,7.921,0.333,8.499
	l4.338,3.811c0.279,0.246,0.395,0.609,0.314,0.975l-1.304,5.345c-0.199,0.842,0.708,1.534,1.468,1.089l4.801-2.822
	c0.313-0.181,0.695-0.181,1.006,0l4.803,2.822c0.759,0.445,1.666-0.23,1.468-1.089l-1.288-5.345
	c-0.081-0.365,0.035-0.729,0.313-0.975l4.34-3.811C21.219,7.921,20.855,6.848,19.998,6.766z"/>
</svg>

				</div>
				<div class="timeline-content">
					<h2>LOREM IPSUM DOLOR</h2>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, facilis quo. Maiores magnam modi ab libero praesentium blanditiis consequatur aspernatur accusantium maxime molestiae sunt ipsa.
					</p>
					<a href="#" class="btn">button</a>
				</div>
			</div>
		</div>
	</div>


<div class="join">
	 <div class="container">
	 	<div class="col-md-9 join-info">
	 		<div class="baslik">
		      <h2> <?php echo $aid1["aid_name"]; ?> </h2>
			  <section class="fave"></section>
	 		</div>
	 		
	 		<div class="aid_images">
	 	 		<?php $img1=$aid1["aid_img"]; echo "<img src=camp_images/$img1>" ; ?>
	 	 	</div>	

		 <div class="aid_details">
		 	<p>
		 		<?php echo $aid1["aid_comment"]; ?>
		 	</p>
		 </div>
		 </div>

		 	<?php 
				$item = new Items();
				$item->openDB();
				$items = $item->getItemsByAidID($aid1["id"]);
				for($j=0;$j<count($items);$j++){
					$it = $items[$j];
		 	?>
		 <div class="rates">
		 	 <p> <?php echo $it["item_name"]; ?> </p>
			 <div class="progress">
				<div class="progress-bar progress-bar-danger" style=<?php echo "width:" . $it["fill_rate"] . "%"; ?> ></div>
			 </div>
			 <p> eksik: <?php echo $it["needed"]; echo "\n"; ?> &nbsp karşılanan: <?php echo $it["provided"]; ?> </p>
		 </div>
		  	<?php } ?>

		 <div class="tags">
			 	<h5>İlgili Tag'ler</h5>
			 	<p>
			 		<?php $tags = explode("," , $aid1["tags"]);
			 			for($k=0;$k<count($tags);$k++){
			 		?>
			 		<a class="normal_link" href="#"> <?php echo $tags[$k]."&nbsp"; ?> </a>
						<?php } ?>
			 	</p>
		 </div>
		 <div class="bottom">
			 <div class="address">
			 	<p>  
			 		<?php echo $aid1["city"]; ?>
			 		<?php echo $aid1["district"]; ?>
			 		<?php echo $aid1["neigborhood"]; ?>
			 		<?php echo $aid1["address"]; ?>
			 	</p>
			 </div>
			
		 </div>
	 		 <div class="col-md-3 join-link">
				<a href="index.php?page=campaign">Katıl</a>
			 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<?php } $campaign->closeDB();  $item->closeDB(); ?>
<!-- end of embedding campaigns-->


<!---->
<div class="bottom-grids">
	 <div class="container">	
	  <div class="news-ltr">
		 <h4>Gelişmelerden Haberdar Ol!</h4>
		 <form>					 
			  <input type="text" class="text" value="Email Adresiniz" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter Email';}">
			 <input type="submit" value="Abone ol">
			 <div class="clearfix"></div>
	  	 </form>
	  </div>
	  <div class="social">
		 <div class="social-grid">
			 <h4>Sosyal Medyada HELPER</h4>
		 </div>
		 <div class="icons">
			 <a href="#"><i class="facebook"></i></a>
			<a href="#"><i class="twitter"></i></a>
			<a href="#"><i class="google"></i></a>	
			<a href="#"><i class="youtube"></i></a>	

		 </div>
		<div class="clearfix"></div>
	  </div>
	 </div>
	<div class="clearfix"></div>
</div>
<!---->
<!---->