 $(document).ready(function(){

  $("#divcantidad_lote").hide();

  //Date picker
  $('#fecha').datepicker({
    autoclose: true
  })

  

  $("#formaf").validate({
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
      categoria:{
        required: true,
        number: true
      },
      tipo_bien:{
        required: true,
        number: true
      } 
    },
    messages: {
      categoria: {
        required: "Por favor, seleccione categoria."
      },
      tipo_bien: {
        required: "Por favor, seleccione tipo de bien."
      } 
    }
  });

  $.ajax({
  type: 'POST',
  url: '../../select_generales/af_categoria.php'
  })
  .done(function(lista_categoria){
    $('#categoria').html(lista_categoria)
  })
  .fail(function(){
    alert('Hubo un error al cargar las Categorias')
  })

});

$('#categoria').on('change', function(){
  var id = $('#categoria').val();
  $.ajax({
    type: 'POST',
    url: '../../select_generales/af_categoria_tipobien.php',
    data: {'id': id}
  })
  .done(function(lista_tipo_bien){
    $('#tipo_bien').html(lista_tipo_bien)
  })
  .fail(function(){
    alert('Hubo un error al cargar el Tipo de Bien')
  })
});

$('#tipo_bien').on('change', function(){
  var categoria = $('#categoria').val();
  var tipo_bien = $('#tipo_bien').val();
  $.ajax({
    type: 'POST',
    url: '../../../build/configuraciones/sql/activo_fijo/obtenerCodigoInventario.php',
    data: {'categoria': categoria, 'tipo_bien':tipo_bien}
  })
  .done(function(obtenerDatos){
   // alert(obtenerDatos);
    var datos = eval(obtenerDatos);
    $('#codigo_inv').val(datos[0]);
    
    var num = numero(datos[1]);

    function numero(num){
      numtmp='"'+num+'"';
      largo=numtmp.length-2;
      numtmp=numtmp.split('"').join('');
      if(largo==5)return numtmp;
      ceros='';
      pendientes=5-largo;
      for(i=0;i<pendientes;i++)ceros+='0';
      return ceros+numtmp;
    
    }
    $('#correlativo_inv').val(num);
    $('#codigo_af').val(datos[0]+"-"+num);
    alert($('#codigo_af').val());
  })
  .fail(function(){
    alert('Hubo un error al cargar el Tipo de Bien')
  })
});

$('input[type=checkbox]').on('change', function() {
  if ($(this).is(':checked') ) {
      $("#divcantidad_lote").show();
      $("#divserie").hide();
      $("#nserie").val("");
  } else {
      $("#divcantidad_lote").hide();
      $("#divserie").show();
      $("#cantidad_lote").val("");
  }
});



$("#btnguardar").click(function(){
  if($("#formaf").valid()){
    
    document.getElementById('bandera').value="add";
    $("#formaf").submit();
    /*
    $('#bandera').val("add");
    var formData = new FormData($("#formaf")[0]);
    $.ajax({
      type: 'POST',
      url: '../../../build/configuraciones/sql/activo_fijo/crud_activo_fijo.php',
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
            location.href='../../../produccion/administracion/activo_fijo/registrar_activo_fijo.php';
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
              location.href='../../../produccion/administracion/activo_fijo/registrar_activo_fijo.php';
          })   
      }                
    })
    .fail(function(){
      alert('Hubo un error al cargar la Pagina')
    })*/
  }
  
});
