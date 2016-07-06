document.oncontextmenu = function() {
    return false
}
function right(e) {
    var msg = "Prohibido usar Click Derecho !!! ";
    if (navigator.appName == 'Netscape' && e.which == 3) {
        //alert(msg); //- Si no quieres asustar a tu usuario entonces quita esta linea...
        return false;
    }
    else if (navigator.appName == 'Microsoft Internet Explorer' && event.button == 2) {
        alert(msg); //- Si no quieres asustar al usuario que utiliza IE,  entonces quita esta linea...
        //- Aunque realmente se lo merezca...
        return false;
    }
    return true;
}
document.onmousedown = right;