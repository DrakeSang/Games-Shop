<?php 

use Service\Game\GameService;

require_once $_SERVER['DOCUMENT_ROOT'] . '/GamesShop/app.php';

$gameService = new GameService($db);

$gameId = $_GET['id'];

$data = $gameService->getSingleGame($gameId);

?>

<?php sleep(2) ?>

<div class="game">
    <?php foreach($data->getSingleGame() as $game): ?>
        <table>
            <thead>
                <tr>
                    <td>Общи</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th>Категория</th>
                    <td><?= $game->{'consoleName'}; ?></td>
                </tr>
            </tbody>

            <thead>
                <tr>
                    <td>System Requirements</td>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th>Операционна система</th>
                    <td><?= $game->getGameNeededOS(); ?></td>
                </tr>

                <tr>
                    <th>Процесор</th>
                    <td><?= $game->getGameNeededCPU(); ?></td>
                </tr>

                <tr>
                    <th>Памет</th>
                    <td><?= $game->getGameNeededRAM(); ?></td>
                </tr>

                <tr>
                    <th>Видео</th>
                    <td><?= $game->getGameNeededVideoCard(); ?></td>
                </tr>

                <tr>
                    <th>Дисково пространство</th>
                    <td><?= $game->getGameNeededFreeSpace(); ?></td>
                </tr>
            </tbody>
        </table>
    <?php endforeach; ?>
</div>