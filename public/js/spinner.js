let time;

function loading() {
    time = setTimeout(showPage, 1000);
}

function showPage() {
    document.getElementById("spinner_pi").style.display = "none";
    document.getElementById("spinner-text").style.display = "none";
    document.getElementById("app").style.display = "block";
}
