<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/min/header-min.css">
	<link rel="stylesheet" href="public/css/min/cart-page-min.css">
    <link rel="stylesheet" href="public/css/main-adaptive.css">
    <link rel="icon" type="image/x-icon" href="public/img/icon.png">
    <title>Корзина</title>
</head>
<body>
    %%HEADER%%
    <div class="wrapper">
        <section class="cart-page">
            <div class="container">
                <div class="loading">
                    <svg viewBox="25 25 50 50">
                        <circle r="20" cy="50" cx="50"></circle>
                    </svg>
                </div> 
                <div class="main" hidden>
                    <div class="left-block">
                        <div class="cart-block">
                            <div class="cart-info-box">
                                <p class="cart-text lang" data-text="cart">{text}</p>
                            </div>
                            <div class="cart-count-box">
                                <p class="cart-count-text lang" data-text="cart-products">{text}: <span id="productsCount">0</span></p>
                            </div>
                        </div>
                        <div class="all-box">
                            <div class="boxes">
                            <div class="clear-block">                                
                                <button class="lang cart-clear-all" data-text="cart-clear-all"><img class="img-trash" src="../public/img/cart__trash.svg"> {text}</button>
                            </div>
                            <div class="products">
                                
                            </div>
                            
                        </div>
                        <div class="cart-form-box">
                                <div class="product-name-box">
                                    <p class="lang" data-text="cart-product">{text}</p>
                                </div>
                                <div class="product-amount-box">
                                    <div class="products-cart">
                                    </div>
                                </div>
                                <div class="total-box">
                                        <p class="lang" data-text="cart-product-cost">{text}</p>
                                        <p>$ <span id="cost">0</span></p>
                                </div>
                                <div class="input-block">
                                    <div class="input_arrow">
                                        <input id="promo" class="input-coupon langInput" type="text" data-text="cart-promo" placeholder="{text}">
                                        <img id="enter_promo" src="../public/img/rArrow.svg">
                                    </div>
                                    
                                    <input id="cart-mail" type="mail" class="langInput" data-text="cart-mail" placeholder="{text}">
                                </div>
                                <div class="button-box">
                                    <button disabled class="lang pay-btn unactive" data-text="cart-pay-button">{text}</button>
                            </div>
                    </div>                 
                </div>
            </div>
        </section>
    </div>
    <!-- Scripts -->
    <script src="vendor/jquery.js"></script>
    <script src="public/js/cart-handler.js"></script>
    <script src="public/js/cart-executer.js"></script>
	<script src="public/js/translate.js"></script>
	<script src="public/js/min/event-click-min.js"></script>
</body>
</html>