/* globals hopscotch: false */

/* ============ */
/* EXAMPLE TOUR */
/* ============ */
var tour = {
    id: 'hello-hopscotch',
    steps: [
      {
        target: 'paso1',
        title: 'Nombre',
        content: 'Debe Ingresar el Nombre de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'paso2',
        title: 'Tel&eacute;fono',
        content: 'Debe Ingresar el N&uacute;mero Tel&eacute;fono de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'paso3',
        title: 'Correo Electr&oacute;nico',
        content: 'Debe Ingresar el Correo Electr&oacute;nico de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'paso4',
        title: 'Representante',
        content: 'Debe Seleccionar el Representante de Facultad.',
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
  
  