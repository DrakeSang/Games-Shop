<?php

namespace Service\User;

use Adapter\DatabaseInterface;
use Data\Users\User;
use Data\Games\Game;

class UserService implements UserServiceInterface 
{
    /**
    * @var DatabaseInterface
    */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function checkIfUserExists($username): bool
    {
        $query = "SELECT * FROM users WHERE username = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);

        $user = $stmt->fetchObject(User::class);

        if (!$user) {
            return false;
        }else {
            return true;
        }
    }

    public function registerUser($firstname, $lastName, $username, $email, $avatarUrl, $password)
    {
        $query = "INSERT INTO users (firstName, lastName, username, email, picture, password) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $firstname,
            $lastName,
            $username,
            $email,
            $avatarUrl, 
            $password
        ]);
    }

    public function getUser($username): User 
    {
        $query = "SELECT * FROM users WHERE username = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$username]);

        $user = $stmt->fetchObject(User::class);

        return $user;
    }

    public function getUserById($userId): User 
    {
        $query = "SELECT * FROM users WHERE id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);

        $user = $stmt->fetchObject(User::class);

        return $user;
    }

    public function checkIfGameWasAlreadyAdded($userId, $gameId): Array
    {
        $query = "SELECT * FROM favourites WHERE userId = ? AND gameId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId, $gameId]);

        $favourite = $stmt->fetchAll();

        return $favourite;
    }

    public function addFavouriteGame($userId, $gameId)
    {
        $query = "INSERT INTO favourites (userId, gameId) VALUES (?, ?)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $userId,
            $gameId
        ]);
    }

    public function createOrder($orderId, $userId, $totalAmount, $date, $address)
    {
        $query = "INSERT INTO orders (orderId, userId, totalSum, date, address) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $orderId,
            $userId,
            $totalAmount,
            $date,
            $address
        ]);
    }

    public function createOrderGames($orderId, $userId, $gameId, $quantity, $price) 
    {
        $query = "INSERT INTO orders_products (orderId, userId, gameId, quantity, price) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $orderId,
            $userId,
            $gameId,
            $quantity,
            $price
        ]);
    }

    public function getFavouriteGames($gameId): Array
    {
        $query = "SELECT games.id, games.gamePic, games.gameName, games.gamePrice, games.gameDate FROM games INNER JOIN favourites ON games.id = favourites.gameId WHERE favourites.userId = '{$gameId}'";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$gameId]);

        $favouriteGames = $stmt->fetchAll();

        return $favouriteGames;
    }

    public function getOrderHistory($userId): Array 
    {
        $query = "SELECT orders.orderId, orders.totalSum, games.gamePic, games.gameName, games.gamePrice, orders_products.quantity,         orders_products.price, orders.date, orders_products.gameId FROM orders_products INNER JOIN orders ON orders.orderId = orders_products.orderId
        INNER JOIN games ON orders_products.gameId = games.id WHERE orders.userId = 
        '{$userId}'";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$userId]);

        $orders = $stmt->fetchAll();

        return $orders;
    }
}