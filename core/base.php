<?php

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
    $BASE_URL = "http://13.127.248.80";
    $success_url = "http://13.127.248.80/checkout/success.php";
    $failure_url = "http://13.127.248.80/checkout/success.php";
    // $failure_url = "http://13.127.248.80/checkout/failure.php";
}

?>