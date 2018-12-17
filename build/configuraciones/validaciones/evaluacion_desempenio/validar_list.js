$(document).ready(function(){
      
    $.validator.addMethod("alfanumOespacio", function(value, element) {
      return /^[ a-z0-9-()áéíóúüñ.,]*$/i.test(value);
  }, "Ingrese sólo letras, números o espacios.");

  $("#frommod").validate({
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
        minlength: 10,
        maxlength: 200
      },

      criterio: {
        alfanumOespacio: true,
        required: true,
        minlength: 10,
        maxlength: 200
      }
    },
    messages: {
        nombre: {
        required: "Por favor, ingrese evaluacion.",
        maxlength: "Debe ingresar m&aacute;ximo 200 carácteres.",
        minlength: "Debe ingresar m&iacute;nimo 10 carácteres."
      },

      criterio: {
        required: "Por favor, ingrese criterio.",
        maxlength: "Debe ingresar m&aacute;ximo 200 carácteres.",
        minlength: "Debe ingresar m&iacute;nimo 10 carácteres."
      }
    }
  });

    $("#fromeditaspecto").validate({
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
        aspecto: {
          alfanumOespacio: true,
          required: true,
          minlength: 10,
          maxlength: 200
        }
      },
      messages: {
        aspecto: {
          required: "Por favor, ingrese nombre del aspecto.",
          maxlength: "Debe ingresar m&aacute;ximo 200 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
        }
      }
    });

    $("#fromedititem").validate({
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
        item: {
          alfanumOespacio: true,
          required: true,
          minlength: 10,
          maxlength: 200
        }
      },
      messages: {
        item: {
          required: "Por favor, ingrese nombre del item.",
          maxlength: "Debe ingresar m&aacute;ximo 200 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 10 dígitos."
        }
      }
    });

  


    
      
});


function editaspecto(id, aspecto){
  $('#baccion').val(id);
  $('#aspecto').val(aspecto);
  $('#editaspecto').modal({show:true});
}

function edititem(id, item){
  $('#baccion').val(id);
  $('#item').val(item);
  $('#edititem').modal({show:true});
}

$("#evaluacion").blur(function(){
  
    var evaluacion = $("#evaluacion").val();

    
  
    $.ajax({
      type: 'POST',
      url: '../../../produccion/administracion/evaluacion_desempenio/llenar_t_evaluaciond.php',
      data: {'evaluacion': evaluacion}
    })
    .done(function(obtenerDatos){
        $('#agregar_t').html(obtenerDatos);
                       
    })
    .fail(function(){
      alert('Hubo un error al cargar la Pagina')
    })
  });

  $("#modalguardar").click(function(){
    if($("#frommod").valid()){

        
                var nombre = $('#nombre').val();
                var criterio = $('#criterio').val();
                var bandera = "modificar";
                var baccion = $('#baccion').val();
                
                $.ajax({
                  type: 'POST',
                  url: '../../../build/configuraciones/sql/evaluacion_desempenio/crud_evaluaciond.php',
                  data: {'nombre': nombre, 'criterio': criterio, 'bandera' : bandera, 'baccion' : baccion}
                })
                .done(function(listas_rep){
                    if(listas_rep === "Exito"){
                        $("#nombre").val("");
                        $("#criterio").val("");
                        $('#moded').modal('hide'); 
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
                    if(listas_rep === "Error"){
                      $("#nombre").val("");
                      $("#criterio").val("");
                      $('#moded').modal('hide'); 
                      swal("Advertencia", "Sin Conexión Dase Datos", "warning")
                    }                
                    })
                    .fail(function(){
                      alert('Hubo un error al cargar la Pagina')
                    })
           
      
    }
});

  $("#btnEAspecto").click(function(){
    if($("#fromeditaspecto").valid()){

   
     var bandera = "editaraspecto";
     var aspecto =  $('#aspecto').val();
     var baccion =  $('#baccion').val();
     var eva =  $('#evaluacion').val();
   //  alert(eva);
     
      $.ajax({
        type: 'POST',
        url: '../../../build/configuraciones/sql/evaluacion_desempenio/crud_evaluaciond.php',
        data: {'bandera' : bandera, 'aspecto' : aspecto, 'baccion' : baccion}
      })
        .done(function(listas_rep){
          if(listas_rep === "Exito"){
            swal({ 
              title:'Éxito',
              text: 'Datos Almacenados',
              type: 'success'
            },
              function(){
                //event to perform on click of ok button of sweetalert
                //location.href='../../../produccion/Administracion/Evaluacion_Desempenio/listar_evaluaciond.php';
              
                $('#editaspecto').modal('hide'); 
                $("#evaluacion").val(eva);
                $('#evaluacion').blur();
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


  $("#btnEItem").click(function(){
    if($("#fromedititem").valid()){

   
     var bandera = "editaritem";
     var item =  $('#item').val();
     var baccion =  $('#baccion').val();
     var eva =  $('#evaluacion').val();
   //  alert(eva);
     
      $.ajax({
        type: 'POST',
        url: '../../../build/configuraciones/sql/evaluacion_desempenio/crud_evaluaciond.php',
        data: {'bandera' : bandera, 'item' : item, 'baccion' : baccion}
      })
        .done(function(listas_rep){
          if(listas_rep === "Exito"){
            swal({ 
              title:'Éxito',
              text: 'Datos Almacenados',
              type: 'success'
            },
              function(){
                //event to perform on click of ok button of sweetalert
                //location.href='../../../produccion/Administracion/Evaluacion_Desempenio/listar_evaluaciond.php';
                $('#edititem').modal('hide'); 
                $("#evaluacion").val(eva);
                $('#evaluacion').blur();
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
