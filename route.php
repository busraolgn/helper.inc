<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Solver2</title>

<style type="text/css">




.newone {
	color: #990000;
}


html { height: 100% }
body { height: 100%; margin: 0; padding: 0; }
#map-canvas { height: 80%; width:80%;}

</style>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->

<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<script src="https://maps.googleapis.com/maps/api/js?&sensor=false"></script>
   
  





</head>

<body onLoad="initialize()">


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41004144-1', 'auto');
  ga('send', 'pageview');

</script>
<br />



<div class="container">


<h2>Kampanya adresi:</h2>

<span class="newfont2">(Street, Number, City, State, Country)</span><br></br>

<input class="tb1" id="origem" type="textbox" value="Av Tucunaré, 500 Barueri"/>
Delivery Points<br />
<!--<span class="newfont2">(Street, Number, City, State, Country)</span><br></br>
<div style='visibility:hidden;'>
<input class="tb1" id="parada1" type="textbox" value="Rua Mergenthaler, 300 São Paulo"/>
<br></br>
<input class="tb1" id="parada2" type="textbox" value="Rua Cardoso de Almeida, 800 São Paulo"/>
<br></br>
<input class="tb1" id="parada3" type="textbox" value="Rua Olimpiadas, 100 São Paulo"/>
<br></br>
<input class="tb1" id="parada4" type="textbox" value="Av Imperatriz Leopoldina, 1300 São Paulo"/>
<br></br>
<input class="tb1" id="parada5" type="textbox" value="R Pio XI, 100 São Paulo"/>
<br></br>
<input class="tb1" id="parada6" type="textbox" value="R Dr Alberto Seabra, 500 São Paulo"/>
<br></br>
<input class="tb1" id="parada7" type="textbox" value="">
<br></br>
<input class="tb1" id="parada8" type="textbox" value="">
<br></br>
<!--</div>-->

<input type="button" value="Route" onclick="calcRoute();"> 









<br /><br />

</div>
 
      <div id="map-canvas"></div>
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
google.maps.event.addDomListener(window, 'resize', function() {
     var center = map.getCenter();
     google.maps.event.trigger(map, 'resize');
     map.setCenter(center); 

    });


</script>
      
<br /><br />

</body>
</html>