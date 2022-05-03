<?php

require "controllers/session.php";
require "modeles/pdo.php";



$uc = empty($_GET['uc']) ? "cars" : $_GET['uc'];

include_once "vues/header.php";

switch ($uc) {
    case 'cars':
        include "controllers/cars.php";
        break;

    case 'car-single':
        include "controllers/car-single.php";
        break;

    case 'login':
        include "controllers/login.php";
        break;

    case 'register':
        include "controllers/register.php";
        break;
}

include_once "vues/footer.php";
