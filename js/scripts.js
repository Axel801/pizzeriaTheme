$ = jQuery.noConflict();

var map;
function initMap() {
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

$().ready(function(){
  $('.gallery a').each(function (){
    $(this).attr({'data-fluidbox':''});
  });
  if($('[data-fluidbox]').length > 0){
    $('[data-fluidbox]').fluidbox();
  }
});
