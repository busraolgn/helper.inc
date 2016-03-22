<?php
session_start();
include("db_classes/User_table.class.php");
include("db_classes/Items.class.php");
include("db_classes/Campaign.class.php");
include("db_classes/Donations.class.php");

$campaign_arr;
$_SESSION["tree"] = "kampanyalar";
$_SESSION["current_url"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION["filter"] = array();
$_SESSION["filter_city"] = "";

if(empty($page)){
	$page = "home";
}
if(empty($_SESSION["filter_city"])){
	$_SESSION["filter_city"] = "";
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
/* initialize arrays */

/*campaigns*/
	$campaign = new Campaign();
	$campaign->openDB();
	$all_campaigns = $campaign->getCampaign();
	$campaign->closeDB();
/*end campaigns*/

$campaign_arr = $all_campaigns;

/*cities*/
	$city = new Campaign();
	$city->openDB();
	$cities = $city->getCampaignCitiesDistinct();
	$city->closeDB();
/*end cities*/

/*camps filtered by city*/
if(isset($_GET['city']))
{
	$_SESSION["tree"].=" > " . $_GET['city'];
	$_SESSION["filter_city"] = $_GET['city'];
	$campaign = new Campaign();
	$campaign->openDB();
	$filtered_camps = $campaign->getCampaignByCity($_GET['city']);
	$campaign->closeDB();
	$campaign_arr = $filtered_camps;
}
/*end filtered camps*/

/*filtering*/
if(isset($_GET['filter']))
{	$main_category_filtered_camps = array(); $index=0;
	$_SESSION["filter"] = explode("+", $_GET['filter']);
	$_SESSION["filter"] = array_map('trim', $_SESSION["filter"]);
	$_SESSION["filter"] = explode(" ", $_SESSION["filter"][0]);
	for ($i=0; $i < count($campaign_arr); $i++) { 
		$exists = false; 
		for ($j=0; $j < count($_SESSION["filter"]); $j++) { 
			if (strpos($campaign_arr[$i]["main_category_tags"], $_SESSION["filter"][$j]) !== false) {
				$main_category_filtered_camps[$index] = $campaign_arr[$i]; $index++;
				break;
			}
		}
	}
	$campaign_arr = $main_category_filtered_camps;
}
else
{
	$_SESSION["filter"] = array();
}

if(empty($_SESSION["main_categories"])){
	$_SESSION["main_categories"] = array("Gıda","Giyecekler","TemelEşyalar");
	$_SESSION["sub_categories"] = array(
									"Gıda" => array("Bakliyat","KonserveVeYemekMalzemeleri","EtÜrünleri","İçecekler"),
									"Giyecekler" => array("Tişört","Kazak","Pantolon","Kaban-Mont"),
									"TemelEşyalar" => array("ElektrikliAletler","BeyazEşya","Diğer")
								  	);
}

/*iller*/
$_SESSION["iller"] = array('','Adana', 'Adıyaman', 'Afyon', 'Ağrı', 'Amasya', 'Ankara', 'Antalya', 'Artvin',
'Aydın', 'Balıkesir', 'Bilecik', 'Bingöl', 'Bitlis', 'Bolu', 'Burdur', 'Bursa', 'Çanakkale',
'Çankırı', 'Çorum', 'Denizli', 'Diyarbakır', 'Edirne', 'Elazığ', 'Erzincan', 'Erzurum', 'Eskişehir',
'Gaziantep', 'Giresun', 'Gümüşhane', 'Hakkari', 'Hatay', 'Isparta', 'Mersin', 'İstanbul', 'İzmir', 
'Kars', 'Kastamonu', 'Kayseri', 'Kırklareli', 'Kırşehir', 'Kocaeli', 'Konya', 'Kütahya', 'Malatya', 
'Manisa', 'Kahramanmaraş', 'Mardin', 'Muğla', 'Muş', 'Nevşehir', 'Niğde', 'Ordu', 'Rize', 'Sakarya',
'Samsun', 'Siirt', 'Sinop', 'Sivas', 'Tekirdağ', 'Tokat', 'Trabzon', 'Tunceli', 'Şanlıurfa', 'Uşak',
'Van', 'Yozgat', 'Zonguldak', 'Aksaray', 'Bayburt', 'Karaman', 'Kırıkkale', 'Batman', 'Şırnak',
'Bartın', 'Ardahan', 'Iğdır', 'Yalova', 'Karabük', 'Kilis', 'Osmaniye', 'Düzce');
/*end iller*/

/* end of initializing arrays */


/*end filtering*/

/*if(empty($_SESSION['user']))*/

?>