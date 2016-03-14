
<?php

	$campaign = new Campaign();
	$campaign->openDB();
	$campaigns = $campaign->getCampaign();

	for($i=0;$i<count($campaigns);$i++){
		$aid1 = $campaigns[$i]; 
		
	}
	


?>