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
  
      $("#formestudiante").validate({
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

          carnet: {
            alfanumOespacio: true,
            required: true,
            minlength: 6,
            maxlength: 7
          },

          nombre_e: {
            letrasOespacio: true,
            required: true,
            minlength: 7,
            maxlength: 50
          },

          apellido_e: {
            letrasOespacio: true,
            required: true,
            minlength: 7,
            maxlength: 50
          },

          nit_e: {
            numero: true,
            required: true,
            minlength: 17,
            maxlength: 17
          },

          dui_e: {
            numero: true,
            required: true,
            minlength: 10,
            maxlength: 10
          },

         telefono_e: {
            numero: true,
            required: true,
            minlength: 9,
            maxlength: 9
          },

          correo_e: {
            correo: true,
            required: true,
            minlength: 10,
            maxlength: 80
          },

          direccion_e: {
            letrasOespacio: true,
            required: true,
            minlength: 10,
            maxlength: 80
          },
             
          facultad:{
            required: true,
            number: true
        },
          carrera:{
            required: true,
            number: true
          }
         
        },

        messages: {
          
          carnet: {
            required: "Por favor, ingrese carnet.",
            maxlength: "Debe ingresar m&aacute;ximo 7 dígitos ó carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 6 dígitos ó carácteres."
          },

          nombre_e: {
            required: "Por favor, ingrese nombres.",
            maxlength: "Debe ingresar m&aacute;ximo 50 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
          },

          apellido_e: {
            required: "Por favor, ingrese apellidos.",
            maxlength: "Debe ingresar m&aacute;ximo 50 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 7 carácteres."
          },

          nit_e: {
            required: "Por favor, ingrese NIT.",
            maxlength: "Debe ingresar m&aacute;ximo 17 dígitos.",
            minlength: "Debe ingresar m&iacute;nimo 17 dígitos."
          },

          dui_e: {
            required: "Por favor, ingrese DUI.",
            maxlength: "Debe ingresar m&aacute;ximo 10 dígitos.",
            minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
          },

          telefono_e: {
            required: "Por favor, ingrese teléfono.",
            maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
            minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
          },

         correo_e: {
            required: "Por favor, ingrese correo electrónico.",
            maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 10 carácteres."
          },
          
          direccion_e: {
            required: "Por favor, ingrese dirección.",
            maxlength: "Debe ingresar m&aacute;ximo 80 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 10  carácteres."
          },
          facultad: {
            required: "Por favor, seleccione facultad."
          },
          carrera: {
              required: "Por favor, seleccione carrera."
           }
          
        }
      });

      
    $('#facultad').on('change', function(){
      var id = $('#facultad').val()
      $.ajax({
        type: 'POST',
        url: '../../../produccion/administracion/estudiante/comboCarrera_lista.php',
        data: {'id': id}
      })
      .done(function(listas_rep){
        $('#carrera').html(listas_rep)
      })
      .fail(function(){
        alert('Hubo un errror al cargar las Carreras')
      })
    })
  
   





  });
  
    $("#carrera").keypress(function(e) {
         if(e.which == 13) {
            $('#btnguardar').click();
         }
      });
  
    $("#btnguardar").click(function(){
      if($("#formestudiante").valid()){
       document.getElementById('bandera').value="add";
        $("#formestudiante").submit();
      }
      
    });
  