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
        cargo: {
            required: true,
            number: true
        },
        nombre: {
          letrasOespacio: true,
          required: true,
          minlength: 3,
          maxlength: 50
        },
        apellido: {
          letrasOespacio: true,
          required: true,
          minlength: 3,
          maxlength: 50
        },
        dui: {
          numero: true,
          required: true,
          minlength: 9,
          maxlength: 9
        },
        nit: {
          numero: true,
          required: true,
          minlength: 17,
          maxlength: 17
        },
        direccion: {
          alfanumOespacio: true,
          required: true,
          minlength: 6
        },
        especialidad: {
          required: true,
          number: true
        },
        
        telefono: {
          alfanumOespacio: true,
          required: true,
          minlength: 9
        },
        
        correo: {
          alfanumOespacio: true,
          required: true,
          minlength: 6
        }
      },
      
      messages: {
        cargo: {
            required: "Por favor, seleccione cargo."
        },
        nombre: {
          required: "Por favor, ingrese nombre.",
          maxlength: "Debe ingresar m&aacute;ximo 50 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
        },
        apellido: {
          required: "Por favor, ingrese apellido.",
          maxlength: "Debe ingresar m&aacute;ximo 50 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
        },
        dui: {
          required: "Por favor, ingrese DUI.",
          maxlength: "Debe ingresar 9 dígitos.",
          minlength: "Debe ingresar 9 dígitos."
        },
        nit: {
          required: "Por favor, ingrese NIT.",
          maxlength: "Debe ingresar 17 dígitos.",
          minlength: "Debe ingresar 17 dígitos."
        },
        direccion: {
          required: "Por favor, ingrese direcci&oacute;n.",
          minlength: "Debe ingresar m&iacute;nimo 6 dígitos."
        },
        especialidad: {
          required: "Por favor, seleccione especialidad."
        },

        
        telefono: {
          required: "Por favor, ingrese teléfono.",
          maxlength: "Debe ingresar m&aacute;ximo 50 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
        },

        
        correo: {
          required: "Por favor, ingrese una direccion de Correo.",
          maxlength: "Debe ingresar m&aacute;ximo 80 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
        }
        
      }
    });

});

  $("#especialidad").keypress(function(e) {
       if(e.which == 13) {
          $('#btnguardar').click();
       }
    });

  $("#btnguardar").click(function(){
    if($("#formempleado").valid()){
     document.getElementById('bandera').value="add";
      $("#formempleado").submit();
    }
    
  });
 
