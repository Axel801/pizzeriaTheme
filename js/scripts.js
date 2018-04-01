//Para poder usar el $('') en lugar de jQuery ......
$ = jQuery.noConflict();//Esto es necesario para que funcione jQuery en WP

/*Esto se inicializa antes que todo lo demas , no hace falta ponerlo dentro del document.ready*/
var map;
function initMap() {
  var latLng = {
    lat:parseFloat(opciones.latitud),
    lng:parseFloat(opciones.longitud)
  }

  map = new google.maps.Map(document.getElementById('mapa'), {
    center: latLng,
    zoom: parseInt(opciones.zoom)
  });

  var marker = new google.maps.Marker({
    position:latLng,
    map:map,
    title:'La pizzeria'
  });
}




$().ready(function(){

  //Mostrar y ocultar menu
  $('.mobile-menu a').on('click', function(){
    $('nav.menu-sitio').toggle('slow');
  });



  //Resize en la pantalla
  var breakpoint = 768;
  $(window).resize(function(){
    ajustarCajas();
    if($(document).width() >= breakpoint){
      $('nav.menu-sitio').show();
    } else {
      $('nav.menu-sitio').hide();
    }
  })


  //Ajustar cajas segun tamaño de la imagen
  ajustarCajas();

  //Tamaño de mapa
  var mapa = $('#mapa');
  if(mapa.length > 0 )  {
    if($(document).width() >= breakpoint){
      ajustarMapa(0);
    }else {
      ajustarMapa(300);
    }
  }
  $(window).resize(function(){
    if($(document).width() >= breakpoint){
      ajustarMapa(0);
    }else {
      ajustarMapa(300);
    }
  });


  //Fluidbox
  $('.gallery a').each(function (){
    $(this).attr({'data-fluidbox':''});
  });

  if($('[data-fluidbox]').length > 0) {
    $('[data-fluidbox]').fluidbox();
  }

});

function ajustarCajas(){
  var imagenes = $('.imagen-caja');
  if(imagenes.length > 0) {
    var altura = imagenes[0].height;
    var cajas = $('div.contenido-caja');
    $(cajas).each(function(i, elemento){
      $(elemento).css({'height': altura + 'px'});
    });
  }
}

function ajustarMapa(altura){
  if(altura == 0){
    var ubicacionSection = $('.ubicacion-reservacion');
    var ubicacionAltura = ubicacionSection.height();
    $('#mapa').css({'height':ubicacionAltura});
  } else {
    $('#mapa').css({'height':altura});
  }
}
