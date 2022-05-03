<?php

$action = $_GET['action'];

switch ($action) {
    case 'show':
        include "vues/car-single.php";
        break;
}
