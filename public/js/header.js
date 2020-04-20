let menu = document.getElementById("menu");
let sidenav_toggle = document.getElementById("sidenav-toggle");
let content = document.getElementsByClassName("content");

let dropdown = document.getElementsByClassName("dropdown");

sidenav_toggle.addEventListener("click", function() {
    menu.classList.toggle("closed");
    for (let i = 0; i < content.length; i++) {
        content[i].classList.toggle("closed");
    }
});

for (let i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.nextSibling.nextSibling.classList.toggle("show");
        let dropicon = this.getElementsByClassName("dropdown-ico")[0];

        dropicon.innerHTML =
            dropicon.innerHTML == "keyboard_arrow_down"
                ? "keyboard_arrow_up"
                : "keyboard_arrow_down";
    });
}

//Tancar menu amb tecla ESC
$(document).ready(function() {
    $(document).keydown(function(e) {
        if (e.keyCode === 27) {
            $("#menu").addClass("closed");
            for (let i = 0; i < content.length; i++) {
                content[i].classList.add("closed");
            }
        }
    });
});
