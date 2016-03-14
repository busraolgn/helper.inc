<?php
session_start();
include("db_classes/User_table.class.php");
include("db_classes/Items.class.php");
include("db_classes/Campaign.class.php");

if(empty($page)){
	$page = "home";
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
	
if(isset($_GET['Van']))
{
	echo "evetttt";
}
/* initialize arrays */

/*cities*/
	$city = new Campaign();
	$city->openDB();
	$cities = $city->getCampaignCitiesDistinct();

	$city->closeDB();
/*end cities*/

/* end of initializing arrays */

?>