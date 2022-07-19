<?php

// on crée une connexion bdd
$host = 'mysql:host=localhost;dbname=localite';
$login = 'root';
$password = 'root';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$pdo = new PDO($host, $login, $password, $options);

// récupération des régions pour les placer dans le premier champ select
$recup_regions = $pdo->query("SELECT * FROM regions ORDER BY name");

$regions = '';
while($ligne = $recup_regions->fetch(PDO::FETCH_ASSOC)) {
    $regions .= '<option value="' . $ligne['code'] . '">' . $ligne['name'] . '</option>';
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax localité</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- notre css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header class="p-5 bg-danger">
    <h1 class="p-3 text-white text-center">Localité</h1>
</header>
<div class="container mt-3">
    <div class="row">
        <div class="col-12 border p-3">
            <h3 class="p-3">Merci de donner votre localité</h3>

            <form method="post" action="" id="form">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="region">Région</label>
                        <select class="form-select" id="region">
                            <option selected disabled>Merci de choisir une région ...</option>
                            <?= $regions ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="departement">Département</label>
                        <select class="form-select" id="departement">

                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="ville">Ville</label>
                        <select class="form-select" id="ville">

                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label>&nbsp;</label>
                        <button type="submit" class="btn btn-primary w-100">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script src="js/script.js"></script>
</body>

</html>