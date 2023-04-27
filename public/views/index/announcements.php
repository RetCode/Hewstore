<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/min/header-min.css">
	<link rel="stylesheet" href="public/css/announcements-page.css">
    <link rel="stylesheet" href="public/css/main-adaptive.css">
    <link rel="icon" type="image/x-icon" href="public/img/icon.png">
    <title>Announcements</title>
</head>
<body>
    %%HEADER%%
    <div class="wrapper">
        <section class="announcements-section">
            <div class="container">
                <div class="main ru">
                    <div class="announcements_image-block">
                        <img src="/public/img/announcements/%%IMG%%">
                    </div>
                    <div class="announcements_date-block">
                        <img src="../public/img/date.svg">
                        <p>%%DATE-RU%%</p>
                    </div>
                    <div class="announcements_title">
                        <p>%%TITLE-RU%%</p>
                    </div>
                    <div class="announcements_desc">
                        <p>%%DESC-RU%%</p>
                    </div>
                    <div class="body">
                        %%BODY-RU%%
                    </div>
                </div>
                <div class="main en">
                    <div class="announcements_image-block">
                        <img src="/public/img/announcements/%%IMG%%">
                    </div>
                    <div class="announcements_date-block">
                        <img src="../public/img/date.svg">
                        <p>%%DATE-EN%%</p>
                    </div>
                    <div class="announcements_title">
                        <p>%%TITLE-EN%%</p>
                    </div>
                    <div class="announcements_desc">
                        <p>%%DESC-EN%%</p>
                    </div>
                    <div class="body">
                        %%BODY-EN%%
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- Scripts -->
    <script src="public/js/cart-handler.js"></script>
	<script src="public/js/translate.js"></script>
    <script src="public/js/event-announcment.js"></script>
    <script src="public/js/min/event-click-min.js"></script>
    <script src="vendor/jquery.js"></script>
</body>
</html>