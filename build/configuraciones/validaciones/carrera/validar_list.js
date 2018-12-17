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
          url: '../../../produccion/administracion/carrera/mostrar_carrera.php',
          data: {'id': id}
        })
        .done(function(resultado_ajax){
          $('#insertarhtmlcarrera').html(resultado_ajax)
          $('#datosCarrera').modal({show:true});
        })
        .fail(function(){
            alert('Hubo un error al cargar la Pagina')
        })
  }

  function editarcarrera(id){
    $('#id').val(id);
    $("#fromeditarcarrera").submit();
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
                      url: '../../../build/configuraciones/sql/carrera/crud_carrera.php',
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
                                location.href='../../../produccion/administracion/carrera/lista_carrera.php';
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
                                location.href='../../../produccion/administracion/carrera/lista_carrera.php';
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
                        location.href='../../../produccion/administracion/carrera/lista_carrera.php';
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
                      url: '../../../build/configuraciones/sql/carrera/crud_carrera.php',
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
                                location.href='../../../produccion/administracion/carrera/lista_carrera_alta.php';
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
                                location.href='../../../produccion/administracion/carrera/lista_carrera_alta.php';
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
                        location.href='../../../produccion/administracion/carrera/lista_carrera_alta.php';
                    })
                }
                });
          
        }
    });
  
    