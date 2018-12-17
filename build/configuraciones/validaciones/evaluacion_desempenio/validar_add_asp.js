$(document).ready(function(){

    $('#info').hide();
      
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
    
});

$("#evaluacion").blur(function(){
  
  var evaluacion = $("#evaluacion").val();

  $.ajax({
    type: 'POST',
    url: '../../../build/configuraciones/sql/evaluacion_desempenio/obtenerEvaluacion.php',
    data: {'evaluacion': evaluacion}
  })
  .done(function(obtenerDatos){
      alert(obtenerDatos);
      var datos = eval(obtenerDatos);
      $('#nombre_ed').val(datos[0]);
      $('#criterio_ed').val(datos[1]);
      var cant = 3;
      for(i=1; i<= cant; i++){
        var cadena="<div class='form-group'><label class='control-label col-md-3 col-sm-3 col-xs-12' for='nombre'>Aspecto "+i+": <span class='required' style='color: #CD5C5C;'> *</span></label><div class='col-md-6 col-sm-6 col-xs-12'><input type='text' id='aspecto[]' name='aspecto[]' required='required' placeholder='Digite Nombre del Aspecto' class='form-control col-md-7 col-xs-12' tabindex='1'></div><span class='help-block' id='error'></span></div>";
        $('#insertaraspecto').append(cadena);
      }
      $('#ed').hide();
      $('#info').show();                      
  })
  .fail(function(){
    alert('Hubo un error al cargar la Pagina')
  })
});


$("#btnguardar").click(function(){
  if($("#formed").valid()){
    $('#bandera').val("aspecto");
    $.ajax({
      type: 'POST',
      url: '../../../build/configuraciones/sql/evaluacion_desempenio/crud_evaluaciond.php',
      data: $("#formed").serialize()
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
            location.href='../../../produccion/administracion/evaluacion_desempenio/lista_evaluaciond.php';
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
              location.href='../../../produccion/administracion/evaluacion_desempenio/registrar_asp_evaluaciond.php';
          })
              
      }                
    })
    .fail(function(){
      alert('Hubo un error al cargar la Pagina')
    })
  }
  
});