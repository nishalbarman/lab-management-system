<?php

$amount = '35';

$local = [
    // IPv4 address
    '127.0.0.1',
    'localhost',

    // IPv6 address
    '::1'
];

$ENGINE_PATH = "/core/engine/main_engine.php";

if (in_array($_SERVER['REMOTE_ADDR'], $local)) {
    $BASE_URL = "http://localhost/hk_new";
    $success_url = "http://localhost/hk_new/checkout/success.php";
    $failure_url = "http://localhost/hk_new/checkout/success.php";
    // $failure_url = "http://localhost/hk_new/checkout/failure.php";
} else {
    $BASE_URL = "http://65.0.101.158";
    $success_url = "http://65.0.101.158/checkout/success.php";
    $failure_url = "http://65.0.101.158/checkout/success.php";
    // $failure_url = "http://65.0.101.158/checkout/failure.php";
}

?>