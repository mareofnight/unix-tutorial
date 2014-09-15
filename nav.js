/* ==================== basic actions ==================== */

function close ( theItem ) {
    theItem.className="";
    theItem.className="menuItem";
}

function open ( theItem ) {
    theItem.className="";
    theItem.className="menuItemOpen";
}

function closeAll ( theItems ) {
    for (i=0; i<theItems.length; i++)
    {
        close(theItems[i]);
    }
}


/* ==================== event handlers ==================== */

function setup ( theItems ) {
    
    closeAll(theItems);
    
}

function itemOver ( theItem ) {
    //add glow to text and change cursor
    theItem.style.textShadow = "-.1em .06em .5em #ffffff";
    theItem.style.cursor="pointer";
}

function itemOut ( theItem ) {
    //remove glow from text and return cursor to normal
    theItem.style.textShadow = "none";
    theItem.style.cursor="default";
}

function itemClick ( theItem, openItems ) {
    
    //if the item is open, close it
    if (theItem.className=="menuItemOpen")
    {
        close(theItem);
    }
    //otherwise, open it
    else {
        closeAll(openItems);
        open(theItem);
    }
}

