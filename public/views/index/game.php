<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/min/header-min.css">
	<link rel="stylesheet" href="public/css/game_item-page.css">
    <title>Товары</title>
</head>
<body>
    %%HEADER%%
    <div class="wrapper">
        <section class="game-items">
            <div class="container">
                <div class="main">
                    <div class="up-block">
                        <div class="left-block">
                            <div class="game-name-box">
                                <p class="name-text">%%GAMENAME%%</p>
                            </div>
                            <div class="info-box">
                                <p class="info-text lang" data-text="game-description">{text}</p>
                            </div>
                        </div>
                        <div class="right-block">
                            <div class="input-box">
                                <img src="../public/img/find.svg">
                                <input type="text" class="langInput" data-text="search" placeholder="{text}">
                            </div>
                        </div>
                    </div>
                        <div class="product-block">
                            <div class="os-block">
                                <div class="text-block">
                                    <p>OS</p>
                                </div>
                                <div class="button-block" id="os">
                                </div>
                            </div>
                            <div class="cpu-block">
                                <div class="text-block">
                                    <p>CPU</p>
                                </div>
                                <div class="button-block" id="cpu">
                                </div>
                            </div>
                            <div class="gpu-block">
                                <div class="text-block">
                                    <p>GPU</p>
                                </div>
                                <div class="button-block" id="gpu">
                                </div>
                            </div>
                        </div>
                        <div class="catalog-block">
                            <div class="item">
                                <div class="item-image">
                                    <img src="../public/img/561.png">
                                    <p>NOBLE</p>
                                    <p class="green">UNDETECTED</p>
                                </div>
                                <div class="item_bottom-block">                                    
                                    <button><img class="cart" src="../public/img/cart-dark.svg">ADD TO CART</button>
                                    <a href="#">
                                        MORE DETAILS 
                                        <img src="../public/img/arrow.svg">
                                    </a>                              
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-image">
                                    <img src="../public/img/564.png">
                                    <p>EDENITY</p>
                                    <p class="green">UNDETECTED</p>
                                </div>
                                <div class="item_bottom-block">                                    
                                    <button><img class="cart" src="../public/img/cart-dark.svg">ADD TO CART</button>
                                    <a href="#">
                                        MORE DETAILS 
                                        <img src="../public/img/arrow.svg">
                                    </a>                              
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-image">
                                    <img src="../public/img/563.png">
                                    <p>HYPERFLICK</p>
                                    <p class="green">UNDETECTED</p>
                                </div>
                                <div class="item_bottom-block">                                    
                                    <button><img class="cart" src="../public/img/cart-dark.svg">ADD TO CART</button>
                                    <a href="#">
                                        MORE DETAILS 
                                        <img src="../public/img/arrow.svg">
                                    </a>                              
                                </div>
                            </div>
                            <div class="item">
                                <div class="item-image">
                                    <img src="../public/img/562.png">
                                    <p>CRITICALHIT</p>
                                    <p class="green">UNDETECTED</p>
                                </div>
                                <div class="item_bottom-block">                                    
                                    <button><img class="cart" src="../public/img/cart-dark.svg">ADD TO CART</button>
                                    <a href="#">
                                        MORE DETAILS 
                                        <img src="../public/img/arrow.svg">
                                    </a>                              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modals -->
    <div class="modal modal_active">
        <div class="bg_blur"></div>
        <div class="modal_body">
            <div class="modal_item">                
                <p class="product_name">product_name: Day Subscription</p>
                <p class="product_price">$ 7.00</p>
            </div>
            <div class="modal_item">
                <p class="product_name">product_name: Day Subscription</p>
                <p class="product_price">$ 40.00</p>
            </div>
            <div class="modal_item">                
                <p class="product_name">product_name: Day Subscription</p>
                <p class="product_price">$ 125.00</p>
            </div>
            <button class="modal_button">Close</button>
        </div>
    </div>

    <!-- Scripts -->
	<script src="public/js/translate.js"></script>
	<script src="public/js/min/event-click-min.js"></script>
	<script src="vendor/jquery.js"></script>
	<script src="public/js/ajax-events-games.js"></script>
</body>
</html>