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


  $("#formaula").validate({
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
      
      alfanumOespacio: {
        letrasOespacio: true,
        required: true,
        minlength: 3,
        maxlength: 200
      },
      capacidad: {
        numero: true,
        required: true,
        maxlength: 2
      }
    },
    messages: {
      nombre: {
        required: "Por favor, ingrese nombre.",
        maxlength: "Debe ingresar m&aacute;ximo 200 dígitos.",
        minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
      },
      ubicacion: {
        required: "Por favor, ingrese ubicaci&oacute;n.",
        maxlength: "Debe ingresar m&aacute;ximo 200 dígitos.",
        minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
      },
      capacidad: {
        required: "Por favor, ingrese capacidad.",
        maxlength: "Debe ingresar m&aacute;ximo 2 dígitos.",
        }
    }
  });


});
    


    $("#nombre").blur(function(){
      var nombre = $("#nombre").val();
      var tabla = "aula";
      var nombre_campo = "nombre_au";
      if(nombre.length>2){
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

  
    $("#capacidad").keypress(function(e) {
         if(e.which == 13) {
            $('#btnguardar').click();
         }
      });
  
    $("#btnguardar").click(function(){
      if($("#formaula").valid()){
        $('#bandera').val("add");
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/aula/crud_aula.php',
          data: $("#formaula").serialize()
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
                location.href='../../../produccion/administracion/aula/registrar_aula.php';
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
                  location.href='../../../produccion/administracion/aula/registrar_aula.php';
              })
                  
          }                
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
      
    });
  