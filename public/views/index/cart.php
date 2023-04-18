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
                                <p class="cart-count-text lang" data-text="cart-products">{text}: <span id="productsCount">1</span></p>
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
                                    <div class="product_item">
                                        <p class="name-product">Noble: Day Subscription</p>
                                        <p class="amount">$ 7.00</p>
                                    </div>
                                    
                                </div>
                                <div class="total-box">
                                        <p class="lang" data-text="cart-product-cost">{text}</p>
                                        <p>$ 7</p>
                                </div>
                                <div class="input-block">
                                    <div class="input_arrow">
                                        <input class="input-coupon langInput" type="text" data-text="cart-promo" placeholder="{text}">
                                        <img src="../public/img/rArrow.svg">
                                    </div>
                                    
                                    <input type="mail" class="langInput" data-text="cart-mail" placeholder="{text}">
                                </div>
                                <div class="button-box">
                                    <button class="lang" data-text="cart-pay-button">{text}</button>
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