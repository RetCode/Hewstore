<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/min/header-min.css">
	<link rel="stylesheet" href="public/css/payments-page.css">
    <link rel="icon" type="image/x-icon" href="public/img/icon.png">
    <title>HewStore</title>
</head>
<body>
    %%HEADER%%
    <div class="wrapper">
        <section class="payment-section">
            <div class="container">
                <div class="main">
                    <div class="select_method-container">                        
                        <div class="select_payment_type-block show">
                            <a class="close_button" href="cart-page.html">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.9" clip-path="url(#clip0_22_859)">
                                        <path d="M10.6667 10.6665L21.3334 21.3332" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21.3334 10.6665L10.6667 21.3332" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_22_859">
                                            <rect width="32" height="32" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>                            
                            </a>
                            <div class="select_payment_type-title">
                                <p>Choose a payment method</p>
                            </div>
                            <div class="select_methods">
                                <div class="select_method active" data-id="1">
                                    <div class="select_method-title">
                                        <p>Cryptocurrencies</p>
                                    </div>
                                    <div class="select_method-desc">
                                        <p>Bitcoin, Litecoin, Ethereum, Bitcoin Cash, Monero, Solana, Ripple, Binance Coin, Tron, USDC, USDT ...</p>
                                    </div>
                                </div>
                                <!-- <div class="select_method" data-id="2">
                                    <div class="select_method-title">
                                        <p>Wallets</p>
                                    </div>
                                    <div class="select_method-desc">
                                        <p>PayPal, CashApp, Qiwi, YooMoney</p>
                                    </div>
                                </div> -->
                                <div class="select_method" data-id="3">
                                    <div class="select_method-title">
                                        <p>Binance Pay</p>
                                    </div>
                                    <div class="select_method-desc">
                                        <p>If you do not have a Binance account, <a href="#">register here</a>
                                            and send crypto transactions with 0% fees.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="select_method-count">
                                <div class="select_method-drop active-select"></div>
                                <div class="select_method-drop"></div>
                                <div class="select_method-drop"></div>
                            </div>
                        </div>
                        <div class="select_cryptocurrencies-block">
                            <button class="back-button">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.9" clip-path="url(#clip0_22_864)">
                                        <path d="M6.66675 16H25.3334" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.3334 9.3335L6.66675 16.0002" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.3334 22.6667L6.66675 16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_22_864">
                                            <rect width="32" height="32" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            
                            <a class="close_button" href="cart-page.html">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.9" clip-path="url(#clip0_22_859)">
                                        <path d="M10.6667 10.6665L21.3334 21.3332" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21.3334 10.6665L10.6667 21.3332" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_22_859">
                                            <rect width="32" height="32" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>                            
                            </a>
                            <div class="select_payment_type-title">
                                <p>Choose a payment method</p>
                            </div>
                            <div class="selected_method-header">
                                <div class="select_method-title">
                                    <p>Cryptocurrencies</p>
                                </div>
                                <div class="select_method-desc">
                                    <p>Bitcoin, Litecoin, Ethereum, Bitcoin Cash, Monero, Solana, Ripple, Binance Coin, Tron, USDC, USDT ...</p>
                                </div>
                            </div>
                            <div class="selected_method-wrapper">
                                <div class="item">
                                    <img src="../public/img/icons/dai.png">
                                    <div class="item-text">
                                        <p class="coin-name">DAI</p>
                                        <p class="coin-network">eth</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/dai.png">
                                    <div class="item-text">
                                        <p class="coin-name">DAI</p>
                                        <p class="coin-network">polygon</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/usdt.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDT</p>
                                        <p class="coin-network">tron</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/eth.png">
                                    <div class="item-text">
                                        <p class="coin-name">ETH</p>
                                        <p class="coin-network">eth</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/btc.png">
                                    <div class="item-text">
                                        <p class="coin-name">BTC</p>
                                        <p class="coin-network">btc</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/busd.png">
                                    <div class="item-text">
                                        <p class="coin-name">BUSD</p>
                                        <p class="coin-network">bsd</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/ltc.png">
                                    <div class="item-text">
                                        <p class="coin-name">LTC</p>
                                        <p class="coin-network">ltc</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/doge.png">
                                    <div class="item-text">
                                        <p class="coin-name">DOGE</p>
                                        <p class="coin-network">doge</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/usdc.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDC</p>
                                        <p class="coin-network">polygon</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/dash.png">
                                    <div class="item-text">
                                        <p class="coin-name">DASH</p>
                                        <p class="coin-network">dash</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/usdt.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDT</p>
                                        <p class="coin-network">polygon</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/usdc.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDC</p>
                                        <p class="coin-network">tron</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/usdc.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDC</p>
                                        <p class="coin-network">eth</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/usdt.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDT</p>
                                        <p class="coin-network">bsc</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/ton.png">
                                    <div class="item-text">
                                        <p class="coin-name">TON</p>
                                        <p class="coin-network">ton</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/usdc.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDC</p>
                                        <p class="coin-network">bsc</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/monero.png">
                                    <div class="item-text">
                                        <p class="coin-name">XMR</p>
                                        <p class="coin-network">xmr</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/bnb.png">
                                    <div class="item-text">
                                        <p class="coin-name">BNB</p>
                                        <p class="coin-network">bsc</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/matic.png">
                                    <div class="item-text">
                                        <p class="coin-name">MATIC</p>
                                        <p class="coin-network">polygon</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/usdt.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDT</p>
                                        <p class="coin-network">eth</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/busd.png">
                                    <div class="item-text">
                                        <p class="coin-name">BUSD</p>
                                        <p class="coin-network">eth</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/tron.png">
                                    <div class="item-text">
                                        <p class="coin-name">TRX</p>
                                        <p class="coin-network">tron</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/dai.png">
                                    <div class="item-text">
                                        <p class="coin-name">DAI</p>
                                        <p class="coin-network">bsc</p>
                                    </div>                                        
                                </div>
                                <div class="item">
                                    <img src="../public/img/icons/bch.png">
                                    <div class="item-text">
                                        <p class="coin-name">BCH</p>
                                        <p class="coin-network">bch</p>
                                    </div>                                        
                                </div>
                            </div>
                            <div class="select_method-count">
                                <div class="select_method-drop"></div>
                                <div class="select_method-drop active-select"></div>
                                <div class="select_method-drop"></div>
                            </div>
                        </div>
                        <div class="select_final-block">
                            <button class="back-button final">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.9" clip-path="url(#clip0_22_864)">
                                        <path d="M6.66675 16H25.3334" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.3334 9.3335L6.66675 16.0002" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M13.3334 22.6667L6.66675 16" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_22_864">
                                            <rect width="32" height="32" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            
                            <a class="close_button final" href="cart-page.html">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.9" clip-path="url(#clip0_22_859)">
                                        <path d="M10.6667 10.6665L21.3334 21.3332" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M21.3334 10.6665L10.6667 21.3332" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_22_859">
                                            <rect width="32" height="32" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>                            
                            </a>
                            <div class="select-header">
                                <div class="select_payment_type-title">
                                    <p>Is that correct?</p>
                                </div>
                                <div class="selected_coin-block">
                                    <p class="selected_type">Binance Pay</p>
                                    <p class="selected_coin">Bitcoin</p>
                                </div>
                            </div>  
                            <div class="select-wrapper">
                                <div class="alert_block">
                                    <p class="alert_title">IMPORTANT</p>
                                    <p class="alert_desc">Follow the information on the next page so we can receive and process your payment.</p>
                                </div>
                            </div> 
                            <div class="button-block">
                                <button>Continue</button>
                            </div> 
                            <div class="select_method-count">
                                <div class="select_method-drop"></div>
                                <div class="select_method-drop"></div>
                                <div class="select_method-drop active-select"></div>
                            </div>                        
                        </div>
                    </div>                    
                </div>                
            </div>
        </section>
    </div>
    <script src="vendor/jquery.js"></script>
    <script src="public/js/translate.js"></script>
    <script src="public/js/min/event-click-min.js"></script>
    <script src="public/js/cart-handler.js"></script>
    <script src="public/js/select_method-event.js"></script>
</body>
</html>