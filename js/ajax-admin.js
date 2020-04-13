$(document).ready(function () {


  /* CREAR */
  $('#crear').on('submit', function (e) {
    e.preventDefault(); //para que no abra nada

    var datos = $(this).serializeArray(); //this se refiere a lo que hizo que esto se ejecutara //serializeArray es que todos los datos los hace en un array


    $.ajax({


      dataType: "json",
      type: "POST",
      url: "modelos/"+$(this).attr('action'),
      data: datos,
      cache: false,

      success: function (data) {

        console.log("data", data);

        var resultado = data;

        if (resultado.respuesta === 'exito') {


          /* Sweetalert */
          Swal.fire({
            type: 'success',
            title: 'Correcto',
            html: 'El Dato se creó correctamente',
            confirmButtonText: 'Entendido'

          })


        } else {

          Swal.fire({
            type: 'error',
            title: 'Error',
            html: 'Ocurrió un problema',
            confirmButtonText: 'Entendido'

          })


        }




      }

    })

    /* $('#crear').trigger("reset"); */

  });










  /* EDITAR */
  $('#editar').on('submit', function (e) {
    e.preventDefault(); //para que no abra nada

    /* console.log("Click!"); */

    var datos = $(this).serializeArray(); //this se refiere a lo que hizo que esto se ejecutara //serializeArray es que todos los datos los hace en un array

    $.ajax({


      dataType: "json",
      type: "POST",
      url: "modelos/"+$(this).attr('action'),
      data: datos,
      cache: false,

      success: function (data) {

        /* console.log("data", data); */
        var resultado = data;
        if (resultado.respuesta === 'exito') {
          /* Sweetalert */
          Swal.fire({
            type: 'success',
            title: 'Correcto',
            html: 'El Dato se editó correctamente',
            confirmButtonText: 'Entendido'


            /*  showCloseButton: true,
             showCancelButton: true, */
            /*  focusConfirm: false, */
            /*  confirmButtonAriaLabel: 'Thumbs up, great!',
             cancelButtonText:
               '<i class="fa fa-thumbs-down"></i>',
             cancelButtonAriaLabel: 'Thumbs down' */
          })
        } else {

          Swal.fire({
            type: 'error',
            title: 'Error',
            html: 'Ocurrió un problema',
            confirmButtonText: 'Entendido'

          })


        }




      }

    })


  });







  /* ELIMINAR */
  $('.borrarRegistro').on('click', function (e) {
    e.preventDefault(); //para evitar que el navegador vaya a realizar una carga innecesaria

    var id = $(this).attr('data-id'); //el this viene siendo el enlace, el borrarRegistro
    var tipo = $(this).attr('data-tipo');
/*      console.log("ID:"+id);
     console.log("Tipo:"+tipo); */

    /* SweetAlert2 Confirmacion */
    Swal.fire({
      title: 'Está seguro de eliminarlo?',
      text: "La acción será irreversible",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {

        //Llamado AJAX
        $.ajax({

          type: 'POST',
          data: { //estos son los datos que estoy enviando al modelo PHP para que los utilice y por ejemplo el registro es para que sepa que es eliminar, el id para que sepa cual eliminar y la imagen para saber el nombre de la imagen y borrarla
            'id': id, //estos son los data-X que los estoy tomando del form de PHP y los mando aqui y luego el PHP los va tomar solo el X sin el data
            'registro': 'eliminar'
          },
          url: 'modelos/modelo' + tipo + '.php', //el tipo es el que viene de data-tipo y es para que sepa cual archivo de modelo utilizar o sea hacia donde dirijirse

          success: function (data) {

            /* console.log(data); */

            var respuesta = JSON.parse(data);

            /* console.log(respuesta); */

            $('[data-id="' + respuesta.idEliminado + '"]').parents('tr').remove();


          }
        })

        Swal.fire({
          title: 'Eliminado!',
          text: 'El elemento ha sido eliminado.',
          confirmButtonText: 'Entendido',
          type: 'success'
        })
      }
    })


  });


});
