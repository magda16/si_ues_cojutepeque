/* globals hopscotch: false */

/* ============ */
/* EXAMPLE TOUR */
/* ============ */
var tour = {
    id: 'hello-hopscotch',
    steps: [
      {
        target: 'categoria',
        title: 'Categoria',
        content: 'Debe Seleccionar la Categoria de el Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'tipo_bien',
        title: 'Tipo de Bien',
        content: 'Debe Seleccionar el Tipo de Bien de el Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'descripcion',
        title: 'Descripci&oacute;n',
        content: 'Debe Ingresar la Descripci&oacute;n de el Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'observacion',
        title: 'Observaci&oacute;n',
        content: 'Debe Ingresar la Observaci&oacute;n de el Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'calidad',
        title: 'Calidad',
        content: 'Debe Verificar que este Marcada la Calidad Correspondiente al Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'marca',
        title: 'Marca',
        content: 'Debe Ingresar la Marca de el Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'modelo',
        title: 'Modelo',
        content: 'Debe Ingresar el Modelo de el Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'gruposerie',
        title: 'N&uacute;mero de Serie &oacute; Lote',
        content: 'Debe Ingresar el N&uacute;mero de Serie o Lote de el Activo Fijo.',
        placement: 'left'
      },
      {
        target: 'fecha',
        title: 'Fecha de Adquisici&oacute;n',
        content: 'Debe Seleccionar la Fecha de Adquisici&oacute;n de el Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'fecha',
        title: 'Fecha de Adquisici&oacute;n',
        content: 'Debe Seleccionar la Fecha de Adquisici&oacute;n de el Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'financiamiento',
        title: 'Financiamiento',
        content: 'Debe Seleccionar el Financiamiento de el Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'valor',
        title: 'Valor de Adquisici&oacute;n ($)',
        content: 'Debe Ingresar el Valor de Adquisici&oacute;n ($) de el Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'valor_est',
        title: 'Valor Estimado',
        content: 'Debe Verificar que este Marcada el Valor Estimado Correspondiente al Activo Fijo.',
        placement: 'bottom'
      },
      {
        target: 'doc_adq',
        title: 'Seleccionar Archivo',
        content: 'Debe Dar Clic para Seleccionar el Archivo.',
        placement: 'bottom'
      },
      {
        target: 'mostrar',
        title: 'Mostrar Archivo',
        content: 'Debe Dar Clic para Vizualizar el Archivo.',
        placement: 'right'
      },
      {
        target: 'proveedor',
        title: 'Proveedor',
        content: 'Debe Seleccionar el Proveedor de el Activo Fijo.',
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
  
  