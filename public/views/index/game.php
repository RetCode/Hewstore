<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/min/header-min.css">   
	<link rel="stylesheet" href="public/css/min/game_item-page-min.css">
    <link rel="stylesheet" href="public/css/main-adaptive.css">
    <link rel="icon" type="image/x-icon" href="public/img/icon.png">
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
                                <div class="input-box">
                                    <img src="../public/img/find.svg">
                                    <input type="text" class="langInput" id="findInput" data-text="search" placeholder="{text}">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="product-block">
                            <div class="os-block">
                                <div class="text-block">
                                    <p>OS</p>
                                </div>
                                <div class="button-block" id="os">
                                    <button x-data="1" class="os-button">Windows 7</button>
                                    <button x-data="2" class="os-button">Windows 8</button>
                                    <button x-data="3" class="os-button">Windows 10</button>
                                    <button x-data="4" class="os-button">Windows 11</button>
                                </div>
                            </div>
                            <div class="cpu-block">
                                <div class="text-block">
                                    <p>CPU</p>
                                </div>
                                <div class="button-block" id="cpu">
                                    <button x-data="1" class="cpu-button">Intel</button>
                                    <button x-data="2" class="cpu-button">AMD</button>
                                </div>
                            </div>
                            <div class="gpu-block">
                                <div class="text-block">
                                    <p>GPU</p>
                                </div>
                                <div class="button-block" id="gpu">
                                    <button x-data="1" class="gpu-button">Nvidia</button>
                                    <button x-data="2" class="gpu-button">AMD</button>
                                </div>
                            </div>
                        </div>
                        <div class="catalog-block">
                            <div class="loading">
                                <div class="spinner">
                                    <svg viewBox="25 25 50 50" class="circular">
                                        <circle stroke-miterlimit="10" stroke-width="3" fill="none" r="20" cy="50" cx="50" class="path"></circle>
                                    </svg>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modals -->
    <div class="modal">
        <div class="bg_blur"></div>
        <div class="modal_body">
            <div class="modal-items">
            </div>
            <button class="modal_button">Close</button>
        </div>
    </div>

    <!-- Scripts -->
    <script src="public/js/cart-handler.js"></script>
	<script src="public/js/translate.js"></script>
	<script src="public/js/min/event-click-min.js"></script>
	<script src="vendor/jquery.js"></script>
	<script src="public/js/ajax-events-games.js"></script>
</body>
</html>