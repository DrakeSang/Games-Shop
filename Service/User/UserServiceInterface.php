<?php

namespace Service\User;

use Data\Users\User;

interface UserServiceInterface 
{
    public function checkIfUserExists($username): bool;

    public function registerUser($firstName, $lastName, $username, $email, $avatarUrl, $password);

    public function getUser($username): User;

    public function getUserById($userId): User;

    public function checkIfGameWasAlreadyAdded($userId, $gameId): Array;

    public function addFavouriteGame($userId, $gameId);

    public function createOrder($orderId, $userId, $totalAmount, $date, $address);

    public function createOrderGames($orderId, $userId, $gameId, $quantity, $price);

    public function getFavouriteGames($gameId): Array;

    public function getOrderHistory($userId): Array;
}