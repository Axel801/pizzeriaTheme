$ = jQuery.noConflict();

$(document).ready(function(){

  $('.delete-register').on('click',function(e){
    e.preventDefault();
    var id = $(this).attr('data-reservations');
    swal({
      title: '¿Seguro que quiere eliminar?',
      text: "Esta acción no se puede revertir",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Eliminar',
      cancelButtonText:'Cancelar'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:'post',
          data:{
            'action': 'altp_deleteReservation',
            'id': id,
            'tipo':'delete'
          },
          url :url_delete.ajaxurl,
          success: function(data){
            var resultado = JSON.parse(data);
            if(resultado.response == 1){
              $("[data-reservations='"+ resultado.id+"']").parent().parent().remove();
              swal(
                'Eliminado',
                'La reserva se ha eliminado',
                'success'
              )


            }
          },

        });
      }
    })




  });
});
