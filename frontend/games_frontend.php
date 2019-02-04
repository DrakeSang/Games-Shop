<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/games.css">
<link rel="stylesheet" href="css/games/games-navigation.css">
<link rel="stylesheet" href="css/games/games-show.css">

<div class="row">
    <section class="maincontent">
        <div class="category-details">
            <div class="content-set">
                Филтрирай по конзола и тип на игра
            </div>

            <section class="products">
                <div class="products-header">
                    <div class="products-toggle-button">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>

                    <aside class="products-sidebar">
                        <ul>
                            <li>
                                <span style="opacity: 0.5;">Type Game</span>
                            </li>

                            <?php if(empty($_GET)): ?>
                                <li>
                                    <span style="opacity: 1;" class="active">ALL</span>
                                </li>

                                <li>
                                    <span style="opacity: 1;">ACTION/ADVENTURE</span>
                                </li>

                                <li>
                                    <span style="opacity: 1;">SHOOTER</span>
                                </li>

                                <li>
                                    <span style="opacity: 1;">SPORTS</span>
                                </li>

                                <li>
                                    <span style="opacity: 1;">RPG</span>
                                </li>

                                <li>
                                    <span style="opacity: 1;">MMORPG</span>
                                </li>
                            <?php else: ?>

                            <li>
                                <?php if($_GET['gameType'] == 'ALL'): ?>
                                <span style="opacity: 1;" class="active">ALL</span>
                                <?php else: ?>
                                <span style="opacity: 1;">ALL</span>
                                <?php endif; ?>
                            </li>

                            <li>
                                <?php if($_GET['gameType'] == 'ACTION/ADVENTURE'): ?>
                                <span style="opacity: 1;" class="active">ACTION/ADVENTURE</span>
                                <?php else: ?>
                                <span style="opacity: 1;">ACTION/ADVENTURE</span>
                                <?php endif; ?>
                            </li>

                            <li>
                                <?php if($_GET['gameType'] == 'SHOOTER'): ?>
                                <span style="opacity: 1;" class="active">SHOOTER</span>
                                <?php else: ?>
                                <span style="opacity: 1;">SHOOTER</span>
                                <?php endif; ?>
                            </li>

                            <li>
                                <?php if($_GET['gameType'] == 'SPORTS'): ?>
                                <span style="opacity: 1;" class="active">SPORTS</span>
                                <?php else: ?>
                                <span style="opacity: 1;">SPORTS</span>
                                <?php endif; ?>
                            </li>

                            <li>
                                <?php if($_GET['gameType'] == 'RPG'): ?>
                                <span style="opacity: 1;" class="active">RPG</span>
                                <?php else: ?>
                                <span style="opacity: 1;">RPG</span>
                                <?php endif; ?>
                            </li>

                            <li>
                                <?php if($_GET['gameType'] == 'MMORPG'): ?>
                                <span style="opacity: 1;" class="active">MMORPG</span>
                                <?php else: ?>
                                <span style="opacity: 1;">MMORPG</span>
                                <?php endif; ?>
                            </li>

                            <?php endif; ?>
                        </ul>
                    </aside>

                    <ul class="products-navigation">
                        <?php if(empty($_GET)): ?>
                            <li><a href="./frontend/games/all_games.php"    class="active">ALL</a></li>
                            <li><a href="./frontend/games/pc_games.php">PC</a></li>
                            <li><a href="./frontend/games/ps_games.php">PS</a></li>
                            <li><a href="./frontend/games/xbox_games.php">XBOX</a></li>
                            <li><a href="./frontend/games/psp_games.php">PSP</a></li>       <li><a href="./frontend/games/wii_games.php">WII</a></li>      
                        <?php else: ?>

                        <li>
                            <?php if($_GET['consoleType'] == 'ALL'): ?>
                                <a href="./frontend/games/all_games.php"        class="active">ALL</a>
                                <?php else: ?>
                                <a href="./frontend/games/all_games.php">ALL</a>
                            <?php endif; ?>
                        </li>

                        <li>
                            <?php if($_GET['consoleType'] == 'PC'): ?>
                            <a href="./frontend/games/pc_games.php" class="active">PC</a>
                            <?php else: ?>
                            <a href="./frontend/games/pc_games.php">PC</a>
                            <?php endif; ?>
                        </li>

                         <li>
                            <?php if($_GET['consoleType'] == 'PS'): ?>
                            <a href="./frontend/games/ps_games.php" class="active">PS</a>
                            <?php else: ?>
                            <a href="./frontend/games/ps_games.php">PS</a>
                            <?php endif; ?>
                        </li>

                        <li>
                            <?php if($_GET['consoleType'] == 'XBOX'): ?>
                            <a href="./frontend/games/xbox_games.php" class="active">XBOX</a>
                            <?php else: ?>
                            <a href="./frontend/games/xbox_games.php">XBOX</a>
                            <?php endif; ?>
                        </li>

                        <li>
                            <?php if($_GET['consoleType'] == 'PSP'): ?>
                            <a href="./frontend/games/psp_games.php" class="active">PSP</a>
                            <?php else: ?>
                            <a href="./frontend/games/psp_games.php">PSP</a>
                            <?php endif; ?>
                        </li>

                        <li>
                            <?php if($_GET['consoleType'] == 'WII'): ?>
                            <a href="./frontend/games/wii_games.php" class="active">WII</a>
                            <?php else: ?>
                            <a href="./frontend/games/wii_games.php">WII</a>
                            <?php endif; ?>
                        </li>

                        <?php endif; ?>
                    </ul>
                </div>
            </section>     
            
            <div class="product-body">
                <img src="./pics/ajax-loader/loader.gif" class="loader">

                <div class="main">
                    <?php foreach($data->getGamesByConsoleAndType() as $game): ?>
                    <div class="box">
                        <a href="game.php?game_id=<?= $game->getId(); ?>">
                            <img src="<?= $game->getGamePic();?>">
                        </a>

                        <a class ="add_to_favourites" href="add_to_favourites.php?game_id=<?= $game->getId(); ?>">
                            <span class="fa fa-star"></span>
                        </a>

                        <p>
                            <?= $game->getGameName(); ?> 
                            <br>
                            <?= $game->{'consoleName'}; ?>
                            <br>
                            <?= $game->getGamePrice(); ?> лв.
                            <br>
                        </p>
                    </div>
                    <?php endforeach; ?>   
                </div>
                
                <div class="pagination">
                    <?php include('pagination/pagination_links.php') ?>
                </div>   
            </div>            
        </div>
    </section>
</div>

<script src="./js/games/games.js"></script> 

<?php require('./partials/footer.php') ?>