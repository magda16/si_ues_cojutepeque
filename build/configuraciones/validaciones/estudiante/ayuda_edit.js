/* globals hopscotch: false */

/* ============ */
/* EXAMPLE TOUR */
/* ============ */
var tour = {
    id: 'hello-hopscotch',
    steps: [
      {
        target: 'carnet',
        title: 'Carnet',
        content: 'Debe Ingresar el Carnet de el Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'nombre_e',
        title: 'Nombres',
        content: 'Debe Ingresar los Nombres de el Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'apellido_e',
        title: 'Apellidos',
        content: 'Debe Ingresar los Apellidos de el Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'genero_e',
        title: 'Genero',
        content: 'Debe Verificar que este Marcado el Genero Correspondiente al Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'nit_e',
        title: 'NIT',
        content: 'Debe Ingresar el N&uacute;mero de NIT de el Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'dui_e',
        title: 'DUI',
        content: 'Debe Ingresar el N&uacute;mero de DUI de el Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'telefono_e',
        title: 'Tel&eacute;fono',
        content: 'Debe Ingresar el N&uacute;mero de Tel&eacute;fono de el Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'correo_e',
        title: 'Correo Electr&oacute;nico',
        content: 'Debe Ingresar el Correo Electr&oacute;nico de el Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'direccion_e',
        title: 'Direcci&oacute;n',
        content: 'Debe Ingresar la Direcci&oacute; de el Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'institucion_e',
        title: 'Procedencia',
        content: 'Debe Verificar que este Marcado la Procedencia Correspondiente al Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'facultad',
        title: 'Facultad',
        content: 'Debe Seleccionar el Nombre de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'carrera',
        title: 'Carrera',
        content: 'Debe Seleccionar el Nombre de la Carrera.',
        placement: 'bottom'
      },
      {
        target: 'btneditar',
        title: 'Actualizar',
        content: 'Debe Dar Clic para Almacenar los Datos Ingresados.',
        placement: 'left'
      }
    ],
    showPrevButton: true,
    scrollTopMargin: 100
  },
  
  /* ========== */
  /* TOUR SETUP */
  /* ========== */
  addClickListener = function(el, fn) {
    if (el.addEventListener) {
      el.addEventListener('click', fn, false);
    }
    else {
      el.attachEvent('onclick', fn);
    }
  },
  
  init = function() {
    var startBtnId = 'startTourBtn',
        calloutId = 'startTourCallout',
        mgr = hopscotch.getCalloutManager(),
        state = hopscotch.getState();
  
    if (state && state.indexOf('hello-hopscotch:') === 0) {
      // Already started the tour at some point!
      hopscotch.startTour(tour);
    }
    else {
      // Looking at the page for the first(?) time.
      setTimeout(function() {
        mgr.createCallout({
          id: calloutId,
          target: startBtnId,
          placement: 'right',
          title: 'Ayuda',
          content: 'Clic para iniciar!',
          yOffset: -25,
          arrowOffset: 20,
          width: 100
        });
      }, 100);
    }
  
    addClickListener(document.getElementById(startBtnId), function() {
      if (!hopscotch.isActive) {
        mgr.removeAllCallouts();
        hopscotch.startTour(tour);
      }
    });
  };
  
  init();
  
  