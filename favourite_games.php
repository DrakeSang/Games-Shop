<?php 

use Service\User\UserService;

require_once 'app.php';

$userService = new UserService($db);

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}else {
    $data = array();

    $user = $userService->getUserById($_SESSION['user_id']);

    $data['user'] = $user;

    $favourite_games = $userService->getFavouriteGames($_SESSION['user_id']);

    $data['favourite_games'] = $favourite_games;

    $data['favourite_games_count'] = count($data['favourite_games']);
    
    $app->loadTemplate('favourite_games_frontend', $data);
}