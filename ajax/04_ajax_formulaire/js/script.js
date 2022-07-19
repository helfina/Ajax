

// Evenement change sur le champ "region" afin de faire un appel ajax pour récupérer les departements liés
document.getElementById('region').addEventListener('change', function () {

    let val = this.value;

    let param = 'region_code=' + val;
    console.log(param);

    let url = '04-ajax.php';

    let xhttp;
    if(window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xhttp.open('post', url);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.onreadystatechange = function () {
        if(xhttp.status == 200 && xhttp.readyState == 4) {
            console.log(xhttp.responseText);
            let reponse = JSON.parse(xhttp.responseText);
            console.log(reponse);
            document.querySelector('#departement').innerHTML = reponse.resultat;
        }
    }
    xhttp.send(param);
});

document.getElementById('departement').addEventListener('change', function () {

    let val = this.value;

    let param = 'departement_code=' + val;
    console.log(param);

    let url = '04-ajax.php';

    let xhttp;
    if(window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xhttp.open('post', url);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.onreadystatechange = function () {
        if(xhttp.status == 200 && xhttp.readyState == 4) {
            console.log(xhttp.responseText);
            let reponse = JSON.parse(xhttp.responseText);
            console.log(reponse);
            document.querySelector('#ville').innerHTML = reponse.resultat;
        }
    }
    xhttp.send(param);
});