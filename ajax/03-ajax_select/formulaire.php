<?php

// on crée une connexion bdd
$host = 'mysql:host=localhost;dbname=entreprise';
$login = 'root';
$password = 'root';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$pdo = new PDO($host, $login, $password, $options);

$liste_service = $pdo->query("SELECT DISTINCT service FROM employes ORDER BY service");

$liste = '';
while($ligne = $liste_service->fetch(PDO::FETCH_ASSOC)) {
    $liste .= '<option>' . $ligne['service'] . '</option>';
}



?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajax select</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- notre css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="p-5 bg-danger">
    <h1 class="p-3 text-white text-center">Services</h1>
</header>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 border p-3">
            <h3 class="p-3">Veuillez chosir un service pour voir la liste des employés</h3>

            <form method="post" action="" id="form">
                <div class="row">
                    <div class="col-sm-9">
                        <select class="form-select" id="choix">
                            <?php echo $liste; ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary w-100">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 mt-3 border p-3" id="affichage"></div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script src="js/script.js"></script>
</body>

</html>