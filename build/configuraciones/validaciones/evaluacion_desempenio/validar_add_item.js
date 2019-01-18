$(document).ready(function(){
   
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
        criterio:{
            required: true,
            number: true
        }
      },
      messages: {
        nombre: {
          required: "Por favor, ingrese nombre.",
          maxlength: "Debe ingresar m&aacute;ximo 200 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
        },
        criterio: {
          required: "Por favor, seleccione un criterio."
        }
      }
    });

    var cant = $("#canmax").val();
      for(i=cant; i<9; i++){
        var cadena="<div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12' for='nombre'>Item "+i+": <span class='required' style='color: #CD5C5C;'> *</span></label><div class='col-md-6 col-sm-6 col-xs-12'><input type='text' id='item[]' name='item[]' required='required' placeholder='Digite Nombre del Item' class='form-control col-md-7 col-xs-12' tabindex='1'></div><span class='help-block' id='error'></span></div>";
        $('#insertaritem').append(cadena);
      }
    
});


  $("#btnguardar").click(function(){
    if($("#formed").valid()){
     $('#bandera').val("item");
      $.ajax({
        type: 'POST',
        url: '../../../build/configuraciones/sql/evaluacion_desempenio/crud_evaluaciond.php',
        data: $("#formed").serialize()
      })
        .done(function(listas_rep){
          //  alert(listas_rep);
          if(listas_rep === "Exito"){
            swal({ 
              title:'Éxito',
              text: 'Datos Almacenados',
              type: 'success'
            },
              function(){
                //event to perform on click of ok button of sweetalert
                location.href='../../../produccion/administracion/evaluacion_desempenio/listar_evaluaciond.php';
              })
            }
              if(listas_rep === "Error"){
                $("#nombre").val("");
                swal("Advertencia", "Sin Conexión Dase Datos", "warning")
              }                
              })
          .fail(function(){
            alert('Hubo un error al cargar la Pagina')
          })
    }
    
  });


  