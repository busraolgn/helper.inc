
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
						<figure class="icon">
							 <span class="glyphicon-icon glyphicon-heart" aria-hidden="true"></span>
						</figure>
						<h3>Favori Listem</h3>
						<p>Hatırlamak istediğin ve işaretlediğin kampanyalara buradan ulaş.</p>
				  </div>
			  </div>
			  <div class="col-md-4 chrt_grid" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				   <div class="chrty">
						<figure class="icon">
							<span class="glyphicon-icon glyphicon-asterisk" aria-hidden="true"></span>
						</figure>						
						<h3>Hakkımızda </h3>
						<p>HELPER hakkında merak edilenler ve arkasındaki ekip burada!</p>
				  </div>
			  </div>
			  <div class="col-md-4 chrt_grid" style="visibility: visible; -webkit-animation-delay: 0.4s;">
				   <div class="chrty">
						 <figure class="icon">
							<span class="glyphicon-icon glyphicon-flag" aria-hidden="true"></span>
						</figure>						
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
</body>
</html>