let time;

// Añade una duración al spinner
function loading() {
    time = setTimeout(showPage, 1000);
}

// Oculta spinner y muestra página
function showPage() {
    document.getElementById("spinner_pi").style.display = "none";
    document.getElementById("spinner-text").style.display = "none";
    document.getElementById("app").style.display = "block";
}
