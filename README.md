# GamesShop

My project is games shop.

I am not using no bootstrap and no framework.I use PHP and Database to store and show information.I wrote css to make it responisve on different devices(laptop,tablet,pc,phones).

The users i have registered are 2:
username:emicha and password:dahaka
username:nikito and password:123

After login in my footer you can check that i successfully added games to favourites and made orders in my footer on links История на поръчките и Любими продукти.

Also the comments i have are on games page on WOW Battle of Azeroth.You can check there that i successfully added comments by two users.

In the header i have the fllowing links:

1)Logo:

It leads to my homepage(index.php).

Here i have slider where i have automatic changing pics and also manual by arrows or dots with which user can change the pics.I looked in internet how to make the slider,because this is my first time making it.

Under it i have simple images with text under them.

After that user can see our newest,top sold and games on promiton.On the left side he can click to see another menu to change the preferd console((ALL,PC,PS,XBOX,PSP,WII)) he likes.By default i set active to be newest games for ALL consoles.When user choose different console and game type(newest,top sold,on promotion) i use ajax to dynamically change the games content without sending him to another page.

The js is js/index/index.js.
The js for my slide is js/slider/slider.js.

2)Shops:

Here all users of my site looged or not logged in can look our shops in different towns.I use ajax so when user clicks another town to see the shops i change the content without going to another page.I let the user stay on the same page,but dynamically changing the content of the choosed town.

Under the shops i put simple gallery with pics and user can click the pics to chahge them.

I have js folder where i keep by name(footer,header,shops..) the js files for specific page of my site.

The js file i use for this is js/shops/shops.js

3)Games:

On this page the user can see all of our games choosing the console(ALL,PC,PS,XBOX,PSP,WII) and on the left side type of the game(ALL, ACTION/ADVENTURE, SHOOTER, SPORTS, RPG, MMORPG).By default i set active class to console(ALL) and type of the game(ALL) so when user first see the page he can see all of our games.When user choose different console and type of game again i use ajax to dynamically change the games content without sending him to another page.Also when user choose different console and type of game i change the active tab so i can know what the user choosed and send the details to the attr href off the clciked link by the ajax i made.

I use the Game in my Service folder.There i make all my fucntions with queries to my databse which i need for working with my games like getting newest games,getting top sold games,getting games by console and type of the game and more...

User can click on game pic to see the details for that specific game.In the link i keep the id of the game so i caa find that game by id in my database and show all details for it.User can see main pic,gallery pics of the game,descriptiona and specifications of the game.

Also can look the comments of the game or to buy it if he likes it.

The js file i use for this is js/games/game.js
The js file for clcikng different pics from my gallery,changing the tabs between description and specifications of the game and also to show alert for adding game to shooping cart is js/games/singleGame.js.

Also on that page i added my pagination.I show 5 games per page and in every page link i have the active console type and active type of the game.Again on clcking on console and type of game i send by ajax with method post i send console and type to my pagination php file(frontend/pagination/pagination_links.php) so i can make the query for this choice to take the count of the games i receive from my database and after that to divide the games count by games per page.I need to ceil them up,because for example if have 20 games returned for that chocie and 3 games per page i will have 7 link pages(1page 2page 3page 4page 5page 6page 7page).When user clicks on some page i check if my GEt array is not empty and i take my GET array and send them to my Game Service function to get the games by console and type for that page.

4)Contact us:

Contact us form with validation rules.

5)Arena RPG Game:

Here i made simple arena rpg game where user choose his hero and after choosing it he gets random enemy.On attck hero and enemy attack each other and until someone health drops to zero they play.I watched how to make the game in internet from one tutorial.

6)Search game by name:

Here user can search game by name in our database.If the query does not return anything i show him message that there is no such game and he can return to our games page to check for a game.If the game name is correct i show him the game details.

7)Login/Register

On login I have validation and if the username and password i show him error message or if only password is wrong i show him taht only password is wrong.After login i save in session his id so i know he is now logged in.

On Register i have again validation and for uploading the pic i have seperate Service/Upload where i upload the pic to my avatar folder.

The functionality i embedded in my site is the fllowing:

Login/Register:Every user can look and go aroudn the site seeing all games,choosing games by console and type,seeing single game details,searching for game by name.If user want to add comment,buy game,see his favourite products see his order history he msut be logged in.I chekck first if i don't have in my session saved user_id i send him to my login page.If i have i elt him use thsis options.
After successfull login i cahnge my header links to logo out,sign up and shopping cart.

On my games page i have functionality for user to add game to his favourites.The star next to every pic i have is for that.First again i check if user is logged if not i send him to login,then if the game was already addded i show alert that game was alreadd added and if it is not added i added and show him alert message for success.I save in my database the favourite game where i keep userId and gameId so later he can look his favourite games from the link in my footer.

On seeing single game details logged user can add comment for that game.I send him to form where i have already filled his username and email and he only write his comment text.In my database i save the comment with the following details:username, email, comment text, date, gameId and userId.After successfull adding i sent user back to the same game and he can see his comment.

Again on seeing single game details user can buy the game he likes.I show him alert that the game was successfully addded to his shopping cart and when he finish with the games he want to buy he can go to his shoopinng cart in my header.There i show the games he bought with pic,name,price,quantity set to 1 and add to cart button.I have table to show the details of the order and after he choose quantity of all games and clcik add to cart i load the table.If he does not want some game he can clcik remvoe to remove the game from the order.He can change the quantity of teh games as many times as he want before he goes to my checkout form.On checkout i send hm to form to enter the detais for the order.I did not make the part where i need ot take his creditt card details and take money,because i do not know how.In my databse i save order in two tables:orders and orders_products.In orders i save the order with details:orderId(random number mt_rand()),userId(to know which user made the order),totalSum(the total sum of the order),date,address(address of the user).
In orders_products i save the products of the order:orderId(to know the products of specific order),userId(teh id of teh user who ordered),gameId(the id of teh game which was ordered),quantity(quntity of the game),price(price for that game depending on the quantity).The files i use for adding games to his shooping cart,the cart details,deleting game from order and checkout are add_item.php,cart.php and checkout.php.
