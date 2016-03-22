<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Solver2</title>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/busra_js.js"></script>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

</div>

<style type="text/css">
.imgstyle {
		height: 55px;
		padding: 0px;
		margin-top:10px;
		margin-bottom:10px;
		margin-left:30px;
		border:0px;
	}

.newfont {
    background: #DFDFDF;
    font-size: 1.2em;
    font-family: "Helvetica Neue" , "Lucida Grande" , "Segoe UI" , Arial, Helvetica, Verdana, sans-serif;
    margin: 0px;
    padding: 0px;
    color: #696969;
}
.newfont2 {
    background: #DFDFDF;
    font-size: 0.8em;
    font-family: "Helvetica Neue" , "Lucida Grande" , "Segoe UI" , Arial, Helvetica, Verdana, sans-serif;
    margin: 0px;
    padding: 0px;
    color: #696969;
}
input.tb1{
	width:250px;
	
}


.newone {
	color: #990000;
}
</style>



<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
   
  

<script type="text/javascript">

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var ankara = new google.maps.LatLng(39.933363, 32.859742);
  var mapOptions = {
    zoom: 6,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: ankara
  }
 var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
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
  for (var i = 1; i < 9; i++) {
  	if (document.getElementById('parada'+i).value != '') {
  		waypts.push({
        	  	location:document.getElementById('parada'+i).value,
          		stopover:true});
  	}
  }
   

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

</script>



</head>

<body class="bodycs" onLoad="initialize()">

<!--facebook-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41004144-1', 'auto');
  ga('send', 'pageview');

</script>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr style="background-color: #768A4D; height: 80px;">
    <td style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #FFFFFF; font-weight:bold">

<table width="100%">
<tr><td width="50%" align="left" style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; color: #FFFFFF; font-weight:bold">
Route Optimiser
</td>
<td width="50%" align="center">
</td></tr></table>

    </td>
    </tr>
</table>
<br />


<table height="800" cellspacing="10">
<tr>
<td width="300" valign="top">


<table cellspacing="2" width="300">
<tr>
  <td class="newfont">
Origin<br />
<span class="newfont2">(Street, Number, City, State, Country)</span></td></tr><tr><td>
<input class="tb1" id="origem" type="textbox" value="Av Tucunaré, 500 Barueri">
</td></tr><tr><td height="10">
</td></tr><tr><td class="newfont">
Delivery Points<br />
<span class="newfont2">(Street, Number, City, State, Country)</span></td></tr><tr><td>
<input class="tb1" id="parada1" type="textbox" value="Rua Mergenthaler, 300 São Paulo">
</td></tr><tr><td>
<input class="tb1" id="parada2" type="textbox" value="Rua Cardoso de Almeida, 800 São Paulo">
</td></tr><tr><td>
<input class="tb1" id="parada3" type="textbox" value="Rua Olimpiadas, 100 São Paulo">
</td></tr><tr><td>
<input class="tb1" id="parada4" type="textbox" value="Av Imperatriz Leopoldina, 1300 São Paulo">
</td></tr><tr><td>
<input class="tb1" id="parada5" type="textbox" value="R Pio XI, 100 São Paulo">
</td></tr><tr><td>
<input class="tb1" id="parada6" type="textbox" value="R Dr Alberto Seabra, 500 São Paulo">
</td></tr><tr><td>
<input class="tb1" id="parada7" type="textbox" value="">
</td></tr><tr><td>
<input class="tb1" id="parada8" type="textbox" value="">
</td></tr><tr><td align="left">


<table><tr><td>
<input type="button" value="Route" onclick="calcRoute();"> 
</td><td width="15px"></td><td class="newfont2">

</td></tr></table>



</td></tr></table>





<br /><br />
<table cellspacing="5">
<tr><td colspan="3">

<table cellpadding="0" cellspacing="0"><tr><td>
<a style="text-decoration:none; color:#8F8F8F" href=# onClick="window.open('http://www.linkedin.com/company/solver2','','width=900,height=700')">

</td><td width="15px"></td>
<td>
<div class="fb-like" data-href="https://www.facebook.com/solver2systems/" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
</td>
</tr></table>


</td></tr>
<tr>
<td width="2"></td>
<td width="40" valign="top">
</td><td width="130" valign="top">
Follow us on LinkedIn and Facebook to stay inside of all the example applications!
<br /><br /><br />
Want a specific application for your business?
<br />
<a href="http://www.solver2.com">Contact us</a>


</td></tr>
</table>






</td>
<td width="800" valign="top">

<div id="map-canvas" name="map-canvas" style="width:700px; height:500px; border: 1px solid #768A4D"></div>
<br /><br />
This application enables the routing of delivery so as to minimize the total travel of the vehicle.<br /><br />
This optimization is an application of the 
<a style="text-decoration:none; color:#8F8F8F" href=# onClick="window.open('http://en.wikipedia.org/wiki/Travelling_salesman_problem','','width=900,height=700')">
Traveling Salesman Probleme</a>, using the Google Maps API V3 services.<br /><br />
<span class="newone">Attention: </span>The roadmap delivery is performed to optimize the movement of the vehicle. Thus, the roadmap does not depend on the order that deliveries were inserted.</td>
<td width="400" valign="top">
<div id="directions_panel" style="background-color:#E8E8E8;"></div>
</td>
</tr>
</table>

</body>
</html>