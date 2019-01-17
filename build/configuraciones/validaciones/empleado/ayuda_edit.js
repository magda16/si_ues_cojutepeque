/* globals hopscotch: false */

/* ============ */
/* EXAMPLE TOUR */
/* ============ */
var tour = {
    id: 'hello-hopscotch',
    steps: [
      {
        target: 'nombre',
        title: 'Nombres',
        content: 'Debe Ingresar los Nombres de el Recurso Humano.',
        placement: 'bottom'
      },
      {
        target: 'apellido',
        title: 'Apellidos',
        content: 'Debe Ingresar los Apellidos de el Recurso Humano.',
        placement: 'bottom'
      },
      {
        target: 'genero',
        title: 'Genero',
        content: 'Debe Verificar que este Marcado el Genero Correspondiente al Recurso Humano.',
        placement: 'bottom'
      },
      {
        target: 'dui',
        title: 'DUI',
        content: 'Debe Ingresar el N&uacute;mero de DUI de el Recurso Humano.',
        placement: 'bottom'
      },
      {
        target: 'nit',
        title: 'NIT',
        content: 'Debe Ingresar el N&uacute;mero de NIT de el Recurso Humano.',
        placement: 'bottom'
      },
      {
        target: 'estado',
        title: 'Estado Familiar',
        content: 'Debe Seleccionar el Estado Familiar de el Recurso Humano.',
        placement: 'bottom'
      },
      {
        target: 'telefono',
        title: 'Tel&eacute;fono',
        content: 'Debe Ingresar el N&uacute;mero de Tel&eacute;fono de el Recurso Humano.',
        placement: 'bottom'
      },
      {
        target: 'correo',
        title: 'Correo Electr&oacute;nico',
        content: 'Debe Ingresar el Correo Electr&oacute;nico de el Recurso Humano.',
        placement: 'bottom'
      },
      {
        target: 'direccion',
        title: 'Direcci&oacute;n',
        content: 'Debe Ingresar la Direcci&oacute; de el Recurso Humano.',
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
  
  