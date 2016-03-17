

<?php
if(empty($_SESSION["user"])){ ?>

<h3>Üzgünüz, favori kampanyalarınızı görüntülemek için giriş yapmalı veya üye olmalısınız..</h3>

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
	 						width="21px" height="20px" viewBox="0 0 21 20" enable-background="new 0 0 21 20" xml:space="preserve"> <g>
							<path fill="#FFFFFF" d="M17.92,3.065l-1.669-2.302c-0.336-0.464-0.87-0.75-1.479-0.755C14.732,0.008,7.653,0,7.653,0v5.6
								c0,0.096-0.047,0.185-0.127,0.237c-0.081,0.052-0.181,0.06-0.268,0.02l-1.413-0.64C5.773,5.183,5.69,5.183,5.617,5.215l-1.489,0.65
								c-0.087,0.038-0.19,0.029-0.271-0.023c-0.079-0.052-0.13-0.141-0.13-0.235V0H2.191C1.655,0,1.233,0.434,1.233,0.97
								c0,0,0.025,15.952,0.031,15.993c0.084,0.509,0.379,0.962,0.811,1.242l2.334,1.528C4.671,19.905,4.974,20,5.286,20h10.307
								c1.452,0,2.634-1.189,2.634-2.64V4.007C18.227,3.666,18.12,3.339,17.92,3.065z M16.42,17.36c0,0.464-0.361,0.833-0.827,0.833H5.341
								l-1.675-1.089h10.341c0.537,0,0.953-0.44,0.953-0.979V2.039l1.459,2.027V17.36L16.42,17.36z"/> </g>
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
							<a href="index.php?page=campaign" class="btn">Katıl</a>
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