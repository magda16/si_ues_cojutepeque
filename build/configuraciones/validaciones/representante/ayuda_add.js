/* globals hopscotch: false */

/* ============ */
/* EXAMPLE TOUR */
/* ============ */
var tour = {
    id: 'hello-hopscotch',
    steps: [
      {
        target: 'nombres_r',
        title: 'Nombres',
        content: 'Debe Ingresar Nombres del Representante de Facultad.',
        placement: 'bottom'
      },
      {
        target: 'apellidos_r',
        title: 'Apellidos',
        content: 'Debe Ingresar Apellidos del Representante de Facultad.',
        placement: 'bottom'
      },
      {
        target: 'genero',
        title: 'Genero',
        content: 'Debe Verificar que este Marcado el Genero Correspondiente al Representante de Facultad.',
        placement: 'bottom'
      },
      {
        target: 'telefono_r',
        title: 'Tel&eacute;fono',
        content: 'Debe Ingresar el N&uacute;mero de Tel&eacute;fono del Representante de Facultad.',
        placement: 'bottom'
      },
      {
        target: 'correo_r',
        title: 'Correo',
        content: 'Debe Ingresar el Correo Electr&oacute;nico del Representante de Facultad.',
        placement: 'bottom'
      },
      {
        target: 'btnguardar',
        title: 'Guardar',
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
  
  