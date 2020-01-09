var app = {

  init: function() {

    console.log('init');

    $body=$('body');
    

    // Au click sur mes bouton d'ouverture ou fermeture du menu...
    $('.ui-button').on('click', app.toggleMenu);
  },

  toggleMenu: function(evt) {

    console.log('app.toggleMenu');

    // Je supprime l'action par défaut de mon évenement de click
    evt.preventDefault();

    // Je bascule entre le menu visible et caché
    $body.toggleClass('menu_over-visible');
  },
}

$(app.init);