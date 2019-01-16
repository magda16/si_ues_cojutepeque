$(document).ready(function(){
    
    $('input').on('keypress', function(e){
      if (e.keyCode == 13) {
        // Obtenemos el número del atributo tabindex al que se le dio enter y le sumamos 1
        var TabIndexActual = $(this).attr('tabindex');
        var TabIndexSiguiente = parseInt(TabIndexActual) + 1;
        // Se determina si el tabindex existe en el formulario
        var CampoSiguiente = $('[tabindex='+TabIndexSiguiente+']');
        // Si se encuentra el campo entra al if
        if(CampoSiguiente.length > 0)
        {
        CampoSiguiente.focus(); //Hcemos focus al campo encontrado
        return false; // retornamos false para detener alguna otra ejecucion en el campo
        }else{// Si no se encontro ningún elemento, se retorna false
        return false;
        }
      }
    });
    
    $.validator.addMethod("letrasOespacio", function(value, element) {
        return /^[ a-záéíóúüñ]*$/i.test(value);
    }, "Ingrese sólo letras o espacios.");

    $.validator.addMethod("alfanumOespacio", function(value, element) {
        return /^[ a-z0-9áéíóúüñ.,]*$/i.test(value);
    }, "Ingrese sólo letras, números o espacios.");

    $("#formsubcategoria").validate({
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
        subcategoria: {
          letrasOespacio: true,
          required: true,
          minlength: 6,
          maxlength: 150
        },
        abre_subcate: {
          letrasOespacio: true,
          required: true,
          minlength: 1,
          maxlength: 4
        }
      },
      messages: {
        categoria: {
            required: "Por favor, seleccione categoría."
        },
        subcategoria: {
          required: "Por favor, ingrese tipo de bien.",
          maxlength: "Debe ingresar m&aacute;ximo 150 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 6 dígitos."
        },
        abre_subcate: {
          required: "Por favor, ingrese abreviación tipo de bien.",
          maxlength: "Debe ingresar m&aacute;ximo 4 dígitos.",
          minlength: "Debe ingresar m&iacute;nimo 1 dígitos."
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
  $("#subcategoria").blur(function(){
    var nombre = $("#subcategoria").val();
    var tabla = "af_subcategoria";
    var nombre_campo = "nombre_s";
    if(nombre.length>5){
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/validar_nombre.php',
          data: {'nombre': nombre, 'tabla': tabla, 'nombre_campo': nombre_campo}
        })
        .done(function(resultado_ajax){
          if(resultado_ajax!==""){
            $("#subcategoria").val("");
            $('#resultscaterror').text("Tipo de Bien Ya Existe");
            $('#resultscat').removeClass('has-success').addClass('has-error');
          }
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
  });

  $("#abre_subcate").blur(function(){
    var nombre = $("#abre_subcate").val();
    var tabla = "af_subcategoria";
    var nombre_campo = "id_nombre_s";
    if(nombre.length>0){
        $.ajax({
          type: 'POST',
          url: '../../../build/configuraciones/sql/validar_nombre.php',
          data: {'nombre': nombre, 'tabla': tabla, 'nombre_campo': nombre_campo}
        })
        .done(function(resultado_ajax){
          if(resultado_ajax!==""){
            $("#abre_subcate").val("");
            $('#resultascerror').text("Abreviación Tipo de Bien Ya Existe");
            $('#resultasc').removeClass('has-success').addClass('has-error');
          }
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
      }
  });

  $("#btnguardar").click(function(){
    if($("#formsubcategoria").valid()){
      $('#bandera').val("addtipobien");
      $.ajax({
        type: 'POST',
        url: '../../../build/configuraciones/sql/catalogo/crud_catalogo.php',
        data: $("#formsubcategoria").serialize()
      })
      .done(function(resultado_ajax){
        alert(resultado_ajax);
        if(resultado_ajax === "Exito"){
          swal({ 
            title:'Éxito',
            text: 'Datos Almacenados',
            type: 'success'
          },
            function(){
              //event to perform on click of ok button of sweetalert
              location.href='../../../produccion/administracion/catalogo/registrar_subcategoria.php';
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
                location.href='../../../produccion/administracion/catalogo/registrar_subcategoria.php';
            })
                
        }                
      })
      .fail(function(){
        alert('Hubo un error al cargar la Pagina')
      })
    }
    
  });
