$(document).ready(function(){
    $("#divrepresentante").hide();
    
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

  $("#formfacultad").validate({
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
      telefono_f: {
        numero:true,
        required: true,
        minlength: 9,
        maxlength: 9
      },
      correo_f: {
        correo: true,
        required: true
      },
      representante:{
          required: true,
          number: true
      }
    },
    messages: {
      telefono_f: {
        required: "Por favor, ingrese teléfono.",
        maxlength: "Debe ingresar 9 dígitos.",
        minlength: "Debe ingresar 9 dígitos."
      },
      correo_f: {
        required: "Por favor, ingrese una dirección de correo válida."
      },
      representante: {
        required: "Por favor, seleccione un representante."
      }
    }
  });

});


  $("#nombre").blur(function(){
    var nombre = $("#nombre").val();
    var validarcampo = $("#validarcampo").val();
    if(nombre !== validarcampo){
    var tabla = "carrera";
    var nombre_campo = "nombre_ca";
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
    }
  });

  $('input[type=checkbox]').on('change', function() {
    if ($(this).is(':checked') ) {
        $("#divrepresentante").show();
    } else {
        $("#divrepresentante").hide();
    }
  });
  
  $('#representante').on('change', function() {
    $('#represent').val($('#representante').val())
    alert($('#representante').val());
  });

  $("#nombre").keypress(function(e) {
       if(e.which == 13) {
          $('#btneditar').click();
       }
    });

  $("#btneditar").click(function(){
    if($("#formfacultad").valid()){
      $('#bandera').val("edit");
      $.ajax({
        type: 'POST',
        url: '../../../build/configuraciones/sql/facultad/crud_facultad.php',
        data: $("#formfacultad").serialize()
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
              location.href='../../../produccion/administracion/facultad/lista_facultad.php';
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
                location.href='../../../produccion/administracion/facultad/lista_facultad.php';
            })
                
        }                
      })
      .fail(function(){
        alert('Hubo un error al cargar la Pagina')
      })
    }
    
  });
