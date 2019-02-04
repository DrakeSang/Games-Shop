<?php 

use Service\User\UserService;

require_once 'app.php';

$userService = new UserService($db);

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
} else {
    $data = array();

    $user = $userService->getUserById($_SESSION['user_id']);

    $data['user'] = $user;

    $orderHistory = $userService->getOrderHistory($_SESSION['user_id']);

    $data['orders'] = $orderHistory;

    $data['orders_count'] = count($data['orders']);

    if($data['orders_count'] > 0){
        $orders_ids = array_column($orderHistory, 'orderId');

        $data['records_ids'] = array_unique($orders_ids);
        $data['records_ids'] = array_values($data['records_ids']);

        $arr = array();
        
        for($i = 0; $i < $data['orders_count']; $i++){
            $currentOrderItem = $data['orders'][$i];
            $currentOrderId = $currentOrderItem['orderId'];

            if(!array_key_exists($currentOrderId, $arr)){
                $arr[$currentOrderId] = array();
            }

            for($j = 0; $j < count($data['records_ids']); $j++){
                if($currentOrderId == $data['records_ids'][$j]){
                    array_push($arr[$currentOrderId], $data['orders'][$i]);
                }else {
                    continue;   
                }
            }    
        }

        $data['arr'] = $arr;
    }

    $app->loadTemplate('orders_history_frontend', $data);
}