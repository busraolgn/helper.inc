<?php
if(empty($_SESSION["user"])){ ?>

<h3>Üzgünüz, favori kampanyalarınızı görüntülemek için giriş yapmalı veya üye olmalısınız...</h3>

<?php

}
/*<!--start embedding campaigns in the page -->*/
else
{
$count = 0; 

?>
	 <div class="container">
		<div class="col-md-9 join-info">

			<div id="timeline">
<?php
$campaign = new Campaign();
$campaign->openDB();

for($i=0;$i<count($_SESSION["user"]["favorites"]);$i++){
$aid_id = $_SESSION["user"]["favorites"][$i];
$aid1 = $campaign->getCampaignByID($aid_id[0]);
?>
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
					<div <?php if($count%2==0) echo "class='timeline-content left'";
							 	   else  echo "class='timeline-content right'"; ?> >
	 
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
			 				<a data-js="open" data-rel="popup" href=<?php echo "popup.php?aid_details_id=".$aid1["id"]."&back=favorites"; ?> class="btn">Detayları Görüntüle >></a>
						</div>
					</div>
				</div>
				<?php $count++; } $campaign->closeDB();  $item->closeDB(); ?>
			</div> 
			<div class="clearfix"></div>
		</div>
	 </div>
<?php } ?>
<!-- end of embedding campaigns-->