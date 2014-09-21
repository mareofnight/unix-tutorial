/* ==================== basic actions ==================== */

function closeMenu ( theMenu ) {
  theMenu.className="";
  theMenu.className="menu";
}
function openMenu ( theMenu ) {
  theMenu.className="";
  theMenu.className="menuOpen";
}

function closeMenuItem ( theItem ) {
    theItem.className = theItem.className.replace('menuItemOpen','');
}

function openMenuItem ( theItem ) {
    closeAllMenuItems ();
    theItem.className= theItem.className + " menuItemOpen";
}

function closeAllMenuItems () {
    var openItems = document.getElementsByClassName( 'menuItemOpen' );
    for (i=0; i<openItems.length; i++) {
        closeMenuItem(openItems[i]);
    }
}


/* ==================== event handlers ==================== */

function opencloseMenu(theMenu) {
  if (theMenu.className.indexOf('open') > -1) {
    theMenu.className = theMenu.className.replace('open','');
  }
  else {
    theMenu.className = theMenu.className + ' open';
  }
}

function opencloseMenuItem (theItem) {
  if (theItem.className.indexOf('menuItemOpen') > -1) {
      closeMenuItem(theItem);
  } else {
    openMenuItem(theItem);
  }
}

function itemClick ( theItem, openItems ) {

    //if the item is open, close it
    if (theItem.className.indexOf('menuItemOpen') > -1)
    {
        close(theItem);
    }
    //otherwise, open it
    else {
        closeAll(openItems);
        open(theItem);
    }
}
