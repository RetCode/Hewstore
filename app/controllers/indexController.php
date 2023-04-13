<?php
use app\core\Controller;
use app\core\DataBase;
use app\core\Utils;
use Cryptomus\Api\Client;

class indexController extends Controller
{
    function indexAction()
    {
        $PAYMENT_KEY = 'biYCnFQHkQ98U3yd1bC4xSO9aRM078mjas3fRDmpp0USgLDYLzOKPq01nXBgBl1kmsvjxLPm3ccveR7YIDvaxrq6JryfUiRV5doApM5jPtITIXWKHu5t1CIIeLQGP7Gg';
        $MERCHANT_UUID = '92e7d0b1-b4ea-4230-86e9-8450433a4416';

        $client = Client::payment($PAYMENT_KEY, $MERCHANT_UUID);

        $data = [
            'amount' => '7',
            'currency' => 'USD',
            'network' => 'TRON',
            'order_id' => '555125',
            'url_return' => 'https://example.com/return',
            'url_callback' => 'https://example.com/callback',
            'is_payment_multiple' => false,
            'lifetime' => '7200',
            'to_currency' => 'USDT'
        ];

        $result = $client->create($data);
        var_dump($result);

        $this->view->render_html([
            "HEADER" => Utils::getTemplates("header.template")
        ]);
    }
}