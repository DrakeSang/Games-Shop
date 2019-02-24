<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/index/slider.css">
<link rel="stylesheet" href="css/index/service-info.css">
<link rel="stylesheet" href="css/games/games-navigation.css">
<link rel="stylesheet" href="css/games/games-show.css">

<div class="wrapper">
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="pics/slider/the crew 2.jpg">
        </div>

        <div class="mySlides fade">
            <img src="pics/slider/fifa19.jpg">
        </div>

        <div class="mySlides fade">
            <img src="pics/slider/teenage-mutant-ninja-turtles.jpg">
        </div>

        <div class="mySlides fade">
            <img src="pics/slider/wow.jpg">
        </div>

        <div class="mySlides fade">
            <img src="pics/slider/spider-man.jpg">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
</div>

<br>

<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
</div>

<div class="services-info-box">
    <div class="service-shipment fade">
        <i class="fa fa-car fa-3x" aria-hidden="true"></i>
        <p>Безплатна доставка</p>
    </div>

    <div class="service-shipment fade">
        <i class="fa fa-headphones fa-3x" aria-hidden="true"></i>
        <p>24/7 Обслужване, без почивен ден!</p>
    </div>

    <div class="service-shipment fade">
        <i class="fa fa-check fa-3x" aria-hidden="true"></i>
        <p>Проверка на пратка при наложен платеж.</p>
    </div>

    <div class="service-shipment fade">
        <i class="fa fa-fast-forward fa-3x" aria-hidden="true"></i>
        <p>Експресна доставка в рамките на деня.</p>
    </div>

    <div class="service-shipment fade">
        <i class="fa fa-money fa-3x" aria-hidden="true"></i>
        <p>На изплащане с 1% оскъпяване.</p>
    </div>

    <div class="service-shipment fade">
        <i class="fa fa-shield fa-3x" aria-hidden="true"></i>
        <p>Ценова защита до 7 дни след покупка.</p>
    </div>
</div>

<section class="products">
    <div class="products-header">
        <div class="products-toggle-button">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

        <aside class="products-sidebar">
            <ul>
                <li>
                    <span style="opacity: 0.5;">Console choice</span>
                </li>
                <li>
                    <span style="opacity: 1;" class="active">ALL</span>
                </li>
                <li>
                    <span style="opacity: 1;">PC</span>
                </li>
                <li>
                    <span style="opacity: 1;">Xbox</span>
                </li>
                <li>
                    <span style="opacity: 1;">PS</span>
                </li>
            </ul>
        </aside>

        <ul class="products-navigation">
            <li>
                <a href="./frontend/products/newest_games.php" class="active">Newest</a>
            </li>
            <li>
                <a href="./frontend/products/top_sold_games.php">Top Sold</a>
            </li>
            <li>
                <a href="./frontend/products/games_on_promotion.php">Discount</a>
            </li>
        </ul>
    </div>

    <div class="product-body">
        <img src="./pics/ajax-loader/loader.gif" class="loader">

        <div class="main">
            <?php foreach ($data->getLastAddedGames() as $game): ?>
            <div class="box">
                <a href="game.php?game_id=<?= $game->getId(); ?>">
                    <img src="<?= $game->getGamePic(); ?>">
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
    </div>
</section>

<script src="./js/slider/slider.js"></script>
<script src="./js/index/index.js"></script> 

<?php require('./partials/footer.php') ?>