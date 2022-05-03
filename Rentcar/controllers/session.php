<?php
session_start();

//$_SESSION=[];

if(!isset($_SESSION['userConnected'])){
    $_SESSION['userConnected']=[
        "username"=>"",
        "online"=>false,
        "idUser" => null
    ];
}

?>