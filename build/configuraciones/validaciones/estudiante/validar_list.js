

$.ajax({
    type: 'POST',
    url: '../../select_generales/f_estudiante_facultad.php'
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
      url: '../../select_generales/c_estudiante_carrera_facultad.php',
      data: {'id': id}
    })
    .done(function(lista_carreras){
      $('#carrera').html(lista_carreras)
    })
    .fail(function(){
      alert('Hubo un error al cargar las Carreras')
    })
  });

 /* $('#carrera').on('change', function(){
    var id = $('#carrera').val()
    $.ajax({
      type: 'POST',
      url: '../../tablas_generales/tabla_re_doces.php',
      data: {'id': id}
    })
    .done(function(lista_carreras){
      alert(lista_carreras);
      $('#resultado').child(lista_carreras)
    })
    .fail(function(){
      alert('Hubo un error al cargar las Carreras')
    })
  });*/

  function editarrecepciondocumentos(id){
    $('#id').val(id);
    $("#fromrecepciondocumentos").submit();
  }

  function imprecepciondocumentos(id){
    $('#idimp').val(id);
    alert($('#idimp').val());
    $("#fromimprecepciondocumentos").submit();
  }
  



  $("#carrera").on('change', function(){
  
    var carrera = $("#carrera").val();
    var table = $('#datatable-responsive').DataTable();
    $.ajax({
      type: 'POST',
      url: '../../../produccion/administracion/recepcion_documentos/tabla_re_doc_carrera.php',
      data: {'carrera': carrera}
    })
    .done(function(obtenerDatos){
      table.destroy();
      $('#div_tabla_re_doc').html(obtenerDatos);
      table=$('#datatable-responsive').DataTable();
                     
    })
    .fail(function(){
      alert('Hubo un error al cargar la Pagina')
    })
  });
  