<?php

$action = $_GET['action'];

switch ($action) {
    case 'show':
        include "vues/login.php";
        break;
    case 'validate':
        echo "validate";
        break;
}
