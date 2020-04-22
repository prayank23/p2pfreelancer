<?php
session_start();
require_once 'init.php';
// dd('here');
use CoinGate\CoinGate;
// use DB;

$orderid = uniqid();
$_SESSION['c_order_id'] = $orderid;
$post_params = array(
    'order_id' => $orderid,
    'price_amount' => '100',
    'price_currency' => 'USD',
    'receive_currency' => 'EUR',
    'callback_url' => 'http://test.beeapp.pro/DEMO/Gothem/coingate/call_back.php',
    'cancel_url' => 'http://test.beeapp.pro/DEMO/Gothem/public/pcoingate/cancel',
    'success_url' => 'http://test.beeapp.pro/DEMO/Gothem/public/pcoingate/success',
    'title' => 'title',
    'description' => 'description',
);
$_SESSION['post_params'] = $post_params;
function getGoodAuthentication() {
    return array(
        'auth_token' => 'zNBAnNco2ZMpjs4ap_-dsa7XvMGZssDvJuqcRRJQ',
        'environment' => 'sandbox',
    );
}

$order = CoinGate::request('/orders', 'POST', $post_params, getGoodAuthentication());
echo '<pre>';
echo $order["payment_url"];
print_r($order);
// $u = DB::table('users')->first();
// die('here');

header('location:' . $order["payment_url"]);
