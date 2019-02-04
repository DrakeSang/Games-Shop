<?php 

use Service\User\UserService;
use Service\Upload\UploadService;

require_once 'app.php';

$userService = new UserService($db);
$uploadService = new UploadService();

$data = array();

$data['firstName'] = '';
$data['lastName'] = ''; 
$data['username'] = '';
$data['email'] = '';
$data['avatar'] = '';
$data['password_1'] = '';
$data['password_2'] = '';

$data['firstName_error'] = '';
$data['lastName_error'] = '';
$data['username_error'] = '';
$data['email_error'] = '';
$data['avatar_error'] = '';
$data['password_error'] = '';

$data['success'] = '';

if(isset($_POST['register'])){
    $firstName = test_input($_POST['firstName']);
    $lastName = test_input($_POST['lastName']);
    $username = test_input($_POST['username']);
    $email = test_input($_POST['email']);
    $password_1 = test_input($_POST['password_1']);
    $password_2 = test_input($_POST['password_2']);

    if(empty($firstName)){
        $data['firstName_error'] = "First Name is required";
    }else {
        $data['firstName'] = $firstName;
        if(!preg_match("/^[a-zA-z]*$/", $firstName)){
            $data['firstName_error'] = "Only letters and white space allowed";
        } 
    }

    if(empty($lastName)){
        $data['lastName_error'] = "Last Name is required";
    }else {
        $data['lastName'] = $lastName;
        if(!preg_match("/^[a-zA-z]*$/", $firstName)){
            $data['lastName_error'] = "Only letters and white space allowed";
        } 
    }

    if(empty($username)){
        $data['username_error'] = "Username is required";
    }else {
        $data['username'] = $username;
        if(!preg_match("/^[a-zA-z]*$/", $username)){
            $data['username_error'] = "Only letters and white space allowed";
        }else {
            $isUserExists = $userService->checkIfUserExists($username);

            if($isUserExists == true) {
                $data['username_error'] = "This username has already been taken";
            }
        }
    }

    if(empty($email)){
        $data['email_error'] = "Email is required";
    }else {
        $data['email'] = $email;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $data['email_error'] = "Your email is incorrect";
        }
    }

    $file = $_FILES['avatar'];
    if(empty($file['name'])){
        $data['avatar_error'] = 'Image is required';
    }else {
        $data['avatar'] = $file['name'];
        $imageFileType = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        if($imageFileType != "jpg" && $imageFileType != "jpeg") {
            $data['avatar_error'] = "Sorry, only JPG, JPEG files are allowed.";
        }

        if($file['size'] > 500000) {
            $data['avatar_error'] = "File is too large.";
        }
    }


    if(empty($password_1) || empty($password_2)){
        $data['password_error'] = "Password is required";
    }
    
    if($password_1 != $password_2){
        $data['password_1'] = $password_1;
        $data['password_2'] = $password_2; 
        $data['password_error'] = "Passwords mismatch";
    }else if($password_1 == $password_2){
        $data['password_1'] = $password_1;
        $data['password_2'] = $password_2;
    }

    if(empty($data['username_error']) && empty($data['email_error']) != '' && empty($data['avatar_error'])&& empty($data['password_error']) != ''){
        $avatarUrl = null;

        if ($_FILES['avatar']['error'] === 0) {
            $avatarUrl = $uploadService->upload(
                $_FILES['avatar'],
                'avatars'
            );
        }

        $password_1 = password_hash($password_1, PASSWORD_BCRYPT);

        $userService->registerUser($firstName, $lastName, $username, $email, $avatarUrl, $password_1);
        
        $data['firstName'] = '';
        $data['lastName'] = ''; 
        $data['username'] = '';
        $data['email'] = '';
        $data['password_1'] = '';
        $data['password_2'] = '';

        $data['success'] = "You have been successfully registered!";

        header('Refresh:2; url=login.php');
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$app->loadTemplate('register_frontend', $data);