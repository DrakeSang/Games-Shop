<?php

use Service\User\UserService;

require_once 'app.php';

$userService = new UserService($db);

$data = array();

$data['firstName'] = '';
$data['lastName'] = ''; 
$data['address'] = '';
$data['phone'] = '';

$data['firstName_error'] = '';
$data['lastName_error'] = '';
$data['address_error'] = '';
$data['phone_error'] = '';

$data['success'] = '';

if(isset($_POST['checkout'])){
    $firstName = test_input($_POST['firstName']);
    $lastName = test_input($_POST['lastName']);
    $address = test_input($_POST['address']);
    $phone = test_input($_POST['phone']);

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
        if(!preg_match("/^[a-zA-z]*$/", $lastName)){
            $data['lastName_error'] = "Only letters and white space allowed";
        } 
    }

    if(empty($address)){
        $data['address_error'] = "Address is required";
    }else {
        $data['address'] = $address;
        if(!preg_match("/^[a-zA-z]+\s*[a-zA-z]+\s*[a-zA-z]+\s*[0-9]*$/", $address)){
            $data['address_error'] = "Only letters and white space allowed";
        } 
    }

    if (empty($phone)) {
        $data['phone_error'] = "Phone is required";
    } else {
        $data['phone'] = $phone;
        // check if e-mail address is well-formed
        if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {
            $data['phone_error'] = "Invalid phone number";
        }
    }

    if(empty($data['firstName_error']) && empty($data['lastName_error']) != '' && empty($data['address_error']) && empty($data['phone_error']) != ''){
        $randomOrderId = mt_rand();

        foreach($_SESSION['shopping_cart'] as $key => $product){
            $orderid = $randomOrderId;
            $userId = $_SESSION['user_id'];
            $gameId = $product['id'];
            $quantity = $product['quantity']; 
            $price = $product['quantity'] * $product['price'];     
            $userService->createOrderGames($orderid, $userId, $gameId, $quantity, $price);
        }
        
        $userId = $_SESSION['user_id'];
        $totalAmount = $_GET['totalSum'];
        $date = date('Y-m-d H:i:s');
        $address = $address;

        $userService->createOrder($orderid, $userId, $totalAmount, $date, $address);

        unset($_SESSION['shopping_cart']);
        unset($_SESSION['games_id']);

        $data['firstName'] = '';
        $data['lastName'] = ''; 
        $data['address'] = '';
        $data['phone'] = '';

        $data['success'] = "Your order was successfully accepted.We will deliver as soon as we can. See you later!";

        header('Refresh:2; url=index.php');
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$app->loadTemplate('checkout_frontend', $data);