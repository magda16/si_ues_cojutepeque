$(document).ready(function(){

  $.validator.addMethod("alfanumOespacio", function(value, element) {
      return /^[ a-z0-9-()áéíóúüñ.,]*$/i.test(value);
  }, "Ingrese sólo letras, números o espacios.");

  $("#fromdarbaja").validate({
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
        observacion: {
        alfanumOespacio: true,
        required: true,
        minlength: 3,
        maxlength: 200
      }
    },
    messages: {
        observacion: {
        required: "Por favor, ingrese observacion.",
        maxlength: "Debe ingresar m&aacute;ximo 200 dígitos.",
        minlength: "Debe ingresar m&iacute;nimo 3 dígitos."
      }
    }
  });
  
});

function ver(id){
$.ajax({
      type: 'POST',
      url: '../../../produccion/administracion/estudiante/mostrar_estudiante.php',
      data: {'id': id}
    })
    .done(function(resultado_ajax){
      $('#insertarhtmlestudiante').html(resultado_ajax)
      $('#datosEstudiante').modal({show:true});
    })
    .fail(function(){
        alert('Hubo un error al cargar la Pagina')
    })
}

function editarestudiante(id){
  $('#id').val(id);
  $("#fromeditarestudiante").submit();
}

function confirmar(id){
  $('#baccion').val(id);
  $('#darBaja').modal({show:true});
}

function confirmaralta(id){
  $('#baccion').val(id);
  $('#darBaja').modal({show:true});
}


$("#modalguardar").click(function(){
    if($("#fromdarbaja").valid()){

        swal({
            title: "Advertencia",
            text: "¿Desea Dar Baja a Este Registro?",
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
                
                var observacion = $('#observacion').val();
                var bandera = "darbaja";
                var baccion = $('#baccion').val();

                $.ajax({
                  type: 'POST',
                  url: '../../../build/configuraciones/sql/estudiante/crud_estudiante.php',
                  data: {'observacion': observacion, 'bandera' : bandera, 'baccion' : baccion}
                })
                .done(function(resultado_ajax){
                    if(resultado_ajax === "Exito"){
                        $("#observacion").val("");
                        $('#darBaja').modal('hide'); 
                        swal({ 
                          title:'Éxito',
                          text: 'Datos Almacenados',
                          type: 'success'
                        },
                         function(){
                            //event to perform on click of ok button of sweetalert
                            location.href='../../../produccion/administracion/estudiante/lista_estudiante.php';
                        })
    
                    }
                    if(resultado_ajax === "Error"){ 
                      $('#darBaja').modal('hide'); 
                      swal({ 
                        title:'Advertencia',
                        text: 'Sin Conexión Dase Datos',
                        type: 'warning'
                      },
                        function(){
                            //event to perform on click of ok button of sweetalert
                            location.href='../../../produccion/administracion/estudiante/lista_estudiante.php';
                        })
                    }                
                })
                .fail(function(){
                    alert('Hubo un error al cargar la Pagina')
                })
            } else {
                $('#darBaja').modal('hide');
                swal({ 
                    title:'Éxito',
                    text: 'Actualización Cancelada',
                    type: 'success'
                },
                function(){
                    //event to perform on click of ok button of sweetalert
                    location.href='../../../produccion/administracion/estudiante/lista_estudiante.php';
                })
            }
            });
      
    }
});

$("#modalguardaralta").click(function(){
    if($("#fromdarbaja").valid()){

        swal({
            title: "Advertencia",
            text: "¿Desea Dar Alta a Este Registro?",
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
                
                var observacion = $('#observacion').val();
                var bandera = "daralta";
                var baccion = $('#baccion').val();

                $.ajax({
                  type: 'POST',
                  url: '../../../build/configuraciones/sql/estudiante/crud_estudiante.php',
                  data: {'observacion': observacion, 'bandera' : bandera, 'baccion' : baccion}
                })
                .done(function(resultado_ajax){
                    if(resultado_ajax === "Exito"){
                        $("#observacion").val("");
                        $('#darBaja').modal('hide'); 
                        swal({ 
                          title:'Éxito',
                          text: 'Datos Almacenados',
                          type: 'success'
                        },
                         function(){
                            //event to perform on click of ok button of sweetalert
                            location.href='../../../produccion/administracion/estudiante/lista_estudiante_alta.php';
                        })
    
                    }
                    if(resultado_ajax === "Error"){ 
                      $('#darBaja').modal('hide'); 
                      swal({ 
                        title:'Advertencia',
                        text: 'Sin Conexión Dase Datos',
                        type: 'warning'
                      },
                        function(){
                            //event to perform on click of ok button of sweetalert
                            location.href='../../../produccion/administracion/estudiante/lista_estudiante_alta.php';
                        })
                    }                
                })
                .fail(function(){
                    alert('Hubo un error al cargar la Pagina')
                })
            } else {
                $('#darBaja').modal('hide');
                swal({ 
                    title:'Éxito',
                    text: 'Actualización Cancelada',
                    type: 'success'
                },
                function(){
                    //event to perform on click of ok button of sweetalert
                    location.href='../../../produccion/administracion/estudiante/lista_estudiante_alta.php';
                })
            }
            });
      
    }
});


////////////
$.ajax({
    type: 'POST',
    url: '../../select_generales/f_estudiante_facultad_j.php'
    })
    .done(function(lista_facultades){
      $('#facultad').html(lista_facultades)
    })
    .fail(function(){
      alert('Hubo un error al cargar las Facultades')
    })
  
  $('#facultad').on('change', function(){
    var id = $('#facultad').val()
    $.ajax({
      type: 'POST',
      url: '../../select_generales/c_estudiante_carrera_facultad_j.php',
      data: {'id': id}
    })
    .done(function(lista_carreras){
      $('#carrera').html(lista_carreras)
    })
    .fail(function(){
      alert('Hubo un error al cargar las Carreras')
    })
  });


  $("#carrera").on('change', function(){
  
    var carrera = $("#carrera").val();
    var estado =  $("#estado").val();
    
    var table = $('#datatable-responsive').DataTable();
    $.ajax({
      type: 'POST',
      url: '../../../produccion/administracion/estudiante/tabla_lista_estudiante.php',
      data: {'carrera': carrera, 'estado': estado}
    })
    .done(function(obtenerDatos){
      table.destroy();
      $('#div_tabla_estudiante').html(obtenerDatos);
      table=$('#datatable-responsive').DataTable();
                     
    })
    .fail(function(){
      alert('Hubo un error al cargar la Pagina')
    })
  });
  