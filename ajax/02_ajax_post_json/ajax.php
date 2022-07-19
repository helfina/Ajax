<?php

// var_dump($_POST);

// Pour le format json :
// json_encode() : permet de transformer un tableau array ou un objet php en format json
// json_decode() : permet de transformer un format json en tableau array ou objet php


// on prépare un tableau array qui contiendra la ou les réponses et on finira en bas de fichier par l'affichage de ce tableau au format json (c'est la réponse envoyée)
$tab = array();
// on prépare un indice dans ce tableau que l'on appelera côté js
$tab['resultat'] = '';

// On vérifie l'existence dans $_POST de l'argument attendu
if (isset($_POST['id_employes'])) {
    $id_employes = $_POST['id_employes'];

    // nous allons récupérer le fichier.json et le transformer en tableau array multidimensionnel côté php
    // on vérifie si le fichier existe.
    if (file_exists('fichier.json')) {
        // file_exists() permet de vérifier si un fichier ou un dossier existe (true | false)
        // file_get_contents() permet de récupérer le contenu d'un fichier ou d'une url
        $fichier = file_get_contents('fichier.json');
        // echo '<pre>'; print_r($fichier); echo '</pre>';

        // on a récupéré du texte au format json, on le transforme en tableau array :
        $liste_employes = json_decode($fichier, true); // le deuxième argument (ici true) nous permet d'obtenir un tableau array sinon avec false (valeur par defaut) on obtient un objet

        // echo '<pre>'; print_r($liste_employes); echo '</pre>';

        // on fait une boucle sur $liste_employes, à chaque tour, la variable $employe contient un des sous tableau array
        foreach($liste_employes AS $employe) {
            // on cherche l'id_employes récupéré :
            if($id_employes == $employe['idEmploye']) {
                $tab['resultat'] .= '<table class="table table_bordered">';
                $tab['resultat'] .= '   <tr>
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Service</th>
                                            <th>Salaire</th>
                                            <th>Date embauche</th>
                                        </tr>';
                $tab['resultat'] .= '<tr>';
                $tab['resultat'] .= '<td>' . $employe['idEmploye'] . '</td>';
                // ucfirst() : pour passer la première lettre d'une chaine en majuscule
                $tab['resultat'] .= '<td>' . ucfirst($employe['nom']) . '</td>';
                $tab['resultat'] .= '<td>' . ucfirst($employe['prenom']) . '</td>';
                $tab['resultat'] .= '<td>' . $employe['service'] . '</td>';
                $tab['resultat'] .= '<td>' . $employe['salaire'] . ' €</td>';
                $tab['resultat'] .= '<td>' . $employe['dateEmbauche'] . '</td>';

                $tab['resultat'] .= '</tr></table>';

            }
        }
    }
}
// on renvoie la réponse au format json :
echo json_encode($tab);
