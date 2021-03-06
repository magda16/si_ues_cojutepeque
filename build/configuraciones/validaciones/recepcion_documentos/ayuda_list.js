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
      target: 'paso1',
      title: 'Editar Recepci&oacute;n de Documentos',
      content: 'Debe Dar Clic para Editar los Documentos Presentados por el Estudiante.',
      placement: 'left'
    },
    {
      target: 'paso2',
      title: 'Imprimir Comprobante',
      content: 'Debe Dar Clic para Imprimir el Comprobante.',
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
        placement: 'left',
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

