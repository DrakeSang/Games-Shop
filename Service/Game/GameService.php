<?php

namespace Service\Game;

use Adapter\DatabaseInterface;
use Data\Games\GameIndexViewData;
use Data\Games\Game;
use Data\Games\Gallery;
use Data\Comments\Comment;

class GameService implements GameServiceInterface 
{
     /**
     * @var DatabaseInterface
     */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function getNewestGames($consoleType): GameIndexViewData
    {
        $gameIndexViewData = new GameIndexViewData();

        if($consoleType !== 'ALL'){
            $stmt = $this->db->prepare("SELECT games.id, games.gamePic, games.gameName, consoles.consoleName, games.gamePrice FROM games INNER JOIN consoles ON games.gameConsole = consoles.id WHERE DATE(gameDate) < DATE(NOW()) AND consoleName = '{$consoleType}'"); 
        }else {
            $stmt = $this->db->prepare("SELECT games.id, games.gamePic, games.gameName, consoles.consoleName, games.gamePrice FROM games INNER JOIN consoles ON games.gameConsole = consoles.id WHERE DATE(gameDate) < DATE(NOW())");
        }
        $stmt->execute();
        
        $gameIndexViewData->setLastAddedGames(
            function () use ($stmt) {
                while ($game = $stmt->fetchObject(Game::class)) {
                    yield $game;
                }
            }
        );

        return $gameIndexViewData;
    }

    public function getTopSoldGames($consoleType): GameIndexViewData
    {
        $gameIndexViewData = new GameIndexViewData();

        if($consoleType !== 'ALL'){
            $stmt = $this->db->prepare("SELECT * FROM games INNER JOIN consoles ON games.gameConsole = consoles.id WHERE consoleName = '{$consoleType}' GROUP BY gameCopiesSold ORDER BY SUM(gameCopiesSold) DESC LIMIT 5");    
        }else {
            $stmt = $this->db->prepare("SELECT * FROM games INNER JOIN consoles ON games.gameConsole = consoles.id GROUP BY gameCopiesSold ORDER BY SUM(gameCopiesSold) DESC LIMIT 5");
        }
        $stmt->execute();

        $gameIndexViewData->setTopSoldGames(
            function () use ($stmt) {
                while ($game = $stmt->fetchObject(Game::class)) {
                    yield $game;
                }
            }
        );

        return $gameIndexViewData;
    }

    public function getGamesOnPromotion($consoleType): GameIndexViewData
    {
        $gameIndexViewData = new GameIndexViewData();

        if($consoleType !== 'ALL'){
            $stmt = $this->db->prepare("SELECT * FROM games INNER JOIN consoles ON games.gameConsole = consoles.id WHERE gamePromotion = 1 AND consoleName = '{$consoleType}'");
        }else {
            $stmt = $this->db->prepare("SELECT * FROM games INNER JOIN consoles ON games.gameConsole = consoles.id WHERE gamePromotion = 1");
        }
        $stmt->execute();

        $gameIndexViewData->setGamesOnPromotion(
            function () use ($stmt) {
                while ($game = $stmt->fetchObject(Game::class)) {
                    yield $game;
                }
            }
        );

        return $gameIndexViewData;
    }

    public function getGamesByConsoleAndType($gameType, $consoleType, $this_page_first_result, $results_per_page): GameIndexViewData 
    {
        $gameIndexViewData = new GameIndexViewData();

        if($gameType !== 'ALL' && $consoleType !== 'ALL'){
            $stmt = $this->db->prepare("SELECT games.id, games.gamePic, games.gameName, consoles.consoleName, games.gamePrice FROM games INNER JOIN consoles ON games.gameConsole = consoles.id INNER JOIN genres ON games.gameGenre = genres.id WHERE consoleName = '{$consoleType}' AND gameType = '{$gameType}' LIMIT $this_page_first_result, $results_per_page");
        }else if($gameType !== 'ALL'){
            $stmt = $this->db->prepare("SELECT games.id, games.gamePic, games.gameName, consoles.consoleName, games.gamePrice FROM games INNER JOIN genres ON games.gameGenre = genres.id INNER JOIN consoles ON games.gameConsole = consoles.id WHERE gameType = '{$gameType}' LIMIT $this_page_first_result, $results_per_page");
        }else if($consoleType !== 'ALL'){
            $stmt = $this->db->prepare("SELECT games.id, games.gamePic, games.gameName, consoles.consoleName, games.gamePrice FROM games INNER JOIN consoles ON games.gameConsole = consoles.id WHERE consoleName = '{$consoleType}' LIMIT $this_page_first_result, $results_per_page");
        }else {
            $stmt = $this->db->prepare("SELECT games.id, games.gamePic, games.gameName, consoles.consoleName, games.gamePrice FROM games INNER JOIN consoles ON games.gameConsole = consoles.id LIMIT $this_page_first_result, $results_per_page");
        }
        $stmt->execute();

        $gameIndexViewData->setGamesByConsoleAndType(
            function () use ($stmt) {
                while($game = $stmt->fetchObject(Game::class)){
                    yield $game;
                }
            }
        );

        return $gameIndexViewData;
    }

    public function getSingleGame($gameId):  GameIndexViewData {
        $gameIndexViewData = new GameIndexViewData();

        $stmt = $this->db->prepare("SELECT games.id, games.gamePic, games.gameName, consoles.consoleName, games.gamePrice, games.gameDescriptionHeader, games.gameDescriptionBody, games.gameNeededCPU, games.gameNeededRAM, games.gameNeededOS, games.gameNeededVideoCard, games.gameNeededFreeSpace FROM games INNER JOIN consoles ON games.gameConsole = consoles.id WHERE games.id = '{$gameId}'");
        $stmt->execute();

        $gameIndexViewData->setSingleGame(
            function () use ($stmt) {
                while($game = $stmt->fetchObject(Game::class)){
                    yield $game;
                }
            }
        );

        $stmt = $this->db->prepare("SELECT gallery.gameGalleryFirstPic, gallery.gameGallerySecondPic, gallery.gameGalleryThirdPic,  gallery.gameGalleryForthPic, gallery.gameGalleryFifthPic, gallery.gameGallerySixthPic FROM gallery INNER JOIN games ON gallery.gameName = games.gameName
        WHERE games.id = '{$gameId}'");
        $stmt->execute();

        $gameIndexViewData->setGalleryPics(
            function () use ($stmt) {
                while($galleryPic = $stmt->fetchObject(Gallery::class)){
                    yield $galleryPic;
                }
            }
        );

        $stmt = $this->db->prepare("SELECT users.picture, comments.username, comments.email, comments.date, comments.commentBody FROM comments INNER JOIN games ON games.id = comments.gameId INNER JOIN users ON users.id = comments.userId WHERE games.id = '{$gameId}'");
        $stmt->execute();

        $gameIndexViewData->setAllComments(
            function () use ($stmt) {
                while($comment = $stmt->fetchObject(Comment::class)){
                    yield $comment;
                }
            }
        );

        return $gameIndexViewData;
    }

    public function getCommentsOfGame($gameId): Array
    {
        $query = "SELECT * FROM comments WHERE gameId = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$gameId]);

        $comments = $stmt->fetchAll();

        return $comments;
    }

    public function getGameById($gameId): Game
    {
        $query = "SELECT gamePic, gameName, gamePrice, id FROM games WHERE id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$gameId]);

        $game = $stmt->fetchObject(Game::class);

        return $game;
    }

    public function getSingleGameByNameDetails($gameName): GameIndexViewData 
    {
        $gameIndexViewData = new GameIndexViewData();

        $stmt = $this->db->prepare("SELECT games.id, games.gamePic, games.gameName, consoles.consoleName, games.gamePrice, games.gameDescriptionHeader, games.gameDescriptionBody, games.gameNeededCPU, games.gameNeededRAM, games.gameNeededOS, games.gameNeededVideoCard, games.gameNeededFreeSpace FROM games INNER JOIN consoles ON games.gameConsole = consoles.id WHERE games.gameName = '{$gameName}'");
        $stmt->execute();

        $gameIndexViewData->setSingleGame(
            function () use ($stmt) {
                while($game = $stmt->fetchObject(Game::class)){
                    yield $game;
                }
            }
        );

        $stmt = $this->db->prepare("SELECT gallery.gameGalleryFirstPic, gallery.gameGallerySecondPic, gallery.gameGalleryThirdPic,  gallery.gameGalleryForthPic, gallery.gameGalleryFifthPic, gallery.gameGallerySixthPic FROM gallery INNER JOIN games ON gallery.gameName = games.gameName
        WHERE games.gameName = '{$gameName}'");
        $stmt->execute();

        $gameIndexViewData->setGalleryPics(
            function () use ($stmt) {
                while($galleryPic = $stmt->fetchObject(Gallery::class)){
                    yield $galleryPic;
                }
            }
        );

        $stmt = $this->db->prepare("SELECT users.picture, comments.username, comments.email, comments.date, comments.commentBody FROM comments INNER JOIN games ON games.id = comments.gameId INNER JOIN users ON users.id = comments.userId WHERE games.gameName = '{$gameName}'");
        $stmt->execute();

        $gameIndexViewData->setAllComments(
            function () use ($stmt) {
                while($comment = $stmt->fetchObject(Comment::class)){
                    yield $comment;
                }
            }
        );

        return $gameIndexViewData;
    }

    public function getSingleGameByName($gameName): Array 
    {
        $query = "SELECT * FROM games WHERE gameName = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$gameName]);

        $game = $stmt->fetchAll();

        return $game;
    }

    public function getCommentsOfGameByName($gameName): Array
    {
        $query = "SELECT * FROM comments INNER JOIN games ON games.id = comments.gameId WHERE games.gameName = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$gameName]);

        $comments = $stmt->fetchAll();

        return $comments;
    }
}