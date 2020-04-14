$(function () {


  $("#registros").DataTable({
    'paging': true,


    "lengthMenu": [
      [5, 25, -1],
      [5, 25, "Todo"]
    ],
    /* Esto es para ver cuantas tiro por lista y cuantas opciones de mostrar doy son pares lo que diga a la izquierda son los que verdaderamente se van a mostrar los de la derecha es el número que va aparecer en el Show del select */

    "language": {

      paginate: {
        next: 'Siguiente',
        previous: 'Anterior',
        last: 'Último',
        first: 'Primero'
      },

      "info": 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
      "infoEmpty": "Mostrando 0 to 0 de 0 entradas",
      "zeroRecords": "No existen datos en la tabla",
      "emptyTable": 'No existen datos en la tabla',
      "infoFiltered": "(Filtrado de _MAX_ entradas totales)",
      "search": "Buscar:",
      "lengthMenu": "Mostrar _MENU_ entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando..."

    },




  });

  $('#agregar').attr('disabled', true); //deshabilito el boton para que no lo puedan agregar hasta que ambas contraseñas coincidan


  $('#repetirPassword').on('keyup', function () {

    var passwordNuevo = $('#password').val();
    var password = $('#password');
    var repetirPassword = $('#repetirPassword');


    password.removeClass('is-invalid is-valid');
    repetirPassword.removeClass('is-invalid is-valid');
    $('#resultadoPassword').removeClass('invalid-feedback valid-feedback');



    if ($(this).val() == passwordNuevo) {
      $('#resultadoPassword').text('Correcto');
      password.addClass('is-valid').removeClass('is-invalid');
      repetirPassword.addClass('is-valid').removeClass('is-invalid');
      $('#resultadoPassword').addClass('valid-feedback').removeClass('invalid-feedback');
      $('#agregar').attr('disabled', false);
    } else {
      $('#resultadoPassword').text('Las contraseñas no coinciden');
      password.addClass('is-invalid').removeClass('is-valid');
      repetirPassword.addClass('is-invalid').removeClass('is-valid');
      $('#resultadoPassword').addClass('invalid-feedback').removeClass('valid-feedback');
    }

  });

  /* ICON PICKER FONTAWESOME */
  $('#icono').iconpicker();







  /* CHART GRAFICAS */

  /* FUNCION de JQUERY GETJSON */
  $.getJSON('servicioPacientes.php', function (data) {

    /* console.log(data);
 */
    var fechas = [];
    var cantidad = [];
    for (var i = 0; i < data.length; i++) {
      fechas.push(data[i].fecha);
      cantidad.push(data[i].cantidad);
    }

    var areaChartData = {
      labels: fechas,
      datasets: [{
        label: 'Ventas Diarias',
        backgroundColor: 'rgba(60,141,188,0.9)',
        borderColor: 'rgba(60,141,188,0.8)',
        pointRadius: 3, //el puntito que aparece en la gráfica y el radio supongo que el tamaño
        pointColor: '#3b8bba',
        pointStrokeColor: 'rgba(60,141,188,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data: cantidad
      }]
    }

    var areaChartOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines: {
            display: true,
          }
        }],
        yAxes: [{
          gridLines: {
            display: true,
          }
        }]
      }
    }

    //-------------
    //- LINE CHART -
    //--------------
    if(document.querySelector('#estadisticas')){
    var lineChartCanvas = $('#estadisticas').get(0).getContext('2d')

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })
  }
    /* FIN CHART JS */

  });










});
