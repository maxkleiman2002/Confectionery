<?php
ini_set('display_errors', 'Off');
session_start();
require_once '../vendor/signin.php';
require_once '../inc/connect.php';
require_once '../inc/funcs.php';
$products = get_products();

$_SESSION['cart_title'] = array();
$_SESSION['cart_img'] = array();
$_SESSION['cart_price'] = array();
$_SESSION['cart_qty'] = array();
$_SESSION['cart_category'] = array();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "empty":
            unset($_SESSION["cart"]);
            unset($_SESSION["cart.sum"]);
            unset($_SESSION["cart.qty"]);
            break;
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Корзина</title>
    <link rel="stylesheet" href="cart_page2.css">

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


    <div class="cart-modal">
        <div class="modal-body">

            <?php if(!empty($_SESSION['cart'])):?>
            <form action="../order/orderForm1.php" method="POST">
                <table class="table">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Назва</th>
                        <th scope="col">Ціна</th>
                        <th scope="col">Кількість</th>
                    </tr>


                    <tbody>

                    <?php foreach($_SESSION['cart'] as $id  => $item):?>
                        <?php if($item['category'] == 4):?>
                            <tr>
                                <td class="td-img"><a href="#"><img src="../otherSweet/<?=$item['img'] ?>" alt="<?=$item['title'] ?>"/></a></td>
                                <td class="td-title"><a href="#"><?=$item['title'] ?></a></td>
                                <td class="td-price"><?=$item['price'] ?></td>
                                <td class="td-qty"><?=$item['qty'] ?></td>
                                <td><a href="cart_page.php?page=cart&remove=<?=$item['id']?>" class="remove">Remove</a></td>
                                <?php
                                array_push($_SESSION['cart_title'],$item['title']);
                                array_push($_SESSION['cart_img'],$item['img']);
                                array_push($_SESSION['cart_price'],$item['price']);
                                array_push($_SESSION['cart_qty'],$item['qty']);
                                array_push($_SESSION['cart_category'],$item['category']);
                                ?>



                            </tr>
                        <?php endif; ?>
                        <?php if($item['category'] == 2):?>
                            <tr>
                                <td class="td-img"><a href="#"><img src="../cake/<?=$item['img'] ?>" alt="<?=$item['title'] ?>"/></a></td>
                                <td class="td-title"><a href="#"><?=$item['title'] ?></a></td>
                                <td class="td-price"><?=$item['price'] ?></td>
                                <td class="td-qty"><?=$item['qty'] ?></td>
                                <td><a href="cart_page.php?page=cart&remove=<?=$item['id']?>" class="remove">Remove</a></td>

                                <?php
                                array_push($_SESSION['cart_title'],$item['title']);
                                array_push($_SESSION['cart_img'],$item['img']);
                                array_push($_SESSION['cart_price'],$item['price']);
                                array_push($_SESSION['cart_qty'],$item['qty']);
                                array_push($_SESSION['cart_category'],$item['category']);
                                ?>


                            </tr>
                        <?php endif; ?>
                        <?php if($item['category'] == 3):?>
                            <tr>
                                <td class="td-img"><a href="#"><img src="../desert/<?=$item['img'] ?>" alt="<?=$item['title'] ?>"/></a></td>
                                <td class="td-title"><a href="#"><?=$item['title'] ?></a></td>
                                <td class="td-price"><?=$item['price'] ?></td>
                                <td class="td-qty"><?=$item['qty'] ?></td>
                                <td><a href="cart_page.php?page=cart&remove=<?=$item['id']?>" class="remove">Remove</a></td>
                                <?php
                                array_push($_SESSION['cart_title'],$item['title']);
                                array_push($_SESSION['cart_img'],$item['img']);
                                array_push($_SESSION['cart_price'],$item['price']);
                                array_push($_SESSION['cart_qty'],$item['qty']);
                                ?>

                            </tr>
                        <?php endif; ?>
                        <?php if($item['category'] == 1):?>
                            <tr>
                                <td class="td-img"><a href="#"><img src="../bakery/<?=$item['img'] ?>" alt="<?=$item['title'] ?>"/></a></td>
                                <td class="td-title"><a href="#"><?=$item['title'] ?></a></td>
                                <td class="td-price"><?=$item['price'] ?></td>
                                <td class="td-qty"><?=$item['qty'] ?></td>
                                <td><a href="cart_page.php?page=cart&remove=<?=$item['id']?>" class="remove">Remove</a></td>
                                <?php
                                array_push($_SESSION['cart_title'],$item['title']);
                                array_push($_SESSION['cart_img'],$item['img']);
                                array_push($_SESSION['cart_price'],$item['price']);
                                array_push($_SESSION['cart_qty'],$item['qty']);
                                array_push($_SESSION['cart_category'],$item['category']);
                                ?>

                            </tr>
                        <?php endif; ?>




                    <?php endforeach;?>

                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-cart"><img src="smile2.png" alt="no-cart"/>
                    <p>Ваш кошик пустий</p>
                </div>
            <?php endif; ?>
        </div>




    </div>
    <?php if(!empty($_SESSION['cart'])):?>
    <div class="confirm-order">



            <p class="t1"><span class="small"> ВАРТІСТЬ ТОВАРІВ:</span> <span class="order-price"><?=$_SESSION['cart.sum'] ?> грн.</span> </p>
            <p class="t2"><span class="small"> ДОСТАВКА:</span> <span class="big">78 грн.</span> </p>
            <hr color="4E461B">
            <p class="t3"><span class="big2"> РАЗОМ: </span><span class="order-sum"><?=$_SESSION['cart.sum'] + 78  ?> грн.</span> </p>
            <input type="hidden" name="sum" value="<?=$_SESSION['cart.sum'] + 78  ?>">
            <input type="hidden" name="qty_total" value="<?=$_SESSION['cart.qty'] ?>">
        <?php else:?>

        <?php endif; ?>

        <?php if(!empty($_SESSION['cart'])):?>
        <div class="modal-footer">

            <button type="submit"  class="btn-primary"> Оформити замовлення</button>
            <button type="button" class="btn-danger" id="clear_cart" ><a style="color: #fff;text-decoration: none;" href="cart_page.php?action=empty" class="clear_cart" >Очистити корзину</a></button>
            
        </div>
    </div>
</form>
        <?php endif; ?>


    </div>

</div>


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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</footer>
</body>
</html>