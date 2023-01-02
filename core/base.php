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
} else {
    $BASE_URL = "http://13.127.248.80";
}

?>