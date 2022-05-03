<?php

$action = isset($_GET['action']) ? $_GET['action'] : "show" ;

switch ($action) {
    case 'show':
        include "vues/cars.php";
        break;
}
