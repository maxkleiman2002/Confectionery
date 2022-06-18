<?php


session_start();

require_once 'vendor/signin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Головна сторінка</title>
    <link rel="stylesheet" href="main_page.css">
</head>
<body>
<header>
    <div class="logo">
        <div class="elips_logo">
            <img src="icons/confection_logo.png" alt="logo"/>
        </div>
        <div class="logo-text">
            <p>
                Sweet<br>
                Masterpiece
            </p>
        </div>
    </div>

    <nav>
        <ul class="f1" >
            <li><a href="main_screen.php">Головна</a></li>
            <li><a href="delivety.php">Доставка</a></li>
            <li><a href="payment.php">Оплата</a></li>
            <li><a href="contacts.php">Контакти</a></li>
            <?php
            ini_set('display_errors', 0);
            if($_SESSION['user']) {

                echo ' <li ><a href = "vendor/logout.php" ><button class="auth_but" > Вихід</button ></a ></li >';
                echo '<li class="icon_profile">
                <a href="profile/profile_main.php"><img src="icons/user.png" alt="user" width="20" height="20"></a>
            </li>';
            }
            else{
                echo ' <li ><a href = "authorization.php" ><button class="auth_but" > Вхід</button ></a ></li >';
            }
            ?>
            <li><a href="cart/cart_page.php" id="#get-cart"><img src="cart.svg"></a></li>

            <li><div class="count-cart">
                    <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
                </div>
            </li>
        </ul>
    </nav>
</header>
<div class="clear"></div>
<div class="main">
    <div class="text">
        <h1>Смачний десерт -<br>
            гарант хорошого настрою !
        </h1><br>
        <p>
            Онлайн магазин електроніки та<br>
            комп'ютерной техніки
        </p>
        <br>

        <button class="item"><a href="catalog.php">Подивитись товари</a></button>

    </div>
    <div class="im">
        <p>
            <img src="confictionery_big_img.png" alt="big-img"/>
        </p>
    </div>

</div>

</body>
</html>