let elements = document.querySelectorAll('.mida');

for(let i = 0; i < elements.length; i++) {
    let mida = elements[i].innerHTML;
    let conversio = 0;
    if (mida < 1000) {
        elements[i].innerHTML = `${mida} B`;
    }
    else if (mida < 1000000) {
        
        conversio = mida/1000;
        let midaFinal = parseFloat(Math.round(conversio * 100) / 100).toFixed(2)
        elements[i].innerHTML = `${midaFinal} KB`;
    }
    else if (mida < 1000000000) {
        conversio = mida/1000000;
        let midaFinal = parseFloat(Math.round(conversio * 100) / 100).toFixed(2)

        elements[i].innerHTML = `${midaFinal} MB`;
    }
    else {
        conversio = mida/1000000000;
        let midaFinal = parseFloat(Math.round(conversio * 100) / 100).toFixed(2)

        elements[i].innerHTML = `${midaFinal} GB`;
    }
}