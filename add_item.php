<?php

require_once 'app.php';

$game_id = $_GET['game_id'];

header("Content-Type: application/json");

$arr = array();

if(empty($_SESSION)){
    $arr["message"] = "notLoggedIn";
}else {
    if(!isset($_SESSION['games_id'])){
        $_SESSION['games_id'] = array();
    }

    if(in_array($game_id, $_SESSION['games_id'])){
        $arr["message"] = "alreadyAdded";
    }else {
        array_push($_SESSION['games_id'], $game_id);
        $arr["message"] = "addIt";
    }
}

echo json_encode($arr);