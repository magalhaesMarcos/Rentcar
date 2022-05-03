<?php
$action = $_GET['action'];

switch ($action) {
    
    case 'show':
        include "vues/register.php";
        break;

    case 'validate':

        // variables de controle
        $errorMsg = "";
        $status = true;

        // stockage des données du formulaire dans des variables + premier filtre -> sanitize
        $dateNaissance = filter_input(INPUT_POST, 'dateNaissance');
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $motDePasse = filter_input(INPUT_POST, 'motDePasse');
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $noTel = filter_input(INPUT_POST, 'noTel', FILTER_SANITIZE_NUMBER_INT);
        $permis = filter_input(INPUT_POST, 'permis', FILTER_SANITIZE_NUMBER_INT);

        // vérification des champs du formulaire
        if ($dateNaissance == "" || $email = "" || $motDePasse = "" || $nom = "" || $prenom = "" || $noTel = "" || $permis == "") {
            $status = false;
        }

        if (!$status) {
            include "vues/register.php";
        }
        break;
}
