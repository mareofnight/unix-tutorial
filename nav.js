var menuController = menuController || {};

(function() {
  'use strict';

  var addClass = function (theElement, theClass) {    // utility functions added for code cleanliness
    theElement.className = theElement.className + ' ' + theClass;
  },
  removeClass = function (theElement, theClass) {
    theElement.className = theElement.className.replace(theClass,'');
  },
  hasClass = function (theElement, theClass) {
    if (theElement.className.indexOf(theClass) > -1) {
      return true;
    }
  },
  opencloseMenu = function() {                      // This is a new function for show/hide mobile menu
    var theMenu = menuController.view.menu,
        openClass = 'open';
    if (hasClass(theMenu, openClass)) {
      removeClass(theMenu, openClass);
    }
    else {
      addClass(theMenu, openClass);
    }
  },
  closeAllItems = function () {
    var i=0,
        view = menuController.view,
        numItems = view.items.length;
    for (i=0; i<numItems; i++) {
      removeClass(menuController.view.items[i], 'open');
    }
  },
  opencloseItem = function () {
    var theItem = this,
        openClass = 'open';
    if (hasClass(theItem, openClass)) {
      removeClass(theItem, openClass);
    } else {
      closeAllItems ();
      addClass(theItem, openClass);
    }
  },
  setupView = function (callback) {
    var nav = document.getElementById('mainnav'),
    articleHeight = document.getElementById('mainArticle').offsetHeight;      // JavaScript used to set sidebar height to match article height
    document.getElementById('mainnav').style.height = articleHeight + 'px';   // because this can't be done in CSS for a scrollable sidebar
    menuController.view = {
      button:   document.getElementById('menuButton'),
      menu:     document.getElementById('menuList'),
      items:    nav.getElementsByClassName('menuItem'),
      menuWrapper: document.getElementById('mainnav')
    };
    if (callback && typeof callback === 'function') {
      callback();
    }
  },
  addEventListeners = function () {
    var i=0,
        view = menuController.view,
        numItems = view.items.length;

    view.button.addEventListener('click', menuController.opencloseMenu);
    for (i=0; i<numItems; i++) {
      view.items[i].addEventListener('click', menuController.opencloseItem);
    }
  },
  setup = function () {
    setupView(addEventListeners);
  };

  menuController.setup = setup;
  menuController.opencloseItem = opencloseItem;
  menuController.opencloseMenu = opencloseMenu;

}());
