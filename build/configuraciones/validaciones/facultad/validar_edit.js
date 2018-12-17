$(document).ready(function(){
    
    $.validator.addMethod("letrasOespacio", function(value, element) {
        return /^[ a-záéíóúüñ]*$/i.test(value);
    }, "Ingrese sólo letras o espacios.");

    $.validator.addMethod("alfanumOespacio", function(value, element) {
        return /^[ a-z0-9áéíóúüñ.,]*$/i.test(value);
    }, "Ingrese sólo letras, números o espacios.");

    $("#formcarrera").validate({
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
          maxlength: 200
        }
      },
      messages: {
        nombre: {
          required: "Por favor, ingrese nombre.",
          maxlength: "Debe ingresar m&aacute;ximo 200 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
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


  $("#nombre").keypress(function(e) {
       if(e.which == 13) {
          $('#btneditar').click();
       }
    });

  $("#btneditar").click(function(){
    if($("#formcarrera").valid()){
      $('#bandera').val("edit");
      $.ajax({
        type: 'POST',
        url: '../../../build/configuraciones/sql/carrera/crud_carrera.php',
        data: $("#formcarrera").serialize()
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
              location.href='../../../produccion/administracion/carrera/lista_carrera.php';
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
                location.href='../../../produccion/administracion/carrera/lista_carrera.php';
            })
                
        }                
      })
      .fail(function(){
        alert('Hubo un error al cargar la Pagina')
      })
    }
    
  });
