function focused(el) {
    // On récupère le label associé
    el_label = document.getElementById(el + "_label");
    el_label.style.fontSize = "12px";
    el_label.style.top = "0px";
}

function unfocus(el) {
    el_label = document.getElementById(el + "_label");
    el = document.getElementById(el);
    if(el.value.length == 0){
        el_label.style.fontSize = "16px";
        el_label.style.top = "1em";
    }
}