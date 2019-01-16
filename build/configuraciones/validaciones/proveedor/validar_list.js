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
          url: '../../../produccion/administracion/proveedor/mostrar_proveedor.php',
          data: {'id': id}
        })
        .done(function(resultado_ajax){
          $('#insertarhtmlproveedor').html(resultado_ajax)
          $('#datosProveedor').modal({show:true});
        })
        .fail(function(){
            alert('Hubo un error al cargar la Pagina')
        })
  }

  function editarproveedor(id){
    $('#id').val(id);
    $("#fromeditarproveedor").submit();
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
                      url: '../../../build/configuraciones/sql/proveedor/crud_proveedor.php',
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
                                location.href='../../../produccion/administracion/proveedor/lista_proveedor.php';
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
                                location.href='../../../produccion/administracion/proveedor/lista_proveedor.php';
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
                        location.href='../../../produccion/administracion/proveedor/lista_proveedor.php';
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
                      url: '../../../build/configuraciones/sql/proveedor/crud_proveedor.php',
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
                                location.href='../../../produccion/administracion/proveedor/lista_proveedor_alta.php';
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
                                location.href='../../../produccion/administracion/proveedor/lista_proveedor_alta.php';
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
                        location.href='../../../produccion/administracion/aula/proveedor/lista_proveedor_alta.php';
                    })
                }
                });
          
        }
    });
  
    