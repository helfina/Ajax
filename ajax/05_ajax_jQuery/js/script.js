// https://api.jquery.com/jQuery.ajax/
// https://api.jquery.com/jQuery.post/

$(document).ready(function () {

    // $('#region').change(function() {  });
    $('#region').on('change', function() {
        // .ajax() est une methode de jQuery permettant de faire un appel ajax en choississant get ou post dans le "type"
        $.ajax({
            type: 'POST', // method
            url: '05-ajax.php', // cible
            data: {region_code: $(this).val()}, // les params
            success: function (reponse) { // fonction qui se déclenche lorsque l'on reçu la réponse. l'argument de la fonction représente la réponse
                console.log(reponse);
                $('#departement').html(reponse.resultat);
            },
            dataType: 'json' // le type de donnée, json provoque un JSON.parse() sur la réponse
        });
    });

    // $.post() est une methode de jQuery permettant de faire un appel ajax en method post
    // $.post(url_cible, params, function, type)
    $('#departement').on('change', function () {
        $.post('05-ajax.php', {department_code: $(this).val()}, function (data) {
            console.log(data);
            $('#ville').html(data.resultat);
        }, 'json')
    });
});
