<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/min/header-min.css">
	<link rel="stylesheet" href="public/css/min/payments-final-min.css">
    <link rel="stylesheet" href="public/css/main-adaptive.css?12345">
    <link rel="icon" type="image/x-icon" href="public/img/icon.png">
    <title>HewStore</title>
</head>
<body>
    %%HEADER%%
    <div class="wrapper">
        <section class="confirmation_payment-section">
            <div class="container">
                <div class="main">
                    <div class="payment_details-block">
                        <a href="/payments" class="back-button final">
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
                        </a>
                        
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
                        <div class="payment_details-wrapper">
                            <div class="payment_details-header">
                                <div class="header-logo">
                                    <img draggable="false" src="../public/img/header-logo.svg">
                                </div>
                                <div class="header-title">
                                    <p class="lang" data-text="payment_title">{text}</p>
                                </div>
                                <div class="header-desc lang" data-text="payment_desc">
                                    {text}
                                </div>
                            </div>
                            <div class="border"></div>
                            <div class="payment_details-main">
                                <div class="payment_details-product_name">
                                    %%items%%
                                </div>
                                <div class="payment_details-order_block">
                                    <div class="order_values">
                                        <p class="order_title lang" data-text="orderId">{text}</p>
                                        <p class="order_attribute">%%order_id%%</p>
                                    </div>
                                    <div class="order_values">
                                        <p class="order_title lang" data-text="price">{text}</p>
                                        <p class="order_attribute">%%count_price%% $</p>
                                    </div>
                                    <div class="order_values">
                                        <p class="order_title lang" data-text="coin">{text}</p>
                                        <p class="order_attribute">%%count_coin%%</p>
                                    </div>
                                    <div class="order_values order_values_off">
                                        <p class="order_title lang" data-text="network">{text}</p>
                                        <p class="order_attribute">%%network%%</p>
                                    </div>
                                    <div class="order_values">
                                        <p class="order_title lang" data-text="email">{text}</p>
                                        <p class="order_attribute">%%user_email%%</p>
                                    </div>
                                    <div class="order_values">
                                        <p class="order_title lang" data-text="transaction_date">{text}</p>
                                        <p class="order_attribute">%%date%%</p>
                                    </div>
                                    <div class="order_values">
                                        <p class="order_title lang" data-text="order_cancel">{text}</p>
                                        <p class="order_attribute timer"></p>
                                    </div>
                                </div>
                                <div class="payment_qrcode-block">
                                    <div class="binance_qrcode">
                                        <div class="qrcode_block">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://pay.binance.com/en/checkout/6f5fa98de73d407498f3431a57aa973e alt=">
                                        </div>
                                        <div class="value_name">
                                            <p>Binance</p>
                                        </div>
                                        <div class="value_count">
                                            <p>BUSD <span>count_price</span></p>
                                        </div>
                                    </div>
                                    <div class="allcoins_qrcode">
                                        <div class="qrcode_block">
                                        </div>
                                        <div class="allcoins_info-block">
                                            <div class="allcoins_info_title">
                                                <p class="lang" data-text="qrcode_title">{text}</p>
                                            </div>
                                            <div class="allcoins_info_desc">
                                                <p><span class="lang" data-text="qrcode_desc1">{text} </span><span class="span_text">%%count_coin%%</span> <span class="lang" data-text="qrcode_desc2">{text}</span> <span class="span_text">%%payment_wallet_name%%</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="payment_change-button_block">
                                    <a href="/payments" class="lang" data-text="change_method">
                                        <svg width="20" height="20" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.3" clip-path="url(#clip0_22_864)">
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
                                        {text}
                                    </a>
                                </div>
                                <div class="payment_status-block">
                                    <p class="value_name lang" data-text="status">{text}</p>
                                    <p class="value_attribute">%%payment_status%%</p>
                                </div>
                                <div class="payment_faq-block">
                                    <p class="lang" data-text="faq_text">{text}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="vendor/jquery.js"></script>
    <script src="vendor/kjua-0.9.0.min.js"></script>
    <script src="public/js/translate.js"></script>
    <script src="public/js/min/event-click-min.js"></script>
    <script src="public/js/cart-handler.js"></script>
    <script src="public/js/select_method-event.js"></script>
    <script>
        var el = kjua({
            text: 'usdt:%%payment_wallet_name%%?amount=%%amount%%',
            back: '#fff',
            fill: '#000',
            size: 76,
            quiet: 0,
            render: 'svg',
            minVersion: 1,
            ecLevel: 'L',
            ratio: 1,
            mode: 'plain',
            crisp: true,
        });
        document.querySelectorAll(".qrcode_block")[1].appendChild(el);

        let timeStmp = Number('%%time%%');

        function startTimer(timestamp) 
        {
            const timerElement = document.querySelector('.timer');
            
            const interval = setInterval(() => {
                const now = new Date().getTime();
                const remainingTime = timestamp * 1000 - now;
                if (remainingTime <= 0) {
                clearInterval(interval);
                timerElement.innerHTML = '00:00:00';
                return;
                }
                
                let hours = Math.floor(remainingTime / (1000 * 60 * 60));
                let minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);
                
                if (hours < 10) {
                hours = '0' + hours;
                }
                
                if (minutes < 10) {
                minutes = '0' + minutes;
                }
                
                if (seconds < 10) {
                seconds = '0' + seconds;
                }
                
                timerElement.innerHTML = hours + ':' + minutes + ':' + seconds;
            }, 1000);
        }
        startTimer(timeStmp);
    </script>
</body>
</html>