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
        content: 'Aca debes digitar el nombre de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'paso2',
        title: 'Tel&eacute;fono',
        content: 'Aca debes digitar el n&uacute;mero tel&eacute;fono de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'paso3',
        title: 'Correo Electr&oacute;nico',
        content: 'Aca debes digitar el correo electr&oacute;nico de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'paso4',
        title: 'Representante',
        content: 'Aca debes seleccionar el representante de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'btnguardar',
        title: 'Guardar',
        content: 'Aca debes dar clic para guardar los datos ingresados.',
        placement: 'bottom'
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
  
  