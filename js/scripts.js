$ = jQuery.noConflict();

var map;
function initMap() {
  if($('#map').length > 0){
    var latLng = {
      lat:parseFloat(settings.latitude),
      lng:parseFloat(settings.longitude)
    }

    map = new google.maps.Map(document.getElementById('map'), {
      center: latLng,
      zoom: parseInt(settings.zoom)
    });

    var marker = new google.maps.Marker({
      position:latLng,
      map:map,
      title:'La pizzeria'
    });
  }
}

$().ready(function(){
  lightbox.option({
    'showImageNumberLabel':false,
    'wrapAround': true,
    'positionFromTop':100
  })

});
