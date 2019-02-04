<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games Shop</title>
    <link rel="shortcut icon" type="image/jpg" href="fav-icon/fav-icon.jpg">
    <link rel="stylesheet" href="css/reset-style.css">
    <link rel="stylesheet" href="css/header.css">  
    <link rel="stylesheet" href="css/footer.css"> 
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/header/header.js"></script>
</head>

<body>
    <div class="header-overlay">
        <header class="navigation-header">
            <div class="nav-menu-toggle">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>

            <nav class="header-nav active-tab">
                <ul>
                    <li>
                        <a href="shops.php">Shops</a>
                    </li>
                    <li>
                        <a href="games.php">Games</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact us</a>
                    </li>
                    <li>
                        <a href="arena_rpg_game.php">Arena RPG Game</a>
                    </li>
                    <li>
                        <form action = "get_game_by_name.php" class="search-container" method="post">
                            <input type="text" placeholder="Search your game.." name="gameName">
                            <button type="submit" name="search">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>

            <a href="index.php" class="header-logo">
                <img src="pics/logo/logo.png" alt="Company logo">
            </a>

            <div class="user-actions-toggle">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>

            <nav class="header-actions active-tab">
                <ul>
                    <li>
                        <?php if(!empty($_SESSION['user_id'])): ?>
                        <a href="logout.php">Log out</a>
                        <a href="register.php">Sign Up</a>
                        <a href="cart.php">Shopping cart</a>
                        <?php else: ?>
                        <a href="login.php">Log in</a>
                        <a href="register.php">Sign Up</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </header>
    </div>