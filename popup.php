<!DOCTYPE html>
<html>
<head>
<title>Campaign Details</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/busra_js.js"></script>
<!-- Custom Theme files -->
<link href="css/styleCampaigns.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="css/popupwindow.css">
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Charity Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="content_filter/css/reset.css"> <!-- CSS reset -->
<link rel="stylesheet" href="content_filter/css/style.css"> <!-- Resource style -->
<script src="content_filter/js/modernizr.js"></script> <!-- Modernizr -->
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script>
</script>
</head>
<!--show campaign details-->
<?php if (isset($_GET["aid_details_id"])) {
	session_start();
	include("db_classes/User_table.class.php");
	include("db_classes/Items.class.php");
	include("db_classes/Campaign.class.php");
	include("db_classes/Donations.class.php");
	$aid_details_id = $_GET["aid_details_id"];
	echo $aid_details_id;
	$campaign = new Campaign();
    $campaign->openDB();
    $aid = $campaign->getCampaignByID($aid_details_id);
    $campaign->closeDB();
?>
 <div class="container">
	<div class="col-md-9 join-info">
		<div id="timeline">
			<div class="popup" onMouseOver="window.status=' ' ; return true;" >
				<div class="timeline-item">
					<div class="timeline-content">
						<div class="baslik">
	      				<h2> <?php echo $aid["aid_name"]; ?> </h2>
		  				<section class="fave"></section>
	 				</div>
	 		
	 				<div class="aid_images">
	 	 				<?php $img1=$aid["aid_img"]; echo "<img src=camp_images/$img1>" ; ?>
	 	 			</div>	

		 			<div class="aid_details">
					 	<p>
					 		<?php echo $aid["aid_comment"]; ?>
					 	</p>
		 			</div>
		 			<div class="bottom">
						 <div class="address">
						 	<p><span style="font-weight: bold; text-decoration: underline;">Adres:</span>.
						 		<?php echo $aid["city"]; ?>
						 		<?php echo $aid["district"]; ?>
						 		<?php echo $aid["neigborhood"]; ?>
						 		<?php echo $aid["address"]; ?>
						 	</p>
						 </div>
		 			</div>
					<?php 
					$item = new Items();
					$item->openDB();
					$items = $item->getItemsByAidID($aid_details_id);
					for($j=0;$j<count($items);$j++){
						$it = $items[$j];
					?>
			 		<div class="rates">
					 	 <p> <?php echo $it["item_name"]; ?> </p>
						 <div class="progress">
							<div class="progress-bar progress-bar-danger" style=<?php echo "width:" . $it["fill_rate"] . "%"; ?> ></div>
						 </div><p> eksik: <?php echo $it["needed"]; echo "\n"; ?> &nbsp karşılanan: <?php echo $it["provided"]; ?> </p>
				 	</div>
			  		<?php } $item->closeDB(); ?>
					<div class="tags">
					 	 <h5>İlgili Tag'ler</h5>
					 	 <p>
					 		<?php $tags = explode("," , $aid["tags"]);
					 			for($k=0;$k<count($tags);$k++){
					 		?>
					 		<a class="normal_link" href="#"> <?php echo $tags[$k]."&nbsp"; ?> </a>
							<?php } ?>
					 	 </p>
					</div>
					<button name="close">Geri</button>
					<button name="Katıl">Katıl!</button>
				</div>
			</div>
	    </div>				  
	</div> 
</div>
<?php } ?>