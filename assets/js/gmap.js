var waypointcont=0;
var searchBoxes = [];
var waypointss = [];
var directionsDisplay;
var directionsService;
var waypts = [];
function initMap() {
  directionsDisplay = new google.maps.DirectionsRenderer;
  directionsService = new google.maps.DirectionsService;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    center: {lat: 41.85, lng: -87.65}
  });
  // Create the search box and link it to the UI element.

  var start = document.getElementById('start');
  searchBox = new google.maps.places.SearchBox(start);

  // Create the search box and link it to the UI element.

  var end = document.getElementById('end');
  var searchBox1 = new google.maps.places.SearchBox(end);

  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('right-panel'));

  var control = document.getElementById('floating-panel');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);

  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  };
  
  var onStartChangeHandler = function() {
    var endlength = document.getElementById('end').value.length;
    if(endlength>0){
      calculateAndDisplayRoute(directionsService, directionsDisplay);
    }
    
  };
   
  destiny =  new google.maps.places.SearchBox(document.getElementById('end'));
  destiny.addListener("places_changed",onChangeHandler);
  
  starting =  new google.maps.places.SearchBox(document.getElementById('start'));
  starting.addListener("places_changed",onStartChangeHandler);
  
  updateway =  new google.maps.places.SearchBox(window.document.getElementById('waypoint1'));
  updateway.addListener("places_changed",onWayChangeHandler);


}
var onWayChangeHandler = function() {
   waypts = [];
   for(var i=1;i<=waypointcont;i++){
      var wpi ="waypoint"+i;
      waypts.push(
         {
            location: document.getElementById(wpi).value,
            stopover: true
         }
         )
      console.log(waypts);
   }  
   var startlenght =document.getElementById('start').value.length;
   var endlength = document.getElementById('start').value.length;
   if(startlenght>0 & endlength>0){
      calculateAndDisplayWayRoute(directionsService, directionsDisplay);
   }
  };
        // Start to end with way points
function calculateAndDisplayWayRoute(directionsService, directionsDisplay) {
  var start= 0;
  var end = 0;
  start = document.getElementById('start').value; 
  end = document.getElementById('end').value;
  directionsService.route({
    origin: start,
    waypoints:waypts,
    optimizeWaypoints: true,
    destination: end,
    travelMode: 'DRIVING',
    unitSystem: google.maps.UnitSystem.IMPERIAL
  }, function(response, status) {
    if (status === 'OK') {
      directionsDisplay.setDirections(response);
      computeTotalDistance(response);
    } else {
      
    }
  });
}

// Start to end with way points
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  var start = document.getElementById('start').value;
  waypts = [];
  for(var i=1;i<=waypointcont;i++){
     var wpi ="waypoint"+i;
     waypts.push(
        {
          location: document.getElementById(wpi).value,
           stopover: true
        }
        )
  }
   
  var end = 0;
  end = document.getElementById('end').value;
  directionsService.route({
    origin: start,
    waypoints:waypts,
    optimizeWaypoints: true,
    destination: end,
    travelMode: 'DRIVING',
    unitSystem: google.maps.UnitSystem.IMPERIAL
  }, function(response, status) {
    if (status === 'OK') {
    
      $('#direction-warrning').addClass('hidden')    
      directionsDisplay.setDirections(response);
      computeTotalDistance(response);
    } else {
        $('#direction-warrning').removeClass('hidden')
        $('#direction-warrning').text('Directions request failed due to ' + status)
    //   window.alert('Directions request failed due to ' + status);
    }
  });
}

// add multi destination div and populate 
function addway() {
      waypointcont +=1;
      var waypointid="waypoint"+waypointcont;

      var newpoint = "<div class='input-group'>"
      newpoint +=   " <span class='input-group-addon'><i style='color: #ffce00' class='fa fa-map-marker'></i></span>"
      newpoint +=   "             <div class='labels'>"
      newpoint +=   "                <span class='formlabel'> WayPoint</span>"
      newpoint +=   "             </div>"
      newpoint +=   "                <input id='demo' class='form-control waypoint' type='text' placeholder='ENTER Way Point'>"
      newpoint +=   "          </div>";
      //newDiv.style.background = "#000";
      $('#waypointdiv').append(newpoint);
            //   waypointS
      document.getElementById('demo').id=waypointid;
      waypointss[waypointcont] = document.getElementById(waypointid);
      
      var searchboxess = waypointss[waypointcont];
      searchBoxes [waypointcont] = new google.maps.places.SearchBox(searchboxess);
      // console.log(waypointss[waypointcont]);
      // console.log(searchBoxes [waypointcont]);
      updateway =  new google.maps.places.SearchBox(window.document.getElementById(waypointid));
      updateway.addListener("places_changed",onWayChangeHandler);

}
var totalDist=0;
var totalTime=0;
function computeTotalDistance(result) {
    var tempdis = 0;
    var temptim = 0;
  var myroute = result.routes[0];
  for (i = 0; i < myroute.legs.length; i++) {
     tempdis += myroute.legs[i].distance.value;
     temptim+= myroute.legs[i].duration.value;
   }
    totalDist  =  tempdis/1609;
    totalTime  =  temptim/60;
    totalTime  =  Math.round(totalTime);
    totalDist  = totalDist.toFixed(1);
    console.log('Total Distance '+ totalDist + "Miles");
    console.log('Total Time' + totalTime + "Minutes");
}
