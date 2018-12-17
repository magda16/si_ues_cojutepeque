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

  $("#formrepresentante").validate({
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
      nombres_r: {
        letrasOespacio: true,
        required: true,
        minlength: 3,
        maxlength: 150
      },
      apellidos_r: {
        letrasOespacio: true,
        required: true,
        minlength: 4,
        maxlength: 150
      },
      telefono_r: {
        numero:true,
        required: true,
        minlength: 9,
        maxlength: 9
      },
      
      correo_r: {
        correo: true,
        required: true
      }
    },
    messages: {
      nombres_r: {
        required: "Por favor, ingrese nombre.",
        minlength: "Debe ingresar m&iacute;nimo 3 dígitos.",
        maxlength: "Debe ingresar m&aacute;ximo 150 dígitos."
        
      },
      apellidos_r: {
        required: "Por favor, ingrese apellido.",
        minlength: "Debe ingresar m&iacute;nimo 4 dígitos.",
        maxlength: "Debe ingresar m&aacute;ximo 150 dígitos."
        
      },
      telefono_r: {
        required: "Por favor, ingrese teléfono.",
        maxlength: "Debe ingresar 9 dígitos.",
        minlength: "Debe ingresar 9 dígitos."
      },
      correo_r: {
        required: "Por favor, ingrese una dirección de correo válida."
      }
    }
  });
  
  });
    $("#telefono_r").blur(function(){
      var nombre = $("#telefono_r").val();
      var tabla = "representante_facultad";
      var nombre_campo = "telefono_rf";
      if(nombre.length>8){
          $.ajax({
            type: 'POST',
            url: '../../../build/configuraciones/sql/validar_nombre.php',
            data: {'nombre': nombre, 'tabla': tabla, 'nombre_campo': nombre_campo}
          })
          .done(function(resultado_ajax){
            if(resultado_ajax!==""){
              $("#telefono_r").val("");
              $('#resultelerror').text("Teléfono Ya Existe");
              $('#resultel').removeClass('has-success').addClass('has-error');
            }
          })
          .fail(function(){
            alert('Hubo un error al cargar la Pagina')
          })
        }
    });

    $("#correo_r").blur(function(){
      var nombre = $("#correo_r").val();
      var tabla = "representante_facultad";
      var nombre_campo = "correo_rf";
      if(nombre.length>5){
          $.ajax({
            type: 'POST',
            url: '../../../build/configuraciones/sql/validar_nombre.php',
            data: {'nombre': nombre, 'tabla': tabla, 'nombre_campo': nombre_campo}
          })
          .done(function(resultado_ajax){
            if(resultado_ajax!==""){
              $("#correo_r").val("");
              $('#resultcorerror').text("Correo Ya Existe");
              $('#resultcor').removeClass('has-success').addClass('has-error');
            }
          })
          .fail(function(){
            alert('Hubo un error al cargar la Pagina')
          })
        }
    });

  
    $("#correo_r").keypress(function(e) {
         if(e.which == 13) {
            $('#btnguardar').click();
         }
      });
  
    $("#btnguardar").click(function(){
      if($("#formrepresentante").valid()){
        $('#bandera').val("add");
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/representante/crud_representante.php',
          data: $("#formrepresentante").serialize()
        })
        .done(function(resultado_ajax){
          alert(resultado_ajax);
          if(resultado_ajax === "Exito"){
            swal({ 
              title:'Éxito',
              text: 'Datos Almacenados',
              type: 'success'
            },
              function(){
                //event to perform on click of ok button of sweetalert
                location.href='../../../produccion/administracion/representante/registrar_representante.php';
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
                  location.href='../../../produccion/administracion/representante/registrar_representante.php';
              })
                  
          }                
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
      
    });
  