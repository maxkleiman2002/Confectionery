<?php
ini_set('display_errors', 'Off');
require_once '../vendor/signin.php';
?>

    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Оплата</title>
    <link rel="stylesheet" href="category.css">
</head>
<body>
<header>
    <div class="logo">
        <div class="elips_logo">
            <img src="../icons/confection_logo.png" alt="logo"/>
        </div>
        <div class="logo-text">

            <p>
                Sweet<br>
                Masterpiece
            </p>
        </div>
    </div>

    <nav>
        <ul class="f1">
            <li><a href="../main_page.php">Головна</a></li>
            <li><a href="../delivety.php">Доставка</a></li>
            <li><a href="../payment.php">Оплата</a></li>
            <!--<li><a href="about_shop.php">Про магазин</a></li> -->

            <li><a href="../contacts.php">Контакти</a></li>
            <?php
            if($_SESSION['user']) {

                echo ' <li ><a href = "../vendor/logout.php" ><button class="auth_but" > Вихід</button ></a ></li >';

                echo '<li class="icon_profile">
                <a href="../profile/profile_main.php"><img src="../icons/user.png" alt="user"></a>
            </li>';

            }
            else{
                echo ' <li ><a href = "../authorization.php" ><button class="auth_but" > Вхід</button ></a ></li >';

            }
            ?>
            <li><a href="../cart/cart_page.php" id="#get-cart"><img src="../cart.svg"></a></li>

            <li><div class="count-cart">
                    <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
                </div>
            </li>
        </ul>
    </nav>
</header>


<footer>

    <div class="logo-wrapper">
        <div class="footer-logo">
            <img src="../icons/confection_logo.png" alt="logo"/>
        </div>
        <div class="footer-logo-text">
            <p>Sweet Masterpiece</p>
        </div>
    </div>

    <div class="about-shop">
        <p> <span>SWEET MASTERPIECE</span></p>
        <a href="../about_shop.php"> <p>Про компанію</p></a>
        <a href=""> <p>Стати партнером</p></a>
        <a href=""><p>Робота у Sweet Masterpiece</p></a>
        <a href=""> <p>Правова інформація</p></a>
    </div>
    <div class="info-for-seller">
        <p><span>ПОКУПЦЮ</span></p>
        <p><a href="../delivety.php">Доставка та оплата</a></p>
        <p><a href="">Обмін та повернення товару</a></p>
        <p><a href="">Гарантія</a></p>
        <p><a href="../question.php">Задайте питання</a></p>
    </div>
    <div class="contacts">
        <p>
            <span>Контактні данні: </span><br>
            <img src="../icons/phone1.png" alt="phone" /> <span class="icon">+38 066 742 2513</span><br>
            <img src="../icons/email.png" alt="email" /> <span class="icon">grenyk.s@gmail.com</span>
        </p>
        <br/>
        <p>
            <span> Графік роботи call-центру</span><br>
            Цілодобово
        </p>
        <br/>
        <p>
            <span>Адреса:</span><br>
            м.Чернівці, вул. Героїв Майдану, 159
        </p>
    </div>

</footer>

</body>
    </html>
