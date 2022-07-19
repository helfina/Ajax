

document.querySelector('#form').addEventListener('submit', function (e) {

    // on bloque la validation (le rechargement de page) du formulaire
    e.preventDefault();

    // on récupère la valeur 
    let val = document.getElementById('choix').value;

    // on prépare le paramètre à fournir à $_POST
    let param = 'service=' + val;
    console.log(param);

    let url = 'ajax.php';

    /*

        // exemple avec window.fetch (voir les autres fichiers pour une explication complète)
        let infosRequest = {
            method: 'POST',
            // body: JSON.stringify({service: val}),
            body: 'service=' + val,
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
              }
        }

        window.fetch('ajax.php', infosRequest)
        .then(function (data) { return data.json() })
        .then(function (data) { document.getElementById('affichage').innerHTML = data.resultat; });
    */


    let xhttp;
    if(window.XMLHttpRequest) {
        xhttp = new XMLHttpRequest();
    } else {
        xhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }

    xhttp.open('post', url); // le true pour le côté asynchrone est la valeur par défaut
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if(xhttp.status == 200 && xhttp.readyState == 4) {
            console.log(xhttp.responseText);

            let reponse = JSON.parse(xhttp.responseText);
            document.getElementById('affichage').innerHTML = reponse.resultat;
        }
    }

    xhttp.send(param);

});
