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
      return /^[ a-z0-9áéíóúüñ.,]*$/i.test(value);
  }, "Ingrese sólo letras, números o espacios.");

  $.validator.addMethod("numero", function(value, element) {
      return /^[ 0-9-()]*$/i.test(value);
  }, "Ingrese sólo números");

  $.validator.addMethod("correo", function(value, element) {
      return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/i.test(value);
  }, "Ingrese un correo v&aacute;lido.");

  $("#formempleado").validate({
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
      cargo:{
        required: true,
        number: true
      },
      nombre: {
        letrasOespacio: true,
        required: true,
        minlength: 7,
        maxlength: 50
      },
      apellido: {
        letrasOespacio: true,
        required: true,
        minlength: 7,
        maxlength: 50
      },
      nit: {
        numero: true,
        required: true,
        minlength: 17,
        maxlength: 17
      },
      dui: {
        numero: true,
        required: true,
        minlength: 10,
        maxlength: 10
      },
      estado:{
        required: true,
        number: true
      },
     telefono: {
        numero: true,
        required: true,
        minlength: 9,
        maxlength: 9
      },
      correo: {
        correo: true,
        required: true,
        minlength: 10,
        maxlength: 80
      },
      direccion: {
        letrasOespacio: true,
        required: true,
        minlength: 10,
        maxlength: 80
      }
    },

    messages: {
      cargo: {
        required: "Por favor, seleccione cargo."
      },
      nombre: {
        required: "Por favor, ingrese nombres.",
        maxlength: "Debe ingresar m&aacute;ximo 50 carácteres.",
        minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
      },
      apellido: {
        required: "Por favor, ingrese apellidos.",
        maxlength: "Debe ingresar m&aacute;ximo 50 carácteres.",
        minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
      },
      nit: {
        required: "Por favor, ingrese NIT.",
        maxlength: "Debe ingresar m&aacute;ximo 17 dígitos.",
        minlength: "Debe ingresar m&iacute;nimo 17 dígitos."
      },
      dui: {
        required: "Por favor, ingrese DUI.",
        maxlength: "Debe ingresar m&aacute;ximo 10 dígitos.",
        minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
      },
      estado: {
        required: "Por favor, seleccione estado familiar."
      },
      telefono: {
        required: "Por favor, ingrese teléfono.",
        maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
        minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
      },
     correo: {
        required: "Por favor, ingrese correo electrónico.",
        maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
        minlength: "Debe ingresar m&iacute;nimo 10 carácteres."
      },
      direccion: {
        required: "Por favor, ingrese dirección.",
        maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
        minlength: "Debe ingresar m&iacute;nimo 10  carácteres."
      }
    }
  });


});


  $("#btneditar").click(function(){
    if($("#formempleado").valid()){

      $('#bandera').val("edit");
      $.ajax({
        type: 'POST',
        url: '../../../build/configuraciones/sql/empleado/crud_empleado.php',
        data: $("#formempleado").serialize()
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
              location.href='../../../produccion/administracion/empleado/lista_empleado.php';
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
                location.href='../../../produccion/administracion/empleado/lista_empleado.php';
            })
                
        }                
      })
      .fail(function(){
        alert('Hubo un error al cargar la Pagina')
      })
    }
    
  });