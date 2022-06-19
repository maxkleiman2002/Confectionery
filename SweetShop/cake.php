<?php
ini_set('display_errors', 'Off');
require_once 'vendor/signin.php';
require_once 'inc/funcs.php';
$products = get_products();
?>

    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Оплата</title>
    <link rel="stylesheet" href="catalogC.css">
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
        <ul class="f1">
            <li><a href="main_page.php">Головна</a></li>
            <li><a href="delivety.php">Доставка</a></li>
            <li><a href="payment.php">Оплата</a></li>
            <!--<li><a href="about_shop.php">Про магазин</a></li> -->

            <li><a href="contacts.php">Контакти</a></li>
            <?php
            if($_SESSION['user']) {

                echo ' <li ><a href = "vendor/logout.php" ><button class="auth_but" > Вихід</button ></a ></li >';

                echo '<li class="icon_profile">
                <a href="profile/profile_main.php"><img src="SweetShop/icons/user.png" alt="user"></a>
            </li>';

            }
            else{
                echo ' <li ><a href = "authorization.php" ><button class="auth_but" > Вхід</button ></a ></li >';

            }
            ?>
            <li><a href="cart/cart_page.php" id="#get-cart"><img src="SweetShop/cart.svg"></a></li>

            <li><div class="count-cart">
                    <span class="mini-count"> <?=$_SESSION['cart.qty'] ?? 0 ?></span>
                </div>
            </li>
        </ul>
    </nav>
</header>
<div class="main">

    <div class="modal fade cart-modal" id="cart-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </div>
                <div class="modal-cart-content">

                </div>

            </div>
        </div>
    </div>

    <div class="conteiner">
        <?php if(!empty($products)): ?>
            <?php foreach($products as  $product): ?>
                <?php if ($product['category'] == 2): ?>
                    <div class="wrapper">
                        <div class="product-card">
                            <div class="offer">
                                <?php if ($product['hit']): ?>
                                    <div class="offer-hit">Hit</div>
                                <?php endif; ?>
                                <?php if ($product['sale']): ?>
                                    <div class="offer-sale">Sale</div>
                                <?php  endif; ?>
                            </div>
                            <div class="card-thumb">
                                <a href="#"><img src="cake/<?= $product['img'] ?>" alt="<?=$product['title'] ?>"/> </a>
                            </div>
                            <div class="card-caption">
                                <div class="card-title">
                                    <a href="#"><?= $product['title'] ?> </a>
                                </div>
                            </div>
                            <br>
                            <p class="price">
                                Ціна
                            </p>
                            <div class="card-price text-center">
                                <?php if($product['old_price']): ?>
                                    <del><?= $product['old_price'] ?></del>
                                <?php  endif; ?>
                                <?= $product['price'] ?> грн
                            </div>
                            <button>  <a href="?cart=add&id=<?php echo $product['id']; ?>" class="btn btn-info btn-block add-to-cart" data-id="<?php echo $product['id']; ?>">
                                    <i class="fas fa-cart-arrow-down"></i> Купити
                                </a></button>

                            <div class="item-status">
                                <i class="fas fa-check text-success"></i>
                                В наявності
                            </div>
                        </div>
                    </div>
                <?php  endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="icon-bar">
        <p><a href=""><img src="icons/facebook_icon.png" alt="facebook"></a> </p>
        <p><a href=""> <img src = "icons/insta_icon.png" alt="instagram"></a> </p>
        <p><a href=""> <img src = "icons/twitter_icon.png" alt="twitter"> </a></p>
    </div>
</div>

<footer>

    <div class="logo-wrapper">
        <div class="footer-logo">
            <img src="icons/confection_logo.png" alt="logo"/>
        </div>
        <div class="footer-logo-text">
            <p>Sweet Masterpiece</p>
        </div>
    </div>

    <div class="about-shop">
        <p> <span>SWEET MASTERPIECE</span></p>
        <a href="about_shop.php"> <p>Про компанію</p></a>
        <a href=""> <p>Стати партнером</p></a>
        <a href=""><p>Робота у Sweet Masterpiece</p></a>
        <a href=""> <p>Правова інформація</p></a>
    </div>
    <div class="info-for-seller">
        <p><span>ПОКУПЦЮ</span></p>
        <p><a href="delivety.php">Доставка та оплата</a></p>
        <p><a href="">Обмін та повернення товару</a></p>
        <p><a href="">Гарантія</a></p>
        <p><a href="question.php">Задайте питання</a></p>
    </div>
    <div class="contacts">
        <p>
            <span>Контактні данні: </span><br>
            <img src="icons/phone1.png" alt="phone" /> <span class="icon">+38 066 742 2513</span><br>
            <img src="icons/email.png" alt="email" /> <span class="icon">grenyk.s@gmail.com</span>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/main.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
    </html>
