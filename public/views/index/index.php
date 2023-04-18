<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="public/css/min/header-min.css">
	<link rel="stylesheet" href="public/css/min/index-min.css">
	<title>HewStore</title>
</head>
<body>
	<!-- Header -->
	%%HEADER%%
	<div class="wrapper">
        <main class="main">
            <!-- Main Section -->
            <section id="main" class="main-section">
                <div class="container">
                    <div class="main-block">
                        <div class="left-block">
                            <div class="unification-block">
                                <div class="main-text-box">
                                    <p class="main-text lang" data-text="main-text">{text}</p>
                                </div>
                                <div class="description-text-box">
                                    <p class="description-text lang" data-text="description-text">{text}</p>
                                </div>
                                <div class="button-box">
                                    <a href="#products" class="purshare-button lang" data-text="purshare-button">{text}</a>
                                    <a href="#contacts" class="more-details-button lang" data-text="more-details-button">{text} <img src="public/img/arrow.svg"></a>
                                </div> 
                            </div>                               
                        </div>
                        <div class="right-block">
                            <div class="logo-box">
                                <img draggable="false" src="public/img/logo.svg">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Announcements Section -->
            <section id="announcements" class="announcements-section">
                <div class="container">
                    <div class="name-block lang" data-text="announcement">
                        <p>{text}</p>
                    </div>
                    <div class="announcements_button-block">
                        <a href="#" class="lang" data-text="announcement-archive">
                            {text}
                            <img src="public/img/arrow.svg">
                        </a>
                    </div>
                    <div class="announcements_items-block">
                        <div class="announcements-item">
                            <img class="announcements_image" src="public/img/announcements/1.png">
                            <div class="announcements_item-info">
                                <div class="announcements_item-date">
                                    <img src="public/img/date.svg">
                                    <p>22.06.2023</p>
                                </div>
                                <div class="announcements_item-name">
                                    <p>Announcements Name</p>
                                </div>
                                <div class="announcements_item-description">
                                    <p>https://sellix.io/HewStore [PayPal, Credit & Debit Card, BTC, ETH, LTC, XLM, Apple Pay] ...</p>
                                </div>
                                <div class="announcements_item-link">
                                    <a class="lang" data-text="announcements_open-link" href="#">
                                        {text}
                                        <img src="public/img/arrow.svg">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="announcements-item">
                            <img class="announcements_image" src="public/img/announcements/1.png">
                            <div class="announcements_item-info">
                                <div class="announcements_item-date">
                                    <img src="public/img/date.svg">
                                    <p>22.06.2023</p>
                                </div>
                                <div class="announcements_item-name">
                                    <p>Announcements Name</p>
                                </div>
                                <div class="announcements_item-description">
                                    <p>https://sellix.io/HewStore [PayPal, Credit & Debit Card, BTC, ETH, LTC, XLM, Apple Pay] ...</p>
                                </div>
                                <div class="announcements_item-link">
                                    <a class="lang" data-text="announcements_open-link" href="#">
                                        {text}
                                        <img src="public/img/arrow.svg">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="announcements-item">
                            <img class="announcements_image" src="public/img/announcements/1.png">
                            <div class="announcements_item-info">
                                <div class="announcements_item-date">
                                    <img src="public/img/date.svg">
                                    <p>22.06.2023</p>
                                </div>
                                <div class="announcements_item-name">
                                    <p>Announcements Name</p>
                                </div>
                                <div class="announcements_item-description">
                                    <p>https://sellix.io/HewStore [PayPal, Credit & Debit Card, BTC, ETH, LTC, XLM, Apple Pay] ...</p>
                                </div>
                                <div class="announcements_item-link">
                                    <a class="lang" data-text="announcements_open-link" href="#">
                                        {text}
                                        <img src="public/img/arrow.svg">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Products Section -->
            <section id="products" class="products-section">
                <div class="container">
                    <div class="name-block lang" data-text="games">
                        <p>{text}</p>
                    </div>
                    <div class="unification-block">
                        <div class="description-block lang" data-text="games-description">
                            <p>{text}</p>
                        </div>
                        <div class="products_search-block">
                            <img src="public/img/find.svg">
                            <input id="findInput" class="langInput" data-text="search" type="text" placeholder="{text}">
                        </div>
                    </div>  
                    <div class="loading">
                            <div class="spinner">
                                <svg viewBox="25 25 50 50" class="circular">
                                    <circle stroke-miterlimit="10" stroke-width="3" fill="none" r="20" cy="50" cx="50" class="path"></circle>
                                </svg>
                            </div>
                        </div>                  
                    <div class="products_items-block">
                    </div>
                </div>
            </section>

            <!-- Contacts Section -->
            <section id="contacts" class="contacts-section">
                <div class="container">
                    <div class="name-block lang" data-text="contacts">
                        <p>{text}</p>
                    </div>
                    <div class="description-block lang" data-text="contacts-description">
                        <p>{text}</p>
                    </div>
                    <div class="contacts_items-block">
                        <div class="contacts-item">
                            <div class="contacts_item-image">
                                <img src="public/img/contacts/discord.svg">
                            </div>
                            <div class="contacts_item-info">
                                <p class="contacts-header lang" data-text="discord-server">{text}</p>
                                <a href="https://discord.gg/Fpy262yz9S" target="_blank" class="contacts-link">discord.gg/Fpy262yz9S</a>
                            </div>
                        </div>
                        <div class="contacts-item">
                            <div class="contacts_item-image">
                                <img src="public/img/contacts/discord.svg">
                            </div>
                            <div class="contacts_item-info">
                                <p class="contacts-header">Discord</p>
                                <a id="copy_target" class="contacts-link copy_target">
                                    <p id="text">HewHewLalalay#5853</p>
                                </a>
                            </div>
                        </div>
                        <div class="contacts-item">
                            <div class="contacts_item-image">
                                <img src="public/img/contacts/telegram.svg">
                            </div>
                            <div class="contacts_item-info">
                                <p class="contacts-header">Telegram</p>
                                <a href="https://t.me/NobodyKnowsMeAgain" target="_blank" class="contacts-link">@NobodyKnowsMeAgain</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>        
    </div>    
	<!-- Scripts -->
	<script src="public/js/translate.js"></script>
    <script src="vendor/jquery.js"></script>
    <script src="public/js/ajax-events.js"></script>
    <script src="public/js/scroll_event.js"></script>
    <script src="public/js/min/event-click-min.js"></script>
</body>
</html>
