import './bootstrap';
import '../fomantic-ui/dist/semantic.min'

$(document).ready(function () {
  initComponents();
});

$(document).on('livewire:initialized', function () {
  initComponents();

  Livewire.hook('morph.updated', ({el, component}) => {
    initComponents();
  });

  Livewire.on('show-message', function (data) {
    if (data.modal) {
      $("[modal='" + data.modal + "']").modal('hide');
    }

    if (data.selection) {
      $("[modal='" + data.modal + "']").find('.ui.dropdown').each(function () {
        $(this).dropdown('clear');
      });
    }

    showToast(data.type, data.message);
  });

  Livewire.on('open-modal', function (data) {
    $("[modal='" + data.modal + "']").modal({
      closable: false,
      inverted: true,
      transition: 'fade up',
      allowMultiple: false,
      onShow: function () {
        $('.ui.dimmer').addClass('inverted');
        initComponents();
      },
      onHidden: function () {
        $(this).modal('destroy');
      }
    }).modal('show');
  });

  Livewire.on('reset-modal-selection', function (data) {
    $("[modal='" + data.modal + "']").find('.ui.selection.dropdown').each(function () {
      $(this).dropdown('clear', true);
    });
  });
});

function initComponents() {
  $('#nav-section').visibility({
    once: false,
    onBottomPassed: function () {
      $('#attached-navbar').transition('fade in');
    },
    onBottomPassedReverse: function () {
      $('#attached-navbar').transition('fade out');
    }
  });

  $('.ui.dropdown').each(function () {
    $(this).dropdown();
  })
  $('.ui.selection.dropdown').each(function () {
    $(this).dropdown({
      selectOnKeydown: false,
      ignoreDiacritics: true,
      sortSelect: true,
      fullTextSearch: 'exact',
      message: {
        addResult: 'Añadir <b>{term}</b>',
        count: '{count} seleccionado(s)',
        maxSelections: '{maxCount} selecciones máx',
        noResults: 'Sin resultados'
      }
    })
  });

  $('.ui.checkbox').each(function () {
    $(this).checkbox();
  });
}

function showToast(type, message) {
  $.toast({
    class: type,
    title: function () {
      switch (type) {
        case 'error':
          return '¡Error!'
        case 'warning':
          return 'Atención:'
        case 'info':
          return 'Importante:'
        case 'success':
          return '¡Éxito!'
      }
    },
    message: message,
    displayTime: 'auto',
    showProgress: 'top',
    position: 'bottom left',
    className: {
      toast: 'ui large message'
    },
    transition: {
      showMethod: 'fly right',
      hideMethod: 'fly right',
      closeEasing: 'easeOutBounce'
    },
  });
}
