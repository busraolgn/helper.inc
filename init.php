<?php
session_start();
include("db_classes/User_table.class.php");
include("db_classes/Items.class.php");
include("db_classes/Campaign.class.php");

$campaign_arr;
$_SESSION["tree"] = "kampanyalar";

/* initialize arrays */

/*cities*/
	$city = new Campaign();
	$city->openDB();
	$cities = $city->getCampaignCitiesDistinct();
	$city->closeDB();
/*end cities*/

/*campaigns*/
	$campaign = new Campaign();
	$campaign->openDB();
	$all_campaigns = $campaign->getCampaign();
	$campaign->closeDB();
/*end campaigns*/

$campaign_arr = &$all_campaigns;
/*camps filtered by city*/
if(isset($_GET['city']))
{
	$_SESSION["tree"].=" > " . $_GET['city'];
	$_SESSION["city"] = $_GET['city'];
	$campaign = new Campaign();
	$campaign->openDB();
	$filtered_camps = $campaign->getCampaignByCity($_GET['city']);
	$campaign->closeDB();
	$campaign_arr = &$filtered_camps;

}
/*end filtered camps*/

/* end of initializing arrays */

if(empty($page)){
	$page = "home";
}
if(empty($_SESSION["tree"])){
	$_SESSION["tree"] = "kampanyalar";
}
if(empty($_SESSION["filter"])){
	$_SESSION["filter"] = "";
}

if(isset($_GET['page']))
{
	$page=$_GET['page'];
}

if(!empty($_SESSION["user"])){
        
}


if(isset($_GET['search']))
{
	$search_query=$_GET['search'];
	include("search.php");
}
       

/*if(empty($_SESSION['user']))*/
	




?>