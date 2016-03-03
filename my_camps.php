

<?php
if(empty($_SESSION["user"])){ ?>

<h3>Üzgünüz, Kampanyaları görüntülemek için giriş yapmalı veya üye olmalısınız..</h3>
<!--start embedding campaigns in the page-->

<?php

}

else
{

$campaign = new Campaign();

$campaign->openDB();

$campaigns = $campaign->getCampaignByUserID($_SESSION["user"]["id"]);
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
			 <p> needed: <?php echo $it["needed"]; echo "\n"; ?> &nbsp provided: <?php echo $it["provided"]; ?> </p>
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
<?php } $campaign->closeDB();  $item->closeDB(); } ?>
<!-- end of embedding campaigns-->