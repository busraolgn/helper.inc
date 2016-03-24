<?php
   include_once "db_classes/Campaign.class.php";
   include_once "db_classes/Items.class.php";
   include_once "db_classes/User_table.class.php";

   $SubAction = $_GET["action"];
    if ($SubAction === "insertCampaign") {
    $userid = $_POST['userid'];
    $aidname = $_POST['aidname'];
    $aidcomment = $_POST['aidcomment'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $favcount = $_POST['favcount'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $neigborhood = $_POST['neigborhood'];
    $address = $_POST['address'];
    $tags = $_POST['tags'];
    $aidimg = $_POST['aidimg'];

    $campaign = new Campaign();

    $campaign->openDB();
    $campaign->insertCampaign($userid, $aidname, $aidcomment, $startdate, $enddate, $favcount, $city, $district, $neigborhood, $address, $tags, $aidimg);
    $campaign->closeDB();
    }

    if ($SubAction === "insertItems") {
    $aidid = $_POST['aidid'];
    $type = $_POST['type'];
    $itemname = $_POST['itemname'];
    $fillrate = $_POST['fillrate'];
    $needed = $_POST['needed'];
    $provided = $_POST['provided'];

    $items = new Items();

    $items->openDB();
    $items->insertItems($aidid, $type, $itemname, $fillrate, $needed, $provided);
    $items->closeDB();
    }

    if ($SubAction === "insertUser_table") {
        $uname = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        if(isset($_POST['score'])) $score = $_POST['score']; 
        else $score = "";
        if(isset($_POST['favorites'])) $favorites = $_POST['favorites']; 
        else $favorites = "";
        if(isset($_POST['aidstartedbyuser'])) $aidstartedbyuser = $_POST['aidstartedbyuser'];
        else $aidstartedbyuser = "";
        if(isset($_POST['aidattendedbyuser'])) $aidattendedbyuser = $_POST['aidattendedbyuser'];
        else $aidattendedbyuser = "";

    $user_table = new User_table();

    $user_table->openDB();
    $user_table->insertUser_table($uname, $password, $email, $name, $surname, $score, $favorites, $aidstartedbyuser, $aidattendedbyuser);
    $user_table->closeDB();
    header("location: index.php?page=login&success=1");
    }


    if ($SubAction === "updateCampaign") {
    $userid = $_POST['userid'];
    $aidname = $_POST['aidname'];
    $aidcomment = $_POST['aidcomment'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $favcount = $_POST['favcount'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $neigborhood = $_POST['neigborhood'];
    $address = $_POST['address'];
    $tags = $_POST['tags'];
    $aidimg = $_POST['aidimg'];
    $id = $_GET['id'];

    $campaign = new Campaign();

    $campaign->openDB();
    $campaign->updateCampaign($id, $userid, $aidname, $aidcomment, $startdate, $enddate, $favcount, $city, $district, $neigborhood, $address, $tags, $aidimg);
    $campaign->closeDB();
    }

    if ($SubAction === "updateItems") {
    $aidid = $_POST['aidid'];
    $type = $_POST['type'];
    $itemname = $_POST['itemname'];
    $fillrate = $_POST['fillrate'];
    $needed = $_POST['needed'];
    $provided = $_POST['provided'];
    $id = $_GET['id'];

    $items = new Items();

    $items->openDB();
    $items->updateItems($id, $aidid, $type, $itemname, $fillrate, $needed, $provided);
    $items->closeDB();
    }

    if ($SubAction === "updateUser_table") {
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $score = $_POST['score'];
    $favorites = $_POST['favorites'];
    $aidstartedbyuser = $_POST['aidstartedbyuser'];
    $aidattendedbyuser = $_POST['aidattendedbyuser'];
    $id = $_GET['id'];

    $user_table = new User_table();

    $user_table->openDB();
    $user_table->updateUser_table($id, $uname, $password, $email, $name, $surname, $score, $favorites, $aidstartedbyuser, $aidattendedbyuser);
    $user_table->closeDB();
    }


    if ($SubAction === "deleteCampaign") {
    $id = $_GET['id'];

    $campaign = new Campaign();

    $campaign->openDB();
    $campaign->deleteCampaign($id);
    $campaign->closeDB();
    }

    if ($SubAction === "deleteItems") {
    $id = $_GET['id'];

    $items = new Items();

    $items->openDB();
    $items->deleteItems($id);
    $items->closeDB();
    }

    if ($SubAction === "deleteUser_table") {
    $id = $_GET['id'];

    $user_table = new User_table();

    $user_table->openDB();
    $user_table->deleteUser_table($id);
    $user_table->closeDB();
    }


   ?>