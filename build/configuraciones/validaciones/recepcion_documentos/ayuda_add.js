/* globals hopscotch: false */

/* ============ */
/* EXAMPLE TOUR */
/* ============ */
var tour = {
    id: 'hello-hopscotch',
    steps: [
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
        target: 'estudiante',
        title: 'Estudiante',
        content: 'Debe Seleccionar el Nombre del Estudiante.',
        placement: 'bottom'
      },
      {
        target: 'pagocertificado',
        title: 'Pago de Certifcado M&eacute;dico',
        content: 'Debe Dar Clic en la Forma de Pago.',
        placement: 'bottom'
      },
      {
        target: 'dui',
        title: 'Seleccionar Archivo',
        content: 'Debe Dar Clic para Seleccionar el Archivo.',
        placement: 'bottom'
      },
      {
        target: 'mostrar_dui',
        title: 'Mostrar Archivo',
        content: 'Debe Dar Clic para Vizualizar el Archivo.',
        placement: 'right'
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
  
  