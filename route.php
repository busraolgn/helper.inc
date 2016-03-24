<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rota Detayı</title>
<style type="text/css">

.top-content h2 {
  font-size:30px;
}


.map_container{
    position: relative;
    width: 80%;
    padding-bottom: 56.25%; /* Ratio 16:9 ( 100%/16*9 = 56.25% ) */
    


}
.map_container .map_canvas{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin-left: 10%;
    padding: 0;
    border: 5px solid #ee4d4d; border-radius: 6px;
}
.top-content{
    
    width:60%;
    margin-left:90px;margin-bottom:10px;
}
.inner-bg {
  width:100%;
  
}

</style>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="https://maps.googleapis.com/maps/api/js?&sensor=false"></script>
</head>
<body onLoad="initialize()" style="background-color: #F8F8F8;">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-41004144-1', 'auto');
  ga('send', 'pageview');
</script>
<br />
<?php 
  if (isset($_GET["aid_id"])) {
    session_start();
    include("db_classes/User_table.class.php");
    include("db_classes/Items.class.php");
    include("db_classes/Campaign.class.php");
    include("db_classes/Donations.class.php");
    $aid_id = $_GET["aid_id"];
    $campaign = new Campaign();
    $campaign->openDB();
    $aid = $campaign->getCampaignByID($aid_id);
    $campaign->closeDB();

    $donation = new Donations();
    $donation->openDB();
    $donations_arr = $donation->getDonations();
    $index=0; $addresses=array();
    for ($i=0; $i < count($donations_arr); $i++) { 
      if ($donations_arr[$i]["aid_id"] == $aid_id) {
        $addresses[$index]=$donations_arr[$i]["source_address"];
        $index++;
      }
    }
  }
?>

<div class="top-content">
<div class="inner-bg">
  <div class="container">
        
<h2>Kampanya adresi:<h2/> <br/>
<input class="tb1" id="origem" type="textbox" value=<?php echo $aid["address"]; ?>/> &nbsp &nbsp
<input type="button" value="Route" onclick="calcRoute();" style="background-color:#ee4d4d; "/> <a href=<?php "index.php?page=popup&aid_id=".$aid_id ?>><button name="geri" style="background-color:#ee4d4d;">Geri</button><a/><br/> <br>

      <div style='visibility:hidden;'>
<?php 
  for ($i=1; $i <= count($addresses); $i++) { 
    $index=$i-1;
?>
<input id='<?php echo "parada".$i; ?>' type="textbox" value=<?php echo trim($addresses[$index]," "); ?> />
<?php } ?>
      </div>

  </div></div>

</div>
<div class="map_container">
  <div id="map-canvas" class="map_canvas" ></div></div>
  <script type="text/javascript">
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
function initialize() {
  google.maps.controlStyle = 'azteca';
  directionsDisplay = new google.maps.DirectionsRenderer();
  var ankara = new google.maps.LatLng(39.933363, 33.859742);
  var mapOptions = {
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: ankara
  }
  map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
  directionsDisplay.setMap(map);
}
function calcRoute() {
  var start = document.getElementById('origem').value;
  var end = document.getElementById('origem').value;
  var waypts = [];
  //var checkboxArray = document.getElementById('waypoints');
  //for (var i = 0; i < checkboxArray.length; i++) {
  //  if (checkboxArray.options[i].selected == true) {
  //    waypts.push({
  //        location:checkboxArray[i].value,
  //        stopover:true});
  //  }
  //}
  for (var i = 1; i <= "<?php echo count($addresses); ?>"; i++) {
    if (document.getElementById('parada'+i).value != '') {
      waypts.push({
              location:document.getElementById('parada'+i).value,
              stopover:true}); 
    }
  }
  document.innerHTML=waypts; <!---->
  var request = {
      origin: start,
      destination: end,
      waypoints: waypts,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
      var route = response.routes[0];
      var summaryPanel = document.getElementById('directions_panel');
      summaryPanel.innerHTML = '<b>DETAILS OF ROADMAP GENERATED</b><br><br>';
      // For each route, display summary information.
    var dist = 0;
    for (var i = 0; i < route.legs.length; i++) {
        dist += route.legs[i].distance.value;
    }
    summaryPanel.innerHTML += '<b>Total Distance:</b> ' + Math.round(dist/1000) + ' Km (' + Math.round(0.000621371*dist) + ' Miles)<br><br>';
    
      for (var i = 0; i < route.legs.length; i++) {
        var routeSegment = i + 1;
        summaryPanel.innerHTML += '<b>Route: ' + routeSegment + '</b><br>';
        summaryPanel.innerHTML += '<b>Origin:</b> ' + route.legs[i].start_address + '<br>';
        summaryPanel.innerHTML += '<b>Destination:</b> ' + route.legs[i].end_address + '<br>';
        summaryPanel.innerHTML += '<b>Distance:</b> ' + route.legs[i].distance.text + '<br><br>';
      }
    }
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
google.maps.event.addDomListener(window, 'resize', function() {
     var center = map.getCenter();
     google.maps.event.trigger(map, 'resize');
     map.setZoom(6);
     map.setCenter(center); 
    });
</script>
<br /><br />


</body>
</html>