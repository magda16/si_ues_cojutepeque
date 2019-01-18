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
  
      $("#formproveedor").validate({
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
          nombre_c: {
            letrasOespacio: true,
            required: true,
            minlength: 3,
            maxlength: 70
          },
          apellido_c: {
            letrasOespacio: true,
            required: true,
            minlength: 3,
            maxlength: 70
          },
          proveedor: {
            alfanumOespacio: true,
            required: true,
            minlength: 6,
            maxlength: 200
          },
          nit_p: {
            numero: true,
            required: true,
            minlength: 17,
            maxlength: 17
          },
          
         telefono_p: {
            numero: true,
            required: true,
            minlength: 9,
            maxlength: 9
          },
          correo_p: {
            correo: true,
            required: true,
            minlength: 10,
            maxlength: 90
          },
          direccion_p: {
            letrasOespacio: true,
            required: true,
            minlength: 10,
            maxlength: 200
          },
          descripcion_p: {
            alfanumOespacio: true,
            required: false,
            minlength: 10,
            maxlength: 200
          },
          observacion_p: {
            alfanumOespacio: true,
            required: false,
            minlength: 10,
            maxlength: 200
          }
        },

        messages: {
          nombre_c: {
            required: "Por favor, ingrese nombres.",
            maxlength: "Debe ingresar m&aacute;ximo 70 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
          },
          apellido_c: {
            required: "Por favor, ingrese apellidos.",
            maxlength: "Debe ingresar m&aacute;ximo 70 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 3 carácteres."
          },
          proveedor: {
            required: "Por favor, ingrese nombre proveedor.",
            maxlength: "Debe ingresar m&aacute;ximo 200 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 6 carácteres."
          },
          nit_p: {
            required: "Por favor, ingrese NIT.",
            maxlength: "Debe ingresar m&aacute;ximo 17 dígitos.",
            minlength: "Debe ingresar m&iacute;nimo 17 dígitos."
          },
          telefono_p: {
            required: "Por favor, ingrese teléfono.",
            maxlength: "Debe ingresar m&aacute;ximo 9 dígitos.",
            minlength: "Debe ingresar m&iacute;nimo 9 dígitos."
          },
         correo_p: {
            required: "Por favor, ingrese correo electrónico.",
            maxlength: "Debe ingresar m&aacute;ximo 90 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 10 carácteres."
          },
          direccion_p: {
            required: "Por favor, ingrese dirección.",
            maxlength: "Debe ingresar m&aacute;ximo 200 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 10  carácteres."
          },
          descripcion_p: {
            required: "Por favor, ingrese descripción.",
            maxlength: "Debe ingresar m&aacute;ximo 200 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 10  carácteres."
          },
          observacion_p: {
            required: "Por favor, ingrese observación.",
            maxlength: "Debe ingresar m&aacute;ximo 200 carácteres.",
            minlength: "Debe ingresar m&iacute;nimo 10  carácteres."
          }
        }
      });


  });

  $("#proveedor").blur(function(){
    var nombre = $("#proveedor").val();
    var tabla = "proveedor";
    var nombre_campo = "proveedor";
    if(nombre.length>5){
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/validar_nombre.php',
          data: {'nombre': nombre, 'tabla': tabla, 'nombre_campo': nombre_campo}
        })
        .done(function(resultado_ajax){
          if(resultado_ajax!==""){
            $("#proveedor").val("");
            $('#resultproerror').text("Nombre Ya Existe");
            $('#resultpro').removeClass('has-success').addClass('has-error');
          }
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
  });


  $("#nit_p").blur(function(){
    var nombre = $("#nit_p").val();
    var tabla = "proveedor";
    var nombre_campo = "NIT_p";
    if(nombre.length>5){
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/validar_nombre.php',
          data: {'nombre': nombre, 'tabla': tabla, 'nombre_campo': nombre_campo}
        })
        .done(function(resultado_ajax){
          if(resultado_ajax!==""){
            $("#nit_p").val("");
            $('#resultniterror').text("NIT Ya Existe");
            $('#resultnit').removeClass('has-success').addClass('has-error');
          }
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
  });

  $("#telefono_p").blur(function(){
    var nombre = $("#telefono_p").val();
    var tabla = "proveedor";
    var nombre_campo = "telefono_p";
    if(nombre.length>5){
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/validar_nombre.php',
          data: {'nombre': nombre, 'tabla': tabla, 'nombre_campo': nombre_campo}
        })
        .done(function(resultado_ajax){
          if(resultado_ajax!==""){
            $("#telefono_p").val("");
            $('#resultelerror').text("Teléfono Ya Existe");
            $('#resultel').removeClass('has-success').addClass('has-error');
          }
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
  });

  $("#correo_p").blur(function(){
    var nombre = $("#correo_p").val();
    var tabla = "proveedor";
    var nombre_campo = "correo_p";
    if(nombre.length>5){
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/validar_nombre.php',
          data: {'nombre': nombre, 'tabla': tabla, 'nombre_campo': nombre_campo}
        })
        .done(function(resultado_ajax){
          if(resultado_ajax!==""){
            $("#correo_p").val("");
            $('#resultcorerror').text("Correo Ya Existe");
            $('#resultcor').removeClass('has-success').addClass('has-error');
          }
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
  });
  
 
  
  
    $("#btnguardar").click(function(){
      if($("#formproveedor").valid()){

        $('#bandera').val("add");
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/proveedor/crud_proveedor.php',
          data: $("#formproveedor").serialize()
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
                location.href='../../../produccion/administracion/proveedor/registrar_proveedor.php';
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
                  location.href='../../../produccion/administracion/proveedor/registrar_proveedor.php';
              })
                  
          }                
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
      
    });