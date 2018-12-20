var tour = {
    id: 'hello-hopscotch',
    steps: [
      {
        target: 'paso1',
        title: 'Paso',
        content: 'Aca debes digitar el nombre de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'paso2',
        title: 'Paso',
        content: 'Aca debes digitar el nombre de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'paso3',
        title: 'Paso',
        content: 'Aca debes digitar el nombre de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'paso4',
        title: 'Paso',
        content: 'Aca debes digitar el nombre de la Facultad.',
        placement: 'bottom'
      },
      {
        target: 'btnguardar',
        title: 'Paso',
        content: 'Aca debes digitar el nombre de la Facultad.',
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