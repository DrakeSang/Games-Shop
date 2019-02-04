<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/shops.css">

<section class="shops">
    <h1 class="shop-title">Магазини</h1>

    <div class="shop-navigation">
        <ul>
            <li>
                <a href="#" class="active">Варна</a>
            </li>
            <li>
                <a href="./frontend/shops/sofiq.php">София</a>
            </li>
            <li>
                <a href="./frontend/shops/plovdiv.php">Пловдив</a>
            </li>
            <li>
                <a href="./frontend/shops/burgas.php">Бургас</a>
            </li>
        </ul>
    </div>

    <div class="shop-main">
        <img src="./pics/ajax-loader/loader.gif" class="loader"></img>

        <div class="shop-body">
            <section class="shop">
                <div class="shop-information">
                    <h3>Grand Mall Varna, ет.2</h3>
                    <p>бул, "Андрей Сахаров" №2</p>
                    <p>тел.: 0887 803 201</p>
                    <p>email: varnamall@pulsar.bg</p>
                    <span>Раб. време: без почивен ден от 10:00 - 22:00 ч.</span>
                </div>

                <div class="shop-image">
                    <img src="pics/shops/varna/grandMallShop.jpg" alt="Varna Shop">
                </div>
            </section>
        </div>
    </div>
</section>

<div class="wrapper">
    <p>Our gallery</p>

    <img src="pics/shops/gallery/battlefield.jpg" alt="Shops Gallery" class="main-image">

    <section class="thumbnail-section">
        <img src="pics/shops/gallery/assasincreed.jpg" class="thumbnail-image">
        <img src="pics/shops/gallery/callofduty.jpg" class="thumbnail-image">
        <img src="pics/shops/gallery/dota2.jpg" class="thumbnail-image">
        <img src="pics/shops/gallery/elderscrolls.jpg" class="thumbnail-image">
        <img src="pics/shops/gallery/thewitcher.jpg" class="thumbnail-image">
        <img src="pics/shops/gallery/wow.jpg" class="thumbnail-image">
    </section>
</div>

<script src="./js/shops/shops.js"></script>

<?php require('./partials/footer.php') ?>