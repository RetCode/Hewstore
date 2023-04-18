<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/min/header-min.css">
	<link rel="stylesheet" href="public/css/min/cart-page-min.css">
    <title>Корзина</title>
</head>
<body>
    %%HEADER%%
    <div class="wrapper">
        <section class="cart-page">
            <div class="container">
                <div class="main">
                    <div class="left-block">
                        <div class="cart-block">
                            <div class="cart-info-box">
                                <p class="cart-text lang" data-text="cart">{text}</p>
                            </div>
                            <div class="cart-count-box">
                                <p class="cart-count-text lang" data-text="cart-products">{text}: 1</p>
                            </div>
                        </div>
                        <div class="all-box">
                            <div class="boxes">
                            <div class="clear-block">
                                <img class="img-trash" src="../public/img/cart__trash.svg">
                                <button class="lang cart-clear-all" data-text="cart-clear-all">{text}</button>
                            </div>
                            <div class="product-count-block">
                                <div class="product-img-box">
                                    <img src="../public/img/561.png">
                                </div>
                                <div class="product-count-text-box">
                                    <p>Noble: Day Subscription</p>
                                    <p class="dark-text">Overwatch 2 Software</p>
                                </div>
                                <div class="input-box">
                                    <button class="button-plus">+</button>
                                    <input type="text" value="1">
                                    <button class="button-minus">-</button>
                                </div>
                                <div class="total-number-box">
                                    <p>$ 7.00</p>
                                </div>
                                <div class="trash-box">
                                    <img src="../public/img/cart__trash.svg">
                                </div>
                            </div>
                            </div>
                            <div class="cart-form-box">
                                <div class="product-name-box">
                                    <p class="lang" data-text="cart-product">{text}</p>
                                </div>
                                <div class="product-amount-box">
                                    <p class="name-product">Noble: Day Subscription</p>
                                    <p class="amount">$ 7.00</p>
                                </div>
                                <div class="total-box">
                                        <p class="lang" data-text="cart-product-cost">{text}</p>
                                        <p>$ 7</p>
                                </div>
                                <div class="input-block">
                                    <input class="input-coupon langInput" type="text" data-text="cart-promo" placeholder="{text}">
                                    <input type="mail" class="langInput" data-text="cart-mail" placeholder="{text}">
                                </div>
                                <div class="button-box">
                                    <button class="lang" data-text="cart-pay-button">{text}</button>
                            </div>
                        </div>
                        </div>
                    </div>                 
                </div>
            </div>
        </section>
    </div>
    <!-- Scripts -->
    <script src="public/js/cart-handler.js"></script>
	<script src="public/js/translate.js"></script>
	<script src="public/js/min/event-click-min.js"></script>
</body>
</html>