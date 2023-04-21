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
                            <a class="close_button" href="/cart">
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
                                <p class="lang" data-text="select_payment-text">{text}</p>
                            </div>
                            <div class="select_methods">
                                <div class="select_method active" data-id="1">
                                    <div class="select_method-title">
                                        <p class="lang" data-text="cryptocurrencies_method-title">{text}</p>
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
                                        <p class="lang" data-text="binance_method-desc">{text}</p>
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
                            
                            <a class="close_button" href="/cart">
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
                                <p class="lang" data-text="select_payment-text">{text}</p>
                            </div>
                            <div class="selected_method-header">
                                <div class="select_method-title">
                                    <p class="lang" data-text="cryptocurrencies_method-title">{text}</p>
                                </div>
                                <div class="select_method-desc">
                                    <p>Bitcoin, Litecoin, Ethereum, Bitcoin Cash, Monero, Solana, Ripple, Binance Coin, Tron, USDC, USDT ...</p>
                                </div>
                            </div>
                            <div class="selected_method-wrapper">
                                <div class="item coin mintwo" x-data="DAI" x-network="eth">
                                    <img src="../public/img/icons/dai.png">
                                    <div class="item-text">
                                        <p class="coin-name">DAI</p>
                                        <p class="coin-network">eth</p>
                                    </div>                                        
                                </div>
                                <div class="item coin mintwo" x-data="DAI" x-network="polygon">
                                    <img src="../public/img/icons/dai.png">
                                    <div class="item-text">
                                        <p class="coin-name">DAI</p>
                                        <p class="coin-network">polygon</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="USDT" x-network="tron">
                                    <img src="../public/img/icons/usdt.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDT</p>
                                        <p class="coin-network">tron</p>
                                    </div>                                        
                                </div>
                                <div class="item coin mintwohungred" x-data="ETH" x-network="ETH">
                                    <img src="../public/img/icons/eth.png">
                                    <div class="item-text">
                                        <p class="coin-name">ETH</p>
                                        <p class="coin-network">eth</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="BTC" x-network="btc">
                                    <img src="../public/img/icons/btc.png">
                                    <div class="item-text">
                                        <p class="coin-name">BTC</p>
                                        <p class="coin-network">btc</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="BUSD" x-network="bsc">
                                    <img src="../public/img/icons/busd.png">
                                    <div class="item-text">
                                        <p class="coin-name">BUSD</p>
                                        <p class="coin-network">bsc</p>
                                    </div>                                        
                                </div>
                                <div class="item coin mintwo" x-data="LTC" x-network="ltc">
                                    <img src="../public/img/icons/ltc.png">
                                    <div class="item-text">
                                        <p class="coin-name">LTC</p>
                                        <p class="coin-network">ltc</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="DOGE" x-network="doge">
                                    <img src="../public/img/icons/doge.png">
                                    <div class="item-text">
                                        <p class="coin-name">DOGE</p>
                                        <p class="coin-network">doge</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="USDC" x-network="polygon">
                                    <img src="../public/img/icons/usdc.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDC</p>
                                        <p class="coin-network">polygon</p>
                                    </div>                                        
                                </div>
                                <div class="item coin mintwo" x-data="DASH" x-network="dash">
                                    <img src="../public/img/icons/dash.png">
                                    <div class="item-text">
                                        <p class="coin-name">DASH</p>
                                        <p class="coin-network">dash</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="USDT" x-network="polygon">
                                    <img src="../public/img/icons/usdt.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDT</p>
                                        <p class="coin-network">polygon</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="USDC" x-network="tron">
                                    <img src="../public/img/icons/usdc.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDC</p>
                                        <p class="coin-network">tron</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="USDC" x-network="eth">
                                    <img src="../public/img/icons/usdc.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDC</p>
                                        <p class="coin-network">eth</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="USDT" x-network="bsc">
                                    <img src="../public/img/icons/usdt.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDT</p>
                                        <p class="coin-network">bsc</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="TON" x-network="ton">
                                    <img src="../public/img/icons/ton.png">
                                    <div class="item-text">
                                        <p class="coin-name">TON</p>
                                        <p class="coin-network">ton</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="USDC" x-network="bsc">
                                    <img src="../public/img/icons/usdc.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDC</p>
                                        <p class="coin-network">bsc</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="XMR" x-network="xmr">
                                    <img src="../public/img/icons/monero.png">
                                    <div class="item-text">
                                        <p class="coin-name">XMR</p>
                                        <p class="coin-network">xmr</p>
                                    </div>                                        
                                </div>
                                <div class="item coin mintwo" x-data="BNB" x-network="bsc">
                                    <img src="../public/img/icons/bnb.png">
                                    <div class="item-text">
                                        <p class="coin-name">BNB</p>
                                        <p class="coin-network">bsc</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="MATIC" x-network="polygon">
                                    <img src="../public/img/icons/matic.png">
                                    <div class="item-text">
                                        <p class="coin-name">MATIC</p>
                                        <p class="coin-network">polygon</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="USDT" x-network="eth">
                                    <img src="../public/img/icons/usdt.png">
                                    <div class="item-text">
                                        <p class="coin-name">USDT</p>
                                        <p class="coin-network">eth</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="BUSD" x-network="eth">
                                    <img src="../public/img/icons/busd.png">
                                    <div class="item-text">
                                        <p class="coin-name">BUSD</p>
                                        <p class="coin-network">eth</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="TRX" x-network="tron">
                                    <img src="../public/img/icons/tron.png">
                                    <div class="item-text">
                                        <p class="coin-name">TRX</p>
                                        <p class="coin-network">tron</p>
                                    </div>                                        
                                </div>
                                <div class="item coin mintwo" x-data="DAI" x-network="bsc">
                                    <img src="../public/img/icons/dai.png">
                                    <div class="item-text">
                                        <p class="coin-name">DAI</p>
                                        <p class="coin-network">bsc</p>
                                    </div>                                        
                                </div>
                                <div class="item coin" x-data="BCH" x-network="bch">
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
                            
                            <a class="close_button final" href="/cart">
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
                                    <p class="lang" data-text="correct_text">{text}</p>
                                </div>
                                <div class="selected_coin-block">
                                    <p class="selected_type">Binance Pay</p>
                                    <p class="selected_coin">Bitcoin</p>
                                </div>
                            </div>  
                            <div class="select-wrapper">
                                <div class="alert_block">
                                    <p class="alert_title lang" data-text="alert_Title">{text}</p>
                                    <p class="alert_desc lang" data-text="alert_Desc">{text}</p>
                                </div>
                            </div> 
                            <div class="button-block">
                                <button class="lang" data-text="continue_button">{text}</button>
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
    <script src="public/js/translate.js"></script>
    <script src="vendor/jquery.js"></script>
    <script src="public/js/translate.js"></script>
    <script src="public/js/min/event-click-min.js"></script>
    <script src="public/js/cart-handler.js"></script>
    <script src="public/js/select_method-event.js"></script>
    <script>

        if(localStorage.getItem("payments") != null)
        {
            let cost = JSON.parse(localStorage.getItem("payments"))["cost"];
            let mail = JSON.parse(localStorage.getItem("payments"))["mail"];
            let promo = JSON.parse(localStorage.getItem("payments"))["promo"];
            let items = JSON.parse(localStorage.getItem("payments"))["items"];

            if(cost < 2)
                document.querySelectorAll(".mintwo").forEach(element => {
                    element.remove();
                })

            if(cost < 20)
                document.querySelectorAll(".mintwohungred").forEach(element => {
                    element.remove();
                })

            document.querySelectorAll(".coin").forEach(element => {
                element.onclick = () => {
                    let currency = element.getAttribute("x-data");
                    let network = element.getAttribute("x-network");

                    document.querySelector(".selected_method-wrapper").innerHTML = `<div class="loading">
                                <div class="spinner">
                                    <svg viewBox="25 25 50 50" class="circular">
                                        <circle stroke-miterlimit="10" stroke-width="3" fill="none" r="20" cy="50" cx="50" class="path"></circle>
                                    </svg>
                                </div>
                            </div>`
                    document.querySelector(".selected_method-wrapper").style = "grid-template-columns:none";

                    $.ajax({
                        url: '/api',
                        method: 'post',
                        dataType: 'json',      
                        data: {
                            method: 'getOffer', 
                            amount: cost, 
                            network: network, 
                            to_currency: currency, 
                            mail: mail, 
                            promo:promo, 
                            items: items
                        },
                        success: function(data){
                            if(data["succes"] == true)
                            {
                                localStorage.removeItem("cart");
                                location.href = "/pay?hash=" + data["hash"];
                            }
                            else
                            {
                                document.querySelector(".selected_method-wrapper").innerHTML = `<div class="loading" style="color:white;     display: flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center;">
                                    <svg fill="#FA5252" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="65px" height="52px"><path d="M 12 2 C 6.4889971 2 2 6.4889971 2 12 C 2 17.511003 6.4889971 22 12 22 C 17.511003 22 22 17.511003 22 12 C 22 6.4889971 17.511003 2 12 2 z M 12 4 C 16.430123 4 20 7.5698774 20 12 C 20 13.85307 19.369262 15.55056 18.318359 16.904297 L 7.0957031 5.6816406 C 8.4494397 4.6307377 10.14693 4 12 4 z M 5.6816406 7.0957031 L 16.904297 18.318359 C 15.55056 19.369262 13.85307 20 12 20 C 7.5698774 20 4 16.430123 4 12 C 4 10.14693 4.6307377 8.4494397 5.6816406 7.0957031 z"/></svg>
                                    <p style="margin-top:15px">Error create invoice</p>
                                </div>`
                            }
                        }
                    });
                }
            });
        }
        else
        {
            location.href = "/cart";
        }
    </script>
</body>
</html>