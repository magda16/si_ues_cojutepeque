$(document).ready(function(){
    
  $('input').on('keypress', function(e){
    if (e.keyCode == 13) {
      // Obtenemos el número del atributo tabindex al que se le dio enter y le sumamos 1
      var TabIndexActual = $(this).attr('tabindex');
      var TabIndexSiguiente = parseInt(TabIndexActual) + 1;
      // Se determina si el tabindex existe en el formulario
      var CampoSiguiente = $('[tabindex='+TabIndexSiguiente+']');
      // Si se encuentra el campo entra al if
      if(CampoSiguiente.length > 0)
      {
      CampoSiguiente.focus(); //Hcemos focus al campo encontrado
      return false; // retornamos false para detener alguna otra ejecucion en el campo
      }else{// Si no se encontro ningún elemento, se retorna false
      return false;
      }
    }
  });
      
      $.validator.addMethod("letrasOespacio", function(value, element) {
          return /^[ a-záéíóúüñ]*$/i.test(value);
      }, "Ingrese sólo letras o espacios.");
  
      $.validator.addMethod("alfanumOespacio", function(value, element) {
          return /^[ a-z0-9-()áéíóúüñ.,]*$/i.test(value);
      }, "Ingrese sólo letras, números o espacios.");
  
      $.validator.addMethod("numero", function(value, element) {
          return /^[ 0-9-()]*$/i.test(value);
      }, "Ingrese sólo números");
  
  
      $("#formed").validate({
        errorPlacement: function (error, element) {
              $(element).closest('.form-group').find('.help-block').html(error.html());
          },
          highlight: function (element) {
              $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
          },
          unhighlight: function (element, errorClass, validClass) {
              $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
              $(element).closest('.form-group').find('.help-block').html('');
          },
        rules: {
          nombre: {
            alfanumOespacio: true,
            required: true,
            minlength: 3,
            maxlength: 200
          },
          criterio: {
            alfanumOespacio: true,
            required: true,
            minlength: 3,
            maxlength: 200
          }
        },
        messages: {
          nombre: {
            required: "Por favor, ingrese nombre.",
            maxlength: "Debe ingresar m&aacute;ximo 200 dígitos.",
            minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
          },
          criterio: {
            required: "Por favor, ingrese criterio.",
            maxlength: "Debe ingresar m&aacute;ximo 200 dígitos.",
            minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
          }
        }
      });
      
  });

  $("#criterio").keypress(function(e) {
    if(e.which == 13) {
       $('#btnguardar').click();
    }
 });

 $("#nombre").blur(function(){
  var nombre = $("#nombre").val();
  var tabla = "evaluaciond";
  var nombre_campo = "nombre_ed";
  if(nombre.length>8){
      $.ajax({
        type: 'POST',
        url: '../../../build/configuraciones/sql/validar_nombre.php',
        data: {'nombre': nombre, 'tabla': tabla, 'nombre_campo': nombre_campo}
      })
      .done(function(resultado_ajax){
        if(resultado_ajax!==""){
          $("#nombre").val("");
          $('#resultnomerror').text("Nombre Ya Existe");
          $('#resultnom').removeClass('has-success').addClass('has-error');
        }
      })
      .fail(function(){
        alert('Hubo un error al cargar la Pagina')
      })
    }
});

  
$("#btnguardar").click(function(){
  if($("#formed").valid()){
    $('#bandera').val("add");
    $.ajax({
      type: 'POST',
      url: '../../../build/configuraciones/sql/evaluacion_desempenio/crud_evaluaciond.php',
      data: $("#formed").serialize()
    })
    .done(function(resultado_ajax){
      if(resultado_ajax === "Exito"){
        swal({ 
          title:'Éxito',
          text: 'Datos Almacenados',
          type: 'success'
        },
          function(){
            //event to perform on click of ok button of sweetalert
            location.href='../../../produccion/administracion/evaluacion_desempenio/registrar_asp_evaluaciond.php';
        })
      }
      if(resultado_ajax === "Error"){
        swal({ 
          title:'Advertencia',
          text: 'Sin Conexión Dase Datos',
          type: 'warning'
        },
          function(){
              //event to perform on click of ok button of sweetalert
              location.href='../../../produccion/administracion/evaluacion_desempenio/registrar_evaluaciond.php';
          })
              
      }                
    })
    .fail(function(){
      alert('Hubo un error al cargar la Pagina')
    })
  }
  
});


    $("#btnmodificar").click(function(){
      if($("#formed").valid()){
       
        var nombre = $('#nombre').val();
        var bandera = "modificar";
        var baccion = $('#baccion').val();
        $.ajax({
          type: 'POST',
          url: '../../../build/config/sql/evaluacion_desempenio/crudevaluaciond.php',
          data: {'nombre': nombre, 'bandera' : bandera, 'baccion' : baccion}
        })
          .done(function(resultado_ajax){
            if(resultado_ajax === "Exito"){
              
              $("#nombre").val("");
              swal({ 
                title:'Éxito',
                text: 'Datos Almacenados',
                type: 'success'
              },
                function(){
                  //event to perform on click of ok button of sweetalert
                  location.href='../../../produccion/administracion/evaluacion_desempenio/lista_evaluaciond.php';
                })
              }
                if(resultado_ajax === "Error"){
                  $("#nombre").val("");
                  swal({ 
                    title:'Advertencia',
                    text: 'Sin Conexión Dase Datos',
                    type: 'warning'
                  },
                    function(){
                      //event to perform on click of ok button of sweetalert
                      location.href='../../../produccion/administracion/evaluacion_desempenio/lista_evaluaciond.php';
                    })
                
                }                
                })
            .fail(function(){
              alert('Hubo un error al cargar la Pagina')
            })
      }
      
    });

