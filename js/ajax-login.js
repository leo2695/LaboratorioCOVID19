$(document).ready(function () {

     /* LOGIN */

  $('#loginForm').on('submit', function (e) {
    e.preventDefault(); //para que no abra nada

    var datos = $(this).serializeArray(); //this se refiere a lo que hizo que esto se ejecutara //serializeArray es que todos los datos los hace en un array

    $.ajax({


      dataType: "json",
      type: "POST",
      url: "modelos/"+$(this).attr('action'),
      data: datos,
      cache: false,

      success: function (data) {

        /*  console.log(data); */

        var resultado = data;

        if (resultado.respuesta === 'exito') {
          /* Sweetalert */
          Swal.fire({
            type: 'success',
            title: 'Correcto',
            html: 'Bienvenid@ ' + resultado.usuario + '!',
            showConfirmButton: false

          })
          setTimeout(function () {
            window.location.href = 'index.php';
          }, 800);

        } else {

          Swal.fire({

            type: 'error',
            title: 'Usuario y/o Contraseña Incorrecto',
            confirmButtonText: 'Entendido'
          })
        }


      }

    })


  });
  /*  */



});