<?php 

use Service\User\UserService;
use Service\Upload\UploadService;

require_once 'app.php';

$userService = new UserService($db);

$data = array();

$data['username'] = '';
$data['password'] = '';

$data['error'] = '';
$data['success'] = '';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data['username'] = $username;
    $data['password'] = $password;

    $isUserExists = $userService->checkIfUserExists($username);

    if($isUserExists == false){
        $data['error'] = "Wrong combination";
    }else {
        $user = $userService->getUser($username); 

        if(!password_verify($password, $user->getPassword())){
            $data['error'] = 'Wrong Password';
        }else {
            $data['username'] = '';
            $data['password'] = ''; 

            $_SESSION['user_id'] = $user->getId();

            $data['success'] = "You have been successfully logged in!";

            header('Refresh:1; url=index.php');
        }
    }
}

$app->loadTemplate('login_frontend', $data);