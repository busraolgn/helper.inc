<?php
session_start();
include("db_classes/User_table.class.php");
include("db_classes/Items.class.php");
include("db_classes/Campaign.class.php");

$campaign_arr;
$_SESSION["tree"] = "kampanyalar";
$_SESSION["current_url"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

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
	$_SESSION["filter_city"] = $_GET['city'];
	$campaign = new Campaign();
	$campaign->openDB();
	$filtered_camps = $campaign->getCampaignByCity($_GET['city']);
	$campaign->closeDB();
	$campaign_arr = &$filtered_camps;
}
/*end filtered camps*/

if(empty($_SESSION["main_categories"])){
	$_SESSION["main_categories"] = array("Gıda","Giyecekler","TemelEşyalar");
	$_SESSION["sub_categories"] = array(
									"Gıda" => array("Bakliyat","KonserveVeYemek Malzemeleri","Et Ürünleri","İçecekler"),
									"Giyecekler" => array("Tişört","Kazak","Pantolon","Kaban-Mont"),
									"TemelEşyalar" => array("Elektrikli Aletler","Beyaz Eşya","Diğer")
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

if(empty($page)){
	$page = "home";
}
if(empty($_SESSION["filter_city"])){
	$_SESSION["filter_city"] = "";
}
if(empty($_SESSION["filter_category"])){
	$_SESSION["filter_category"] = "";
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
/*filtering*/
if(isset($_GET['filter']))
{
	$_SESSION["filter"] = explode("+", $_GET['filter']);
	$_SESSION["filter"] = array_map('trim', $_SESSION["filter"]);
	$_SESSION["filter"] = explode(" ", $_SESSION["filter"][0]);
}
else
{
	$_SESSION["filter"] = array();
}
/*end filtering*/

/*if(empty($_SESSION['user']))*/

?>