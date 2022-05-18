# Site de location de votures
Projet TPI de Guimaraes Marcos

## Description
Créatio d'un site de location de voitures

## Installation de la DB
Récupérez le script SQL dans /assets/database/rentcar.sql

Pour configurer les accès à votre database depuis le site, rendez-vous ensuite dans /modeles/pdo.php

    private static $serveur = 'mysql:host=127.0.0.1' <- ip de votre serveur MySQL;
    private static $bdd = 'dbname=RentCar';
    private static $user = 'user' <- nom de l'utilisateur (à modifier);
    private static $mdp = 'pwd' <- mot de passe de votre utilisateur (à modifier);
    
## Données de test

### compte admin
Email: admin@admin.com

Mot de passe: SuperAdmin

### Compte utilisateur
Email: marcos.mglhs@eduge.ch

Mot de passe: Super
