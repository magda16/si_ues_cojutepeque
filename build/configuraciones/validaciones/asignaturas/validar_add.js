 $(document).ready(function(){

  $("#formplanestudio").validate({
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
      } 
    },
    messages: {
      facultad: {
        required: "Por favor, seleccione facultad."
      },
      carrera: {
        required: "Por favor, seleccione carrera."
      } 
    }
  });

  $.ajax({
  type: 'POST',
  url: '../../select_generales/f_facultad_carrera.php'
  })
  .done(function(lista_facultades){
    $('#facultad').html(lista_facultades)
  })
  .fail(function(){
    alert('Hubo un error al cargar las Facultades')
  })

  $.validator.addMethod("numero", function(value, element) {
    return /^[ 0-9-()]*$/i.test(value);
  }, "Ingrese sólo números");

  $("#fromplan").validate({
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
        anio: {
        numero: true,
        required: true,
        minlength: 3,
        maxlength: 200
      }
    },
    messages: {
        anio: {
        required: "Por favor, ingrese año.",
        maxlength: "Debe ingresar m&aacute;ximo 4 dígitos.",
        minlength: "Debe ingresar m&iacute;nimo 4 dígitos."
      }
    }
  });

});

$('#facultad').on('change', function(){
  var id = $('#facultad').val()
  $.ajax({
    type: 'POST',
    url: '../../select_generales/c_carrera_facultad.php',
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
  var id = $('#carrera').val()
  $.ajax({
    type: 'POST',
    url: '../../select_generales/pe_planestudio.php',
    data: {'id': id}
  })
  .done(function(lista_planestudio){
    $('#plan').html(lista_planestudio)
  })
  .fail(function(){
    alert('Hubo un error al cargar los Planes de Estudio')
  })
});


$('#agregar_planestudio').on('click', function(){
  if($("#formplanestudio").valid()){
    $('#registro_plan').modal({show:true});
  }
});




$("#modalguardar").click(function(){
  if($("#fromplan").valid()){

      swal({
          title: "Advertencia",
          text: "¿Esta Seguro que Desea Almacenar el Registro",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Si",
          cancelButtonText: "No",
          closeOnConfirm: false,
          closeOnCancel: false },
          
          function(isConfirm){
          if (isConfirm) {
              //Si

              var bandera = "addplanestudio";
              var anio = $('#anio').val();
              var carrera = $('#carrera').val();

              $.ajax({
                type: 'POST',
                url: '../../../build/configuraciones/sql/asignaturas/crud_asignaturas.php',
                data: {'bandera' : bandera, 'anio': anio, 'carrera' : carrera}
              })
              .done(function(resultado_ajax){
                  if(resultado_ajax === "Exito"){
                      $("#carrera").val("");
                      $('#registro_plan').modal('hide'); 
                      swal({ 
                        title:'Éxito',
                        text: 'Datos Almacenados',
                        type: 'success'
                      },
                       function(){
                          //event to perform on click of ok button of sweetalert
                          location.href='../../../produccion/administracion/asignaturas/registrar_asignaturas.php';
                      })
  
                  }
                  if(resultado_ajax === "Error"){ 
                    $('#registro_plan').modal('hide'); 
                    swal({ 
                      title:'Advertencia',
                      text: 'Sin Conexión Dase Datos',
                      type: 'warning'
                    },
                      function(){
                          //event to perform on click of ok button of sweetalert
                          location.href='../../../produccion/administracion/asignaturas/registrar_asignaturas.php';
                      })
                  }                
              })
              .fail(function(){
                  alert('Hubo un error al cargar la Pagina')
              })
          } else {
              $('#registro_plan').modal('hide');
              swal({ 
                  title:'Éxito',
                  text: 'Actualización Cancelada',
                  type: 'success'
              },
              function(){
                  //event to perform on click of ok button of sweetalert
                  location.href='../../../produccion/administracion/asignaturas/registrar_asignaturas.php';
              })
          }
          });
    
  }
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
