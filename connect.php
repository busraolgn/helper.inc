<?php
$host="37.230.110.50";
$db="aslihan_aid_app_db";
$user="aslihan";
$pass="pass123";
$conn=@mysql_connect($host,$user,$pass) or die("Mysql Baglanamadi");
 
mysql_select_db($db,$conn) or die("Veritabanina Baglanilamadi");
mysql_set_charset('latin5',$conn);
?>