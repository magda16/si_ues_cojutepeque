
  function ver(id){
    $.ajax({
          type: 'POST',
          url: '../../../produccion/administracion/facultad/mostrar_facultad.php',
          data: {'id': id}
        })
        .done(function(resultado_ajax){
          $('#insertarhtmlfacultad').html(resultado_ajax)
          $('#datosFacultad').modal({show:true});
        })
        .fail(function(){
          alert('Hubo un error al cargar la Pagina')
        })
  }

  function editarfacultad(id){
    $('#id').val(id);
    $("#fromeditarfacultad").submit();
  }
