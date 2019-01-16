/* globals hopscotch: false */

/* ============ */
/* EXAMPLE TOUR */
/* ============ */
var tour = {
    id: 'hello-hopscotch',
    steps: [
      {
        target: 'nombre_c',
        title: 'Nombres',
        content: 'Debe Ingresar los Nombres de el Contacto.',
        placement: 'bottom'
      },
      {
        target: 'apellido_c',
        title: 'Apellidos',
        content: 'Debe Ingresar los Apellidos de el Contacto.',
        placement: 'bottom'
      },
      {
        target: 'proveedor',
        title: 'Nombre',
        content: 'Debe Ingresar el Nombres de el Proveedor.',
        placement: 'bottom'
      },
      {
        target: 'nit_p',
        title: 'NIT',
        content: 'Debe Ingresar el N&uacute;mero de NIT de el Proveedor.',
        placement: 'bottom'
      },
      {
        target: 'telefono_p',
        title: 'Tel&eacute;fono',
        content: 'Debe Ingresar el N&uacute;mero de Tel&eacute;fono de el Proveedor.',
        placement: 'bottom'
      },
      {
        target: 'correo_p',
        title: 'Correo Electr&oacute;nico',
        content: 'Debe Ingresar el Correo Electr&oacute;nico de el Proveedor.',
        placement: 'bottom'
      },
      {
        target: 'direccion_p',
        title: 'Direcci&oacute;n',
        content: 'Debe Ingresar la Direcci&oacute; de el Proveedor.',
        placement: 'bottom'
      },
      {
        target: 'descripcion_p',
        title: 'Descripci&oacute;n',
        content: 'Debe Ingresar la Descripci&oacute;n de el Proveedor.',
        placement: 'bottom'
      },
      {
        target: 'observacion_p',
        title: 'Observaci&oacute;n',
        content: 'Debe Ingresar la Observaci&oacute;n de el Proveedor.',
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
  
  