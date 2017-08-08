<?php

function getHost() {
    $host = $_SERVER['HTTP_HOST'];
    return $host;
}

$host = getHost();
switch ($host) {
    case 'localhost':
        define('URL', 'http://localhost/all-new-rio/');
        break;
    case 'www.kia.com.py':
        define('URL', 'http://www.kia.com.py/all-new-rio/');
        break;
}

