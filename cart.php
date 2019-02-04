<?php 

use Service\Game\GameService;

require_once 'app.php';

$gameService = new GameService($db);

$data = array();

$data['buyed_games'] = array();

if(filter_input(INPUT_GET, 'action') == 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if ($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['shopping_cart'][$key]);
        }
    }
    
    foreach($_SESSION['games_id'] as $key => $value){
        if($value == filter_input(INPUT_GET, 'id')){
            unset($_SESSION['games_id'][$key]);
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
    $_SESSION['games_id'] = array_values($_SESSION['games_id']);

    $data['games_count'] = count($_SESSION['games_id']);

    $products_id = $_SESSION['games_id'];
    
    for($i = 0; $i < count($products_id); $i++){
        $game_id = $products_id[$i];

        $fetchedGame = $gameService->getGameById($game_id);

        array_push($data['buyed_games'], $fetchedGame);
    }
}else {
    if(!isset($_SESSION['games_id'])){
        $data['games_count'] = 0;
    }else {
        $data['games_count'] = count($_SESSION['games_id']);
    
        $products_id = $_SESSION['games_id'];
    
        for($i = 0; $i < count($products_id); $i++){
            $game_id = $products_id[$i];
    
            $fetchedGame = $gameService->getGameById($game_id);
    
            array_push($data['buyed_games'], $fetchedGame);
        }
    } 
}

$product_ids = array();

if(filter_input(INPUT_POST, 'add_to_cart')){
    if(isset($_SESSION['shopping_cart'])){
            //keep track of how mnay products are in the shopping cart
            $count = count($_SESSION['shopping_cart']);

            //create sequantial array for matching array keys to products id's
            $product_ids = array_column($_SESSION['shopping_cart'], 'id');

            if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
                $_SESSION['shopping_cart'][$count] = array
                    (
                        'id' => filter_input(INPUT_GET, 'id'),
                        'name' => filter_input(INPUT_POST, 'name'),
                        'price' => filter_input(INPUT_POST, 'price'),
                        'quantity' => filter_input(INPUT_POST, 'quantity')
                    );   
                }
            else { //product already exists, increase quantity
                //match array key to id of the product being added to the cart
                for ($i = 0; $i < count($product_ids); $i++){
                    if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                        //set item quantity to the existing product in the array
                        $_SESSION['shopping_cart'][$i]['quantity'] = filter_input(INPUT_POST, 'quantity');
                    }
                }
            }
    }else {
        $_SESSION['shopping_cart'][0] = array
        (   
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

$app->loadTemplate('cart_frontend', $data);