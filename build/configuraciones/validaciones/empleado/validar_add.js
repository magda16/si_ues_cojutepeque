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
      minlength: 10,
      maxlength: 10
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
    },
    messages: {
     
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
      maxlength: "Debe ingresar 10 dígitos.",
      minlength: "Debe ingresar 10 dígitos."
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
    telefono: {
      required: "Por favor, ingrese teléfono.",
      maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
      minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
    },

    
    correo: {
      required: "Por favor, ingrese una direccion de Correo.",
      maxlength: "Debe ingresar m&aacute;ximo 80 dígitos.",
      minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
    },
    }
  });


});
    

    $("#nombre").blur(function(){
      var nombre = $("#nombre").val();
      var tabla = "empleado";
      var nombre_campo = "nombre_em";
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

  
    $("#btnguardar").click(function(){
      if($("#formempleado").valid()){
        $('#bandera').val("add");
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/empleado/crudEmpleado.php',
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
                location.href='../../../produccion/administracion/empleado/registrar_empleado.php';
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
                  location.href='../../../produccion/administracion/empleado/registrar_empleado.php';
              })
                  
          }                
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
      
    });

    $("#btneditar").click(function(){
      if($("#formempleado").valid()){
        $('#bandera').val("edit");
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/empleado/crudEmpleado.php',
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
                location.href='../../../produccion/administracion/empleado/listaEmpleado.php';
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
                  location.href='../../../produccion/administracion/empleado/listaEmpleado.php';
              })
                  
          }                
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
      
    });
  