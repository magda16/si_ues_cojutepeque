 $(document).ready(function(){

  $('#privada').hide();
  
  

  $("#formredoc").validate({
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
      facultad:{
        required: true,
        number: true
      },
      carrera:{
        required: true,
        number: true
      },
      estudiante:{
        required: true,
        number: true
      }  
    },
    messages: {
      facultad: {
        required: "Por favor, seleccione facultad."
      },
      carrera: {
        required: "Por favor, seleccione carrera."
      },
      estudiante: {
        required: "Por favor, seleccione estudiante."
      }  
    }
  });

  $.ajax({
  type: 'POST',
  url: '../../select_generales/s_estudiante_facultad.php'
  })
  .done(function(lista_facultades){
    $('#facultad').html(lista_facultades)
  })
  .fail(function(){
    alert('Hubo un error al cargar las Facultades')
  })

});

$('#facultad').on('change', function(){
  var id = $('#facultad').val()
  $.ajax({
    type: 'POST',
    url: '../../select_generales/s_estudiante_carrera_facultad.php',
    data: {'id': id}
  })
  .done(function(lista_carreras){
    $('#carrera').html(lista_carreras)
  })
  .fail(function(){
    alert('Hubo un error al cargar las Carreras')
  })
});


$('#carrera').on('change', function(){
  var idfa = $('#facultad').val()
  var idca = $('#carrera').val()
    $.ajax({
      type: 'POST',
      url: '../../select_generales/s_estudiante_carrera.php',
      data: {'idfa': idfa, 'idca': idca}
    })
    .done(function(lista_estudiantes){
      $('#estudiante').html(lista_estudiantes)
    })
    .fail(function(){
      alert('Hubo un error al cargar los Estudiantes')
    })
});







$("#estudiante").on('change', function(){
  
  var estudiante = $("#estudiante").val();

  $.ajax({
    type: 'POST',
    url: '../../../build/configuraciones/sql/recepcion_documentos/obtenerDatosEstudiante.php',
    data: {'estudiante': estudiante}
  })
  .done(function(obtenerDatos){
      var datos = eval(obtenerDatos);
      $('#idestudiante').val(datos[0]);
      $('#carpeta').val(datos[1]);  
      if(datos[2]=="Privada"){ 
        $('#privada').show();
      }else{ 
        $('#privada').hide();
        $('#matricula').val("");
        $('#pcuota').val("");
      }         
  })
  .fail(function(){
    alert('Hubo un error al cargar la Pagina')
  })
});








$("#btnguardar").click(function(){
  if($("#formredoc").valid()){
    $('#bandera').val("add");
    var formData = new FormData($("#formredoc")[0]);
    $.ajax({
      type: 'POST',
      url: '../../../build/configuraciones/sql/recepcion_documentos/crud_recepcion_documentos.php',
      //datos del formulario
      data: formData,
      //necesario para subir archivos via ajax
      cache: false,
      contentType: false,
      processData: false,
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
            location.href='../../../produccion/administracion/recepcion_documentos/registrar_re_doc.php';
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
              location.href='../../../produccion/administracion/recepcion_documentos/registrar_re_doc.php';
          })   
      }                
    })
    .fail(function(){
      alert('Hubo un error al cargar la Pagina')
    })
  }
  
});
